<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        
        $this->load->model('Admin_Model', 'admin_model');
        $this->load->helper('country');
    }

    public function error_404()
    {
        http_response_code(404);

        $this->load->view('errors/error_404', 'errors/error_404');
    }

    public function error_403()
    {
        http_response_code(403);

        $data = array();
        $data['active'] = '';
        $data['scripts'] = [];
        $admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
        $data['admin_info']['avatar'] = 'assets/media/avatars/blank.png';
        if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }
        $data['admin_info']['country'] = getCountryByCode('PK');
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
        // echo "<pre>";print_r($data);die;
        $this->template->admin_load('frame', 'content/errors/error_403', $data);
    }
}
