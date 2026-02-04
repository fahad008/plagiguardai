<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class password_reset extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in_customer')) {
            redirect(base_url().'dashboard/');
        }
	}


	public function index()
    {
        $data = [
            'title' => 'User Login',
            'error' => 'Invalid email or password'
        ];

        $this->template->load('autentication/password_reset', 'autentication/password_reset', $data);
    }
}