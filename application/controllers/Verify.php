<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Verify extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
        $this->load->model('Authentication_Model', 'authentication_model');
        $this->load->library('url_encrypt');
	}


	public function index()
    {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            // echo "<pre>";print_r($token);die;

            if (!$this->session->userdata('logged_in_customer')) {
                $redirect = base_url().'login';
            }else{
                $redirect = base_url().'member/profile/';
            }
            if ($token != '') {

                $encrypted = base64_decode($token);

                // Decrypt
                $json_payload = $this->encryption->decrypt($encrypted);

                if ($json_payload === false) {
                    $this->session->set_flashdata('error', 'Invalid or expired token.');
                    redirect($redirect);
                }

                $decoded = json_decode($json_payload, true);

                // echo "<pre>";print_r($decoded);die;

                if (is_array($decoded) && !empty($decoded)) {
                    
                    if (array_key_exists('id', $decoded) && $decoded['id'] != '') {
                        $db_token = $this->authentication_model->verify_customer($decoded['id'], $decoded['email']);
                        if (isset($db_token) && $db_token != '') {
                            if ($db_token == $token) {

                                $verify_info = [
                                    "email_verified" => 'yes',
                                    "verify_link" => '',
                                    "updated_at" => date('y-m-d H:m:s')
                                ];

                                $this->authentication_model->update_customer($decoded['id'], $verify_info);

                                $this->session->set_flashdata('success', 'Your email has been successfully verified.');
                                redirect($redirect);

                            }else{
                                $this->session->set_flashdata('error', 'Token does not match, Please try again.');
                                redirect($redirect);
                            }
                        }else{
                            $this->session->set_flashdata('error', 'Token has expired, Please try again.');
                            redirect($redirect);
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Token does not match, Please try again.');
                        redirect($redirect);
                    }
                }else{
                    $this->session->set_flashdata('error', 'Token does not match, Please try again.');
                    redirect($redirect);
                }
            }else{
                $this->session->set_flashdata('error', 'Token not found.');
                redirect($redirect);
            }
        }else{
            $this->session->set_flashdata('error', 'Token not found.');
            redirect($redirect);
        }
    }
}