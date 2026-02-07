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
            $scan_link = '';
            $delete_link = base_url().'scan/delete/';
            $error_message = '';
            if ($scan->status == 'completed') {
                $status = '<span class="badge badge-light-success">'.ucfirst($scan->status).'</span>';
                $encoded_scan_url = base_url().'dashboard?scan_id='.rawurlencode($this->url_encrypt->encode_id($scan->id));
                $scan_link = '<a href="'.$encoded_scan_url.'" class="btn btn-icon bg-light-success btn-sm m-2">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3 svg-icon-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
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
                                <span class="svg-icon svg-icon-success svg-icon-4x">
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

                'title' => '<div id="table-title-'.$scan->id.'"><a href="javascript: void(0)" onclick="show_title_poppup(this)" data-id="'.$scan->id.'" data-title="'.$scan->title.'" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">'.$scan->title.'</a>'.$error_message.'</div>',

                'estimated_credits' => '<span class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">'.$scan->estimated_credits.'</span>',

                'word_count' => '<span class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">'.$scan->word_count.'</span>',

                'status' => $status,

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
}