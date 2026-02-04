<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscription extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in_customer')) {
            redirect(base_url().'login/');
        }

        $this->load->model('Customer_Model', 'customer_model');
        $this->load->model('Subscription_Model', 'subscription_model');
        $this->load->model('Scan_Model', 'scan_model');
        $this->load->model('Plan_Model', 'plan_model');
        $this->load->model('Authentication_Model', 'authentication_model');
        $this->load->model('Invoices_Model', 'invoices_model');
        $this->load->helper('country');
        $this->load->library('url_encrypt');
	}


	public function index()
    {
        $customer_id  = $this->session->userdata('logged_in_customer')['id'];
        $data = [];
        $data['active'] = 'subscription_detail';
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
                $data['customer_credits'] = $this->subscription_model->get_customer_credits($data['customer_info']['id']);
            }
            
        }
        // echo "<pre>";print_r($data);die;
        $this->template->load('subscription/detail', 'subscription/detail', $data);
    }

    public function invoices()
    {
        $customer_id  = $this->session->userdata('logged_in_customer')['id'];
        $data = [];
        $data['active'] = 'my_invoices';
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
                $data['customer_credits'] = $this->subscription_model->get_customer_credits($data['customer_info']['id']);
            }
            
        }
        // echo "<pre>";print_r($data);die;
        $this->template->load('subscription/invoices', 'subscription/invoices', $data);
    }

    public function ajax_invoices()
	{
		// echo "<pre>";print_r($this->input->post());die;
	    $draw = intval($this->input->post('draw'));
	    $start = intval($this->input->post('start'));
	    $length = intval($this->input->post('length'));
	    $customer_id = intval($this->input->post('customer_id'));

	    $list = $this->invoices_model->get_invoices_datatable($customer_id, $start, $length);
     	// echo "<pre>";print_r($list);die;
	    $total = $this->invoices_model->count_all_invoices($customer_id);
	    // echo "<pre>";print_r($total);die;
	    $data = [];
	    foreach ($list as $invoice) {


	    	$encoded_id = rawurlencode($this->url_encrypt->encode_id($invoice->id));
	    	$invoice_url = base_url().'subscription/invoice?invoice_id='.$encoded_id;
		    	
	    	if ($invoice->status == 'paid') {
	    		$status = '<span class="badge badge-light-success">'.$invoice->status.'</span>';
	    	}else if ($invoice->status == 'pending') {
	    		$status = '<span class="badge badge-light-warning">'.$invoice->status.'</span>';
	    	}else{
	    		$status = '<span class="badge badge-light-danger">'.$invoice->status.'</span>';
	    	}

		    $data[] = [

		        'invoice_number' => '
		        	<a target="_blank" href="'.$invoice_url.'" class="text-gray-600 text-hover-primary">'.$invoice->invoice_number.'</a>
		        ',

		        'credits' => intval($invoice->credits),

		        'total' => intval($invoice->total).' PKR',

		        'status' => $status,

		        'created_at' => date('d M Y', strtotime($invoice->created_at)),

		        'actions' => '<a target="_blank" href="'.$invoice_url.'" class="btn btn-sm btn-light btn-active-light-primary">View</a>'
		    ];
		}

		$this->output
	    ->set_content_type('application/json')
     	->set_output(json_encode([
	         'draw' => $draw,
	         'recordsTotal' => $total,
	         'recordsFiltered' => $total,
	         'data' => $data
     	], JSON_UNESCAPED_UNICODE));

		return;
	}

	public function invoice(){
		if (isset($_GET['invoice_id']) && !empty($_GET['invoice_id'])) {
			$customer_id  = $this->session->userdata('logged_in_customer')['id'];
	        $data = [];
	        $data['active'] = 'my_invoices';
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
	                $data['customer_credits'] = $this->subscription_model->get_customer_credits($customer_id);
	            }
	            $data['reseller_info'] = $this->customer_model->get_reseller_by_customer_id($customer_id);
	            
	        }

            $encoded_id = $_GET['invoice_id'];
            $data['invoice_id'] = $this->url_encrypt->decode_id(rawurldecode($encoded_id));

            $data['invoice_info'] = $this->invoices_model->get_invoice($data['invoice_id']);
            if (isset($data['invoice_info']) && is_array($data['invoice_info']) && !empty($data['invoice_info'])) {

				$data['invoice_info']['per_credit'] = getPerCreditPrice(intval($data['invoice_info']['total']), intval($data['invoice_info']['credits']));
	            // echo "<pre>";print_r($data);die;
				$this->template->load('subscription/invoice', 'subscription/invoice', $data);

			}else{
				redirect(base_url().'dashboard/');
			}

            
        }else{
        	redirect(base_url().'dashboard/');
        }
	}

}