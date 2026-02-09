<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
        $this->load->model('Plan_Model', 'plan_model');
        $this->load->model('Admin_Model', 'admin_model');
        $this->load->model('Reseller_Model', 'reseller_model');
	}


	public function index($slug='')
    {
        show_404();
    }

    public function pricing($slug='')
    {
        
        $data = array();
        $data['active'] = 'pricing';
        $data['footer_links'] = get_footer_links();
        if ($this->session->userdata('admin_logged_in')) {
            $data['header_links'] = array(
                '1' => array(
                    'title' => 'My Profile',
                    'link' => base_url().'admin/dashboard/profile/',
                ),
                '2' => array(
                    'title' => 'Customers',
                    'link' => base_url().'admin/customers/',
                ),
                '3' => array(
                    'title' => 'Resellers',
                    'link' => base_url().'admin/resellers/',
                ),
                '4' => array(
                    'title' => 'Plans',
                    'link' => base_url().'admin/plans/',
                ),
                '5' => array(
                    'title' => 'Roles',
                    'link' => base_url().'admin/roles/',
                ),
                '6' => array(
                    'title' => 'Admin Management',
                    'link' => base_url().'admin/management/',
                ),
                '7' => array(
                    'title' => 'Settings',
                    'link' => base_url().'admin/dashboard/settings/',
                ),
            );

            $data['primary_link'] = ["title" => 'Dashboard', "link" => base_url().'admin/dashboard'];

        }else if ($this->session->userdata('logged_in_customer')) {
            $data['header_links'] = array(
                '1' => array(
                    'title' => 'My Profile',
                    'link' => base_url().'member/profile/',
                ),
                '2' => array(
                    'title' => 'My Subscriptions',
                    'link' => base_url().'subscription/',
                )
            );

            $data['primary_link'] = ["title" => 'Dashboard', "link" => base_url().'dashboard'];
        }else{
            $data['header_links'] = array(
                '1' => array(
                    'title' => 'Create an Account',
                    'link' => base_url().'signup',
                )
            );

            $data['primary_link'] = ["title" => 'Sign In', "link" => base_url().'login'];
        }

        $data['monthly_plans'] = $this->plan_model->get_plans_by_duration('30');
        $data['yearly_plans'] = $this->plan_model->get_plans_by_duration('365');
        $data['reseller_list'] = $this->reseller_model->get_reseller_list();
        // echo "<pre>";print_r($data['reseller_list']);die;
        $this->template->load('home/pricing', 'home/pricing', $data);
    }

    public function contact_us($slug='')
    {
        
        $data = array();
        $data['active'] = 'contact_us';
        $data['footer_links'] = get_footer_links();
        if ($this->session->userdata('admin_logged_in')) {
            $data['header_links'] = array(
                '1' => array(
                    'title' => 'My Profile',
                    'link' => base_url().'admin/dashboard/profile/',
                ),
                '2' => array(
                    'title' => 'Customers',
                    'link' => base_url().'admin/customers/',
                ),
                '3' => array(
                    'title' => 'Resellers',
                    'link' => base_url().'admin/resellers/',
                ),
                '4' => array(
                    'title' => 'Plans',
                    'link' => base_url().'admin/plans/',
                ),
                '5' => array(
                    'title' => 'Roles',
                    'link' => base_url().'admin/roles/',
                ),
                '6' => array(
                    'title' => 'Admin Management',
                    'link' => base_url().'admin/management/',
                ),
                '7' => array(
                    'title' => 'Settings',
                    'link' => base_url().'admin/dashboard/settings/',
                ),
            );

            $data['primary_link'] = ["title" => 'Dashboard', "link" => base_url().'admin/dashboard'];

        }else if ($this->session->userdata('logged_in_customer')) {
            $data['header_links'] = array(
                '1' => array(
                    'title' => 'My Profile',
                    'link' => base_url().'member/profile/',
                ),
                '2' => array(
                    'title' => 'My Subscriptions',
                    'link' => base_url().'subscription/',
                )
            );

            $data['primary_link'] = ["title" => 'Dashboard', "link" => base_url().'dashboard'];
        }else{
            $data['header_links'] = array(
                '1' => array(
                    'title' => 'Create an Account',
                    'link' => base_url().'signup',
                )
            );

            $data['primary_link'] = ["title" => 'Sign In', "link" => base_url().'login'];
        }

        $data['monthly_plans'] = $this->plan_model->get_plans_by_duration('30');
        $data['yearly_plans'] = $this->plan_model->get_plans_by_duration('365');

        $this->template->load('home/contactus', 'home/contactus', $data);
    }

    public function save_query(){
        // echo "<pre>";print_r($this->input->post());die;
        if($this->input->post()){

            $data = array(
                'name' => trim($this->input->post('name')),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'created_at' => date('y-m-d H:m:s')
            );
            

            $saved = $this->admin_model->save_contact_query($data);
            
            if($saved){

                $response =  array(
                  "status" => 'success',
                  "message" => 'Your query has been saved successfully.'
                );
                echo json_encode($response);exit(); 

                
                
            }else{

                $response =  array(
                  "status" => 'error',
                  "message" => 'PlagiGuardAI is unable to complete your registration at the moment. Please try again shortly!'
                );
                echo json_encode($response);exit(); 

            }
        }else{

                $response =  array(
                  "status" => 'error',
                  "message" => 'PlagiGuardAI is unable to complete your registration at the moment. Please try again shortly!'
                );
                echo json_encode($response);exit(); 

            }
    }
    
}