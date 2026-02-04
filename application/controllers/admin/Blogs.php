<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends Admin_Controller 
{
	function __construct() 
	{
	 	parent::__construct();
	 	
	 	$this->require_role(['super_admin', 'admin']);

        $this->load->model('Admin_Model', 'admin_model');
		$this->load->model('Blogs_Model', 'blogs_model');
		$this->load->helper('country');
		$this->load->helper('blogs');
    } 

	public function index()
	{
		$data = array();
		$data['active'] = 'blogs_list';
		$data['scripts'] = array(
			"0" => 'assets/plugins/custom/datatables/datatables.bundle.js',
			"1" => 'assets/js/custom/apps/blogs/create-blog/main.js',
			"2" => 'assets/js/custom/apps/blogs/create-blog/type.js',
			"3" => 'assets/js/custom/apps/blogs/create-blog/settings.js',
			"4" => 'assets/js/custom/apps/blogs/create-blog/budget.js',
			"5" => 'assets/js/custom/apps/blogs/create-blog/team.js',
			"6" => 'assets/js/custom/apps/blogs/create-blog/targets.js',
			"7" => 'assets/js/custom/apps/blogs/create-blog/files.js',
			"8" => 'assets/js/custom/apps/blogs/create-blog/complete.js',
		);

		$admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
		$data['admin_info']['avatar'] = 'assets/media/avatars/blank.png';
		if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }
        $data['admin_info']['country'] = getCountryByCode('PK');

        $author_list = $this->blogs_model->get_all_authors();
        
        if(isset($author_list) && !empty($author_list)){
        	foreach ($author_list as $key => $author) {
        		$data['author_list'][$key] = $author;
        		$data['author_list'][$key]['avatar'] = get_author_image($author['avatar']);
        	}
        }

        $data['categories_list'] = $this->blogs_model->get_all_categories();
        $data['published_posts'] = $this->blogs_model->get_blog_posts('published');
        $data['published_posts_count'] = $this->blogs_model->count_blog_posts('published');
        $data['completed_posts'] = $this->blogs_model->get_blog_posts('completed');
        $data['completed_posts_count'] = $this->blogs_model->count_blog_posts('completed');
        $data['draft_posts'] = $this->blogs_model->get_blog_posts('draft');
        $data['draft_posts_count'] = $this->blogs_model->count_blog_posts('draft');

		// echo "<pre>";print_r($data);die;
		$this->template->admin_load('frame', 'content/blogs/blogs_list', $data);
	}

	public function pick_an_author(){
    	// echo "<pre>";print_r($this->input->post());die;
		if($this->input->post()){

			$admin_id = $this->session->userdata('admin_id');

			$post_id = $this->input->post('post_id');
			$title = $this->input->post('title');
			$author_id = $this->input->post('author_id');

			if ($this->input->post('slug') != '') {
				$slug = url_title($this->input->post('slug'), '-', TRUE);
			}else{
				$slug = url_title($this->input->post('title'), '-', TRUE);
			}

			if ($post_id) {
				$slug_exists = $this->blogs_model->slug_exists($slug, $post_id);
				if ($slug_exists >= 1) {
					$slug = $slug.'-'.$post_id;
				}
			}

			$data = array(
				'title' => trim($title),
				'author_id' => $author_id,
				'slug' => $slug,
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s'),
			);

			// echo "<pre>";print_r($data);die;

			if ($post_id) {
				$this->blogs_model->update_post($post_id, $data);
			}else{
				$post_id = $this->blogs_model->save_post($data);
			}
			
			if(isset($post_id) && !empty($post_id)){

				$response =  array(
			      "status" => 'success',
			      "post_id" => $post_id,
			      "slug" => $slug,
			    );
			    echo json_encode($response);
				
			}else{

				$response =  array(
			      "status" => 'error',
			      "post_id" => '',
			      "slug" => $slug,
			    );
			    echo json_encode($response);exit();	

			}
		}
	}

	public function upload_thumbnail()
    {
    	// echo "<pre>";print_r($this->input->post());
    	$post_id = $this->input->post('post_id');
    	if (!$post_id) {
    		echo json_encode(array("status" => 'reload', "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'));exit();
    	}
    	// echo "<pre>";print_r($_FILES);die;
    	if ($_FILES) {
    		$file_name = $_FILES['file']['name'];
    		$extension = pathinfo($file_name, PATHINFO_EXTENSION);
			$extension = strtolower($extension);
			$title = pathinfo($file_name, PATHINFO_FILENAME);
			// echo $title;die;

			$upload_to = FCPATH . 'uploads/blogs/post_'.(int)$post_id.'/';

			if (!is_dir($upload_to)) {

			    mkdir($upload_to, 0755, true);

			}

			$file_info = $this->upload_thumb_image($upload_to, $extension);

			if ($file_info['status']) {

				$old_thumb = $this->blogs_model->get_post_thumbnail($post_id);
				if ($old_thumb) {
					$old_path = FCPATH . 'uploads/blogs/post_'.(int)$post_id.'/'.$old_thumb;
			    	if (file_exists($old_path)) {
			    		unlink($old_path);
			    	}
				}

				$update_post = array(
					"thumbnail" => $file_info['file_name'],
					"updated_at" => date('y-m-d H:m:s'),
				);

				$this->blogs_model->update_post($post_id, $update_post);
				

				echo json_encode(array("status" => 'success', "message" => 'Thumbnail is uploaded successfully', "image" => $file_info['file_name']));
				
			}else{
				echo json_encode(array("status" => 'error', "message" => $file_info['message']));
				exit();
			}
    	}else{
    		echo json_encode(array("status" => 'error', "message" => 'Please select a file to continue.'));
			exit();	
    	}

    }

    public function remove_thumbnail()
    {
    	// echo "<pre>";print_r($this->input->post());die;
    	$post_id = $this->input->post('post_id');
    	$image = $this->input->post('file_name');
    	if (!$post_id) {
    		echo json_encode(array("status" => 'reload', "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'));exit();
    	}
    	// echo "<pre>";print_r($_FILES);die;
    	$path = FCPATH . 'uploads/blogs/post_'.(int)$post_id.'/'.$image;
    	if (file_exists($path)) {
    		unlink($path);
    	}
	                        

        $update_post = array(
			"thumbnail" => '',
			"updated_at" => date('y-m-d H:m:s'),
		);

		$this->blogs_model->update_post($post_id, $update_post);

		echo json_encode(array("status" => 'success', "message" => 'Thumbnail is removed successfully'));

    }

	public function blog_details(){
    	// echo "<pre>";print_r($_FILES);die;
    	// echo "<pre>";print_r($this->input->post());die;
    	$post_id = $this->input->post('post_id');
    	if (!$post_id) {
    		echo json_encode(array("status" => 'reload', "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'));exit();
    	}
		if($this->input->post()){

			$admin_id = $this->session->userdata('admin_id');

			$slug = url_title($this->input->post('slug'), '-', TRUE);
			$slug_exists = $this->blogs_model->slug_exists($slug, $post_id);
			if ($slug_exists >= 1) {
				echo json_encode(array("status" => 'error', "message" => 'Please change blog post slug, <b>'.$slug.'</b> already exists'));exit();
			}
			$categories = $this->input->post('categories');

			

			$this->blogs_model->delete_post_categories($post_id);

			foreach ($categories as $key => $category) {
				$insert = ["post_id" => $post_id, "category_id" => $category];
				$this->blogs_model->save_post_categories($insert);
			}

			$data = array(
				'slug' => $slug,
				'excerpt' => $this->input->post('excerpt'),
				'updated_at' => date('y-m-d H:m:s'),
			);

			// echo "<pre>";print_r($data);die;
			
			$this->blogs_model->update_post($post_id, $data);
			
			$response =  array(
		      "status" => 'success',
		      "message" => 'Blog Details updated successfully.',
		    );
		    echo json_encode($response);
		}else{
			echo json_encode(array("status" => 'reload', "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'));exit();
		}
	}

	public function save_seo(){
    	// echo "<pre>";print_r($this->input->post());die;
    	$post_id = $this->input->post('post_id');
    	if (!$post_id) {
    		echo json_encode(array("status" => 'reload', "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'));exit();
    	}
		if($this->input->post()){

			$admin_id = $this->session->userdata('admin_id');
			$post_seo = $this->blogs_model->has_seo($post_id);
			if ($post_seo >= 1) {
				$data = array(
					'meta_title' => $this->input->post('meta_title'),
					'meta_description' => $this->input->post('meta_description'),
					'meta_keywords' => $this->input->post('meta_keywords'),
					'tags' => $this->input->post('target_tags'),
				);

				$this->blogs_model->update_post_seo($post_id, $data);
			}else{

				$data = array(
					'post_id' => $post_id,
					'meta_title' => $this->input->post('meta_title'),
					'meta_description' => $this->input->post('meta_description'),
					'meta_keywords' => $this->input->post('meta_keywords'),
					'tags' => $this->input->post('target_tags'),
				);

				$this->blogs_model->save_post_seo($data);
			}
			
			
			$response =  array(
		      "status" => 'success',
		      "message" => 'Blog SEO updated successfully.',
		    );
		    echo json_encode($response);
		}
	}

	public function upload_featured_image()
    {
    	// echo "<pre>";print_r($this->input->post());
    	$post_id = $this->input->post('post_id');
    	if (!$post_id) {
    		echo json_encode(array("status" => 'reload', "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'));exit();
    	}
    	// echo "<pre>";print_r($_FILES);die;
    	if ($_FILES) {
    		$file_name = $_FILES['file']['name'];
    		$extension = pathinfo($file_name, PATHINFO_EXTENSION);
			$extension = strtolower($extension);
			$title = pathinfo($file_name, PATHINFO_FILENAME);
			// echo $title;die;

			$upload_to = FCPATH . 'uploads/blogs/post_'.(int)$post_id.'/';

			if (!is_dir($upload_to)) {

			    mkdir($upload_to, 0755, true);

			}

			$file_info = $this->upload_featured_image_toServer($upload_to, $extension);

			if ($file_info['status']) {

				$old_image = $this->blogs_model->get_post_featured_image($post_id);
				if ($old_image) {
					$old_path = FCPATH . 'uploads/blogs/post_'.(int)$post_id.'/'.$old_image;
			    	if (file_exists($old_path)) {
			    		unlink($old_path);
			    	}
				}

				$update_post = array(
					"featured_image" => $file_info['file_name'],
					"updated_at" => date('y-m-d H:m:s'),
				);

				$this->blogs_model->update_post($post_id, $update_post);

				echo json_encode(array("status" => 'success', "message" => 'Featured image is uploaded successfully', "image" => $file_info['file_name']));
				
			}else{
				echo json_encode(array("status" => 'error', "message" => $file_info['message']));
				exit();
			}
    	}else{
    		echo json_encode(array("status" => 'error', "message" => 'Please select a file to continue.'));
			exit();	
    	}

    }

    public function remove_featured_image()
    {
    	// echo "<pre>";print_r($this->input->post());die;
    	$post_id = $this->input->post('post_id');
    	$image = $this->input->post('file_name');
    	if (!$post_id) {
    		echo json_encode(array("status" => 'reload', "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'));exit();
    	}
    	// echo "<pre>";print_r($_FILES);die;
    	$path = FCPATH . 'uploads/blogs/post_'.(int)$post_id.'/'.$image;
    	if (file_exists($path)) {
    		unlink($path);
    	}
	                        

        $update_post = array(
			"featured_image" => '',
			"updated_at" => date('y-m-d H:m:s'),
		);

		$this->blogs_model->update_post($post_id, $update_post);

		echo json_encode(array("status" => 'success', "message" => 'Featured image is removed successfully'));

    }

    public function complete_blog(){
    	// echo "<pre>";print_r($this->input->post());die;
    	$post_id = $this->input->post('post_id');
    	if (!$post_id) {
    		echo json_encode(array("status" => 'reload', "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'));exit();
    	}
		if($this->input->post()){

			$admin_id = $this->session->userdata('admin_id');

			$slug = url_title($this->input->post('slug'), '-', TRUE);

			$data = array(
				'content' => $this->input->post('content'),
				"status" => 'completed',
				'updated_at' => date('y-m-d H:m:s'),
			);

			// echo "<pre>";print_r($data);die;
			
			$this->blogs_model->update_post($post_id, $data);
			$slug = $this->blogs_model->get_slug($post_id);
			
			$response =  array(
		      "status" => 'success',
		      "message" => 'Blog completed successfully.',
		      "view" => base_url().'blogs/post/'.$slug,
		    );
		    echo json_encode($response);
		}else{
			echo json_encode(array("status" => 'reload', "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'));exit();
		}
	}

    private function upload_thumb_image($upload_path, $extension){

		$this->load->library('image_lib');

	  	$date = date('dmYHis');
	  	$fileName = 'thumb_'.$date.'.'.$extension;
	  	$config = array(
	   		'upload_path'   => $upload_path,
	   		'allowed_types' => 'jpg|png',
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

	private function upload_featured_image_toServer($upload_path, $extension){

		$this->load->library('image_lib');

	  	$date = date('dmYHis');
	  	$fileName = 'fea_'.$date.'.'.$extension;
	  	$config = array(
	   		'upload_path'   => $upload_path,
	   		'allowed_types' => 'jpg|png',
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

	public function publish(){
		// echo "<pre>";print_r($this->input->post());die;
		if ($this->input->post()) {
			$post_id = $this->input->post('blog_id');
			$post_info = $this->blogs_model->get_post_info($post_id);
			// echo "<pre>";print_r($post_info);die;
			if (isset($post_info) && !empty($post_info)) {
				if ($post_info['author_id'] != '') {
					if ($post_info['thumbnail'] != '') {
						$post_seo = $this->blogs_model->has_seo($post_id);
						if ($post_seo >= 1) {
							if ($post_info['featured_image'] != '') {

								$update_post = array(
									"status" => 'published',
									"published_at" => date('y-m-d H:m:s'),
								);

								$this->blogs_model->update_post($post_id, $update_post);

								$response =  array(
							      "status" => 'success',
							      "message" => 'Blog has been published successfully'
							    );
							    echo json_encode($response);	
							}else{

								$update_post = array(
									"status" => 'draft',
								);

								$this->blogs_model->update_post($post_id, $update_post);

								$response =  array(
							      "status" => 'error',
							      "message" => 'Blog post is incomplete, Please complete <b>Upload Featured image</b> form'
							    );
							    echo json_encode($response);exit();
							}
						}else{

							$update_post = array(
									"status" => 'draft',
								);

							$this->blogs_model->update_post($post_id, $update_post);

							$response =  array(
						      "status" => 'error',
						      "message" => 'Blog post is incomplete, Please complete <b>Save SEO</b> form'
						    );
						    echo json_encode($response);exit();
						}
					}else{

						$update_post = array(
							"status" => 'draft',
						);

						$this->blogs_model->update_post($post_id, $update_post);

						$response =  array(
					      "status" => 'error',
					      "message" => 'Blog post is incomplete, Please complete <b>Blog Details</b> form'
					    );
					    echo json_encode($response);exit();
					}
				}else{

					$update_post = array(
							"status" => 'draft',
						);

						$this->blogs_model->update_post($post_id, $update_post);

						$response =  array(
					      "status" => 'error',
					      "message" => 'Blog post is incomplete, Please complete <b>Pick an Author</b> form'
					    );
					    echo json_encode($response);exit();
					}
			}else{
				$response =  array(
			      "status" => 'error',
			      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
			    );
			    echo json_encode($response);exit();	
			}
		}else{
			$response =  array(
		      "status" => 'error',
		      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
		    );
		    echo json_encode($response);exit();	
		}
	}

	public function archive(){
		// echo "<pre>";print_r($this->input->post());die;
		if ($this->input->post()) {
			$post_id = $this->input->post('blog_id');
			$update_post = array(
				"status" => 'archive',
				"published_at" => '',
			);

			$this->blogs_model->update_post($post_id, $update_post);

			$response =  array(
		      "status" => 'success',
		      "message" => 'Blog has been archived successfully'
		    );
		    echo json_encode($response);
		}else{
			$response =  array(
		      "status" => 'error',
		      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
		    );
		    echo json_encode($response);exit();	
		}
	}

	public function blog_update_wizard(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;
        	$data = [];
        	$data['step'] = 'Pick-an-Author';
        	$data['to_start'] = 1;
        	$data['author_info'] = '';
        	$author_list = $this->blogs_model->get_all_authors();
        
	        if(isset($author_list) && !empty($author_list)){
	        	foreach ($author_list as $key => $author) {
	        		$data['author_list'][$key] = $author;
	        		$data['author_list'][$key]['avatar'] = get_author_image($author['avatar']);
	        	}
	        }

	        $data['categories_list'] = $this->blogs_model->get_all_categories();

        	$post_id = $this->input->post('post_id');
			$data['post_info'] = $this->blogs_model->get_post_info($post_id);
			
			if (isset($data['post_info']) && !empty($data['post_info'])) {
				$data['author_info'] = $this->blogs_model->get_author_info($data['post_info']['author_id']);

				if ($data['post_info']['content'] == '') {
					$data['to_start'] = 4;
					$data['step'] = 'Upload-Featured-image';
				}

				$data['seo_info'] = $this->blogs_model->get_seo_info($data['post_info']['id']);
				// echo "<pre>";print_r($data['seo_info']);die;
				if (empty($data['seo_info'])) {
					$data['to_start'] = 3;
					$data['step'] = 'Save-SEO';
				}else{

				    // Tags
				    if (!empty($data['seo_info']['tags'])) {
			            $data['seo_info']['tags'] = implode(',', $data['seo_info']['tags']);
				    }
				}

				$data['post_categories'] = $this->blogs_model->get_post_categories($data['post_info']['id']);
				if ($data['post_info']['excerpt'] == '') {
					$data['to_start'] = 2;
					$data['step'] = 'Blog-Details';
				}

				if ($data['post_info']['thumbnail'] != '') {
					$thumbnail_path = FCPATH . 'uploads/blogs/post_'.(int)$data['post_info']['id'].'/'.$data['post_info']['thumbnail'];
					if (file_exists($thumbnail_path)) {
						$data['post_info']['thumbnail'] = base_url().'uploads/blogs/post_'.(int)$data['post_info']['id'].'/'.$data['post_info']['thumbnail'];
					}
				}
				
				if ($data['post_info']['featured_image'] != '') {
					$featured_path = FCPATH . 'uploads/blogs/post_'.(int)$data['post_info']['id'].'/'.$data['post_info']['featured_image'];
					if (file_exists($featured_path)) {
						$data['post_info']['featured_image'] = base_url().'uploads/blogs/post_'.(int)$data['post_info']['id'].'/'.$data['post_info']['featured_image'];
					}
				}

				if ($data['step'] == '') {
					$data['to_start'] = 5;
					$data['step'] = 'Completed';
				}
				
				// $data['to_start'] = 3;
				// echo "<pre>";print_r($data);die;
		        $view_to_pass = $this->load->view('admin/chunks/update_blog',$data,TRUE);
		        $response =  array(
		          "status" => 'success', "html" => $view_to_pass, "start" => $data['to_start']
		        );
		        echo json_encode($response);
		        exit();
			}else{
				$response =  array(
			      "status" => 'error',
			      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
			    );
			    echo json_encode($response);exit();	
			}
	        
        	
        }else{
			$response =  array(
		      "status" => 'error',
		      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
		    );
		    echo json_encode($response);exit();	
		}
    }

    public function blog_add_wizard(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;
        	$data = [];
        	$data['step'] = '';
        	$data['to_start'] = 1;
        	$data['author_info'] = 'Pick-an-Author';
        	$author_list = $this->blogs_model->get_all_authors();
        
	        if(isset($author_list) && !empty($author_list)){
	        	foreach ($author_list as $key => $author) {
	        		$data['author_list'][$key] = $author;
	        		$data['author_list'][$key]['avatar'] = get_author_image($author['avatar']);
	        	}
	        }

	        $data['categories_list'] = $this->blogs_model->get_all_categories();

        	$view_to_pass = $this->load->view('admin/chunks/update_blog',$data,TRUE);
	        $response =  array(
	          "status" => 'success', "html" => $view_to_pass, "start" => $data['to_start']
	        );
	        echo json_encode($response);
	        exit();
        	
        }else{
			$response =  array(
		      "status" => 'error',
		      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
		    );
		    echo json_encode($response);exit();	
		}
    }

	public function category()
	{
		$data = array();
		$data['active'] = 'blogs_category';
		$data['scripts'] = array(
                "0" => 'assets/plugins/custom/datatables/datatables.bundle.js',
                "1" => 'assets/js/custom/apps/blogs/categories/list/table.js',
                "2" => 'assets/js/custom/apps/blogs/categories/list/add.js',
            );

		$admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
		$data['admin_info']['avatar'] = 'assets/media/avatars/blank.png';
		if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }
        $data['admin_info']['country'] = getCountryByCode('PK');
		// echo "<pre>";print_r($data);die;
		$this->template->admin_load('frame', 'content/blogs/category_list', $data);
	}

	public function add_category(){
    	// echo "<pre>";print_r($this->input->post());die;
		if($this->input->post()){

			$admin_id = $this->session->userdata('admin_id');

			$post_slug = $this->input->post('slug');

            if ($post_slug != '') {
            	$slug = url_title($this->input->post('slug'), '-', TRUE);
            }else{
            	$slug = url_title($this->input->post('name'), '-', TRUE);
            }

			$data = array(
				'creator_id' => $admin_id,
				'name' => trim($this->input->post('name')),
				'slug' => $slug,
				'status' => $this->input->post('status'),
				'description' => $this->input->post('description'),
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s'),
			);
			

			$category_id = $this->blogs_model->save_category($data);
			
			if(isset($category_id) && !empty($category_id)){

				$response =  array(
			      "status" => 'success',
			      "message" => 'Category has been added successfully.',
			    );
			    echo json_encode($response);
				
			}else{

				$response =  array(
			      "status" => 'error',
			      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
			    );
			    echo json_encode($response);exit();	

			}
		}
	}

	public function ajax_category()
    {
        // echo "<pre>";print_r($this->input->post());die;
        $draw = intval($this->input->post('draw'));
        $start = intval($this->input->post('start'));
        $length = intval($this->input->post('length'));
        $search = $this->input->post('search')['value'] ?? '';

        $list = $this->blogs_model->get_category_datatable($start, $length, $search);
        // echo "<pre>";print_r($list);die;
        $total = $this->blogs_model->count_blogs_categories();
        // echo "<pre>";print_r($total);die;

        $data = [];
        foreach ($list as $category) {

        	$admin_info = $this->admin_model->get_admin($category->creator_id);

            $avatar = 'assets/media/avatars/blank.png';
            $admin_view_url = base_url('admin/management/view/'.$admin_info['id']);

            $admin_role = '';
            if ($admin_info['role_id'] == 1) {
            	$admin_role = 'Super Admin';
            }else if($admin_info['role_id'] == 3){
            	$admin_role = 'Reseller';
            }else{
            	$admin_role = 'Admin';
            }

            if ($admin_info['profile_picture']) {
                $avatar_path = FCPATH . 'uploads/avatar/admin/'.$admin_info['profile_picture'];
                if (file_exists($avatar_path)) {
                    $avatar = base_url() . 'uploads/avatar/admin/'.$admin_info['profile_picture'];
                    $member = '<div class="d-flex align-items-center">
									<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
										<a href="'.$admin_view_url.'">
											<div class="symbol-label">
												<img src="'.$avatar.'" alt="'.$admin_info['full_name'].'" class="w-100" />
											</div>
										</a>
									</div>
									<div class="d-flex flex-column">
										<a href="'.$admin_view_url.'" class="text-gray-800 text-hover-primary mb-1" id="admin_name">'.$admin_info['full_name'].'</a>
										<span>'.$admin_info['email'].'</span>
										<div class="badge badge-light-Silver fw-bolder">'.$admin_role.'</div>
									</div>
								</div>';
                }else{
                	$firstLetter = strtoupper(substr(trim($admin_info->first_name), 0, 1));
                	$member = '<div class="d-flex align-items-center">
									<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
										<a href="'.$admin_view_url.'">
											<div class="symbol-label fs-3 bg-light-danger text-danger">'.$firstLetter.'</div>
										</a>
									</div>
									<div class="d-flex flex-column">
										<a href="'.$admin_view_url.'" class="text-gray-800 text-hover-primary mb-1" id="admin_name">'.$admin_info['full_name'].'</a>
										<span>'.$admin_info['email'].'</span>
										<div class="badge badge-light-Silver fw-bolder">'.$admin_role.'</div>
									</div>
								</div>';
                }
            }else{
            	$firstLetter = strtoupper(substr(trim($admin_info->first_name), 0, 1));
            	$member = '<div class="d-flex align-items-center">
									<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
										<a href="'.$admin_view_url.'">
											<div class="symbol-label fs-3 bg-light-danger text-danger">'.$firstLetter.'</div>
										</a>
									</div>
									<div class="d-flex flex-column">
										<a href="'.$admin_view_url.'" class="text-gray-800 text-hover-primary mb-1" id="admin_name">'.$admin_info['full_name'].'</a>
										<span>'.$admin_info['email'].'</span>
										<div class="badge badge-light-Silver fw-bolder">'.$admin_role.'</div>
									</div>
								</div>';
            }

            

            $category_status = '';
            if ($category->status == 1) {
            	$category_status = '<div class="badge badge-light-success fw-bolder">Enabled</div>';
            	$status_link = '<a href="javascript: void(0)" class="menu-link px-3" onclick="change_status(this)" data-id="'.$category->id.'" data-status="0">Disable</a>';
            }else{
            	$category_status = '<div class="badge badge-light-danger fw-bolder">Disabled</div>';
            	$status_link = '<a href="javascript: void(0)" class="menu-link px-3" onclick="change_status(this)" data-id="'.$category->id.'" data-status="1">Enable</a>';
            }

            $data[] = [

                'name' => $category->name,

                'slug' => $category->slug,

                'status' => $category_status,

                'created_by' => $member,

                'created_at' => date('d M Y', strtotime($category->created_at)),

                'actions' => '
                    <div class="text-end">
						<a href="javascript: void(0)" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
						<span class="svg-icon svg-icon-5 m-0">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon--></a>
						<!--begin::Menu-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a onclick="view_category(this)" data-id="'.$category->id.'" class="menu-link px-3">View</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								'.$status_link.'
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu-->
					</div>
                '
            ];
        }


        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode([
             'draw' => $draw,
             'recordsTotal' => $total,
             'recordsFiltered' => $total,
             'data' => $data
        ], JSON_UNESCAPED_UNICODE));

    return;

}
	
	public function get_category(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;
        	$category_info = $this->blogs_model->get_category_info($this->input->post('category_id'));
        	// echo "<pre>";print_r($category_info);die;
	        $response =  array(
	          "status" => 'success', "category_info" => $category_info
	        );
	        echo json_encode($response);
        }else{

			$response =  array(
		      "status" => 'error',
		      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
		    );
		    echo json_encode($response);exit();	

		}
    }

    public function change_category_status(){
    	// echo "<pre>";print_r($this->input->post());die;
		if($this->input->post()){

			$category_id = $this->input->post('category_id');
			$category_status = $this->input->post('category_status');
			if ($category_status == '1') {
				$data = array(
					"status" => '1',
					'updated_at' => date('y-m-d H:m:s')
				);
				$message = 'Category has been enabled successfully.';
			}else{
				$data = array(
					"status" => '0',
					'updated_at' => date('y-m-d H:m:s')
				);
				$message = 'Category has been enabled successfully.';
			}
			
			$result = $this->blogs_model->update_category($category_id, $data);

			if ($result === true) {
				$response =  array(
			      "status" => 'success',
			      "message" => $message
			    );
			    echo json_encode($response);
			}else{
				$response =  array(
			      "status" => 'error',
			      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
			    );
			    echo json_encode($response);exit();	
			}
			
		}else{
			$response =  array(
		      "status" => 'error',
		      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
		    );
		    echo json_encode($response);exit();	
		}
	}

	public function authors()
	{
		$data = array();
		$data['active'] = 'blogs_author';
		$data['scripts'] = array(
                "0" => 'assets/js/custom/apps/blogs/authors/list.js',
                "1" => 'assets/js/custom/apps/blogs/authors/add.js',
            );

		$admin_id = $this->session->userdata('admin_id');
        $data['admin_info'] = $this->admin_model->get_admin($admin_id);
        $data['role_info'] = $this->admin_model->get_role_info($data['admin_info']['role_id']);
		$data['admin_info']['avatar'] = 'assets/media/avatars/blank.png';
		if (is_array($data['admin_info']) && !empty($data['admin_info']) && $data['admin_info']['profile_picture'] != '') {
            $avatar_path = FCPATH . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            if (file_exists($avatar_path)) {
                $data['admin_info']['avatar'] = base_url() . 'uploads/avatar/admin/'.$data['admin_info']['profile_picture'];
            }
        }
        $data['admin_info']['country'] = getCountryByCode('PK');
		// echo "<pre>";print_r($data);die;
		$this->template->admin_load('frame', 'content/blogs/authors_list', $data);
	}

	public function add_author(){
    	// echo "<pre>";print_r($_FILES);print_r($this->input->post());die;
		if($this->input->post()){

			$admin_id = $this->session->userdata('admin_id');

			$data = array(
				'creator_id' => $admin_id,
				'name' => trim($this->input->post('name')),
				'email' => trim($this->input->post('email')),
				'status' => $this->input->post('status'),
				'bio' => $this->input->post('bio'),
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s'),
			);
			

			$author_id = $this->blogs_model->save_author($data);
			
			if(isset($author_id) && !empty($author_id)){

				if (isset($_FILES['avatar']) && $_FILES['avatar']['name'] != '') {
                
	                $file_name = $_FILES['avatar']['name'];
	                $extension = pathinfo($file_name, PATHINFO_EXTENSION);
	                $extension = strtolower($extension);    
	                $upload_to = FCPATH . 'uploads/avatar/authors/';

	                if (!is_dir($upload_to)) {

	                    mkdir($upload_to, 0755, true);

	                }

	                $file_info = $this->upload_file($upload_to, $extension);
	                // echo "<pre>";print_r($file_info);die;
	                if ($file_info['status']) {

	                    $old_avatar = $this->blogs_model->get_author_avatar($author_id);
	                    if ($old_avatar) {
	                        $old_avatar_path = FCPATH . 'uploads/avatar/authors/'.$old_avatar;
	                        unlink($old_avatar_path);
	                    }
	                    
	                    $avatar_info = array(
	                        "avatar" => $file_info['file_name'],
	                        'updated_at' => date('y-m-d H:m:s')
	                    );
	                    $this->blogs_model->update_author($author_id, $avatar_info);
	                }
	            }else if ($this->input->post('avatar_remove')) {
	                $old_avatar = $this->blogs_model->get_author_avatar($author_id);
	                if ($old_avatar) {
	                    $old_avatar_path = FCPATH . 'uploads/avatar/authors/'.$old_avatar;
	                    unlink($old_avatar_path);
	                }
	                
	                $avatar_info = array(
	                    "avatar" => '',
	                    'updated_at' => date('y-m-d H:m:s')
	                );
	                $this->blogs_model->update_author($author_id, $avatar_info);
	            }

				$response =  array(
			      "status" => 'success',
			      "message" => 'Author has been added successfully.',
			    );
			    echo json_encode($response);
				
			}else{
				$response =  array(
			      "status" => 'error',
			      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
			    );
			    echo json_encode($response);exit();	
			}
		}else{
			$response =  array(
		      "status" => 'error',
		      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
		    );
		    echo json_encode($response);exit();	
		}
	}

	private function upload_file($upload_path, $extension){

        $this->load->library('image_lib');

        $admin_id = $this->session->userdata('admin_id');
        $date = date('dmYHis');
        $fileName = $date.'_'.$admin_id.'.'.$extension;
        $config = array(
            'upload_path'   => $upload_path,
            'allowed_types' => 'png|jpg|jpeg',
            'max_size' => 5000,
            'file_name' => $fileName,                     
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('avatar')) {
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

	public function get_authors(){
        if($this->input->post()){
        	// echo "<pre>";print_r($this->input->post());die;
        	$data = [];
        	$offset = $this->input->post('offset');
        	$limit = $this->input->post('limit');

        	$authors_info = $this->blogs_model->fetch_authors($limit, $offset);
        	// echo "<pre>";print_r($authors_info);die;
	        if (isset($authors_info) && !empty($authors_info)) {
			    foreach ($authors_info as $key => $author) {
			        if (!empty($author->avatar)) {
			            $avatar_path = FCPATH . 'uploads/avatar/authors/' . $author->avatar;

			            if (file_exists($avatar_path)) {
			                $authors_info[$key]->avatar = base_url('uploads/avatar/authors/' . $author->avatar);
			            } else {
			                $authors_info[$key]->avatar = '';
			            }
			        } else {
			            $authors_info[$key]->avatar = '';
			        }
			    }
			}
	        $data['authors_info'] = $authors_info;
	        $fetched_count = count($authors_info);
	        $total_count = $this->blogs_model->count_authors();
	        $has_more = ($offset + $fetched_count) < $total_count;
        	// echo "<pre>";print_r($data);die;
	        $view_to_pass = $this->load->view('admin/chunks/authors_cards',$data,TRUE);
	        $response =  array(
	          "status" => 'success', "html" => $view_to_pass, "has_more" => $has_more
	        );
	        echo json_encode($response);
	        exit();
        }
    }

    public function change_author_status(){
    	// echo "<pre>";print_r($this->input->post());die;
		if($this->input->post()){

			$author_id = $this->input->post('author_id');
			$author_status = $this->input->post('author_status');
			if ($author_status == '1') {
				$data = array(
					"status" => '1',
					'updated_at' => date('y-m-d H:m:s')
				);
				$message = 'Author has been activated successfully.';
			}else{
				$data = array(
					"status" => '0',
					'updated_at' => date('y-m-d H:m:s')
				);
				$message = 'Author has been deactivated successfully.';
			}
			
			$result = $this->blogs_model->update_author($author_id, $data);

			if ($result === true) {
				$response =  array(
			      "status" => 'success',
			      "message" => $message
			    );
			    echo json_encode($response);
			}else{
				$response =  array(
			      "status" => 'error',
			      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
			    );
			    echo json_encode($response);exit();	
			}
			
		}else{
			$response =  array(
		      "status" => 'error',
		      "message" => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!'
		    );
		    echo json_encode($response);exit();	
		}
	}
}