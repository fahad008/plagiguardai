<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apikey_Manager extends Admin_Controller 
{
	function __construct() 
	{
	 	parent::__construct();
	 	
	 	$this->require_role(['super_admin']);

        $this->load->model('Admin_Model', 'admin_model');
		$this->load->model('Apikey_Model', 'apikey_model');
		$this->load->library('Scanner');
		$this->load->helper('country');
    } 

	public function index()
	{
		$data = array();
		$data['active'] = 'api_key';
		$data['scripts'] = array(
			"0" => base_url().'assets/js/custom/modals/create-api-key.js'
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
        $data['api_keys_info'] = $this->apikey_model->getAllKeys();
		// echo "<pre>";print_r($data);die;
		$this->template->admin_load('frame', 'content/api_key', $data);
	}

	public function get_api_form(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;
        	$data = [];
        	$api_id = $this->input->post('api_id');
        	if (!$api_id) {
        		$data['modal_title'] = 'Create API Key';
        		$data['api_key_info'] = '';
        	}else{
        		$data['modal_title'] = 'Update API Key';
        		$data['api_key_info'] = $this->apikey_model->get_api_Key($api_id);
        	}
        	// echo "<pre>";print_r($data);die;
        	$data['form_action'] = base_url().'admin/apikey_manager/manage_key';

        	$view_to_pass = $this->load->view('admin/chunks/api_form',$data,TRUE);
	        $response =  array(
	          "status" => 'success', "html" => $view_to_pass
	        );
	        echo json_encode($response);
	        exit();
        	
        }else{
			$response =  array(
		      "status" => 'error',
		      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
		    );
		    echo json_encode($response);exit();	
		}
    }

	public function manage_key(){
		// echo "<pre>";print_r($this->input->post());die;
		if ($this->input->post()) {

			$api_key_id = $this->input->post('api_key_id');
			$api_key = $this->input->post('api_key');
			$post_status = $this->input->post('status');
			$credits_remaining = 0;
			if (!$api_key_id) {
				$duplicate = $this->apikey_model->duplicate_key_check(trim($api_key));
				if ($duplicate >= 1) {
					$response =  array(
				      "status" => 'error',
				      "message" => 'Your Api Key <br><b>'.$api_key.'</b><br>is already existed'
				    );
				    echo json_encode($response);exit();	
				}

				$status = $this->input->post('status');

				$result = $this->scanner->getBalance(trim($api_key));
				if ($result['status'] == 'success') {

					$credits_remaining = $result['total_credits'];
					if ($credits_remaining <= 0) {
						$status = 'exhausted';
					}
					
				}else{
					$response =  array(
				      "status" => 'error',
				      "message" => $result['message']
				    );
				    echo json_encode($response);exit();	
				}

				$save_key = array(
					"name" => $this->input->post('name'),
					"api_key" => trim($this->input->post('api_key')),
					"description" => $this->input->post('description'),
					"status" => $status,
					"credits_remaining" => $credits_remaining,
					"daily_limit" => 100,
					"created_at" => date('y-m-d H:m:s'),
				);

				$api_key_id = $this->apikey_model->save_key($save_key);

				$response =  array(
			      "status" => 'success',
			      "api_key_id" => $api_key_id,
			      "message" => 'Api key has been created successfully'
			    );
			    echo json_encode($response);
			}else{
				$duplicate = $this->apikey_model->duplicate_key_check(trim($api_key), $api_key_id);
				if ($duplicate >= 1) {
					$response =  array(
				      "status" => 'error',
				      "message" => 'Your Api Key <br><b>'.$api_key.'</b><br> is already existed'
				    );
				    echo json_encode($response);exit();	
				}

				$status = $this->input->post('status');

				$result = $this->scanner->getBalance(trim($api_key));
				if ($result['status'] == 'success') {

					$credits_remaining = $result['total_credits'];
					if ($credits_remaining <= 0) {
						$status = 'exhausted';
					}
					
				}else{
					$response =  array(
				      "status" => 'error',
				      "message" => $result['message']
				    );
				    echo json_encode($response);exit();	
				}

				$save_key = array(
					"name" => $this->input->post('name'),
					"api_key" => trim($this->input->post('api_key')),
					"description" => $this->input->post('description'),
					"status" => $status,
					"credits_remaining" => $credits_remaining,
					"daily_limit" => 100,
					"created_at" => date('y-m-d H:m:s'),
				);

				$this->apikey_model->update_key($api_key_id, $save_key);

				$response =  array(
			      "status" => 'success',
			      "api_key_id" => $api_key_id,
			      "message" => 'Api key has been updated successfully'
			    );
			    echo json_encode($response);
			}
				
		}else{
			$response =  array(
		      "status" => 'error',
		      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
		    );
		    echo json_encode($response);exit();	
		}
	}

	public function change_api_status(){
		// echo "<pre>";print_r($this->input->post());die;
		if ($this->input->post()) {
			$api_key_id = $this->input->post('api_key_id');
			$update_post = array(
				"status" => $this->input->post('key_status'),
			);

			$this->apikey_model->update_key($api_key_id, $update_post);

			$response =  array(
		      "status" => 'success',
		      "message" => 'Key status has been updated successfully'
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