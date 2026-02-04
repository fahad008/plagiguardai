<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
	}


	public function index()
    {
        $user_data = $this->session->all_userdata();
		// echo "<pre>";print_r($user_data);die;
	    if (isset($user_data) && !empty($user_data)) {
	    	foreach ($user_data as $key => $value) {
	            if ($key != 'session_id' && $key != 'logged_in') {
	                $this->session->unset_userdata($key);
	            }
	        }
         	
	    }
	    redirect(base_url() . 'login/','refresh');
    }

}