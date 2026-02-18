<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class password_reset extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in_customer')) {
            redirect(base_url().'dashboard/');
        }
        $this->load->model('Authentication_Model', 'authentication_model');
        $this->load->library('url_encrypt');
	}


	public function index()
    {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            // echo "<pre>";print_r($token);die;
            if ($token != '') {

                $encrypted = base64_decode($token);

                // Decrypt
                $json_payload = $this->encryption->decrypt($encrypted);

                if ($json_payload === false) {
                    $this->session->set_flashdata('error', 'Invalid or expired token.');
                    redirect(base_url().'forgot_password/');
                }

                $decoded = json_decode($json_payload, true);

                if (is_array($decoded) && !empty($decoded)) {
                    
                    if (array_key_exists('id', $decoded) && $decoded['id'] != '') {
                        $db_token = $this->authentication_model->authentic_customer($decoded['id'], $decoded['email']);
                        if (isset($db_token) && $db_token != '') {
                            if ($db_token == $token) {
                                $data = [];
                                $data['token'] = $token;
                                $this->template->load('autentication/password_reset', 'autentication/password_reset', $data);
                            }else{
                                $this->session->set_flashdata('error', 'Token does not match, Please try again.');
                                redirect(base_url().'forgot_password/');
                            }
                        }else{
                            $this->session->set_flashdata('error', 'Token has expired, Please try again.');
                            redirect(base_url().'forgot_password/');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Token does not match, Please try again.');
                        redirect(base_url().'forgot_password/');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Token does not match, Please try again.');
                    redirect(base_url().'forgot_password/');
                }
            }else{
                $this->session->set_flashdata('error', 'Token not found.');
                redirect(base_url().'forgot_password/');
            }
        }else{
            $this->session->set_flashdata('error', 'Token not found.');
            redirect(base_url().'forgot_password/');
        }
    }

    public function update(){
        if($this->input->post()){

            if ($_SERVER['HTTP_HOST'] != 'plagiguardai') {
                $recaptcha_input = $this->input->post('g-recaptcha-response');
                $recaptcha_response = verify_captcha($recaptcha_input);
                if (!$recaptcha_response) {
                    echo json_encode(array("status" => 'error' , "message" => 'Please verify that you are not a robot.', "redirect" => ''));
                    exit();
                }
            }

            $token = $this->input->post('token');
            if ($token) {

                $encrypted = base64_decode($token);

                // Decrypt
                $json_payload = $this->encryption->decrypt($encrypted);

                if ($json_payload === false) {
                    echo json_encode(array("status" => 'error' , "message" => 'Invalid or expired token.', "redirect" => ''));
                    exit();
                }

                $decoded = json_decode($json_payload, true);
                
                $db_token = $this->authentication_model->authentic_customer($decoded['id'], $decoded['email']);
                if ($db_token) {

                    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

                    $password_info = [
                        "password" => $password,
                        "pass_string" => '',
                        "pass_reset" => '',
                        "email_verified" => 'yes',
                        "updated_at" => date('y-m-d H:m:s')
                    ];

                    $this->authentication_model->update_customer($decoded['id'], $password_info);

                    $this->success_email($decoded['email']);

                    echo json_encode(array("status" => 'success' , "message" => 'Your password has been updated successfully.', "redirect" => ''));
                    exit();
                }else{
                    echo json_encode(array("status" => 'error' , "message" => 'Token has expired, Please try again.', "redirect" => ''));
                    exit();
                }
            }else{
                echo json_encode(array("status" => 'error' , "message" => 'Token has expired, Please try again.', "redirect" => ''));
                exit();
            }
        }else{
            echo json_encode(array("status" => 'error' , "message" => 'Access denied!', "redirect" => ''));
                exit();
        }
    }

    private function success_email($email)
    {
        $data = array();
        $to = $email;
        $subject = "Password Updated Successfully";
        $message = "";
        $message = $this->load->view('emails/pass_success',$data, true);

        $response = send_email($to, $subject, $message, 'info');
        if ($response) {
            return true;
        } else {
            return false;
        }
    }

    public function test_success_email()
    {
        $data = array();
        $to = 'abs';
        $subject = "Password Updated Successfully";
        $message = "";
        echo $this->load->view('emails/pass_success',$data, true);die;
    }
}