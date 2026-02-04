<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function has_access($roles = []) {
    $CI =& get_instance();
    $role = $CI->session->userdata('admin_role');
    return in_array($role, $roles);
}
