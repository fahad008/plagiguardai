<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends Admin_Controller 
{
	function __construct() 
	{
	 	parent::__construct();
	 	
	 	$this->require_role(['super_admin', 'admin', 'reseller']);

        $this->load->model('Admin_Model', 'admin_model');
		$this->load->model('Customer_Model', 'customer_model');
		$this->load->model('Subscription_Model', 'subscription_model');
		$this->load->model('Plan_Model', 'plan_model');
		$this->load->model('Scan_Model', 'scan_model');
		$this->load->helper('country');
		$this->load->library('url_encrypt');
    } 

	public function index()
	{
		$data = array();
		$data['active'] = 'customerList';
		$data['scripts'] = array(
			"0" => 'assets/plugins/custom/datatables/datatables.bundle.js',
			"1" => 'assets/js/custom/apps/customers/list/list.js',
			"2" => 'assets/js/custom/apps/customers/add.js',
			"3" => 'assets/js/custom/modals/offer-a-deal/bundle/main.js',
			"4" => 'assets/js/custom/modals/offer-a-deal/bundle/type.js',
			"5" => 'assets/js/custom/modals/offer-a-deal/bundle/details.js',
			"6" => 'assets/js/custom/apps/subscriptions/add/customer-select.js',
		);

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
        $data['admin_info']['country'] = getCountryByCode('PK');

		$data['total_customers'] = $this->customer_model->count_all();
		$data['plans_info'] = $this->plan_model->get_plans();
		// echo "<pre>";print_r($data);die;
		$this->template->admin_load('frame', 'content/customers', $data);
	}

	public function ajax_customers()
	{
	    $draw = intval($this->input->post('draw'));
	    $start = intval($this->input->post('start'));
	    $length = intval($this->input->post('length'));
	    $search = $this->input->post('search')['value'] ?? '';
	    $month = $this->input->post('month') ?? '';
	    $plan_id = $this->input->post('plan_id') ?? '';

	    $list = $this->customer_model->get_customers_datatable($start, $length, $search, $month, $plan_id);
     	// echo "<pre>";print_r($list);die;
	    $total = $this->customer_model->count_all();
	    // echo "<pre>";print_r($total);die;
	    $filtered = $this->customer_model->count_filtered($search, $month, $plan_id);
	    // echo "<pre>";print_r($filtered);die;

	    $data = [];
	    foreach ($list as $customer) {

	    	$customer_credits = 0;
	    	$plan_title = 'Guest';
	    	$plan_color = 'Guest';
	    	$plan = '';
			$sub_state = $this->subscription_model->get_subscription_status($customer->id);

			if ($sub_state == 'active') {

				$plan_info = $this->db->get_where('plans', ['id' => $customer->plan_id])->row();
				$plan_title = $plan_info->title;
				$plan_color = $plan_info->color;

				$plan = '<div class="d-flex align-items-center">
	    					<div id="bage-'.$customer->id.'" class="text-center me-3"><span class="badge badge-light-'.$plan_color.' p-3">'.$plan_title.'</span></div>
							<div class="symbol symbol-45px">
								<a href="javascript: void(0)" onclick="fetch_reseller(this)" data-id="'.$customer->id.'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
									<span class="svg-icon svg-icon-3">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black"/>
										<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black"/>
										</svg>
									</span>
								</a>
							</div>
						</div>';

			}else if($sub_state == 'inactive'){

				if (has_access(['super_admin'])) {
		    		$plan = '<div id="bage-'.$customer->id.'" class="d-flex align-items-center"><a href="javascript: void(0)"  onclick="activate_subscription(this)" class="btn btn-primary er fs-7 px-3 py-2" data-customerId="'.$customer->id.'" data-customerName="'.$customer->full_name.'">Activate Now</a></div>';
		    	}else{
		    		$plan = '<div id="bage-'.$customer->id.'" class="d-flex align-items-center"><a href="javascript: void(0)" data-bs-toggle="modal" data-bs-target="#kt_modal_access_denied" class="btn btn-primary er fs-7 px-3 py-2">Activate Now</a></div>';
		    	}

			}else{

				if (has_access(['super_admin'])) {
		    		$plan = '<div id="bage-'.$customer->id.'" class="d-flex align-items-center"><a href="#" class="btn btn-primary er fs-7 px-3 py-2" data-bs-toggle="modal" data-bs-customerId="'.$customer->id.'" data-bs-customerName="'.$customer->full_name.'" data-bs-target="#kt_modal_offer_a_deal">Create Subscription</a></div>';
		    	}else{
		    		$plan = '<div id="bage-'.$customer->id.'" class="d-flex align-items-center"><a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_access_denied" class="btn btn-primary er fs-7 px-3 py-2">Create Subscription</a></div>';
		    	}

			}
			


	    	$customer_encoded_id = rawurlencode($this->url_encrypt->encode_id($customer->id));
	    	$delete_action = base_url().'admin/customers/delete';
	    	if ($customer->creator_id) {
	    		$creator_info = $this->admin_model->get_admin($customer->creator_id);
	    		$creator_role_info = $this->admin_model->get_role_info($creator_info['role_id']);
	    		if (has_access(['super_admin', 'admin'])) {
	    			$created_by = '<div class="d-flex align-items-center">
						<div class="d-flex justify-content-start flex-column">
						<a href="javascript: void(0)" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">'.$creator_info['full_name'].'</a>
						<a href="javascript: void(0)" class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
						'.$creator_info['email'].'</a>
						<a href="javascript:void(0)" class="badge badge-light fw-bolder fw-bold text-muted d-block fs-7 mt-2">
						'.$creator_role_info['text'].'</a>
						</div>
					</div>';
	    		}else{
	    			$created_by = '<div class="d-flex align-items-center">
						<div class="d-flex justify-content-start flex-column">
						<a href="javascript:void(0)" class="badge badge-light fw-bolder fw-bold text-muted d-block fs-7 mt-2">
						'.$creator_role_info['text'].'</a>
						</div>
					</div>';
	    		}
	    		
	    	}else{
	    		$created_by = '<div class="badge badge-light fw-bolder">Direct</div>';
	    	}
	    	
	    	if (has_access(['super_admin', 'reseller'])) {
	    		$pass_string = $customer->pass_string;
	    	}else{
	    		$pass_string = '********';
	    	}
	    	if (has_access(['super_admin'])) {
	    		$delete_btn = '<div class="menu-item px-3">
		                    <a href="javascript: void(0)"
		                       class="menu-link px-3"
		                       data-id="'.$customer->id.'"
		                       data-action="'.$delete_action.'"
		                       data-kt-customer-table-filter="delete_row">
		                       Delete
		                    </a>
		                </div>';
	    	}else{
	    		$delete_btn = '<div class="menu-item px-3">
		                    <a href="javascript: void(0)"
		                       class="menu-link px-3"
		                       data-bs-toggle="modal" data-bs-target="#kt_modal_access_denied">
		                       Delete
		                    </a>
		                </div>';
	    	}


	    	if ($customer->contact_number) {
	    		$phone = $customer->contact_number;
	    	}else{
	    		$phone = '—';
	    	}
	    	if ($pass_string) {
	    		$password = '<div class="d-flex align-items-center">
			    					<a href="javascript: void(0)" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6 me-3">'.trim($pass_string).'</a>
									<div class="symbol symbol-45px">
										<a href="javascript: void(0)" onclick="copy_pass(this)" data-password="'.trim($pass_string).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
											<span class="svg-icon svg-icon-3">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.5" d="M18 2H9C7.34315 2 6 3.34315 6 5H8C8 4.44772 8.44772 4 9 4H18C18.5523 4 19 4.44772 19 5V16C19 16.5523 18.5523 17 18 17V19C19.6569 19 21 17.6569 21 16V5C21 3.34315 19.6569 2 18 2Z" fill="black"/>
												<path fill-rule="evenodd" clip-rule="evenodd" d="M14.7857 7.125H6.21429C5.62255 7.125 5.14286 7.6007 5.14286 8.1875V18.8125C5.14286 19.3993 5.62255 19.875 6.21429 19.875H14.7857C15.3774 19.875 15.8571 19.3993 15.8571 18.8125V8.1875C15.8571 7.6007 15.3774 7.125 14.7857 7.125ZM6.21429 5C4.43908 5 3 6.42709 3 8.1875V18.8125C3 20.5729 4.43909 22 6.21429 22H14.7857C16.5609 22 18 20.5729 18 18.8125V8.1875C18 6.42709 16.5609 5 14.7857 5H6.21429Z" fill="black"/>
												</svg>
											</span>
										</a>
									</div>
								</div>';
	    	}else{
	    		$password = '-';
	    	}
		    $data[] = [

		        'checkbox' => '
					<div class="form-check form-check-sm form-check-custom form-check-solid">
						<input class="form-check-input" name="delete-customers" type="checkbox" value="'.$customer->id.'" />
					</div>
		        ',

		        'member' => '
		        	<div class="d-flex align-items-center">
						<div class="d-flex justify-content-start flex-column">
						<a href="'.base_url('admin/customers/view/'.$customer_encoded_id).'" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">'.$customer->full_name.'</a>
						<a href="'.base_url('admin/customers/view/'.$customer_encoded_id).'" class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
						'.$customer->email.'</a>
						<a href="javascript:void(0)" class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
						'.$phone.'</a>
						</div>
					</div>
		        ',

		        'plan_id' =>  $plan,

		        'pass_string' => $password,

		        'created_by' => $created_by,

		        'created_at' => date('d M Y', strtotime($customer->created_at)),

		        'actions' => '
		        <div class="d-flex justify-content-center align-items-center">
		            <a href="javascript: void(0)" class="btn btn-sm btn-light btn-active-light-primary"
		               data-kt-menu-trigger="click"
		               data-kt-menu-placement="bottom-end">
		                Actions
		                <span class="svg-icon svg-icon-5 m-0">
		                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
		                         viewBox="0 0 24 24" fill="none">
		                        <path d="M11.4343 12.7344L7.25 8.55005
		                                 C6.83579 8.13583 6.16421 8.13584
		                                 5.75 8.55005C5.33579 8.96426
		                                 5.33579 9.63583 5.75 10.05
		                                 L11.2929 15.5929C11.6834
		                                 15.9835 12.3166 15.9835
		                                 12.7071 15.5929L18.25 10.05
		                                 C18.6642 9.63584 18.6642
		                                 8.96426 18.25 8.55005
		                                 C17.8358 8.13584 17.1642
		                                 8.13584 16.75 8.55005
		                                 L12.5657 12.7344
		                                 C12.2533 13.0468
		                                 11.7467 13.0468
		                                 11.4343 12.7344Z"
		                              fill="black" />
		                    </svg>
		                </span>
		            </a>

		            <div class="menu menu-sub menu-sub-dropdown menu-column
		                        menu-rounded menu-gray-600
		                        menu-state-bg-light-primary fw-bold fs-7
		                        w-125px py-4"
		                 data-kt-menu="true">

		                <div class="menu-item px-3">
		                    <a href="'.base_url('admin/customers/view/'.$customer_encoded_id).'"
		                       class="menu-link px-3">View</a>
		                </div>

		                '.$delete_btn.'
		            </div>
	            </div>
		        '
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

	public function add()
	{
		$this->require_role(['super_admin', 'reseller']);
		$data = array();
		$data['active'] = 'AddCustomer';
		$data['scripts'] = array(
			"0" => 'assets/js/custom/apps/customers/add.js',
		);
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
        $data['admin_info']['country'] = getCountryByCode('PK');
		$this->template->admin_load('frame', 'content/add_customer', $data);
	}


	public function view($encoded_id='')
	{
		// echo $customer_id;die;
		$data = array();
		$data['active'] = 'view';
		$data['scripts'] = array(
			"0" => 'assets/plugins/custom/datatables/datatables.bundle.js',
			"1" => 'assets/js/custom/apps/customers/list/invoices.js',
			"2" => 'assets/js/custom/apps/customers/view/payment-table.js',
			"3" => 'assets/js/custom/apps/customers/update.js',
			"4" => 'assets/js/custom/admin/topup.js',
			"5" => 'assets/js/custom/widgets.js',
		);
		
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
        $data['admin_info']['country'] = getCountryByCode('PK');
        $customer_id = $this->url_encrypt->decode_id(rawurldecode($encoded_id));
		$data['customer_info'] = $this->customer_model->get_customer($customer_id);
		$data['avatar'] = 'assets/media/avatars/blank.png';
		$data['country'] = '-';
		$data['customer_subscription'] = [];
		$data['customer_plan'] = [];
		$data['reseller_info'] = [];
		$data['customer_logs'] = [];
		if (isset($data['customer_info']) && is_array($data['customer_info']) && !empty($data['customer_info'])) {
			if ($data['customer_info']['profile_picture']) {
	            $avatar_path = FCPATH . 'uploads/avatar/customer_'.(int)$customer_id.'/'.$data['customer_info']['profile_picture'];
	            if (file_exists($avatar_path)) {
	                $data['avatar'] = base_url() . 'uploads/avatar/customer_'.(int)$customer_id.'/'.$data['customer_info']['profile_picture'];
	            }
	        }
	        $data['country'] = getCountryByCode($data['customer_info']['country']);

	        if (has_access(['super_admin'])) {

		        $data['customer_logs'] = $this->scan_model->get_scan_originality($customer_id);

		    }
	        $data['customer_credits'] = $this->subscription_model->get_customer_credits($customer_id);
	        if($data['customer_info']['plan_type'] != 'Guest'){
		        $data['customer_subscription'] = $this->subscription_model->get_customer_subscription($data['customer_info']['id']);
		        if (isset($data['customer_subscription']) && !empty($data['customer_subscription'])) {
		        	$data['customer_plan'] = $this->plan_model->get_plan($data['customer_subscription']['plan_id']);
		        }
		        $data['reseller_avatar'] = 'assets/media/avatars/blank.png';
		        $data['reseller_country'] = [];
	        	$data['reseller_info'] = $this->customer_model->get_reseller_by_customer_id($customer_id);
		        if (!empty($data['reseller_info']) && $data['reseller_info']->profile_picture != '') {
		            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['reseller_info']->profile_picture;
		            if (file_exists($avatar_path)) {
		                $data['reseller_avatar'] = base_url() . 'uploads/avatar/admin/'.$data['reseller_info']->profile_picture;
		            }
		            $data['reseller_country'] = getCountryByCode($data['reseller_info']->country);
		        }
		        
	        }
	        // echo "<pre>";print_r($data);die;
	        $this->template->admin_load('frame', 'content/customer_detail', $data);
		}else{
			redirect(base_url().'admin/customers');
		}
		
	}


	public function add_customer(){
    	// echo "<pre>";print_r($this->input->post());die;
		if($this->input->post()){
			$admin_id = $this->session->userdata('admin_id');
			$pass_string = trim($this->input->post('password'));
			$password = password_hash($pass_string, PASSWORD_DEFAULT);
			$email_check = $this->admin_model->email_check($this->input->post('email'));

			if ($email_check === true) {
				echo json_encode(array('status' => 'error' , 'message' => 'This email address is already registered. Please try out with a different email.'));
				exit();
			}

			$data = array(
				'creator_id' => $admin_id,
				'full_name' => $this->input->post('first_name').' '.$this->input->post('last_name'),
				'first_name' => trim($this->input->post('first_name')),
				'last_name' => trim($this->input->post('last_name')),
				'email' => $this->input->post('email'),
				'password' => $password,
				'pass_string' => $pass_string,
				'usage_limit' => 0,
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s'),
			);
			

			$customer_id = $this->admin_model->save_customer($data);
			
			if(isset($customer_id) && !empty($customer_id)){

				$response =  array(
			      "status" => 'success',
			      "message" => 'Customer has been added successfully.',
			    );
			    echo json_encode($response);
				
			}else{

				$response =  array(
			      "status" => 'error',
			      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
			    );
			    echo json_encode($response);exit();	

			}
		}
	}

    public function delete(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;
        	$customer_id = $this->input->post('customer_id');
        	$this->customer_model->soft_delete($customer_id);
	        $response =  array(
	          "status" => 'success', "message" => 'Customer has been deleted successfully', "customer_id" => $customer_id
	        );
	        echo json_encode($response);
        }
    }

    public function batch_delete(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;
        	$customer_ids = $this->input->post('customer_ids');
        	$this->customer_model->batch_soft_delete($customer_ids);
	        $response =  array(
	          "status" => 'success', "message" => 'Customer has been deleted successfully'
	        );
	        echo json_encode($response);
        }
    }
}