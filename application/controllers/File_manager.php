<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class File_manager extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in_customer')) {
            if ($this->input->is_ajax_request()) {
                // For AJAX, return JSON or proper HTTP code
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Session expired, please login again'
                ]);
                exit; // stop further execution
            } else {
                // Normal page request
                redirect(base_url().'login/');
            }
        }
		
		$this->load->helper('pdf');
		// $this->load->helper('docs');
		$this->load->helper('text');
		$this->load->library('docx_reader');
		$this->load->model('Subscription_Model', 'subscription_model');
		$this->load->model('Scan_Model', 'scan_model');
		$this->load->model('Upload_Model', 'upload_model');
		$this->load->model('Settings_Model', 'settings_model');
		$this->load->helper('download');
		$this->load->helper('scan');
		$this->load->helper('string');
	}


	public function index()
    {
    	$customer_id  = $this->session->userdata('logged_in_customer')['id'];
    	$customer_credits = $this->subscription_model->get_customer_credits($customer_id);
    	if ($customer_credits <= 0) {
    		echo json_encode(array("status" => 'error', "message" => 'No credits left. Contact your reseller to upgrade.'));
			exit();
    	}
    	// echo "<pre>";print_r($_FILES);die;
    	if ($_FILES) {
    		$file_name = $_FILES['file']['name'];
    		$extension = pathinfo($file_name, PATHINFO_EXTENSION);
			$extension = strtolower($extension);
			$title = pathinfo($file_name, PATHINFO_FILENAME);
			// echo $title;die;

    		// if (in_array($extension, ['doc', 'docx'])) {
    		if (in_array($extension, ['docx'])) {

    			$upload_to = FCPATH . 'uploads/customer/docs/';

    			if (!is_dir($upload_to)) {

				    mkdir($upload_to, 0755, true);

				}

				$file_info = $this->upload_file($upload_to, $extension);

				if ($file_info['status']) {

					$extraction_response = $this->docx_reader->extract_text($file_info['full_path']);

					if ($extraction_response['status'] == 'success' ) {

						$expiry_time = get_expiry();

						$save_file = array(
							"customer_id" => $customer_id,
							"file_type" => $extension,
							"file_name" => $file_info['file_name'],
							"original_name" => $file_info['client_name'],
							"expiry_time" => $expiry_time,
							"created_at" => date('y-m-d H:m:s'),
						);

						$customer_uploads_id = $this->upload_model->save_uploads($save_file);

						if ($customer_uploads_id) {
							$unlink_original = FCPATH . 'uploads/customer/docs/'.$file_info['file_name'];
							unlink($unlink_original);
						}

						echo json_encode(array("status" => 'success', "message" => 'Your file text is ready. Click ‘Scan’ to continue.', "text" => $extraction_response['text'], "title" => $title, "customer_uploads_id" => $customer_uploads_id));

					}else{
						
						echo json_encode(array("status" => 'error', "message" => $extraction_response['message']));
						exit();
					}
					
				}else{
					echo json_encode(array("status" => 'error', "message" => $file_info['message']));
					exit();
				}
				
    		}elseif ($extension == 'txt') {

    			$upload_to = FCPATH . 'uploads/customer/text/';

    			if (!is_dir($upload_to)) {

				    mkdir($upload_to, 0755, true);

				}

				$file_info = $this->upload_file($upload_to, $extension);
				if ($file_info['status']) {

					$extraction_response = extract_file_text($file_info['full_path']);
					
					if ($extraction_response['status'] == 'success') {

						$expiry_time = get_expiry();

						$save_file = array(
							"customer_id" => $customer_id,
							"file_type" => $extension,
							"file_name" => $file_info['file_name'],
							"original_name" => $file_info['client_name'],
							"expiry_time" => $expiry_time,
							"created_at" => date('y-m-d H:m:s'),
						);

						$customer_uploads_id = $this->upload_model->save_uploads($save_file);

						if ($customer_uploads_id) {
							$unlink_original = FCPATH . 'uploads/customer/text/'.$file_info['file_name'];
							unlink($unlink_original);
						}

						echo json_encode(array("status" => 'success', "message" => 'Your file text is ready. Click ‘Scan’ to continue.', "text" => $extraction_response['text'], "title" => $title, "customer_uploads_id" => $customer_uploads_id));
					}else{
						echo json_encode(array("status" => 'error', "message" => $extraction_response['message']));
					}
				}else{
					echo json_encode(array("status" => 'error', "message" => $file_info['message']));
					exit();	
				}

    		}else{
    			echo json_encode(array("status" => 'error', "message" => 'Please upload a TXT or DOCX file to proceed.'));
				exit();
    		}
    	}else{
    		echo json_encode(array("status" => 'error', "message" => 'Please select a file to continue.'));
			exit();	
    	}

    }

    private function upload_file($upload_path, $extension){

		$this->load->library('image_lib');

	  	$customer_id  = $this->session->userdata('logged_in_customer')['id'];
	  	$date = date('dmYHis');
	  	$fileName = $date.'_'.$customer_id.'.'.$extension;
	  	$config = array(
	   		'upload_path'   => $upload_path,
	   		'allowed_types' => 'doc|docx|txt',
	   		'max_size' => 5000,
	   		'file_name' => $fileName,                     
	 	);
	  	$this->load->library('upload', $config);
	  	$this->upload->initialize($config);

	  	if ($this->upload->do_upload('file')) {
	  		$result = array();
	  		$result = $this->upload->data();
	  		$result['status'] = true; 
	    	return $result;
	  	}else{
	  		$result = array(
	  			"status" => false,
	  			"message" => strip_tags($this->upload->display_errors()),
	  		);
	    	return $result;

	  	}
	}

	public function download_old()
	{
		$customer_id  = $this->session->userdata('logged_in_customer')['id'];
		if (isset($_GET['n']) && $_GET['n'] != '') {
			$file_name = $_GET['n'];
		}
		if (isset($_GET['e']) && $_GET['e'] != '') {
			$extension = $_GET['e'];
		}

		if ($extension == 'docx') {
			$path = FCPATH . 'uploads/docs/customer_'.(int)$customer_id.'/'.$file_name;
		}

		if ($extension == 'txt') {
			$path = FCPATH . 'uploads/text/customer_'.(int)$customer_id.'/'.$file_name;
		}
	    

	    if (!file_exists($path)) {
	        show_404();
	    }

	    header('Content-Description: File Transfer');
	    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	    header('Content-Disposition: attachment; filename="' . basename($path) . '"');
	    header('Content-Length: ' . filesize($path));
	    header('Pragma: public');
	    readfile($path);
	    exit;
	}

	public function download($uploads_id='')
	{
		if ($uploads_id) {
			$file_info = $this->scan_model->get_scan_file($uploads_id);
			if (isset($file_info) && !empty($file_info)) {
				// echo "D:\wamp64\www\plagiguardai\uploads\scans <br>";
				$path = FCPATH . 'uploads/scans/customer_' . $file_info['customer_id'].'/'.$file_info['formatted_file'];
				if (!file_exists($path)) {
	        		show_404();
	    		}else{
	    			
	    			if ($file_info['original_name'] != '') {
	    				$name = pathinfo($file_info['original_name'], PATHINFO_FILENAME);
	    			}else{
	    				$name = pathinfo($file_info['formatted_file'], PATHINFO_FILENAME);
	    			}
	    			

	    			force_download($name.'.txt', file_get_contents($path), TRUE);
	    		}
			}
		}
	}

	public function bulk_uploads()
    {
    	$customer_id  = $this->session->userdata('logged_in_customer')['id'];
    	$pending_scans = $this->scan_model->get_pending_scan_count($customer_id);
    	$que_limit = $this->scan_model->get_que_limit($customer_id);
    	if ($pending_scans >= $que_limit) {
    		echo json_encode(array("status" => 'que_limit', "message" => 'Your upload queue is full. You can add more files once your current uploads have finished scanning.'));
			exit();
    	}
    	
    	if ($_FILES) {
    		$file_name = $_FILES['file']['name'];
    		$extension = pathinfo($file_name, PATHINFO_EXTENSION);
			$extension = strtolower($extension);
			$title = pathinfo($file_name, PATHINFO_FILENAME);

			
	    	$customer_credits = $this->subscription_model->get_customer_credits($customer_id);
	    	if ($customer_credits <= 0) {
	    		echo json_encode(array("status" => 'error', "message" => 'No credits left. Contact your reseller to upgrade.', "file_name" => $file_name));
				exit();
	    	}
			// echo $title;die;

    		// if (in_array($extension, ['doc', 'docx'])) {
    		if (in_array($extension, ['docx'])) {

    			$upload_to = FCPATH . 'uploads/customer/docs/';

    			if (!is_dir($upload_to)) {

				    mkdir($upload_to, 0755, true);

				}

				$file_info = $this->upload_file($upload_to, $extension);

				if ($file_info['status']) {

					$extraction_response = $this->docx_reader->extract_text($file_info['full_path']);

					if ($extraction_response['status'] == 'success' ) {

						$word_count = countWords($extraction_response['text']);
						if ($word_count < 100 || $word_count > 6000) {

							$unlink_original = FCPATH . 'uploads/customer/docs/'.$file_info['file_name'];
							unlink($unlink_original);
							echo json_encode(array("status" => 'error', "message" => 'Word count must be between 100 and 6000 words.', "file_name" => $file_name));
							exit();
							
						}

						$random_number = random_string('numeric', 8);
						$formated_file = save_formatted_content($customer_id, $random_number, $extraction_response['text']);
						$expiry_time = get_expiry();

						$save_file = array(
							"customer_id" => $customer_id,
							"file_type" => $extension,
							"file_name" => $file_info['file_name'],
							"formatted_file" => $formated_file,
							"original_name" => $file_info['client_name'],
							"expiry_time" => $expiry_time,
							"created_at" => date('y-m-d H:m:s'),
						);

						$customer_uploads_id = $this->upload_model->save_uploads($save_file);

						if ($customer_uploads_id) {
							$unlink_original = FCPATH . 'uploads/customer/docs/'.$file_info['file_name'];
							unlink($unlink_original);
						}

						$result = $this->add_uploads_to_que($customer_uploads_id, $customer_id);

						if ($result['status'] == 'success') {
							echo json_encode(array("status" => 'success', "message" => 'File uploaded successfully.', "file_name" => $file_name));
							// echo json_encode(array("status" => 'success', "message" => 'Your content has been successfully queued for scanning. The system will process it shortly, and the results will be available in your dashboard once completed.'));
						}else{
							echo json_encode(array("status" => 'error', "message" => 'We are unable to add your file to scan que, please try again shortly.', "file_name" => $file_name));
						}

					}else{
						
						echo json_encode(array("status" => 'error', "message" => $extraction_response['message'], "file_name" => $file_name));
						exit();
					}
					
				}else{
					echo json_encode(array("status" => 'error', "message" => $file_info['message'], "file_name" => $file_name));
					exit();
				}
				
    		}elseif ($extension == 'txt') {

    			$upload_to = FCPATH . 'uploads/customer/text/';

    			if (!is_dir($upload_to)) {

				    mkdir($upload_to, 0755, true);

				}

				$file_info = $this->upload_file($upload_to, $extension);
				if ($file_info['status']) {

					$extraction_response = extract_file_text($file_info['full_path']);
					
					if ($extraction_response['status'] == 'success') {

						$word_count = countWords($extraction_response['text']);
						if ($word_count < 100 || $word_count > 6000) {

							$unlink_original = FCPATH . 'uploads/customer/text/'.$file_info['file_name'];
							unlink($unlink_original);
							echo json_encode(array("status" => 'error', "message" => 'Word count must be between 100 and 6000 words.', "file_name" => $file_name));
							exit();

						}
						$random_number = random_string('numeric', 8);
						$formated_file = save_formatted_content($customer_id, $random_number, $extraction_response['text']);

						$expiry_time = get_expiry();

						$save_file = array(
							"customer_id" => $customer_id,
							"file_type" => $extension,
							"file_name" => $file_info['file_name'],
							"formatted_file" => $formated_file,
							"original_name" => $file_info['client_name'],
							"expiry_time" => $expiry_time,
							"created_at" => date('y-m-d H:m:s'),
						);

						$customer_uploads_id = $this->upload_model->save_uploads($save_file);

						if ($customer_uploads_id) {
							$unlink_original = FCPATH . 'uploads/customer/text/'.$file_info['file_name'];
							unlink($unlink_original);
						}

						$result = $this->add_uploads_to_que($customer_uploads_id, $customer_id);

						if ($result['status'] == 'success') {
							echo json_encode(array("status" => 'success', "message" => 'File uploaded successfully.', "file_name" => $file_name));
						}else{
							echo json_encode(array("status" => 'error', "message" => 'We are unable to add your file to scan que, please try again shortly.', "file_name" => $file_name));
						}

						
					}else{
						echo json_encode(array("status" => 'error', "message" => $extraction_response['message'], "file_name" => $file_name));
					}
				}else{
					echo json_encode(array("status" => 'error', "message" => $file_info['message'], "file_name" => $file_name));
					exit();	
				}

    		}else{
    			echo json_encode(array("status" => 'error', "message" => 'Please upload a TXT or DOCX file to proceed.', "file_name" => $file_name));
				exit();
    		}
    	}else{
    		echo json_encode(array("status" => 'error', "message" => 'Please select a file to continue.'));
			exit();	
    	}

    }

    private function add_uploads_to_que($uploads_id, $customer_id){

    	$upload_info = $this->upload_model->get_scan_upload($uploads_id);
    	$scan_text = get_scan_text($customer_id, $upload_info['formatted_file']);
    	$word_count = countWords($scan_text);
    	$settings = $this->settings_model->get_settings(1);
    	$estimated_credits = calculateCredits(intval($word_count),intval($settings['block_length']));
        $expire_at = get_scan_expiry_date($settings['scans_expiry']);

        $scan_info = array(
            "customer_id" => $customer_id,
            "customer_uploads_id" => $uploads_id,
            "title" => pathinfo($upload_info['original_name'], PATHINFO_FILENAME),
            "estimated_credits" => $estimated_credits,
            "word_count" => $word_count,
            'expire_at' => $expire_at,
            'status' => 'pending',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        );

        $scan_id = $this->scan_model->save_scan($scan_info);

        if ($scan_id) {
        	$response = ["status" => 'success', "scan_id" => $scan_id];
        }else{
        	$response = ["status" => 'error', "scan_id" => ''];
        }

        return $response;
    }

}