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
            if ($token != '') {
                $decoded = json_decode($this->encryption->decrypt($token), true);
                if (is_array($decoded) && !empty($decoded)) {
                    if (array_key_exists('id', $decoded) && $decoded['id'] != '') {
                        $customer_info = $this->authentication_model->authentic_customer($decoded['id'], $decoded['email']);
                        if (isset($customer_info) && !empty($customer_info)) {
                            $data = [];
                            $this->template->load('autentication/password_reset', 'autentication/password_reset', $data);
                        }else{
                            redirect(base_url().'login/');
                        }
                    }else{
                        redirect(base_url().'login/');
                    }
                }else{
                    redirect(base_url().'login/');
                }
            }else{
                redirect(base_url().'login/');
            }
        }else{
            redirect(base_url().'login/');
        }
    }

    public function reset_password(){
        if($this->input->post()){
            // echo "<pre>";print_r($this->input->post());die;

            $data = [];
            $scan_id = $this->input->post('scan_id');
            $data['scan_score'] = '';
            $data['scan_file'] = '';
            $data['scan_info'] = $this->scan_model->get_scans($scan_id);
            if (isset($data['scan_info']) && !empty($data['scan_info'])) {
                $data['scan_report'] = getBlackBoxData($data['scan_info']);
                // $data['scan_score'] = $scan_obj = getScanOverviewData($data['scan_info']);
                $data['scan_file'] = $this->scan_model->get_scan_file($data['scan_info']['customer_uploads_id']);
                // $data['plagiarism_sources'] = formatPhraseSimilarityResults(json_decode($data['scan_info']['plagiarism_score'], true));
            }

            // echo "<pre>";print_r($data);die;
            $view_to_pass = $this->load->view('chunks/scan_report',$data,TRUE);
            $response =  array(
              "status" => 'success', "html" => $view_to_pass, "scan_info" => $data['scan_info'], "scan_score" => $data['scan_score']
            );
            echo json_encode($response);
            exit();
        }
    }
}