<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class scan extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('logged_in_customer')) {
            $response =  array(
              "status" => 'error',
              "message" => 'Your session has expired due to inactivity. Please sign in again to proceed.',
              "redirect" => base_url().'login/',
            );
            echo json_encode($response);
        }
        $this->load->model('Subscription_Model', 'subscription_model');
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

            // upadte credits
            $remaining_credits = $customer_credits - $this->input->post('estimated_credits');
            $credits = array(
                'credits' => $remaining_credits,
                'updated_at' => date('y-m-d H:m:s'),
            );
            $this->subscription_model->update_customer_credits($customer_id, $credits);

            // $scan_results = $result['data']['results'];
            $properties = $result['data']['results']['properties'];
            $credits = $result['data']['results']['credits'];
            $ai = $result['data']['results']['ai'];
            $plagiarism = $result['data']['results']['plagiarism'];
            // echo "<pre>";print_r($scan_results);echo "</pre>";

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

    public function delete_scan(){
        if ($this->input->post()) {
            echo "<pre>";print_r($this->input->post());die;
            if ($this->input->post('scan_id')) {
                $row_title_id = '#table-title-'.$this->input->post('scan_id');
                $scan_info = array(
                    "title" => $this->input->post('title'),
                    "updated_at" => date('y-m-d H:m:s'),
                );
                $this->scan_model->update_scan($this->input->post('scan_id'), $scan_info);

                $response =  array(
                    "status" => 'success', "message" => 'Title has been updated successfully.', "row_title_id" => $row_title_id, "new_title" => $this->input->post('title')
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
}