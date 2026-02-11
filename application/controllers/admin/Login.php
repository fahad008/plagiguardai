<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct() 
	{
	 	parent::__construct();
	 	$this->load->model('Admin_Model','admin_model');
	 	if ($this->session->userdata('admin_logged_in')) {
            redirect(base_url().'admin/dashboard/');
        }
    } 
	public function index()
	{
		$data = array();
		$this->template->load('admin/content/login', 'admin/content/login', $data);
	}

	public function signin(){

		if($this->input->post()){

			// echo "<pre>";print_r($this->input->post());die;

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$email_check = $this->admin_model->admin_email_check($email);

			if ($email_check === false) {

				echo json_encode(array("status" => 'error' , "message" => 'The email address entered does not match any account.', "redirect" => ''));
				exit();

			}
			
			$admin = $this->admin_model->admin_via_email($email);
			if ($admin['status'] != '1') {
				echo json_encode(array("status" => 'error' , "message" => 'Your access has been temporarily disabled by the super administrator. For assistance, please reach out to our support team.', "redirect" => ''));
				exit();
			}

			if(password_verify($password, $admin['password'])){

				$update_info = array(
					'last_login' => date('y-m-d H:m:s'),
				);

				$this->admin_model->update_admin($admin['id'], $update_info);

				// $this->session->set_userdata('logged_in_admin', $admin);

				$admin_role = $this->admin_model->get_role($admin['role_id']);
				

				$this->session->set_userdata([
				    'admin_id' => $admin['id'],
				    'admin_role_id' => $admin['role_id'],
				    'admin_role' => $admin_role,
				    'admin_logged_in' => true
				]);

				echo json_encode(array("status" => 'success', "message" => 'Login successful. Redirecting to your dashboard…', "redirect" => base_url().'admin/dashboard/'));

			}else{
				echo json_encode(array("status" => 'error' , "message" => 'Incorrect password. Please try again.', "redirect" => ''));
				exit();	

			}
		}
	}
}