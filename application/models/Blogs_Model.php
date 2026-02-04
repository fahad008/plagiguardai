<?php
class Blogs_Model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function save_category($data)
	{
		$this->db->insert('categories',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function update_category($id,$data)
	{
		if (is_array($data) && !empty($data)) {
			$this->db->where('id', $id);
			$return =  $this->db->update('categories', $data);
			return $return;
		}
		return false;
	}

	public function get_blog_posts($status='')
	{
		$this->db->select("p.*, a.id AS author_id, a.name AS author_name, a.email AS author_email, a.designation AS author_designation, a.avatar AS author_avatar");
		$this->db->from('posts' . ' p');
        $this->db->join('authors' . ' a', 'a.id = p.author_id', 'left');
		if ($status) {
			$this->db->where('p.status', $status);
		}
		$this->db->order_by('p.id', 'DESC');
		return $this->db->get()->result_array();
	}

	public function count_blog_posts($status='')
    {
    	if ($status) {
    		$this->db->where('status', $status);
    	}
        return $this->db->count_all_results('posts');
    }

	public function count_blogs_categories()
	{
	    return $this->db->count_all_results('categories');
	}

	public function get_category_datatable($start, $length, $search)
	{
	    $this->db->select('*');
	    $this->db->from('categories');

	    if (!empty($search)) {
	        $this->db->group_start();
	        $this->db->like('name', $search);
	        $this->db->or_like('slug', $search);
	        $this->db->group_end();
	    }

	    $this->db->order_by('id', 'ASC');

	    if ($length != -1) {
	        $this->db->limit($length, $start);
	    }

	    $query = $this->db->get();
	    // echo $this->db->last_query(); die;
	    return $query->result();
	}

	public function get_category_info($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('categories');
		$this->db->where('categories.id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array();
		}else{
			return false;
		}
	}

	public function get_all_categories()
	{
		$query = $this->db->select('*');
		$query = $this->db->from('categories');
		$this->db->where('status', '1');
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function save_author($data)
	{
		$this->db->insert('authors',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function update_author($id,$data)
	{
		if (is_array($data) && !empty($data)) {
			$this->db->where('id', $id);
			$return =  $this->db->update('authors', $data);
			return $return;
		}
		return false;
	}

 	public function fetch_authors($limit = 6, $offset = 0)
	{
	    $this->db->select('a.*, 
	        (SELECT COUNT(*) FROM posts p WHERE p.author_id = a.id) as post_count');
	    $this->db->from('authors a');
	    $this->db->order_by('a.id', 'ASC');
	    $this->db->limit($limit, $offset);

	    $query = $this->db->get();
	    return $query->result();
	}


    public function count_authors()
    {
        return $this->db->count_all('authors');
    }

    public function get_author_avatar($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('authors');
		$this->db->where('authors.id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array()['avatar'];
		}else{
			return false;
		}
	}

	public function get_all_authors()
	{
		$query = $this->db->select('*');
		$query = $this->db->from('authors');
		$this->db->where('status', '1');
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_author_info($id = '')
	{
		if ($id) {
			$query = $this->db->select('*');
			$query = $this->db->from('authors');
			$this->db->where('id', $id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->row_array();
			}
		}
		return false;
	}

	public function save_post($data)
	{
		$this->db->insert('posts',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function update_post($id,$data)
	{
		if (is_array($data) && !empty($data)) {
			$this->db->where('id', $id);
			$return =  $this->db->update('posts', $data);
			return $return;
		}
		return false;
	}

	public function get_post_info($post_id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('posts');
		$this->db->where('id', $post_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array()[0];
		}else{
			return false;
		}
	}

	public function get_recent_posts($exclude_id = null, $limit = 5)
	{
	    $this->db->select('id, title, slug, thumbnail, created_at');
	    $this->db->from('posts');

	    $this->db->where('status', 'published');

	    if ($exclude_id) {
	        $this->db->where('id !=', $exclude_id);
	    }

	    $this->db->order_by('created_at', 'DESC');
	    $this->db->limit($limit);

	    return $this->db->get()->result_array();
	}


	public function get_post_thumbnail($post_id) {
        $this->db->select('thumbnail');
        $this->db->from('posts');
        $this->db->where('id', $post_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->thumbnail;
        }
        return null;
    }

    public function get_post_featured_image($post_id) {
        $this->db->select('featured_image');
        $this->db->from('posts');
        $this->db->where('id', $post_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->featured_image;
        }
        return null;
    }

    public function get_catgeory_name($slug) {
        $this->db->select('categories.name');
        $this->db->from('categories');
        $this->db->where('slug', $slug);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->name;
        }
        return null;
    }

    public function get_post_category_name($post_id)
	{
	    $this->db->select('c.name');
	    $this->db->from('post_categories pc');

	    $this->db->join('categories c', 'c.id = pc.category_id', 'left');

	    $this->db->where('pc.post_id', $post_id);
	    $this->db->order_by('pc.post_id', 'DESC');

	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return $query->row()->name;
	    }

	    return null;
	}


    public function get_post_by_slug($slug) {
        $this->db->where('slug', $slug);
        $query = $this->db->get('posts');

        if ($query->num_rows() > 0) {
            return $query->result_array()[0]; // return single row as array
        }

        return false; // not found
    }

    public function get_posts_by_category_slug($slug, $limit = null, $offset = 0)
	{
	    $this->db->select('
	        p.*,
	        c.id as category_id,
	        c.name as category_name,
	        c.slug as category_slug,
	        a.id as author_id,
	        a.name as author_name,
	        a.email as author_email,
	        a.avatar as author_avatar
	    ');

	    $this->db->from('posts p');

	    // relations
	    $this->db->join('post_categories pc', 'pc.post_id = p.id');
	    $this->db->join('categories c', 'c.id = pc.category_id');
	    $this->db->join('authors a', 'a.id = p.author_id', 'left');

	    $this->db->where('c.slug', $slug);
	    $this->db->where('p.status', 'published');

	    $this->db->group_by('p.id');
	    $this->db->order_by('p.created_at', 'DESC');

	    if ($limit) {
	        $this->db->limit($limit, $offset);
	    }

	    return $this->db->get()->result_array();
	}

	public function get_posts_list($limit = null, $offset = 0)
	{
	    $this->db->select('
	        p.*,
	        c.id as category_id,
	        c.name as category_name,
	        c.slug as category_slug,
	        a.id as author_id,
	        a.name as author_name,
	        a.email as author_email,
	        a.avatar as author_avatar
	    ');

	    $this->db->from('posts p');

	    $this->db->join('post_categories pc', 'pc.post_id = p.id', 'left');
	    $this->db->join('categories c', 'c.id = pc.category_id', 'left');
	    $this->db->join('authors a', 'a.id = p.author_id', 'left');

	    $this->db->where('p.status', 'published');

	    $this->db->group_by('p.id');
	    $this->db->order_by('p.published_at', 'DESC');

	    if ($limit) {
	        $this->db->limit($limit, $offset);
	    }

	    return $this->db->get()->result_array();
	}

	public function has_seo($post_id)
	{
	    return $this->db
	        ->where('post_id', $post_id)
	        ->count_all_results('post_seo') > 0;
	}


	public function save_post_categories($data)
	{
		$this->db->insert('post_categories',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function delete_post_categories($post_id) {
        // Ensure post_id is not empty
        if (empty($post_id)) return false;

        $this->db->where('post_id', $post_id);
        return $this->db->delete('post_categories');
    }

    public function get_post_categories($post_id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('post_categories');
		$this->db->where('post_id', $post_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$post_categories = $query->result_array();
			return $ids = array_column($post_categories, 'category_id');
		}else{
			return false;
		}
	}

    public function save_post_seo($data)
	{
		$this->db->insert('post_seo',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function update_post_seo($post_id,$data)
	{
		if (is_array($data) && !empty($data)) {
			$this->db->where('post_id', $post_id);
			$return =  $this->db->update('post_seo', $data);
			return $return;
		}
		return false;
	}

	public function get_seo_info($post_id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('post_seo');
		$this->db->where('post_id', $post_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$post_seo = $query->row_array();
			$decoded_keywords = json_decode($post_seo['meta_keywords'], true);
			$decoded_tags = json_decode($post_seo['tags'], true);
			$loosen_keywords = array_column($decoded_keywords, 'value');
			$post_seo['tags'] = array_column($decoded_tags, 'value');
			$post_seo['meta_keywords'] = implode(',', $loosen_keywords);
			return $post_seo;
		}else{
			return false;
		}
	}

	public function slug_exists($slug, $exclude_id = null) {
        $this->db->where('slug', $slug);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        $query = $this->db->get('posts');
        return $query->num_rows() > 0;
    }

    public function get_slug($post_id) {
        $this->db->select('slug');
        $this->db->from('posts');
        $this->db->where('id', $post_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->slug;
        }
        return null;
    }

    // show count if admin is logged in or not

    public function get_categories_with_post_count_works_but_complicated()
	{
	    $this->db->select('
	        c.id,
	        c.name,
	        c.slug,
	        COUNT(DISTINCT 
	            CASE 
	                WHEN ' . ($this->session->userdata('admin_logged_in') ? '1=1' : 'p.status = "published"') . '
	                THEN pc.post_id 
	            END
	        ) AS post_count
	    ', false);

	    $this->db->from('categories c');

	    $this->db->join('post_categories pc', 'pc.category_id = c.id', 'left');
	    $this->db->join('posts p', 'p.id = pc.post_id', 'left');

	    $this->db->where('c.status', '1');

	    $this->db->group_by('c.id');
	    $this->db->order_by('c.name', 'ASC');

	    return $this->db->get()->result_array();
	}

	public function get_categories_with_post_count()
	{
	    $this->db->select('c.id, c.name, c.slug, COUNT(DISTINCT pc.post_id) AS post_count');
	    $this->db->from('categories c');
	    $this->db->join('post_categories pc', 'pc.category_id = c.id', 'left');
	    $this->db->join('posts p', 'p.id = pc.post_id', 'left');
	    $this->db->where('c.status', '1');

	    $this->db->group_by('c.id');

	    $this->db->order_by('post_count', 'DESC');

	    return $this->db->get()->result_array();
	}






}
