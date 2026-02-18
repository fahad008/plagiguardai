<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_password extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in_customer')) {
            redirect(base_url().'dashboard/');
        }
        $this->load->model('Authentication_Model', 'authentication_model');
        $this->load->library('encryption');
	}


	public function index()
    {
        $data = [
            'title' => 'User Login',
            'error' => 'Invalid email or password'
        ];

        $this->template->load('autentication/forgot_password', 'autentication/forgot_password', $data);
    }

    public function query(){
        if($this->input->post()){
            // echo "<pre>";print_r($this->input->post());die;
            if ($_SERVER['HTTP_HOST'] != 'plagiguardai') {
                $recaptcha_input = $this->input->post('g-recaptcha-response');
                $recaptcha_response = verify_captcha($recaptcha_input);
                if (!$recaptcha_response) {
                    echo json_encode(array("status" => 'error' , "message" => 'Please verify that you are not a robot.', "redirect" => ''));
                    exit();
                }
            }
            $email = $this->input->post('email');
            $customer_info = $this->authentication_model->get_customer_via_email($email);
            

            if (isset($customer_info) && !empty($customer_info)) {
                $customer_id = $customer_info['id'];
                $encode = ["id" => $customer_id, "email" => $email];
                $encoded = json_encode($encode);
                $token = $this->encryption->encrypt($encoded);
                $token = base64_encode($token);
                
                $response = $this->token_email($customer_info, $token);
                if ($response) {
                    $updated = [
                        "pass_reset" => $token,
                        "updated_at" => date('y-m-d H:m:s')
                    ];
                    $updated = $this->authentication_model->update_customer($customer_id, $updated);
                    echo json_encode(array('status' => 'success' , 'message' => 'Your password reset link has been emailed. Please check your inbox (and spam/junk folder) to proceed with resetting your password. ', "redirect" => ''));
                    exit();
                }else{
                    echo json_encode(array('status' => 'error' , 'message' => 'Sorry! PlagiGuardAI is unable to send email at the moment, Please try later.', "redirect" => ''));
                    exit();
                }
                
            }else{
                echo json_encode(array('status' => 'error' , 'message' => 'The email address you entered is not registered with us. Please verify and try again.', "redirect" => ''));
                exit();
            }
        }else{
                echo json_encode(array('status' => 'error' , 'message' => 'Some error occured, please try again!', "redirect" => ''));
                exit();
            }
    }

    private function token_email($customer_info, $token)
    {
        $data = array();
        $to = $customer_info['email'];
        $subject = "Complete Your Password Reset";
        $message = "";

        $data['name'] = $customer_info['full_name'];
        $data['token'] = $token;
        $message = $this->load->view('emails/pass_link',$data, true);

        $response = send_email($to, $subject, $message, 'info');
        if ($response) {
            return true;
        } else {
            return false;
        }
    }

    public function test_token_email()
    {
        $data = array();
        $to = "fahad@don.com";
        $subject = "Complete Your Password Reset";
        $message = "";

        $data['name'] = 'Fahad';
        $data['token'] = 'fjgkjhkhdsadiuadahdakjdsaydgugwqdhjwqdyudgwet8216gdkjdada';
        echo $message = $this->load->view('emails/pass_link',$data, true);die;
    }
}