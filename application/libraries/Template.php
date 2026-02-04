<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function load($layout, $view, $data = [])
    {
        // Pass $data to inner view
        $data['content'] = $this->CI->load->view($view, $data, TRUE);

        // Pass SAME $data to layout
        $this->CI->load->view($layout, $data);
    }

    public function admin_load($layout, $view, $data = [])
    {
        // TRUE returns the view as a string into the 'content' variable
        $data['content'] = $this->CI->load->view('admin/'.$view, $data, TRUE);

        // Loads the main layout and injects the $data (including $content)
        $this->CI->load->view('admin/'.$layout, $data);
    }
}
