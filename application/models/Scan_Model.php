<?php
class Scan_Model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function save_scan($data)
	{
		$this->db->insert('customer_scans',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function update_scan($id,$data)
	{
		$this->db->where('id', $id);
		$return =  $this->db->update('customer_scans', $data);
		return $return;
	}

	public function get_scans($id='')
	{
		if ($id) {
			$query = $this->db->select('*');
			$query = $this->db->from('customer_scans');
			$this->db->where('customer_scans.id', $id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array()[0];
			}
		}
		return false;
	}

	public function get_scan_originality($customer_id)
	{
	    $this->db->select('customer_scans.id, customer_scans.public_link, customer_scans.created_at');
	    $this->db->from('customer_scans');
	    $this->db->where('customer_scans.customer_id', $customer_id);
	    $this->db->order_by('id', 'DESC');
	    $this->db->limit(10);

	    $query = $this->db->get();
	    return $query->result_array();
	}



	public function get_customer_scans($customer_id='')
	{
		if ($customer_id) {
			$query = $this->db->select('*');
			$query = $this->db->from('customer_scans');
			$this->db->where('customer_scans.customer_id', $customer_id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();
			}
		}
		return false;
	}

	public function get_limited_customer_scans($customer_id, $rowperpage=0, $rowno=0)
	{
		$this->db->select('*');
		$this->db->from('customer_scans');
		// $this->db->where('customer_scans.status', 'completed');
		$this->db->where('customer_scans.customer_id', $customer_id);
		$this->db->limit($rowperpage, $rowno);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		if($query->num_rows() >0){
			return $query->result_array();
		}
		return false;
	}

	public function get_last_scan()
	{
		$customer_id  = $this->session->userdata('logged_in_customer')['id'];
	    $query = $this->db
	        ->select('*')
	        ->from('customer_scans')
	        ->where('customer_id', $customer_id)
	        ->where('status', 'completed')
	        ->order_by('id', 'DESC')
	        ->limit(1)
	        ->get();

	    if ($query->num_rows() > 0) {
	        return $query->row_array();
	    }

	    return false;
	}


	public function get_scan_file($customer_uploads_id='')
	{
		if ($customer_uploads_id) {
			$query = $this->db->select('*');
			$query = $this->db->from('customer_uploads');
			$this->db->where('customer_uploads.id', $customer_uploads_id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array()[0];
			}
		}
		return false;
	}

	public function get_scan_count($customer_id)
	{
		$this->db->select('*');
		$this->db->from('customer_scans');
		// $this->db->where('customer_scans.status', 'completed');
		$this->db->where('customer_scans.customer_id', $customer_id);
		return $this->db->get()->num_rows();
	}

	public function get_classification_scan($id)
	{
		$query = $this->db->select('customer_scans.id, customer_scans.ai_classification, customer_scans.title, customer_scans.created_at');
		$query = $this->db->from('customer_scans');
		$this->db->where('customer_scans.id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array()[0];
		}else{
			return 0;
		}
	}

	public function get_confidence_scan($id)
	{
		$query = $this->db->select('customer_scans.id, customer_scans.ai_confidence, customer_scans.title, customer_scans.created_at');
		$query = $this->db->from('customer_scans');
		$this->db->where('customer_scans.id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array()[0];
		}else{
			return 0;
		}
	}

	public function get_plagiarism_scan($id)
	{
		$query = $this->db->select('customer_scans.id, customer_scans.plagiarism_score, customer_scans.title, customer_scans.created_at');
		$query = $this->db->from('customer_scans');
		$this->db->where('customer_scans.id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array()[0];
		}else{
			return 0;
		}
	}

	public function get_scans_to_expire()
	{
	    $today = date('Y-m-d');

	    $query = $this->db
	        ->select('
	            customer_scans.id,
	            customer_scans.customer_id,
	            customer_scans.customer_uploads_id,
	            customer_scans.status,
	            customer_uploads.formatted_file
	        ')
	        ->from('customer_scans')
	        ->join('customer_uploads', 'customer_uploads.id = customer_scans.customer_uploads_id', 'left')
	        ->where('customer_scans.status', 'completed')
	        ->where('customer_scans.expire_at >=', $today . ' 00:00:00')
	        ->where('customer_scans.expire_at <',  date('Y-m-d', strtotime('+1 day')) . ' 00:00:00')
	        ->order_by('customer_scans.id', 'DESC')
	        ->get();

	    return $query->result_array();
	}

	public function set_status($id, $status)
	{
	    $this->db->set('status', $status);
	    $this->db->where('id', $id);
	    return $this->db->update('customer_scans');
	}

    public function get_pending_jobs($limit = 5)
    {
        return $this->db
            ->where('status', 'pending')
            ->order_by('created_at', 'ASC')
            ->limit($limit)
            ->get('customer_scans')
            ->result();
    }

}
