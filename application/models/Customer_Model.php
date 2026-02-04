<?php
class Customer_Model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_customer($id='')
	{
		if ($id) {
			$query = $this->db->select('*');
			$query = $this->db->from('customer');
			$this->db->where('customer.id', $id);
			$this->db->where('deleted_at IS NULL', null, false);
			$query = $this->db->get();
	        // echo $this->db->last_query(); die;
			if($query->num_rows() > 0){
				return $query->result_array()[0];
			}
		}
		return false;
	}

	public function update_member($id,$data)
	{
		if (is_array($data) && !empty($data)) {
			$this->db->where('id', $id);
			$return =  $this->db->update('customer', $data);
			return $return;
		}
		return false;
	}

	public function get_customer_avatar($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('customer');
		$this->db->where('customer.id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array()['profile_picture'];
		}else{
			return false;
		}
	}

	public function get_customer_email($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('customer');
		$this->db->where('customer.id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array()['email'];
		}else{
			return false;
		}
	}

	public function get_reseller_by_customer_id($customer_id)
	{
	    // Step 1: Get reseller_id from relation table
	    $this->db->select('reseller_id');
	    $this->db->from('customer_reseller');
	    $this->db->where('customer_id', $customer_id);
	    $relation = $this->db->get()->row();

	    if (!$relation) {
	        return null; // No reseller linked
	    }

	    // Step 2: Fetch reseller from customer table
	    $this->db->from('admin');
	    $this->db->where('id', $relation->reseller_id);
	    $this->db->where('role_id', '3');

	    return $this->db->get()->row();
	}


	public function get_all_customers()
	{
		$query = $this->db->select('*');
		$query = $this->db->from('customer');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_customers_datatable($start, $length, $search, $month, $plan_id)
	{
		$admin_role_id = $this->session->userdata('admin_role_id');
	    $this->db->select('*');
	    $this->db->from('customer');

	    if ($admin_role_id == '3') {
	    	$this->db->where('creator_id', $admin_role_id);
	    }
	    $this->db->where('deleted_at IS NULL', null, false);

	    if (!empty($search)) {
	        $this->db->group_start();
	        $this->db->like('full_name', $search);
	        $this->db->or_like('email', $search);
	        $this->db->or_like('contact_number', $search);
	        $this->db->group_end();
	    }


	    if (!empty($month)) {
	    	$monthNum = str_pad((int)$month, 2, '0', STR_PAD_LEFT);
			$currentYear = date('Y');
			$this->db->where('DATE_FORMAT(created_at, "%Y-%m") =', $currentYear . '-' . $monthNum);
	    }

	    if (!empty($plan_id)) {
	        $this->db->where('plan_id', $plan_id);
	    }

	    $this->db->order_by('id', 'DESC');

	    if ($length != -1) {
	        $this->db->limit($length, $start);
	    }

	    $query = $this->db->get();
	    // echo $this->db->last_query(); die;
	    return $query->result();
	}

	public function count_all()
	{
	    $admin_role_id = $this->session->userdata('admin_role_id');
	    if ($admin_role_id == '3') {
	    	$this->db->where('creator_id', $admin_role_id);
	    }
	    $this->db->where('deleted_at IS NULL', null, false);
	    return $this->db->count_all_results('customer');
	}


	public function count_filtered($search, $month, $plan_id)
	{
		$admin_role_id = $this->session->userdata('admin_role_id');
	    
	    $this->db->from('customer');
	    if ($admin_role_id == '3') {
	    	$this->db->where('creator_id', $admin_role_id);
	    }
	    $this->db->where('deleted_at IS NULL', null, false);
	    if (!empty($search)) {
	        $this->db->group_start();
	        $this->db->like('full_name', $search);
	        $this->db->or_like('email', $search);
	        $this->db->or_like('contact_number', $search);
	        $this->db->group_end();
	    }

	    if (!empty($month)) {
	    	$monthNum = str_pad((int)$month, 2, '0', STR_PAD_LEFT);
			$currentYear = date('Y');
			$this->db->where('DATE_FORMAT(created_at, "%Y-%m") =', $currentYear . '-' . $monthNum);
	    }

	    if (!empty($plan_id)) {
	        $this->db->where('plan_id', $plan_id);
	    }
	    return $this->db->count_all_results();
	}

	public function soft_delete($id)
	{
	    $this->db->where('id', $id);
	    return $this->db->update('customer', [
	        'deleted_at' => date('Y-m-d H:m:s')
	    ]);
	}

	public function batch_soft_delete($ids)
	{
	    $this->db->where_in('id', $ids);
	    return $this->db->update('customer', [
	        'deleted_at' => date('Y-m-d H:m:s')
	    ]);
	}






}
