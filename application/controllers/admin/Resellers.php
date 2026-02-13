<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resellers extends Admin_Controller 
{
	function __construct() 
	{
	 	parent::__construct();

	 	$this->require_role(['super_admin']);
	 	
        $this->load->model('Admin_Model', 'admin_model');
		$this->load->model('Customer_Model', 'customer_model');
		$this->load->model('Reseller_Model', 'reseller_model');
		$this->load->model('Subscription_Model', 'subscription_model');
		$this->load->model('Plan_Model', 'plan_model');
		$this->load->model('Scan_Model', 'scan_model');
		$this->load->helper('country');
		$this->load->library('url_encrypt');
    } 

	public function index()
	{
		$data = array();
		$data['active'] = 'resellerList';
		$data['scripts'] = array(
			"0" => base_url().'assets/plugins/custom/datatables/datatables.bundle.js',
			"1" => base_url().'assets/js/custom/apps/resellers/list/list.js',
			"2" => base_url().'assets/js/custom/apps/resellers/add.js',
		);
		$admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
        $data['admin_info']['avatar'] = base_url().'assets/media/avatars/blank.png';
        if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }
        $data['admin_info']['country'] = getCountryByCode('PK');
		$data['total_customers'] = $this->reseller_model->count_all_resellers();
		$data['plans_info'] = [];
		// echo "<pre>";print_r($data);die;
		$this->template->admin_load('frame', 'content/resellers', $data);
	}

	public function add()
	{
		$data = array();
		$data['active'] = 'AddReseller';
		$data['scripts'] = array(
			"0" => base_url().'assets/js/custom/apps/resellers/add.js',
		);
		$admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
        $data['admin_info']['avatar'] = base_url().'assets/media/avatars/blank.png';
        if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }
        $data['admin_info']['country'] = getCountryByCode('PK');
		$this->template->admin_load('frame', 'content/add_reseller', $data);
	}

	public function add_reseller(){
    	// echo "<pre>";print_r($this->input->post());die;
		if($this->input->post()){

			$pass_string = trim($this->input->post('password'));
			$password = password_hash($pass_string, PASSWORD_DEFAULT);
			$email_check = $this->admin_model->email_check_reseller($this->input->post('email'));

			if ($email_check === true) {
				echo json_encode(array('status' => 'error' , 'message' => 'This email address is already registered. Please try out with a different email.'));
				exit();
			}

			$data = array(
				'full_name' => $this->input->post('first_name').' '.$this->input->post('last_name'),
				'first_name' => trim($this->input->post('first_name')),
				'last_name' => trim($this->input->post('last_name')),
				'email' => $this->input->post('email'),
				'password' => $password,
				'pass_string' => $pass_string,
				'role_id' => '3',
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s'),
			);
			

			$admin_id = $this->admin_model->save_admin($data);
			
			if(isset($admin_id) && !empty($admin_id)){

				$response =  array(
			      "status" => 'success',
			      "message" => 'Reseller has been added successfully.',
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

	public function ajax_resellers()
	{
		// echo "<pre>";print_r($this->input->post());die;
	    $draw = intval($this->input->post('draw'));
	    $start = intval($this->input->post('start'));
	    $length = intval($this->input->post('length'));
	    $search = $this->input->post('search')['value'] ?? '';
	    $month = $this->input->post('month') ?? '';
	    $plan_type = $this->input->post('plan_type') ?? '';

	    $list = $this->reseller_model->get_reseller_datatable($start, $length, $search, $month, $plan_type);
     	// echo "<pre>";print_r($list);die;
	    $total = $this->reseller_model->count_all_resellers();
	    // echo "<pre>";print_r($total);die;
	    $filtered = $this->reseller_model->count_filtered_resellers($search, $month, $plan_type);
	    // echo "<pre>";print_r($filtered);die;

	    $data = [];
	    foreach ($list as $customer) {

	    	$delete_action = base_url().'admin/resellers/delete';
	    	if ($customer->contact_number) {
	    		$phone = $customer->contact_number;
	    	}else{
	    		$phone = '—';
	    	}
	    	if ($customer->email_verified == 'no') {
	    		$email_verified = '<div class="text-gray-600">
										<span class="badge badge-danger">Unverified</span>
									</div>';
	    	}else{
	    		$email_verified = '<div class="text-gray-600">
										<span class="badge badge-success">Verified</span>
									</div>';
	    	}
	    	if ($customer->pass_string) {
	    		$password = '<div class="d-flex align-items-center">
			    					<a href="javascript: void(0)" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6 me-3">'.trim($customer->pass_string).'</a>
									<div class="symbol symbol-45px">
										<a href="javascript: void(0)" onclick="copy_pass(this)" data-password="'.trim($customer->pass_string).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
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
						<a href="'.base_url('admin/resellers/view/'.$customer->id).'" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">'.$customer->full_name.'</a>
						<a href="'.base_url('admin/resellers/view/'.$customer->id).'" class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
						'.$customer->email.'</a>
						<a href="javascript:void(0)" class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
						'.$phone.'</a>
						</div>
					</div>
		        ',

		        'pass_string' => $password,

		        'email_verified' => $email_verified,

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
		                    <a href="'.base_url('admin/resellers/view/'.$customer->id).'"
		                       class="menu-link px-3">View</a>
		                </div>

		                <div class="menu-item px-3">
		                    <a href="javascript: void(0)"
		                       class="menu-link px-3"
		                       data-id="'.$customer->id.'"
		                       data-action="'.$delete_action.'"
		                       data-kt-customer-table-filter="delete_row">
		                       Delete
		                    </a>
		                </div>
		            </div>
	            </div>'
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


	public function view($reseller_id='')
	{
		// echo $reseller_id;die;
		$data = array();
		$data['active'] = 'view';
		$data['scripts'] = array(
			"0" => base_url().'assets/plugins/custom/datatables/datatables.bundle.js',
			"1" => base_url().'assets/js/custom/apps/resellers/list/invoices.js',
			"2" => base_url().'assets/js/custom/apps/resellers/list/customers.js',
			"3" => base_url().'assets/js/custom/apps/resellers/update.js',
			"4" => base_url().'assets/js/custom/widgets.js',
		);
		$admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
        $data['admin_info']['avatar'] = base_url().'assets/media/avatars/blank.png';
        if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }
        $data['admin_info']['country'] = getCountryByCode('PK');
		$data['reseller_info'] = $this->reseller_model->get_reseller($reseller_id);
		$data['avatar'] = base_url().'assets/media/avatars/blank.png';
		$data['country'] = '-';
		if (isset($data['reseller_info']) && is_array($data['reseller_info']) && !empty($data['reseller_info'])) {
			if ($data['reseller_info']['profile_picture']) {
	            $avatar_path = FCPATH . 'uploads/avatar/customer_'.(int)$reseller_id.'/'.$data['reseller_info']['profile_picture'];
	            if (file_exists($avatar_path)) {
	                $data['avatar'] = base_url() . 'uploads/avatar/customer_'.(int)$reseller_id.'/'.$data['reseller_info']['profile_picture'];
	            }
	        }
	        $data['reseller_role_info'] = $this->admin_model->get_role_info($data['reseller_info']['role_id']);
	        $data['country'] = getCountryByCode($data['reseller_info']['country']);
	        // echo "<pre>";print_r($data);die;
	        $this->template->admin_load('frame', 'content/reseller_detail', $data);
		}else{
			redirect(base_url().'admin/customers');
		}
		
	}

    public function delete(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;
        	$reseller_id = $this->input->post('reseller_id');
        	$this->reseller_model->soft_delete($reseller_id);
	        $response =  array(
	          "status" => 'success', "message" => 'Reseller has been deleted successfully'
	        );
	        echo json_encode($response);
        }
    }

    public function ajax_customer_list()
	{
		// echo "<pre>";print_r($this->input->post());die;
	    $draw = intval($this->input->post('draw'));
	    $start = intval($this->input->post('start'));
	    $length = intval($this->input->post('length'));
	    $reseller_id = intval($this->input->post('reseller_id'));

	    $list = $this->reseller_model->get_customers_by_reseller_datatable($reseller_id, $start, $length);
     	// echo "<pre>";print_r($list);die;
	    $total = $this->reseller_model->count_all_customer_by_reseller($reseller_id);
	    // echo "<pre>";print_r($total);die;
	    $data = [];
	    foreach ($list as $customer) {
		    
	    	if ($customer->email_verified == 'no') {
	    		$email_verified = '<span class="badge badge-light-danger">Unverified</span>';
	    	}else{
	    		$email_verified = '<span class="badge badge-light-danger">Verified</span>';
	    	}

	    	if (!empty($customer->plan_id)) {

	            $plans_info = $this->db->get_where('plans', ['id' => $customer->plan_id])->row();
	            
	            if ($plans_info) {    
	            	$plan_type = '<div class="d-flex align-items-center">
		    					<div class="text-center me-3">
		    					<span class="badge badge-light-'.$plans_info->color.' p-3">'.$plans_info->title.'</span>
		    					</div>
							  </div>';
	            } else {
	                $plan_type = '<div class="d-flex align-items-center">
		    						<div class="text-center me-3">
		    							<span class="badge badge-light-info p-3">'.$plans_info->title.'</span>
		    						</div>
								  </div>';
	            }
	        } else {
	            $plan_type = '<div class="d-flex align-items-center">
		    						<div class="text-center me-3">
		    							<span class="badge badge-light-info p-3">'.$plans_info->title.'</span>
		    						</div>
								  </div>';
	        }

	    	$encoded_id = rawurlencode($this->url_encrypt->encode_id($customer->id));

		    $data[] = [

		        'full_name' => '<a href="'.base_url().'admin/customers/view/'.$encoded_id.'" class="text-gray-800 text-hover-primary mb-1">'.$customer->full_name.'</a>',

		        'email' => '<a href="'.base_url().'admin/customers/view/'.$encoded_id.'" class="text-gray-800 text-hover-primary mb-1">'.$customer->email.'</a>',

		        'plan_type' => $plan_type,

		        'email_verified' => $email_verified,

		        'created_at' => date('d M Y', strtotime($customer->created_at)),
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

	public function search_reseller(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;
        	$data = [];
        	$data['avatar'] = '';
        	$data['resellers'] = $this->reseller_model->searchResellers($this->input->post('keyword'));
        	// echo "<pre>";print_r($data);die;
	        $view_to_pass = $this->load->view('admin/content/suggestions',$data,TRUE);
	        $response =  array(
	          "status" => 'success', "html" => $view_to_pass
	        );
	        echo json_encode($response);
	        exit();
        }
    }

    public function get_info(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;
        	$data = [];
        	$data['avatar'] = base_url().'assets/media/avatars/blank.png';
        	$data['country'] = '';
        	$data['reseller_info'] = $this->customer_model->get_reseller_by_customer_id($this->input->post('customer_id'));
        	// echo "<pre>";print_r($data['reseller_info']);die;
	        if (isset($data['reseller_info']) && !empty($data['reseller_info']) && $data['reseller_info']->profile_picture) {
	            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['reseller_info']->profile_picture;
	            if (file_exists($avatar_path)) {
	                $data['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['reseller_info']->profile_picture;
	            }
	            $data['country'] = getCountryByCode($data['reseller_info']->country);
	        }
	        
        	// echo "<pre>";print_r($data);die;
	        $view_to_pass = $this->load->view('admin/chunks/popup_reseller',$data,TRUE);
	        $response =  array(
	          "status" => 'success', "html" => $view_to_pass
	        );
	        echo json_encode($response);
	        exit();
        }
    }
}