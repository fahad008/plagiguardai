<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scans extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->input->is_cli_request()) {
            show_error('Access denied');
        }

        $this->load->model('Scan_Model', 'scan_model');
        $this->load->helper('logs');
    }

    public function expire()
    {
        $scans = $this->scan_model->get_scans_to_expire();
        // echo "<pre>";print_r($scans);die;
        if (isset($scans) && is_array($scans) && !empty($scans)) {
            foreach ($scans as $key => $scan) {

                $ok = $this->scan_model->set_status($scan['id'], '0');
                if ($ok) {
                    if ($scan['formatted_file'] != '') {
                        $path = FCPATH . 'uploads/scans/customer_'.$scan['customer_id'].'/'.$scan['formatted_file'];
                        if (file_exists($path)) {
                            unlink($path);
                        }
                    }
                    
                }
                log_cron('info', "Expired ScanID:".$scan['id']." of CustomerUploadsID: ".$scan['customer_uploads_id']);
            }
        }else{
            log_cron('info', "No scans found to expire today!");
        }
    }
}
