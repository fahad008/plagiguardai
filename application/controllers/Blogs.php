<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blogs extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
        $this->load->model('Customer_Model', 'customer_model');
        $this->load->model('Blogs_Model', 'blogs_model');
        $this->load->model('Plan_Model', 'plan_model');
        $this->load->library('url_encrypt');
        $this->load->helper('blogs');
	}


	public function index($slug='')
    {
        $data = array();
        $data['active'] = 'blogs';
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
                    'link' => base_url().'admin/member/profile/',
                ),
                '2' => array(
                    'title' => 'My Subscriptions',
                    'link' => base_url().'admin/subscription/',
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
        $data['categories_info'] = $this->blogs_model->get_categories_with_post_count();
        $data['category_title'] = 'Global';

        if (!empty($slug)) {
            $data['category_title'] = $this->blogs_model->get_catgeory_name($slug);
            $post_list = $this->blogs_model->get_posts_by_category_slug(trim($slug));
            
        }else{
            $post_list = $this->blogs_model->get_posts_list();
            
        }

        if (isset($post_list) && !empty($post_list)) {
            
            $total = count($post_list);
            $half  = ceil($total / 2);

            $data['post_list_first'] = array_slice($post_list, 0, $half);
            $data['post_list_second'] = array_slice($post_list, $half);

            // echo "<pre>";print_r($data);die;
            $this->template->load('blogs/home', 'blogs/home', $data);
        }else{
            show_404();
        }
    }

    public function post($slug = '')
    {
        if (!empty($slug)) {
            $data = array();
            $data['active'] = 'blogs';
            $data['footer_links'] = get_footer_links();
            $data['canonical_url'] = '';
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
                        'link' => base_url().'admin/member/profile/',
                    ),
                    '2' => array(
                        'title' => 'My Subscriptions',
                        'link' => base_url().'admin/subscription/',
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
            $data['post_info'] = $this->blogs_model->get_post_by_slug(trim($slug));
            $data['author_info'] = '';
            $data['category_name'] = '';
 
            if (isset($data['post_info']) && !empty($data['post_info'])) {

                $data['category_name'] = $this->blogs_model->get_post_category_name($data['post_info']['id']);

                $is_admin = $this->session->userdata('admin_logged_in');

                $is_published = isset($data['post_info']['status']) && $data['post_info']['status'] === 'published';

                if ($is_admin || $is_published) {

                    $data['recent_posts'] = $this->blogs_model->get_recent_posts($data['post_info']['id']);

                    $data['categories_info'] = $this->blogs_model->get_categories_with_post_count();

                    if ($data['post_info']['featured_image'] != '') {
                        $data['post_info']['featured_image_url'] = base_url() . 'uploads/blogs/post_'.(int)$data['post_info']['id'].'/'.$data['post_info']['featured_image'];
                    }

                    $data['author_info'] = $this->blogs_model->get_author_info($data['post_info']['author_id']);
                    if (isset($data['author_info']) && !empty($data['author_info'])) {
                        $data['author_info']['image_url'] = get_author_image($data['author_info']['avatar']);
                    }

                    $data['page_seo'] = $this->blogs_model->get_seo_info($data['post_info']['id']);
                    $data['canonical_url'] = base_url().'blogs/post/'.$data['post_info']['slug'];
                    // echo "<pre>";print_r($data);die;

                    $this->template->load('blogs/post', 'blogs/post', $data);
                } else {
                    show_404(); 
                }
            }else{
                show_404();
            }
        }else{
           show_404(); 
        }

    }
}