<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScanWorker extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->input->is_cli_request()) {
            show_error('Access denied');
        }
        $this->load->model('Scan_Model', 'scan_model');
        $this->load->model('Apikey_Model', 'apikey_model');
        $this->load->model('Upload_Model', 'upload_model');
        $this->load->model('Subscription_Model', 'subscription_model');
        $this->load->model('Settings_Model', 'settings_model');
        $this->load->library('Scanner');
        $this->load->helper('scan');
        $this->load->helper('logs');
    }

    public function index()
    {
        $jobs = $this->scan_model->get_pending_jobs(5);
        if (empty($jobs)) {
            log_cron('info', "No scans found to procedd with!");
            die;
        }
        // echo "<pre>";print_r($jobs);die;
        foreach ($jobs as $job) {

            $this->scan_model->set_status($job->id, 'processing');

            try {
                $maxRetries = $this->apikey_model->countActiveKeys();
                if ($maxRetries == 0) {
                    $maxRetries = 1;
                }
                $file_name = $this->upload_model->get_formatted_file($job->customer_uploads_id);
                $scan_text = get_scan_text($job->customer_id, $file_name);
                if (!$scan_text) {
                    $error_message = 'Scan failed! No text found to scan against <b>'.$job->title.'</b>';
                    $admin_error_message = 'No text found to scan against scan id: <b>'.$job->id.'</b>';
                    $this->scan_model->update_scan($job->id, [
                        'status' => 'failed',
                        'error_message' => $error_message,
                        'admin_error_message' => $admin_error_message,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                    continue;
                }

                $payload = [
                    "title" => $job->title,
                    "check_ai" => true,
                    "check_plagiarism" => true,
                    "check_facts" => false,
                    "check_readability" => false,
                    "check_grammar" => false,
                    "check_contentOptimizer" => false,
                    "optimizerQuery" => "Mobile Hotspot",
                    "optimizerCountry" => "United States",
                    "optimizerDevice" => "Desktop",
                    "storeScan" => false,
                    "aiModelVersion" => "lite",
                    "excludedUrls" => [],
                    "content" => $scan_text
                ];

                // echo "<pre>";print_r($payload);die;

                $result = $this->scanner->scanContent($payload, $job->estimated_credits, $maxRetries);
                // echo "<pre>";print_r($result);die;
                if ($result['status'] != 'success') {
                    $error_message = 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!';
                    $admin_error_message = 'cURL Error: ' .  $result['message'];
                    $this->scan_model->update_scan($job->id, [
                        'status' => 'failed',
                        "api_id" => $result['api_key'],
                        'error_message' => $error_message,
                        'admin_error_message' => $admin_error_message,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }

                // deduct credits
                // $customer_credits = $this->subscription_model->get_customer_credits($job->customer_id);
                // (int)$remaining_credits = (int)$customer_credits - (int)$job->estimated_credits;
                // $credits = array(
                //     'credits' => $remaining_credits,
                //     'updated_at' => date('y-m-d H:m:s'),
                // );

                // deduct new
                $this->subscription_model->deduct($job->customer_id, $job->estimated_credits);

                $properties = [];
                $credits = [];
                $ai = [];
                $plagiarism = [];
                $properties = $result['data']['results']['properties'];
                $credits = $result['data']['results']['credits'];
                $ai = $result['data']['results']['ai'];
                $plagiarism = $result['data']['results']['plagiarism'];

                $scan_expiry_days = $this->settings_model->get_scan_expiry_days();
                $expire_at = get_scan_expiry_date($scan_expiry_days);
                //save scan info
                $scan_info = [
                    "private_id" => $properties['privateID'],
                    "api_id" => $result['api_key'],
                    "ai_classification" => json_encode($ai['classification'] ?? [], JSON_UNESCAPED_UNICODE),
                    "ai_confidence" => json_encode($ai['confidence'] ?? [], JSON_UNESCAPED_UNICODE),
                    "plagiarism_score" => json_encode($plagiarism ?? [], JSON_UNESCAPED_UNICODE),
                    "title" => $properties['title'],
                    "public_link" => $properties['publicLink'],
                    "credits_used" => $credits['used'],
                    "status" => 'completed',
                    'expire_at' => $expire_at,
                    'updated_at' => date('y-m-d H:m:s')
                ];
                
                $this->scan_model->update_scan($job->id, $scan_info);

                log_cron('info', "Scan completed for scan id: ".$job->id);

            } catch (Exception $e) {
                if ($e->getMessage() == 'api_key') {
                    $error_message = 'Currently, PlagiGuardAI has reached its usage limit. We&#39;re actively resolving this.</br>Please try again in a few minutes or contact support for assistance.';
                    $admin_error_message = 'No active API keys available';
                }else if($e->getMessage() == 'all_api_keys'){
                    $error_message = 'Currently, PlagiGuardAI has reached its usage limit. We&#39;re actively resolving this.</br>Please try again in a few minutes or contact support for assistance.';
                    $admin_error_message = 'All API keys exhausted. Please try later.';
                }else{
                    $error_message = $e->getMessage();
                    $admin_error_message = $e->getMessage();   
                }
                // echo "<pre>";print_r($admin_error_message);die;
                $this->scan_model->update_scan($job->id, [
                    'status' => 'failed',
                    'error_message' => $error_message,
                    'admin_error_message' => $admin_error_message,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                log_cron('info', 'Scan id: '.$job->id.' '.$admin_error_message);
            }
        }
    }
}