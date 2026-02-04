<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('admin_logged_in')) {
            redirect(base_url().'admin/login/');
        }
    }

    protected function require_role($roles = [])
    {
        // echo "<pre>";print_r($this->session->userdata());die;
        $role = $this->session->userdata('admin_role');

        if (!in_array($role, $roles)) {
            redirect(base_url().'errors/error_403/');
            // show_error('Unauthorized access', 403);
        }
    }

    protected function get_access($roles = [])
    {
        $role = $this->session->userdata('admin_role');

        if (!in_array($role, $roles)) {
            return false;
        }
        return true;
    }
}
