<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends Admin_Controller 
{
	function __construct() 
	{
	 	parent::__construct();

	 	$this->require_role(['super_admin']);

        $this->load->model('Admin_Model', 'admin_model');
        $this->load->helper('country');
    } 

	public function index()
	{
        // echo "<pre>";print_r($this->session->userdata());die;
		$data = array();
		$data['active'] = 'roles';
		$data['scripts'] = [];
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
        $data['admin_info']['country'] = getCountryByCode($data['admin_info']['country']);

        $roles = $this->admin_model->get_admin_roles();

        $data['admin_roles'] = [];
        foreach ($roles as $key => $role) {
            $count = 0;
            $count = $this->admin_model->count_admin_users($role['id']);
            $data['admin_roles'][$key]['id'] = $role['id'];
            $data['admin_roles'][$key]['name'] = $role['name'];
            $data['admin_roles'][$key]['count'] = $count;
        }
        // echo "<pre>";print_r($data);die;
		$this->template->admin_load('frame', 'content/roles/list', $data);
	}

    public function view($role_id='')
    {
        $data = array();
        $data['view_role_info'] = $this->admin_model->get_role_info($role_id);
        if(isset($data['view_role_info']) && !empty($data['view_role_info'])){
            $data['active'] = 'roles';
            $data['scripts'] = array(
                "0" => base_url().'assets/plugins/custom/datatables/datatables.bundle.js',
                "1" => base_url().'assets/js/custom/apps/user-management/roles/view/view.js'

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

            $data['admin_count'] = $this->admin_model->count_admin_users($role_id);
            
            // echo "<pre>";print_r($data);die;
            $this->template->admin_load('frame', 'content/roles/view', $data);
        }else{
            redirect(base_url().'admin/roles/');
        }
    }

    public function ajax_admins()
    {
        // echo "<pre>";print_r($this->input->post());die;
        $draw = intval($this->input->post('draw'));
        $start = intval($this->input->post('start'));
        $length = intval($this->input->post('length'));
        $search = $this->input->post('search')['value'] ?? '';
        $role_id = $this->input->post('role_id') ?? '';

        $list = $this->admin_model->get_rolewise_admin_datatable($start, $length, $search, $role_id);
        // echo "<pre>";print_r($list);die;
        $total = $this->admin_model->count_admin_users($role_id);
        // echo "<pre>";print_r($total);die;

        $data = [];
        foreach ($list as $admin) {

            $avatar = base_url().'assets/media/avatars/blank.png';
            $view_url = base_url('admin/management/view/'.$admin->id);
            if ($admin->profile_picture) {
                $avatar_path = FCPATH . 'uploads/avatar/admin/'.$admin->profile_picture;
                if (file_exists($avatar_path)) {
                    $avatar = base_url() . 'uploads/avatar/admin/'.$admin->profile_picture;
                }
            }

            $data[] = [

                'member' => '
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="'.$view_url.'">
                                <div class="symbol-label">
                                    <img src="'.$avatar.'" alt="'.$admin->full_name.'" class="w-100" />
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="'.$view_url.'" class="text-gray-800 text-hover-primary mb-1">'.$admin->full_name.'</a>
                            <span>'.$admin->email.'</span>
                        </div>
                    </div>
                ',

                'created_at' => date('d M Y', strtotime($admin->created_at)),

                'actions' => '
                    <div class="text-end">
                        <a href="javascript: void(0)" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                            </svg>
                        </span>
                        </a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            <div class="menu-item px-3">
                                <a href="'.$view_url.'" class="menu-link px-3">View</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="javascript: void(0)" class="menu-link px-3" onclick="disbale_admin(this)" data-admin_id="'.$admin->id.'">Disable</a>
                            </div>
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
             'recordsFiltered' => $total,
             'data' => $data
        ], JSON_UNESCAPED_UNICODE));

    return;

}

}