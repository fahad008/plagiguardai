<?php
class Reseller_Model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_reseller($id='')
	{
		if ($id) {
			$query = $this->db->select('*');
			$query = $this->db->from('admin');
			$this->db->where('admin.id', $id);
			$this->db->where('deleted_at IS NULL', null, false);
			$query = $this->db->get();
	        // echo $this->db->last_query(); die;
			if($query->num_rows() > 0){
				return $query->result_array()[0];
			}
		}
		return false;
	}

	public function get_reseller_list()
	{
		$query = $this->db->select('*');
		$query = $this->db->from('admin');
		$this->db->where('admin.role_id', 3);
		$this->db->where('admin.status', 1);
		$this->db->where('deleted_at IS NULL', null, false);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		return false;
	}

	public function get_customers_by_reseller_datatable($reseller_id, $start, $length)
	{
	    $this->db->select('customer.*');
	    $this->db->from('customer_reseller');
	    $this->db->join('customer', 'customer.id = customer_reseller.customer_id', 'inner');
	    $this->db->where('customer_reseller.reseller_id', $reseller_id);
	    if ($length != -1) {
	        $this->db->limit($length, $start);
	    }
	    $query = $this->db->get();
	    return $query->result();
	}

	public function count_all_customer_by_reseller($reseller_id)
	{
	    $this->db->from('customer_reseller');
	    $this->db->join('customer', 'customer.id = customer_reseller.customer_id', 'inner');
	    $this->db->where('customer_reseller.reseller_id', $reseller_id);

	    return $this->db->count_all_results();
	}

	public function get_reseller_avatar($id)
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

	public function get_reseller_datatable($start, $length, $search, $month)
	{
	    $this->db->select('*');
	    $this->db->from('admin');

	    $this->db->where('role_id', '3');
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
	    	// $monthNum = date('m', strtotime($month));
			$currentYear = date('Y');
			$this->db->where('DATE_FORMAT(created_at, "%Y-%m") =', $currentYear . '-' . $monthNum);
	    }

	    $this->db->order_by('id', 'DESC');

	    if ($length != -1) {
	        $this->db->limit($length, $start);
	    }

	    $query = $this->db->get();
	    // echo $this->db->last_query(); die;
	    return $query->result();
	}

	public function count_all_resellers()
	{
	    $this->db->where('role_id', '3');
	    $this->db->where('deleted_at IS NULL', null, false);
	    return $this->db->count_all_results('admin');
	}


	public function count_filtered_resellers($search, $month)
	{
	    $this->db->from('admin');
	    $this->db->where('role_id', '3');
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

	public function searchResellers($keyword, $limit = 5)
	{
	    $keyword = trim($keyword);

	    if ($keyword === '') {
	        return [];
	    }

	    $this->db->select('id, full_name, email, profile_picture');
	    $this->db->from('admin');

	    // Only resellers
	    $this->db->where('role_id', '3');
	    $this->db->where('deleted_at IS NULL', null, false);

	    // Search priority: full_name → email
	    $this->db->group_start();
	        $this->db->like('full_name', $keyword);
	        $this->db->or_like('email', $keyword);
	    $this->db->group_end();

	    // Relevance ordering (full_name first)
	    $this->db->order_by("
	        CASE
	            WHEN full_name LIKE '%" . $this->db->escape_like_str($keyword) . "%' THEN 1
	            WHEN email LIKE '%" . $this->db->escape_like_str($keyword) . "%' THEN 2
	            ELSE 3
	        END
	    ", '', false);

	    $this->db->order_by('id', 'DESC');
	    $this->db->limit($limit);

	    return $this->db->get()->result();
	}

}
