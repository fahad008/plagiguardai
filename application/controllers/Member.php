<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in_customer')) {
            if ($this->input->is_ajax_request()) {
                // For AJAX, return JSON or proper HTTP code
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Session expired, please login again'
                ]);
                exit; // stop further execution
            } else {
                // Normal page request
                redirect(base_url().'login/');
            }
        }

        $this->load->model('Customer_Model', 'customer_model');
        $this->load->model('Subscription_Model', 'subscription_model');
        $this->load->model('Scan_Model', 'scan_model');
        $this->load->model('Plan_Model', 'plan_model');
        $this->load->model('Authentication_Model', 'authentication_model');
        $this->load->helper('country');
	}


	public function index()
    {
        redirect(base_url().'profile/');
    }

    public function profile()
    {
        $customer_id  = $this->session->userdata('logged_in_customer')['id'];
        $data = [];
        $data['active'] = 'overview';
        $data['footer_links'] = get_footer_links();
        $data['customer_subscription'] = '';
        $data['customer_plan'] = '';
        $scan = $this->scan_model->get_last_scan($customer_id);
        if (isset($scan) && is_array($scan) && !empty($scan)) {
            $data['last_scan'] = getScanOverviewData($scan);
        }else{
            $data['last_scan'] = array(
                "one_do_icon" => 'svg-icon-defaulth',
                "one_do_score" => 0,
                "two_do_icon" => 'svg-icon-defaulth',
                "two_do_score" => 0,
                "three_do_icon" => 'svg-icon-defaulth',
                "three_do_score" => 0,
            );
        }
        $data['customer_info'] = $this->customer_model->get_customer($customer_id);
        $data['avatar'] = 'assets/media/avatars/blank.png';
        if ($data['customer_info']['profile_picture']) {
            $avatar_path = FCPATH . 'uploads/avatar/customer_'.(int)$customer_id.'/'.$data['customer_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['avatar'] = base_url() . 'uploads/avatar/customer_'.(int)$customer_id.'/'.$data['customer_info']['profile_picture'];
            }
        }
        $data['country'] = getCountryByCode($data['customer_info']['country']);
        if($data['customer_info']['plan_type'] != 'Guest'){
            $data['customer_subscription'] = $this->subscription_model->get_customer_subscription($data['customer_info']['id']);
            if (isset($data['customer_subscription']) && !empty($data['customer_subscription'])) {
                $data['customer_plan'] = $this->plan_model->get_plan($data['customer_subscription']['plan_id']);
            }
        }

        if($data['customer_info']['plan_type'] != 'Guest'){
            $data['customer_subscription'] = $this->subscription_model->get_customer_subscription($data['customer_info']['id']);
            if (isset($data['customer_subscription']) && !empty($data['customer_subscription'])) {
                $data['customer_plan'] = $this->plan_model->get_plan($data['customer_subscription']['plan_id']);
                $data['customer_credits'] = $this->subscription_model->get_customer_credits($customer_id);
            }
        }

    // echo "<pre>";print_r($data);die;
        $this->template->load('member/profile', 'member/profile', $data);
    }

    public function update()
    {
        $customer_id  = $this->session->userdata('logged_in_customer')['id'];
        $data = [];
        $data['active'] = 'update';
        $data['footer_links'] = get_footer_links();
        $scan = $this->scan_model->get_last_scan($customer_id);
        if (isset($scan) && is_array($scan) && !empty($scan)) {
            $data['last_scan'] = getScanOverviewData($scan);
        }else{
            $data['last_scan'] = array(
                "one_do_icon" => 'svg-icon-defaulth',
                "one_do_score" => 0,
                "two_do_icon" => 'svg-icon-defaulth',
                "two_do_score" => 0,
                "three_do_icon" => 'svg-icon-defaulth',
                "three_do_score" => 0,
            );
        }
        $data['customer_info'] = $this->customer_model->get_customer($customer_id);
        $data['avatar'] = 'assets/media/avatars/blank.png';
        if ($data['customer_info']['profile_picture']) {
            $avatar_path = FCPATH . 'uploads/avatar/customer_'.(int)$customer_id.'/'.$data['customer_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['avatar'] = base_url() . 'uploads/avatar/customer_'.(int)$customer_id.'/'.$data['customer_info']['profile_picture'];
            }
        }
        $data['country_list'] = getALLCountries();
        $data['country'] = getCountryByCode($data['customer_info']['country']);

        if($data['customer_info']['plan_type'] != 'Guest'){
            $data['customer_subscription'] = $this->subscription_model->get_customer_subscription($data['customer_info']['id']);
            if (isset($data['customer_subscription']) && !empty($data['customer_subscription'])) {
                $data['customer_plan'] = $this->plan_model->get_plan($data['customer_subscription']['plan_id']);
                $data['customer_credits'] = $this->subscription_model->get_customer_credits($customer_id);
            }
        }
        // echo "<pre>";print_r($data);die;
        $this->template->load('member/update', 'member/update', $data);
    }

    public function settings()
    {
        // echo "<pre>";print_r($this->session->userdata('logged_in_customer'));die;
        $customer_id  = $this->session->userdata('logged_in_customer')['id'];
        $data = [];
        $data['active'] = 'settings';
        $data['footer_links'] = get_footer_links();
        $scan = $this->scan_model->get_last_scan($customer_id);
        if (isset($scan) && is_array($scan) && !empty($scan)) {
            $data['last_scan'] = getScanOverviewData($scan);
        }else{
            $data['last_scan'] = array(
                "one_do_icon" => 'svg-icon-defaulth',
                "one_do_score" => 0,
                "two_do_icon" => 'svg-icon-defaulth',
                "two_do_score" => 0,
                "three_do_icon" => 'svg-icon-defaulth',
                "three_do_score" => 0,
            );
        }
        $data['customer_info'] = $this->customer_model->get_customer($customer_id);
        $data['country'] = getCountryByCode($data['customer_info']['country']);
        $data['avatar'] = 'assets/media/avatars/blank.png';
        if ($data['customer_info']['profile_picture']) {
            $avatar_path = FCPATH . 'uploads/avatar/customer_'.(int)$customer_id.'/'.$data['customer_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['avatar'] = base_url() . 'uploads/avatar/customer_'.(int)$customer_id.'/'.$data['customer_info']['profile_picture'];
            }
        }

        if($data['customer_info']['plan_type'] != 'Guest'){
            $data['customer_subscription'] = $this->subscription_model->get_customer_subscription($data['customer_info']['id']);
            if (isset($data['customer_subscription']) && !empty($data['customer_subscription'])) {
                $data['customer_plan'] = $this->plan_model->get_plan($data['customer_subscription']['plan_id']);
                $data['customer_credits'] = $this->subscription_model->get_customer_credits($customer_id);
            }
        }
        // echo "<pre>";print_r($data);die;
        $this->template->load('member/settings', 'member/settings', $data);
    }

    public function edit(){
        // echo "<pre>";print_r($_FILES);print_r($this->input->post());die;
        if($this->input->post()){

            $customer_id  = $this->session->userdata('logged_in_customer')['id'];

            if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] != '') {
                
                $file_name = $_FILES['avatar']['name'];
                $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $extension = strtolower($extension);    
                $upload_to = FCPATH . 'uploads/avatar/customer_'.(int)$customer_id.'/';

                if (!is_dir($upload_to)) {

                    mkdir($upload_to, 0755, true);

                }

                $file_info = $this->upload_file($upload_to, $extension);
                // echo "<pre>";print_r($file_info);die;
                if ($file_info['status']) {

                    $old_avatar = $this->customer_model->get_customer_avatar($customer_id);
                    if ($old_avatar) {
                        $old_avatar_path = FCPATH . 'uploads/avatar/customer_'.(int)$customer_id.'/'.$old_avatar;
                        unlink($old_avatar_path);
                    }
                    
                    $avatar_info = array(
                        "profile_picture" => $file_info['file_name'],
                        'updated_at' => date('y-m-d H:m:s')
                    );
                    $this->customer_model->update_member($customer_id, $avatar_info);
                }else{
                    echo json_encode(array("status" => 'error', "message" => $file_info['message']));
                    exit();
                }
            }else if ($this->input->post('avatar_remove')) {
                $old_avatar = $this->customer_model->get_customer_avatar($customer_id);
                if ($old_avatar) {
                    $old_avatar_path = FCPATH . 'uploads/avatar/customer_'.(int)$customer_id.'/'.$old_avatar;
                    unlink($old_avatar_path);
                }
                
                $avatar_info = array(
                    "profile_picture" => '',
                    'updated_at' => date('y-m-d H:m:s')
                );
                $this->customer_model->update_member($customer_id, $avatar_info);
            }

            // echo "<pre>";print_r($this->input->post());die;

            $data = array(
                'first_name' => trim($this->input->post('first_name')),
                'last_name' => trim($this->input->post('last_name')),
                'contact_number' => $this->input->post('contact_number'),
                'country' => $this->input->post('country'),
                'heard_from' => $this->input->post('heard_from'),
                'updated_at' => date('y-m-d H:m:s'),
            );

            // echo "<pre>";print_r($data);die;

            $this->customer_model->update_member($customer_id, $data);
            echo json_encode(array("status" => 'success', "message" => 'Your profile has been successfully updated.'));
            exit();
        }
    }

    private function upload_file($upload_path, $extension){

        $this->load->library('image_lib');

        $customer_id  = $this->session->userdata('logged_in_customer')['id'];
        $date = date('dmYHis');
        $fileName = $date.'_'.$customer_id.'.'.$extension;
        $config = array(
            'upload_path'   => $upload_path,
            'allowed_types' => 'png|jpg|jpeg',
            'max_size' => 5000,
            'file_name' => $fileName,                     
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('avatar')) {
            $result = array();
            $result = $this->upload->data();
            $result['status'] = true; 
            return $result;
        }else{
            $result = array(
                "status" => false,
                "message" => strip_tags($this->upload->display_errors()),
            );
            return $result;

        }
    }

    public function change_email(){
        // echo "<pre>";print_r($this->input->post());die;
        if($this->input->post()){

            $customer_id  = $this->session->userdata('logged_in_customer')['id'];

            $email = $this->input->post('emailaddress');
            $password = $this->input->post('confirmemailpassword');

            $email_check = $this->authentication_model->email_check($email);

            if ($email_check === true) {
                echo json_encode(array('status' => 'error' , 'message' => 'This email address is already registered. Please try out with a different email.'));
                exit();
            }

            $customer_info = $this->customer_model->get_customer($customer_id);
            if(password_verify($password, $customer_info['password'])){

                $update_info = array(
                    'email' => trim($email),
                    'updated_at' => date('y-m-d H:m:s')
                );

                $this->authentication_model->update_customer($customer_id, $update_info);

                $session_data = $this->session->userdata('logged_in_customer');
                $session_data['email'] = $email;
                $this->session->set_userdata('logged_in_customer', $session_data);

                echo json_encode(array("status" => 'success', "message" => 'Your email has been updated successfully.'));

            }else{

                echo json_encode(array("status" => 'error' , "message" => 'The password entered was incorrect.'));
                exit(); 

            }
        }
    }

    public function change_password(){
        // echo "<pre>";print_r($this->input->post());die;
        if($this->input->post()){

            $customer_id  = $this->session->userdata('logged_in_customer')['id'];

            $currentpassword = $this->input->post('currentpassword');
            $newpassword = $this->input->post('newpassword');
            $confirmpassword = $this->input->post('confirmpassword');

            $customer_info = $this->customer_model->get_customer($customer_id);

            if(password_verify($currentpassword, $customer_info['password'])){

                $newpassword        = $this->input->post('newpassword');
                $confirmpassword    = $this->input->post('confirmpassword');

                if ($newpassword !== $confirmpassword) {
                    echo json_encode(array("status" => 'error' , "message" => 'The password and its confirm are not the same.'));
                    exit(); 
                }

                $update_info = array(
                    'password' => password_hash($newpassword, PASSWORD_DEFAULT),
                    'updated_at' => date('y-m-d H:m:s')
                );

                $this->authentication_model->update_customer($customer_id, $update_info);

                echo json_encode(array("status" => 'success', "message" => 'Your password has been updated successfully.'));

            }else{

                echo json_encode(array("status" => 'error' , "message" => 'Current password entered was incorrect.'));
                exit(); 

            }
        }
    }
}