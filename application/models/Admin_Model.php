<?php
class Admin_Model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_admin($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('admin');
		$query = $this->db->where('id', $id);
		$query = $this->db->get();
        // echo $this->db->last_query(); die;
		if($query->num_rows() > 0){
			return $query->result_array()[0];
		}else{
			return false;
		}
	}

	public function email_check($email='')
	{
		if ($email) {
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('email', $email);
			// $this->db->where('role', 'customer');
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return true;
			}
		}
		return false;
	}

	public function admin_email_check($email='')
	{
		if ($email) {
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('email', $email);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return true;
			}
		}
		return false;
	}

	public function duplicate_email_check($email='')
	{
		if ($email) {
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('email', $email);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return true;
			}
		}
		return false;
	}

	public function email_check_reseller($email='')
	{
		if ($email) {
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('email', $email);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return true;
			}
		}
		return false;
	}

	public function password_check($email, $password)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('admin');
		$query = $this->db->where('email', $email);
		$query = $this->db->where('password', $password);
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->result_array()[0];
		else
			return false;
	}

	public function update_admin($id,$data)
	{
		if (is_array($data) && !empty($data)) {
			$this->db->where('id', $id);
			$return =  $this->db->update('admin', $data);
			return $return;
		}
		return false;
	}

	public function save_customer($data)
	{
		$this->db->insert('customer',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function save_admin($data)
	{
		$this->db->insert('admin',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function get_admin_avatar($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('admin');
		$this->db->where('admin.id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array()['profile_picture'];
		}else{
			return false;
		}
	}

	public function get_role($role_id)
	{
	    $this->db->select('admin_roles.name');
	    $this->db->from('admin_roles');
	    $this->db->where('admin_roles.id', $role_id);
	    return $this->db->get()->row('name');
	}

	public function get_role_info($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('admin_roles');
		$this->db->where('admin_roles.id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array();
		}else{
			return false;
		}
	}

	public function get_admin_roles()
	{
		$query = $this->db->select('*');
		$query = $this->db->from('admin_roles');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function count_admin_users($role_id='')
	{
		$adminId = $this->session->userdata('admin_id');
		if ($role_id) {
			$this->db->where('role_id', $role_id);
		}
		$this->db->where('id !=', $adminId);
	    // $this->db->where('status =', '1');
	    return $this->db->count_all_results('admin');
	}

	public function get_rolewise_admin_datatable($start, $length, $search, $role_id='')
	{
		$adminId = $this->session->userdata('admin_id');
	    $this->db->select('*');
	    $this->db->from('admin');

	    // $this->db->where('status =', '1');
	    $this->db->where('id !=', $adminId);

	    if (!empty($search)) {
	        $this->db->group_start();
	        $this->db->like('full_name', $search);
	        $this->db->or_like('email', $search);
	        $this->db->or_like('contact_number', $search);
	        $this->db->group_end();
	    }

	    if (!empty($role_id)) {
	        $this->db->where('role_id', $role_id);
	    }

	    $this->db->order_by('id', 'ASC');

	    if ($length != -1) {
	        $this->db->limit($length, $start);
	    }

	    $query = $this->db->get();
	    // echo $this->db->last_query(); die;
	    return $query->result();
	}

	public function save_contact_query($data)
	{
		$this->db->insert('contact_us',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}


}
