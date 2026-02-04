<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class terms_conditions extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		// $this->load->model('State_Model', 'state_model');
		// $this->load->library('email');
		// $this->load->helper('url');
	}


	public function index()
    {
        $data = [
            'title' => 'User Login',
            'error' => 'Invalid email or password'
        ];

        $this->template->load('autentication/terms_conditions', 'autentication/terms_conditions', $data);
    }
}