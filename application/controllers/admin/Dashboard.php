<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller 
{
	function __construct() 
	{
	 	parent::__construct();

	 	$this->require_role(['super_admin' , 'admin', 'reseller']);
        
        $this->load->model('Admin_Model', 'admin_model');
        $this->load->model('Settings_Model', 'settings_model');
        $this->load->helper('country');
    } 

	public function index()
	{
		$data = array();
		$data['active'] = 'dashboard';
		$data['scripts'] = array(
			"0" => 'assets/js/custom/apps/customers/add.js',
		);
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
		$this->template->admin_load('frame', 'content/dashboard', $data);
	}

	public function settings()
	{
        $this->require_role(['super_admin']);
		$data = array();
		$data['active'] = 'settings';
		$data['scripts'] = array(
            "0" => 'assets/js/custom/admin/admin-settings.js',
        );
		$admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
		$data['admin_info']['avatar'] = 'assets/media/avatars/blank.png';
		if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }
        $data['admin_info']['country'] = getCountryByCode($data['admin_info']['country']);
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
        $data['settings'] = $this->settings_model->get_settings(1);
        // echo "<pre>";print_r($data);die;
		$this->template->admin_load('frame', 'content/settings', $data);
	}

	public function profile()
	{
		$data = array();
		$data['active'] = 'profile';
		$data['scripts'] = array(
			"0" => 'assets/js/custom/admin/admin-profile-details.js',
		);
		$admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
		$data['admin_info']['avatar'] = 'assets/media/avatars/blank.png';
		if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }
        $data['admin_country'] = $data['admin_info']['country'];
        // echo "<pre>";print_r($data);die;
        $data['admin_info']['country'] = getCountryByCode($data['admin_info']['country']);
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
        $data['country_list'] = getALLCountries();
		$this->template->admin_load('frame', 'content/profile', $data);
	}

	public function edit_profile(){
        // echo "<pre>";print_r($_FILES);print_r($this->input->post());die;
        if($this->input->post()){

            $admin_id = $this->session->userdata('admin_id');

            if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] != '') {
                
                $file_name = $_FILES['avatar']['name'];
                $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $extension = strtolower($extension);    
                $upload_to = FCPATH . 'uploads/avatar/admin/';

                if (!is_dir($upload_to)) {

                    mkdir($upload_to, 0755, true);

                }

                $file_info = $this->upload_file($upload_to, $extension);
                // echo "<pre>";print_r($file_info);die;
                if ($file_info['status']) {

                    $old_avatar = $this->admin_model->get_admin_avatar($admin_id);
                    if ($old_avatar) {
                        $old_avatar_path = FCPATH . 'uploads/avatar/admin/'.$old_avatar;
                        unlink($old_avatar_path);
                    }
                    
                    $avatar_info = array(
                        "profile_picture" => $file_info['file_name'],
                        'updated_at' => date('y-m-d H:m:s')
                    );
                    $this->admin_model->update_admin($admin_id, $avatar_info);
                }else{
                    echo json_encode(array("status" => 'error', "message" => $file_info['message']));
                    exit();
                }
            }else if ($this->input->post('avatar_remove')) {
                $old_avatar = $this->admin_model->get_admin_avatar($admin_id);
                if ($old_avatar) {
                    $old_avatar_path = FCPATH . 'uploads/avatar/admin/'.$old_avatar;
                    unlink($old_avatar_path);
                }
                
                $avatar_info = array(
                    "profile_picture" => '',
                    'updated_at' => date('y-m-d H:m:s')
                );
                $this->admin_model->update_admin($admin_id, $avatar_info);
            }

            // echo "<pre>";print_r($this->input->post());die;
            $full_name = trim($this->input->post('first_name')).' '.trim($this->input->post('last_name'));
            $data = array(
                'first_name' => trim($this->input->post('first_name')),
                'last_name' => trim($this->input->post('last_name')),
                'full_name' => $full_name,
                'contact_number' => $this->input->post('contact_number'),
                'country' => $this->input->post('country'),
                'updated_at' => date('y-m-d H:m:s'),
            );

            // echo "<pre>";print_r($data);die;

            $this->admin_model->update_admin($admin_id, $data);
            echo json_encode(array("status" => 'success', "message" => 'Your profile has been successfully updated.'));
            exit();
        }
    }

    public function update_settings(){
        // echo "<pre>";print_r($this->input->post());die;
        if($this->input->post()){

            $settings_id  = '1';

            $data = array(
                'min_words' => intval($this->input->post('min_words')),
                'max_words' => intval($this->input->post('max_words')),
                'block_length' => intval($this->input->post('block_length')),
                'credits_per_block' => intval($this->input->post('credits_per_block')),
                'scans_expiry' => intval($this->input->post('scans_expiry')),
                'updated_at' => date('y-m-d H:m:s'),
            );

            $this->settings_model->update_settings($settings_id, $data);

            echo json_encode(array("status" => 'success', "message" => 'PLAGIGUARDAI settings has been successfully updated.'));
            exit();
        }
    }

    private function upload_file($upload_path, $extension){

        $this->load->library('image_lib');

        $admin_id = $this->session->userdata('admin_id');
        $date = date('dmYHis');
        $fileName = $date.'_'.$admin_id.'.'.$extension;
        $config = array(
            'upload_path'   => $upload_path,
            'allowed_types' => 'png|jpg|jpeg',
            'max_size' => 5000,
            'file_name' => $fileName,                     
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('avatar')) {
            $result = array();
            $result = $this->upload->data();
            $result['status'] = true; 
            return $result;
        }else{
            $result = array(
                "status" => false,
                "message" => strip_tags($this->upload->display_errors()),
            );
            return $result;

        }
    }
}