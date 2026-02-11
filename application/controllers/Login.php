<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('Authentication_Model', 'authentication_model');
		if ($this->session->userdata('logged_in_customer')) {
            redirect(base_url().'dashboard/');
        }
	}


	public function index()
    {
        $data = [
            'title' => 'User Login',
            'error' => 'Invalid email or password'
        ];

        $this->template->load('autentication/login', 'autentication/login', $data);
    }

    public function signin(){

		if($this->input->post()){

			// echo "<pre>";print_r($this->input->post());die;

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$email_check = $this->authentication_model->email_check($email);

			if ($email_check === false) {

				echo json_encode(array("status" => 'error' , "message" => 'The email address entered does not match any account.', "redirect" => ''));
				exit();

			}
			
			$customer_info = $this->authentication_model->get_customer_via_email($email);
			if (password_verify($password, $customer_info['password'])) {
				
			    $update_info = array(
					'last_login' => date('y-m-d H:m:s'),
				);

				$this->authentication_model->update_customer($customer_info['id'], $update_info);

				$this->session->set_userdata('logged_in_customer', $customer_info);
				echo json_encode(array("status" => 'success', "message" => 'Login successful. Redirecting to your dashboard…', "redirect" => base_url().'dashboard/'));
			} else {
			    $error_msgs = ['candidate_password' => 'The password entered was incorrect.'];
				echo json_encode(array("status" => 'error' , "message" => 'Incorrect password. Please try again.', "redirect" => ''));
				exit();
			}
		}
	}
}