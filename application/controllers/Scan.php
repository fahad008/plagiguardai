<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class scan extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('logged_in_customer')) {
            redirect(base_url().'login/');
        }
        $this->load->model('Subscription_Model', 'subscription_model');
        $this->load->model('Customer_Model', 'customer_model');
        $this->load->model('Plan_Model', 'plan_model');
        $this->load->model('Scan_Model', 'scan_model');
        $this->load->model('Upload_Model', 'upload_model');
        $this->load->model('Apikey_Model', 'apikey_model');
        $this->load->model('Settings_Model', 'settings_model');
        $this->load->library('scanner');
        $this->load->library('url_encrypt');
        $this->load->helper('scan');
	}

    public function index()
    {
        if($this->input->post()){

            $customer_id = $this->session->userdata('logged_in_customer')['id'];
            $customer_credits = $this->subscription_model->get_customer_credits($customer_id);
            if ($customer_credits < $this->input->post('estimated_credits')) {
                $credits_needed = intval($this->input->post('estimated_credits')) - $customer_credits;
                $response =  array(
                  "status" => 'error',
                  "message" => 'Not enough credits to continue. <br> You need <b>'.$credits_needed.'</b> more credits to proceed. <br>Please Contact your reseller to upgrade.',
                );
                echo json_encode($response);
                exit();
            }

            // echo "<pre>";print_r($this->input->post('title')); die;

            $text = $this->input->post('text');
            $title = $this->input->post('title');
            $estimated_credits = $this->input->post('estimated_credits');
            $word_count = $this->input->post('word_count');
            $customer_uploads_id = $this->input->post('customer_uploads_id');

            $payload = [
                "title"                   => $title,
                "check_ai"                => true,
                "check_plagiarism"        => true,
                "check_facts"             => false,
                "check_readability"       => false,
                "check_grammar"           => false,
                "check_contentOptimizer"  => false,
                "optimizerQuery"          => "Mobile Hotspot",
                "optimizerCountry"        => "United States",
                "optimizerDevice"         => "Desktop",
                "storeScan"               => false,
                "aiModelVersion"          => "lite",
                "excludedUrls" => [],
                "content" => $text,
            ];

            $maxRetries = $this->apikey_model->countActiveKeys();
            if ($maxRetries == 0) {
                $maxRetries = 1;
            }

            $result = $this->scanner->instantScan($payload, $estimated_credits, $maxRetries);

            if ($result['status'] != 'success') {

                if ($result['api_key'] != '') {
                    $scan_info = array(
                        "customer_id" => $customer_id,
                        "api_id" => $result['api_key'],
                        "customer_uploads_id" => $customer_uploads_id,
                        "title" => $title,
                        "estimated_credits" => $estimated_credits,
                        "word_count" => $word_count,
                        'status' => 'failed',
                        'error_message' => $result['error_message'],
                        'admin_error_message' => $result['admin_error_message'],
                        'created_at' => date('y-m-d H:m:s'),
                        'updated_at' => date('y-m-d H:m:s'),
                    );

                    $scan_id = $this->scan_model->save_scan($scan_info);
                }

                $response = [
                    "status"  => "error",
                    "message" => $error_message,
                    "http_code" => $result['http_code'] ?? 500
                ];
                echo json_encode($response);
                exit();
            }

            // new way to update credits
            $this->subscription_model->deduct($customer_id, $estimated_credits);

            // old way to update credits
            // $remaining_credits = $customer_credits - $this->input->post('estimated_credits');
            // $credits = array(
            //     'credits' => $remaining_credits,
            //     'updated_at' => date('y-m-d H:m:s'),
            // );
            // $this->subscription_model->update_customer_credits($customer_id, $credits);

            $properties = $result['data']['results']['properties'];
            $credits = $result['data']['results']['credits'];
            $ai = $result['data']['results']['ai'];
            $plagiarism = $result['data']['results']['plagiarism'];

            // save formated file name
            $formated_file = save_formatted_content($customer_id, $properties['privateID'], $properties['formattedContent']);

            if ($customer_uploads_id) {

                $upload_info = array(
                    'formatted_file' => $formated_file,
                    'scanned_at' => date('y-m-d H:m:s'),
                    'status' => 'scanned',
                );
                $this->upload_model->update_uploads($customer_uploads_id, $upload_info);

            }else{

                $expiry_time = get_expiry();
                $upload_info = array(
                    'customer_id' => $customer_id,
                    'file_type' => 'txt',
                    'file_name' => $formated_file,
                    'formatted_file' => $formated_file,
                    'expiry_time' => $expiry_time,
                    'scanned_at' => date('y-m-d H:m:s'),
                    'created_at' => date('y-m-d H:m:s'),
                    'status' => 'scanned',
                );
                $customer_uploads_id = $this->upload_model->save_uploads($upload_info);
            }

            $scan_expiry_days = $this->settings_model->get_scan_expiry_days();
            $expire_at = get_scan_expiry_date($scan_expiry_days);
            //save scan info
            $scan_info = array(
                "customer_id" => $customer_id,
                "private_id" => $properties['privateID'],
                "api_id" => $properties['id'],
                "customer_uploads_id" => $customer_uploads_id,
                "ai_classification" => json_encode($ai['classification'] ?? [], JSON_UNESCAPED_UNICODE),
                "ai_confidence" => json_encode($ai['confidence'] ?? [], JSON_UNESCAPED_UNICODE),
                "plagiarism_score" => json_encode($plagiarism ?? [], JSON_UNESCAPED_UNICODE),
                "title" => $properties['title'],
                "public_link" => $properties['publicLink'],
                "credits_used" => $credits['used'],
                "estimated_credits" => $this->input->post('estimated_credits'),
                "word_count" => $word_count,
                'expire_at' => $expire_at,
                'status' => 'completed',
                'created_at' => date('y-m-d H:m:s'),
                'updated_at' => date('y-m-d H:m:s'),
            );

            $scan_id = $this->scan_model->save_scan($scan_info);

            // echo "<pre>";print_r($scan_results);die;

            $response = [
                "status" => "success",
                "scan_id" => $scan_id,
                "message"   => 'Your scan is successfull.'
            ];
            echo json_encode($response);

        }else{
            $response =  array(
              "status" => 'error',
              "message" => 'Access denied!',
            );
            echo json_encode($response);
        }
    }

    public function pipeline()
    {
        $data = array();
        $data['scan_id'] = '';
        $data['scan_info'] = '';
        $data['text_area'] = '';
        $data['title'] = '';
        $data['active'] = 'bulk_uploads';
        $data['footer_links'] = get_footer_links();
        $data['customer_credits'] = 0;
        $data['customer_plan'] = '';
        $data['customer_subscription'] = '';
        $data['cron_exhausted'] = 0;
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
        $data['pending_scans'] = $this->scan_model->get_pending_scan_count($customer_id);
        $data['que_limit'] = $this->scan_model->get_que_limit($customer_id);
        if ($data['pending_scans'] >= $data['que_limit']) {
            $data['cron_exhausted'] = 1;
        }
        // echo "<pre>";print_r($data);die;
        $this->template->load('pipeline', 'pipeline', $data);
    }


	public function indexNew()
    {
        if($this->input->post()){

            $customer_id = $this->session->userdata('logged_in_customer')['id'];
            $customer_credits = $this->subscription_model->get_customer_credits($customer_id);
            if ($customer_credits < $this->input->post('estimated_credits')) {
                $credits_needed = intval($this->input->post('estimated_credits')) - $customer_credits;
                $response =  array(
                  "status" => 'error',
                  "message" => 'Not enough credits to continue. <br> You need <b>'.$credits_needed.'</b> more credits to proceed. <br>Please Contact your reseller to upgrade.',
                );
                echo json_encode($response);
                exit();
            }

            // echo "<pre>";print_r($this->input->post('title')); die;

            $text = trim($this->input->post('text'));
            $title = $this->input->post('title');
            $estimated_credits = $this->input->post('estimated_credits');
            $word_count = $this->input->post('word_count');
            $customer_uploads_id = $this->input->post('customer_uploads_id');

            $scan_info = array(
                "customer_id" => $customer_id,
                "title" => $title,
                "estimated_credits" => (int)$estimated_credits,
                "word_count" => $word_count,
            );

            $scan_id = $this->scan_model->save_scan($scan_info);

            if ($scan_id) {
                
                // save formated file name
                $formated_file = save_formatted_content($customer_id, $scan_id, $text);

                if ($customer_uploads_id) {

                    $upload_info = array(
                        'formatted_file' => $formated_file,
                        'status' => 'uploaded',
                    );
                    $this->upload_model->update_uploads($customer_uploads_id, $upload_info);

                }else{

                    $expiry_time = get_expiry();
                    $upload_info = array(
                        'customer_id' => $customer_id,
                        'file_type' => 'txt',
                        'file_name' => $formated_file,
                        'formatted_file' => $formated_file,
                        'expiry_time' => $expiry_time,
                        'created_at' => date('y-m-d H:m:s'),
                        'status' => 'uploaded',
                    );
                    $customer_uploads_id = $this->upload_model->save_uploads($upload_info);
                }

                $scan_job_updates = ["customer_uploads_id" => $customer_uploads_id];
                $this->scan_model->update_scan($scan_id, $scan_job_updates);

                $response = [
                    "status" => "success",
                    "scan_id" => $scan_id,
                    "message"   => 'Your content has been successfully queued for scanning. The system will process it shortly, and the results will be available in your dashboard once completed.'
                ];
                echo json_encode($response);

            }else{
                $response =  array(
                  "status" => 'error',
                  "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
                );
                echo json_encode($response);exit(); 
            }

        }else{
            $response =  array(
              "status" => 'error',
              "message" => 'Access denied!',
            );
            echo json_encode($response);
        }
    }

    

    public function get_classification_scan(){
        
        $scan = $this->scan_model->get_classification_scan(1);
        $ai_classification = json_decode($scan['ai_classification'], true);
        // echo "<pre>";print_r($ai_classification);echo "</pre>";
        $ai_confidence = json_decode($scan['ai_confidence'], true);
        // echo "<pre>";print_r($ai_confidence);echo "</pre>";
        $plagiarism_score = json_decode($scan['plagiarism_score'], true);
        // echo "<pre>";print_r($plagiarism_score);echo "</pre>";
        $created_at = $scan['created_at'];
        // echo "<pre>";print_r($scan); die;


        $data = array();
        $data['classification_AI'] = $ai_classification['AI'] * 100;
        $data['classification_Originality'] = $ai_classification['Original'] * 100;
        // echo "<pre>";print_r($data); die;
        $view_to_pass = $this->load->view('right_sidebar',$data,TRUE);
        $response =  array(
          "status" => 'success', "scan_score" => $view_to_pass, "scan_info" => $data
        );
        echo json_encode($response);
        exit();
    }

    public function get_scans_on_type(){

        if ($this->input->post()) {

            if ($this->input->post('scan_type') == 'classification') {

                $scan = $this->scan_model->get_classification_scan($this->input->post('scan_id'));

                $data = array();

                $ai_classification = json_decode($scan['ai_classification'], true);

                $data['heading'] = 'AI Classification Score';
                $data['ai_text'] = 'AI Probability Score';
                $data['ori_text'] = 'Originality Score';
                $data['heading'] = 'AI Classification Score';
                $data['classification_AI'] = $ai_classification['AI'] * 100;
                $data['classification_Originality'] = $ai_classification['Original'] * 100;
                $data['ai_color'] = getAIDetectionColor((int)$data['classification_AI']);
                $data['ori_color'] = getAIDetectionColor((int)$data['classification_Originality']);
                $data['ai_class'] = getAIDetectionColorClass((int)$data['classification_AI']);
                $data['ori_class'] = getAIDetectionColorClass((int)$data['classification_Originality']);

            }else if ($this->input->post('scan_type') == 'confidence') {
                
                $scan = $this->scan_model->get_confidence_scan($this->input->post('scan_id'));

                $ai_confidence = json_decode($scan['ai_confidence'], true);

                $data['heading'] = 'AI Confidence Score';
                $data['ai_text'] = 'AI Probability Score';
                $data['ori_text'] = 'Originality Score';
                $data['confidence_AI'] = $ai_confidence['AI'] * 100;
                $data['confidence_Originality'] = $ai_confidence['Original'] * 100;
                $data['ai_color'] = getAIDetectionColor((int)$data['confidence_AI']);
                $data['ori_color'] = getAIDetectionColor((int)$data['confidence_Originality']);
                $data['ai_class'] = getAIDetectionColorClass((int)$data['confidence_AI']);
                $data['ori_class'] = getAIDetectionColorClass((int)$data['confidence_Originality']);

            }else{

                $scan = $this->scan_model->get_plagiarism_scan($this->input->post('scan_id'));

                $plagiarism_score = json_decode($scan['plagiarism_score'], true);

                $data['heading'] = 'Plagiarism Assessment Score';
                $data['ai_text'] = 'Copied Content Score';
                $data['ori_text'] = 'Uniqueness Score';
                $data['plagiarism_score'] = $plagiarism_score['score'];
                $data['plagiarism_minus'] = 100 - $plagiarism_score['score'];
                $data['ai_color'] = getAIDetectionColor((int)$data['plagiarism_score']);
                $data['ori_color'] = '#d3dce3';
                $data['ai_class'] = getAIDetectionColorClass((int)$data['plagiarism_score']);
                $data['ori_class'] = '#d3dce3';
            }
            
            $data['created_at'] = $scan['created_at'];

            $view_to_pass = $this->load->view('right_sidebar',$data,TRUE);

            $response =  array(
              "status" => 'success', "scan_type" => $this->input->post('scan_type'), "right_sidebar" => $view_to_pass, "scan_info" => $data
            );
            echo json_encode($response);
            exit();
        }
        
    }

    public function get_scan_report(){

        if ($this->input->post()) {

            $scan = $this->scan_model->get_scans($this->input->post('scan_id'));
            // echo "<pre>";print_r($scan);die;
            if (isset($scan) && is_array($scan) && !empty($scan)) {

                $data = getBlackBoxData($scan);

            }else{

                $data = getDefaultBlackBoxData();

            }

            // echo "<pre>";print_r($data);die;
            $view_to_pass = $this->load->view('chunks/api_results',$data,TRUE);

            $response =  array(
              "status" => 'success', "right_sidebar" => $view_to_pass, "scan_info" => $data
            );
            echo json_encode($response);
            
        }
    }

    public function get_scan_overview($rowno=0){

        // if ($this->input->post()) {
            // echo "<pre>";print_r($this->input->post());die;

            $data = [];
            $rowperpage = 10;
            if($rowno != 0){
                $rowno = ($rowno-1) * $rowperpage;
            }

            $customer_id = $this->session->userdata('logged_in_customer')['id'];
            $allcount = $this->scan_model->get_scan_count($customer_id);

            if ($allcount >= 1) {

                $scan_data = $this->scan_model->get_limited_customer_scans($customer_id, $rowperpage, $rowno);

                foreach ($scan_data as $key => $value) {

                    $encoded_id = rawurlencode($this->url_encrypt->encode_id($value['id']));
                    $encoded_url = base_url().'dashboard?scan_id='.$encoded_id;

                    $file_info = [];
                    $data['scan_info'][$key]['id'] = $value['id'];
                    $data['scan_info'][$key]['title'] = $value['title'];
                    $data['scan_info'][$key]['created_at'] = $value['created_at'];
                    $data['scan_info'][$key]['scan_link'] = $encoded_url;
                    $data['scan_info'][$key]['status'] = $value['status'];
                    $data['scan_info'][$key]['error_message'] = $value['error_message'];
                    $data['scan_info'][$key]['overview_info'] = getScanOverviewData($value);
                    $file_info = $this->scan_model->get_scan_file($value['customer_uploads_id']);
                    // $data['scan_info'][$key]['file_info'] = get_file_data($customer_id, $file_info);
                    $data['scan_info'][$key]['file_info'] = $file_info;
                }

                // echo "<pre>";print_r($data);die;

                $this->load->library('pagination');

                $config['base_url'] = base_url().'scan/get_scan_overview';
                $config['use_page_numbers'] = TRUE;
                $config['total_rows'] = $allcount;
                $config['per_page'] = $rowperpage;

                $config['full_tag_open']  = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';

                /* Number links */
                $config['num_tag_open']   = '<li class="page-item">';
                $config['num_tag_close']  = '</li>';

                /* Current page */
                $config['cur_tag_open']   = '<li class="page-item active"><a class="page-link" href="#">';
                $config['cur_tag_close']  = '</a></li>';

                /* Links */
                $config['attributes'] = ['class' => 'page-link'];

                /* Previous */
                $config['prev_link']      = 'Previous';
                $config['prev_tag_open']  = '<li class="page-item previous">';
                $config['prev_tag_close'] = '</li>';

                /* Next */
                $config['next_link']      = 'Next';
                $config['next_tag_open']  = '<li class="page-item next">';
                $config['next_tag_close'] = '</li>';

                /* First & Last (optional) */
                $config['first_link']     = false;
                $config['last_link']      = false;


                $this->pagination->initialize($config);

                $pagination_data['pagination'] = $this->pagination->create_links();
                $pagination_data['row'] = $rowno;

            }else{

                $data = [];
                $pagination_data = [];

            }

            // echo "<pre>";print_r($data);die;
            $view_to_pass = $this->load->view('chunks/scan_overview',$data,TRUE);


            $response =  array(
              "status" => 'success', "scan_overview" => $view_to_pass, "page_links" => $pagination_data
            );
            echo json_encode($response);
            
        // }else{
        //     $response =  array(
        //       "status" => 'error', "message" => 'Access denied!'
        //     );
        //     echo json_encode($response);
        // }
    }

    public function update_title(){

        if ($this->input->post()) {
            // echo "<pre>";print_r($this->input->post());die;
            if ($this->input->post('scan_id')) {
                $row_title_id = '#table-title-'.$this->input->post('scan_id');
                $scan_info = array(
                    "title" => $this->input->post('title'),
                    "updated_at" => date('y-m-d H:m:s'),
                );
                $this->scan_model->update_scan($this->input->post('scan_id'), $scan_info);

                $response =  array(
                    "status" => 'success', "message" => 'Title has been updated successfully.', "row_title_id" => $row_title_id, "new_title" => $this->input->post('title'), "scan_id" => $this->input->post('scan_id')
                );
                echo json_encode($response);

            }else{

                $response =  array(
                  "status" => 'error', "message" => 'Sorry, looks like there are some errors detected, please try again.'
                );
                echo json_encode($response);
            }
            
        }else{

            $response =  array(
              "status" => 'error', "message" => 'Access denied!'
            );
            echo json_encode($response);

        }
    }

    public function delete(){
        if ($this->input->post()) {
            // echo "<pre>";print_r($this->input->post());die;
            if ($this->input->post('scan_id')) {

                $scan_uploads_info = $this->scan_model->get_scan_uploads($this->input->post('scan_id'));

                // echo "<pre>";print_r($scan_uploads_info);die;

                if (isset($scan_uploads_info) && !empty($scan_uploads_info)) {
                    $file_path = FCPATH . 'uploads/scans/customer_' . $scan_uploads_info['customer_id'].'/'.$scan_uploads_info['formatted_file'];
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                    $this->scan_model->delete_customer_uploads($scan_uploads_info['customer_uploads_id']);
                    $this->scan_model->delete_customer_scans($scan_uploads_info['scan_id']);

                }
                
                $response =  array(
                    "status" => 'success', "message" => 'scan deleted successfully.'
                );
                echo json_encode($response);

            }else{

                $response =  array(
                  "status" => 'error', "message" => 'Sorry, looks like there are some errors detected, please try again.'
                );
                echo json_encode($response);
            }
            
        }else{

            $response =  array(
              "status" => 'error', "message" => 'Access denied!'
            );
            echo json_encode($response);

        }
    }

    public function batch_delete(){
        if ($this->input->post()) {
            // echo "<pre>";print_r($this->input->post());die;
            if ($this->input->post('scan_ids')) {
                $scan_ids = $this->input->post('scan_ids');

                foreach ($scan_ids as $key => $scan_id) {
                    $scan_uploads_info = [];
                    $scan_uploads_info = $this->scan_model->get_scan_uploads($scan_id);

                    // echo "<pre>";print_r($scan_uploads_info);die;

                    if (isset($scan_uploads_info) && !empty($scan_uploads_info)) {
                        if ($scan_uploads_info['formatted_file'] != '') {
                            $file_path = FCPATH . 'uploads/scans/customer_' . $scan_uploads_info['customer_id'].'/'.$scan_uploads_info['formatted_file'];
                            if (file_exists($file_path)) {
                                unlink($file_path);
                            }
                        }
                        $this->scan_model->delete_customer_uploads($scan_uploads_info['customer_uploads_id']);
                        $this->scan_model->delete_customer_scans($scan_uploads_info['scan_id']);

                    }
                }
                
                
                $response =  array(
                    "status" => 'success', "message" => 'Scans deleted successfully.'
                );
                echo json_encode($response);

            }else{

                $response =  array(
                  "status" => 'error', "message" => 'Sorry, looks like there are some errors detected, please try again.'
                );
                echo json_encode($response);
            }
            
        }else{

            $response =  array(
              "status" => 'error', "message" => 'Access denied!'
            );
            echo json_encode($response);

        }
    }

    public function ajax_completed_scans()
    {
        // echo "<pre>";print_r($this->input->post());die;
        $draw = intval($this->input->post('draw'));
        $start = intval($this->input->post('start'));
        $length = intval($this->input->post('length'));
        $search = $this->input->post('search')['value'] ?? '';
        $month = $this->input->post('month') ?? '';
        $status = $this->input->post('status') ?? '';

        $list = $this->scan_model->get_completed_scan_datatable($start, $length, $search, $month, $status);
        // echo "<pre>";print_r($list);die;
        $total = $this->scan_model->count_completed_scan();
        // echo "<pre>";print_r($total);die;
        $filtered = $this->scan_model->count_completed_scan_filtered($search, $month, $status);
        // echo "<pre>";print_r($filtered);die;

        $data = [];
        foreach ($list as $scan) {
            $scan_obj = getScanOverviewObj($scan);
            // echo "<pre>";print_r($scan_obj);die;
            $scan_link = '';
            $delete_link = base_url().'scan/delete/';
            $expire_at = date('d M Y', strtotime($scan->expire_at));
            $error_message = '';
            if ($scan->status == 'completed') {
                $status = '<span class="badge badge-light-success">'.ucfirst($scan->status).'</span>';
                $scan_link = '<a href="javascript: void(0)" onclick="scan_details(this)" data-id="'.$scan->id.'" class="btn btn-icon bg-light-success btn-sm m-2">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3 svg-icon-success">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black"/>
                                <path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>';
            }else if ($scan->status == 'processing') {
                $status = '<span class="badge badge-light-warning">'.ucfirst($scan->status).'</span>';
            }else if ($scan->status == 'failed') {
                $status = '<span class="badge badge-light-danger">'.ucfirst($scan->status).'</span>';
                if ($scan->error_message) {
                    $error_message = '<span class="text-danger fw-bold d-block fs-7">'.$scan->error_message.'</span>';
                }else{
                    $error_message = '<span class="text-danger fw-bold d-block fs-7">Scan failed!</span>';
                }
                
            }else{
                $status = '<span class="badge badge-light-primary">'.ucfirst($scan->status).'</span>';
            }

            $file = '<a href="javascript: void(0)">
                        <span class="svg-icon svg-icon-danger svg-icon-3x">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M19 18C20.7 18 22 16.7 22 15C22 13.3 20.7 12 19 12C18.9 12 18.9 12 18.8 12C18.9 11.7 19 11.3 19 11C19 9.3 17.7 8 16 8C15.4 8 14.8 8.2 14.3 8.5C13.4 7 11.8 6 10 6C7.2 6 5 8.2 5 11C5 11.3 5.00001 11.7 5.10001 12H5C3.3 12 2 13.3 2 15C2 16.7 3.3 18 5 18H19Z" fill="black"/>
                            </svg>
                        </span>
                    </a>';

            if ($scan->formatted_file != '') {
                $file_path = ''; 
                $file_path = FCPATH.'uploads/scans/customer_'.$scan->customer_id.'/'.$scan->formatted_file; 

                if (file_exists($file_path)) {
                    // $file_url = base_url().'uploads/scans/customer_'.$scan->customer_id.'/'.$scan->formatted_file;
                    $file = '<a href="'.base_url().'file_manager/download/'.$scan->customer_uploads_id.'">
                                <span class="svg-icon svg-icon-success svg-icon-3x">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="black"/>
                                    <path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="black"/>
                                    <path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>';
                }
            }  

            $three_hover = substr($scan_obj->three_do_color, strrpos($scan_obj->three_do_color, '-') + 1).'-hover';

            $two_hover = substr($scan_obj->two_do_color, strrpos($scan_obj->two_do_color, '-') + 1).'-hover';

            $one_hover = substr($scan_obj->one_do_color, strrpos($scan_obj->one_do_color, '-') + 1).'-hover';



            $data[] = [

                'checkbox' => '
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" name="delete-customers" type="checkbox" value="'.$scan->id.'" />
                    </div>
                ',

                'title' => '<div id="table-title-'.$scan->id.'"><a href="javascript: void(0)" onclick="show_title_poppup(this)" data-id="'.$scan->id.'" data-title="'.$scan->title.'" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">'.$scan->title.'</a>'.$error_message.'</div>',

                'plagiarism_score' => '<a href="javascript: void(0)" class="text-dark fw-bolder '.$three_hover.' mb-1 fs-6">'.$scan_obj->three_do_text.'</a> <span class="'.$scan_obj->three_do_color.' d-block fw-bolder">'.$scan_obj->three_do_score.'%</span>',

                'ai_confidence' => '<a href="javascript: void(0)" class="text-dark fw-bolder '.$two_hover.' mb-1 fs-6">'.$scan_obj->two_do_text.'</a> <span class="'.$scan_obj->two_do_color.' d-block fw-bolder">'.$scan_obj->two_do_score.'%</span>',

                'ai_classification' => '<a href="javascript: void(0)" class="text-dark fw-bolder '.$one_hover.' mb-1 fs-6">'.$scan_obj->one_do_text.'</a> <span class="'.$scan_obj->one_do_color.' d-block fw-bolder">'.$scan_obj->one_do_score.'%</span>',

                'file' => $file,

                'expire_at' => '<span class="text-dark fw-bolder text-hover-primary fs-6">'.date('d M', strtotime($scan->expire_at)).'</span>
                        <span class="text-muted fw-bold text-muted d-block fs-7">'.date('Y', strtotime($scan->expire_at)).'</span>',

                'actions' => '<a href="javascript: void(0)" data-action="'.$delete_link.'" data-kt-customer-table-filter="delete_row" data-id="'.$scan->id.'" class="btn btn-icon bg-light-danger btn-active-color-danger btn-sm m-2">
                            <span class="svg-icon svg-icon-3 svg-icon-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                </svg>
                            </span>
                        </a>'.$scan_link
                ];
            }


            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                 'draw' => $draw,
                 'recordsTotal' => $total,
                 'recordsFiltered' => $filtered,
                 'data' => $data
            ], JSON_UNESCAPED_UNICODE));

        return;

    }

    public function ajax_bulk_scans()
    {
        // echo "<pre>";print_r($this->input->post());die;
        $draw = intval($this->input->post('draw'));
        $start = intval($this->input->post('start'));
        $length = intval($this->input->post('length'));
        $search = $this->input->post('search')['value'] ?? '';
        $month = $this->input->post('month') ?? '';
        $status = $this->input->post('status') ?? '';

        $list = $this->scan_model->get_bulk_scan_datatable($start, $length, $search, $month, $status);
        // echo "<pre>";print_r($list);die;
        $total = $this->scan_model->count_bulk_scan_all();
        // echo "<pre>";print_r($total);die;
        $filtered = $this->scan_model->count_bulk_scan_filtered($search, $month, $status);
        // echo "<pre>";print_r($filtered);die;

        $data = [];
        foreach ($list as $scan) {

            $delete_link = base_url().'scan/delete/';
            $scan_link = '';
            if ($scan->status == 'completed') {
                $scan_link = '<a href="javascript: void(0)" onclick="scan_details(this)" data-id="'.$scan->id.'" class="btn btn-icon bg-light-success btn-sm m-2">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3 svg-icon-success">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black"/>
                                <path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>';
                $lite_status = '<span class="badge badge-light-success">'.ucfirst($scan->status).'</span>';
            }else if($scan->status == 'failed'){
                $lite_status = '<span class="badge badge-light-danger">'.ucfirst($scan->status).'</span>';
            }else if($scan->status == 'processing'){
                $lite_status = '<span class="badge badge-light-warning">'.ucfirst($scan->status).'</span>';
            }else{
                $lite_status = '<span class="badge badge-light-info">'.ucfirst($scan->status).'</span>';
            }
           

            $file = '<a href="javascript: void(0)">
                        <span class="svg-icon svg-icon-danger svg-icon-4x">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M19 18C20.7 18 22 16.7 22 15C22 13.3 20.7 12 19 12C18.9 12 18.9 12 18.8 12C18.9 11.7 19 11.3 19 11C19 9.3 17.7 8 16 8C15.4 8 14.8 8.2 14.3 8.5C13.4 7 11.8 6 10 6C7.2 6 5 8.2 5 11C5 11.3 5.00001 11.7 5.10001 12H5C3.3 12 2 13.3 2 15C2 16.7 3.3 18 5 18H19Z" fill="black"/>
                            </svg>
                        </span>
                    </a>';

            if ($scan->formatted_file != '') {
                $file_path = ''; 
                $file_path = FCPATH.'uploads/scans/customer_'.$scan->customer_id.'/'.$scan->formatted_file; 

                if (file_exists($file_path)) {
                    // $file_url = base_url().'uploads/scans/customer_'.$scan->customer_id.'/'.$scan->formatted_file;
                    $file = '<a href="'.base_url().'file_manager/download/'.$scan->customer_uploads_id.'">
                                <span class="svg-icon svg-icon-success svg-icon-3x">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="black"/>
                                    <path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="black"/>
                                    <path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>';
                }
            }  



            $data[] = [

                'checkbox' => '
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" name="delete-customers" type="checkbox" value="'.$scan->id.'" />
                    </div>
                ',

                'title' => '<div id="table-title-'.$scan->id.'"><a href="javascript: void(0)" onclick="show_title_poppup(this)" data-id="'.$scan->id.'" data-title="'.$scan->title.'" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">'.$scan->title.'</a></div>',

                'estimated_credits' => '<span class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">'.$scan->estimated_credits.'</span>',

                'word_count' => '<span class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">'.$scan->word_count.'</span>',

                'status' => $lite_status,

                'file' => $file,

                'actions' => '<a href="javascript: void(0)" data-action="'.$delete_link.'" data-kt-customer-table-filter="delete_row" data-id="'.$scan->id.'" class="btn btn-icon bg-light-danger btn-active-color-danger btn-sm m-2">
                            <span class="svg-icon svg-icon-3 svg-icon-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                </svg>
                            </span>
                        </a>'.$scan_link
                ];
            }


            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                 'draw' => $draw,
                 'recordsTotal' => $total,
                 'recordsFiltered' => $filtered,
                 'data' => $data
            ], JSON_UNESCAPED_UNICODE));

        return;

    }

    public function detail(){
        if($this->input->post()){
            // echo "<pre>";print_r($this->input->post());die;

            $data = [];
            $scan_id = $this->input->post('scan_id');
            $data['scan_score'] = '';
            $data['scan_file'] = '';
            $data['scan_info'] = $this->scan_model->get_scans($scan_id);
            if (isset($data['scan_info']) && !empty($data['scan_info'])) {
                $data['scan_score'] = $scan_obj = getScanOverviewData($data['scan_info']);
                $data['scan_file'] = $this->scan_model->get_scan_file($data['scan_info']['customer_uploads_id']);
            }
            // echo "<pre>";print_r($data);die;
            $view_to_pass = $this->load->view('chunks/scan_report',$data,TRUE);
            $response =  array(
              "status" => 'success', "html" => $view_to_pass
            );
            echo json_encode($response);
            exit();
        }
    }
}