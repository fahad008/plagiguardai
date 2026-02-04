<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('Authentication_Model', 'authentication_model');
		$this->load->model('Subscription_Model', 'subscription_model');
		if ($this->session->userdata('logged_in_customer')) {
            redirect(base_url().'dashboard/');
        }
	}


	public function index()
    {
        $data = array();

        $this->template->load('autentication/signup', 'autentication/signup', $data);
    }

    public function register(){
    	// echo "<pre>";print_r($this->input->post());die;
		if($this->input->post()){

			$password = md5($this->input->post('password'));
			$email_check = $this->authentication_model->email_check($this->input->post('email'));

			if ($email_check === true) {
				echo json_encode(array('status' => 'error' , 'message' => 'This email address is already registered. Please sign in or use a different email.', "redirect" => ''));
				exit();
			}

			$data = array(
				'first_name' => trim($this->input->post('first_name')),
				'last_name' => trim($this->input->post('last_name')),
				'email' => $this->input->post('email'),
				'password' => $password,
				'usage_limit' => 0,
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s'),
				'last_login' => date('y-m-d H:m:s'),
			);
			

			$customer_id = $this->authentication_model->save_customer($data);
			
			if(isset($customer_id) && !empty($customer_id)){

				$credits = array(
					'customer_id' => $customer_id,
					'credits' => 0,
					'updated_at' => date('y-m-d H:m:s'),
				);

				$this->subscription_model->save_customer_credits($credits);
				// $this->session->set_userdata('logged_in_customer', $customer_info);

				$response =  array(
			      "status" => 'success',
			      "message" => 'Registration completed successfully. You can now sign in to your account.',
			      "redirect" => base_url().'login/',
			    );
			    echo json_encode($response);exit();	
				
			}else{

				$response =  array(
			      "status" => 'error',
			      "message" => 'PlagiGuardAI is unable to complete your registration at the moment. Please try again shortly!',
			      "redirect" => base_url().'signup/',
			    );
			    echo json_encode($response);exit();	

			}
		}
	}
}