<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('logged_in_customer')) {
            redirect(base_url().'login/');
        }
        $this->load->model('Customer_Model', 'customer_model');
        $this->load->model('Settings_Model', 'settings_model');
        $this->load->model('Subscription_Model', 'subscription_model');
        $this->load->model('Plan_Model', 'plan_model');
        $this->load->model('Scan_Model', 'scan_model');
        $this->load->model('Upload_Model', 'upload_model');
        $this->load->library('url_encrypt');
	}


	public function index()
    {
        
        $data = array();
        $data['scan_id'] = '';
        $data['scan_info'] = '';
        $data['text_area'] = '';
        $data['title'] = '';
        $data['active'] = 'dashboard';
        $data['footer_links'] = get_footer_links();
        $data['customer_credits'] = 0;
        $data['customer_plan'] = '';
        $data['customer_subscription'] = '';
        $customer_id  = $this->session->userdata('logged_in_customer')['id'];
        $encoded_id = '';
        if (isset($_GET['scan_id']) && !empty($_GET['scan_id'])) {
            $encoded_id = $_GET['scan_id'];
            $data['scan_id'] = $this->url_encrypt->decode_id(rawurldecode($encoded_id));
            $data['scan_info'] = $this->scan_model->get_scans($data['scan_id']);
            $data['title'] = $data['scan_info']['title'];
            $formated_file_name = $this->upload_model->get_formatted_file($data['scan_info']['customer_uploads_id']);
            if (isset($formated_file_name) && $formated_file_name != '') {
                $formated_file_path = FCPATH . 'uploads/scans/customer_'.(int)$customer_id.'/'.$formated_file_name;
                if (file_exists($formated_file_path)) {
                    $text = file_get_contents($formated_file_path);
                    $data['text_area'] = trim($text);
                }
            }
        } 
        
        $customer_id = $this->session->userdata('logged_in_customer')['id'];
        $data['settings'] = $this->settings_model->get_settings(1);
        // echo "<pre>";print_r($data);die;
        $data['customer_info'] = $this->customer_model->get_customer($customer_id);
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
        $this->template->load('dashboard', 'dashboard', $data);
    }
}