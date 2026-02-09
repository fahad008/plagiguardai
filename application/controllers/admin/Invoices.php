<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends Admin_Controller 
{
	function __construct() 
	{
	 	parent::__construct();

	 	$this->require_role(['super_admin', 'admin', 'reseller']);
	 	
        $this->load->model('Invoices_Model', 'invoices_model');
        $this->load->model('Customer_Model', 'customer_model');
        $this->load->model('Admin_Model', 'admin_model');
        $this->load->model('Subscription_Model', 'subscription_model');
        $this->load->model('Plan_Model', 'plan_model');
        $this->load->library('url_encrypt');
    } 

	public function index()
	{
		redirect(base_url().'admin/customers/');
	}

	public function view($encoded_id='')
	{
		$data = array();
		$data['active'] = 'invoice';
		$data['scripts'] = [];
		$admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
        $data['admin_info']['avatar'] = 'assets/media/avatars/blank.png';
        if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }
        $invoice_id = $this->url_encrypt->decode_id(rawurldecode($encoded_id));
		$data['invoice_info'] = $this->invoices_model->get_invoice($invoice_id);
		
		if (isset($data['invoice_info']) && is_array($data['invoice_info']) && !empty($data['invoice_info'])) {

			$data['invoice_info']['per_credit'] = getPerCreditPrice(intval($data['invoice_info']['total']), intval($data['invoice_info']['credits']));

			$data['customer_info'] = $this->customer_model->get_customer($data['invoice_info']['customer_id']);

			$data['customer_subscription'] = $this->subscription_model->get_subscription_info($data['invoice_info']['subscription_id']);
	       	$data['customer_plan'] = $this->plan_model->get_plan($data['invoice_info']['plan_id']);
        	$data['reseller_info'] = $this->customer_model->get_reseller_by_customer_id($data['invoice_info']['customer_id']);

	        // echo "<pre>";print_r($data);die;

			$this->template->admin_load('frame', 'content/invoice', $data);

		}else{
			redirect(base_url().'admin/customers/');
		}
		
	}

	public function ajax_invoices()
	{
		if (!has_access(['super_admin', 'reseller'])) {
			$this->output
		    ->set_content_type('application/json')
	     	->set_output(json_encode([
		         'draw' => 1,
		         'recordsTotal' => 0,
		         'recordsFiltered' => 0,
		         'data' => []
	     	], JSON_UNESCAPED_UNICODE));

			return;
		}
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

	    	$invoice_encoded_id = rawurlencode($this->url_encrypt->encode_id($invoice->id));
	    	$invoice_url = base_url().'admin/invoices/view/'.$invoice_encoded_id;
		    	
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

	public function ajax_reseller_invoices()
	{
		if (!has_access(['super_admin'])) {
			$this->output
		    ->set_content_type('application/json')
	     	->set_output(json_encode([
		         'draw' => 1,
		         'recordsTotal' => 0,
		         'recordsFiltered' => 0,
		         'data' => []
	     	], JSON_UNESCAPED_UNICODE));

			return;
		}
		// echo "<pre>";print_r($this->input->post());die;
	    $draw = intval($this->input->post('draw'));
	    $start = intval($this->input->post('start'));
	    $length = intval($this->input->post('length'));
	    $reseller_id = intval($this->input->post('reseller_id'));

	    $list = $this->invoices_model->get_reseller_invoices_datatable($reseller_id, $start, $length);
     	// echo "<pre>";print_r($list);die;
	    $total = $this->invoices_model->count_all_reseller_invoices($reseller_id);
	    // echo "<pre>";print_r($total);die;
	    $data = [];
	    foreach ($list as $invoice) {
	    	$encoded_id = rawurlencode($this->url_encrypt->encode_id($invoice->id));
	    	$customer_encoded_id = rawurlencode($this->url_encrypt->encode_id($invoice->customer_id));
	    	$invoice_url = base_url().'admin/invoices/view/'.$encoded_id;
		    	
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

		        'full_name' => '<a href="'.base_url().'admin/customers/view/'.$customer_encoded_id.'" class="text-gray-800 text-hover-primary mb-1">'.$invoice->full_name.'</a>',

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

	public function download_invoice($invoice_id)
	{
	    $this->load->library('pdf');

	    $admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
        $data['admin_info']['avatar'] = 'assets/media/avatars/blank.png';
        if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }

		$data['invoice_info'] = $this->invoices_model->get_invoice($invoice_id);
		
		if (isset($data['invoice_info']) && is_array($data['invoice_info']) && !empty($data['invoice_info'])) {

			$data['invoice_info']['per_credit'] = getPerCreditPrice(intval($data['invoice_info']['total']), intval($data['invoice_info']['credits']));
			$data['customer_subscription'] = '';
			$data['customer_plan'] = '';
			$data['reseller_info'] = '';

			$data['customer_info'] = $this->customer_model->get_customer($data['invoice_info']['customer_id']);

			if($data['customer_info']['plan_type'] != 'Guest'){
		        $data['customer_subscription'] = $this->subscription_model->get_customer_subscription($data['invoice_info']['customer_id']);
		        if (isset($data['customer_subscription']) && !empty($data['customer_subscription'])) {
		        	$data['customer_plan'] = $this->plan_model->get_plan($data['customer_subscription']['plan_id']);
		        }
	        	$data['reseller_info'] = $this->customer_model->get_reseller_by_customer_id($data['invoice_info']['customer_id']);
		        
	        }

		}

	    // Load your invoice HTML view as string
	    $html = $this->load->view('admin/chunks/invoice_pdf', $data, true);

	    $this->pdf->create($html, 'Invoice-'.$invoice_id);
	}

}