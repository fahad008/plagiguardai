<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller 
{
    function __construct() 
    {
        parent::__construct();
        
        $this->require_role(['super_admin', 'admin']);

        $this->load->model('Admin_Model', 'admin_model');
        $this->load->model('Pages_Model', 'pages_model');
        $this->load->helper('country');
    } 

    public function index()
    {
        show_404();
    }

    public function contact_us()
    {
        $data = array();
        $data['active'] = 'contact_us';
        $data['scripts'] = array(
            "0" => 'assets/plugins/custom/datatables/datatables.bundle.js',
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

        $data['latest_queries_count'] = 0;
        $data['closed_queries_count'] = 0;
        $data['latest_queries'] = $this->pages_model->get_queries('pending');
        if (isset($data['latest_queries']) && !empty($data['latest_queries'])) {
            $data['latest_queries_count'] = count($data['latest_queries']);
        }
        $data['closed_queries'] = $this->pages_model->get_queries('closed');
        if (isset($data['closed_queries']) && !empty($data['closed_queries'])) {
            $data['closed_queries_count'] = count($data['closed_queries']);
        }

        // echo "<pre>";print_r($data);die;
        $this->template->admin_load('frame', 'content/pages/contact_us', $data);
    }

    public function delete_query(){
        // echo "<pre>";print_r($this->input->post());die;
        if($this->input->post()){
            $contact_us_id = $this->input->post('contact_us_id');
            
            $result = $this->pages_model->delete_contact_query($contact_us_id);

            if ($result === true) {
                $response =  array(
                  "status" => 'success',
                  "message" => 'Query has been deleted successfully.'
              );
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
              "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
            );
            echo json_encode($response);exit(); 
        }
    }

    public function close_query(){
        // echo "<pre>";print_r($this->input->post());die;
        if($this->input->post()){
            $admin_id = $this->session->userdata('admin_id');
            $contact_us_id = $this->input->post('contact_us_id');
            $data = array("admin_id" => $admin_id, "status" => 'closed');
            
            $result = $this->pages_model->update_contact_query($contact_us_id, $data);

            if ($result === true) {
                $response =  array(
                  "status" => 'success',
                  "message" => 'Query has been closed successfully.'
              );
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
              "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
            );
            echo json_encode($response);exit(); 
        }
    }
}