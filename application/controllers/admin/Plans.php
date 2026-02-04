<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends Admin_Controller 
{
	function __construct() 
	{
	 	parent::__construct();
	 	
        $this->require_role(['super_admin', 'reseller']);
        
        $this->load->model('Admin_Model', 'admin_model');
        $this->load->model('Settings_Model', 'settings_model');
        $this->load->model('Plan_Model', 'plan_model');
        $this->load->helper('country');
    } 

	public function index()
	{
		$data = array();
		$data['active'] = 'plansList';
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
        $data['admin_info']['country'] = getCountryByCode('PK');
        $data['plan_info'] = $this->plan_model->get_plans();
        $data['plans_text'] = getplanText();
        // echo "<pre>";print_r($data);die;
		$this->template->admin_load('frame', 'content/plans/list', $data);
	}

    public function add()
    {
        $this->require_role(['super_admin']);
        $data = array();
        $data['active'] = 'AddPlans';
        $data['scripts'] = array(
            "0" => 'assets/js/custom/admin/add-plan.js',
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
        $data['plan_info'] = $this->plan_model->get_plans();
        $data['plans_text'] = getplanText();
        // echo "<pre>";print_r($data);die;
        $this->template->admin_load('frame', 'content/plans/add', $data);
    }

    public function edit($id='')
    {
        $this->require_role(['super_admin']);
        $data = array();
        $data['plan_info'] = $this->plan_model->get_plan($id);
        if (isset($data['plan_info']) && !empty($data['plan_info'])) {
            $data['active'] = 'editPlans';
            $data['scripts'] = array(
                "0" => 'assets/js/custom/admin/add-plan.js',
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
            $data['plans_text'] = getplanText();
            // echo "<pre>";print_r($data);die;
            $this->template->admin_load('frame', 'content/plans/edit', $data);
        }else{
            redirect(base_url().'admin/plans/');
        }
        
    }

    public function add_plan(){
        // echo "<pre>";print_r($this->input->post());die;
        if($this->input->post()){

            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'credits' => intval($this->input->post('credits')),
                'price' => intval($this->input->post('price')),
                'duration' => intval($this->input->post('duration')),
                'color' => $this->input->post('color'),
                'created_at' => date('y-m-d H:m:s'),
                'updated_at' => date('y-m-d H:m:s'),
            );

            // echo "<pre>";print_r($data);die;

            $this->plan_model->save_plan($data);

            echo json_encode(array("status" => 'success', "message" => 'New plan has been successfully added.'));
            exit();
        }
    }

    public function edit_plan(){
        // echo "<pre>";print_r($this->input->post());die;
        if($this->input->post()){
            $plan_id = $this->input->post('plan_id');
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'credits' => intval($this->input->post('credits')),
                'price' => intval($this->input->post('price')),
                'duration' => intval($this->input->post('duration')),
                'color' => $this->input->post('color'),
                'updated_at' => date('y-m-d H:m:s'),
            );

            // echo "<pre>";print_r($data);die;

            $this->plan_model->update_plan($plan_id, $data);

            echo json_encode(array("status" => 'success', "message" => $this->input->post('title').' plan has been successfully updated.'));
            exit();
        }
    }

}