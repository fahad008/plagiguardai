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
				return $query->row_array();
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
		$this->db->where('customer_scans.status', 'completed');
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
				return $query->row_array();
			}
		}
		return false;
	}

	public function get_scan_count($customer_id)
	{
		$this->db->select('*');
		$this->db->from('customer_scans');
		$this->db->where('customer_scans.status', 'completed');
		$this->db->where('customer_scans.customer_id', $customer_id);
		return $this->db->get()->num_rows();
	}

	public function get_pending_scan_count($customer_id)
	{
		$this->db->select('*');
		$this->db->from('customer_scans');
		$this->db->where('customer_scans.status', 'pending');
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

    private function bulk_scan_base_query($search = '', $month = '', $status = '')
	{
		$customer_id  = $this->session->userdata('logged_in_customer')['id'];

	    $this->db->from('customer_scans cs');

	    $this->db->join('customer_uploads cu', 'cu.id = cs.customer_uploads_id', 'left');

	    $this->db->where('cs.customer_id', $customer_id);
	    // Search
	    if (!empty($search)) {
	        $this->db->like('cs.title', $search);
	    }

	    // Month
	    if (!empty($month)) {
	        $monthNum = str_pad((int)$month, 2, '0', STR_PAD_LEFT);
	        $currentYear = date('Y');

	        $this->db->where('DATE_FORMAT(cs.created_at, "%Y-%m") =', $currentYear . '-' . $monthNum);
	    }

	    // Status
	    if (!empty($status)) {
	        $this->db->where('cs.status', $status);
	    }
	}

	private function completed_scan_base_query($search = '', $month = '', $status = '')
	{
		$customer_id  = $this->session->userdata('logged_in_customer')['id'];

	    $this->db->from('customer_scans cs');

	    $this->db->join('customer_uploads cu', 'cu.id = cs.customer_uploads_id', 'left');

	    $this->db->where('cs.customer_id', $customer_id);

	    $this->db->where('cs.status', 'completed');
	    // Search
	    if (!empty($search)) {
	        $this->db->like('cs.title', $search);
	    }

	    // Month
	    if (!empty($month)) {
	        $monthNum = str_pad((int)$month, 2, '0', STR_PAD_LEFT);
	        $currentYear = date('Y');

	        $this->db->where('DATE_FORMAT(cs.created_at, "%Y-%m") =', $currentYear . '-' . $monthNum);
	    }

	    // Status
	    if (!empty($status)) {
	        $this->db->where('cs.status', $status);
	    }
	}


    public function get_bulk_scan_datatable($start, $length, $search = '', $month = '', $status = '')
	{
	    $this->db->select('
	        cs.*,
	        cu.id as upload_id,
	        cu.original_name,
	        cu.formatted_file,
	        cu.created_at as upload_created_at
	    ');

	    $this->bulk_scan_base_query($search, $month, $status);

	    // priority sort
	    $this->db->order_by("cs.status = 'pending'", 'DESC', false);
	    $this->db->order_by('cs.id', 'DESC');

	    if ($length != -1) {
	        $this->db->limit($length, $start);
	    }
	    return $this->db->get()->result();
	}

	public function get_completed_scan_datatable($start, $length, $search = '', $month = '', $status = '')
	{
	    $this->db->select('
	        cs.*,
	        cu.id as upload_id,
	        cu.original_name,
	        cu.formatted_file,
	        cu.created_at as upload_created_at
	    ');

	    $this->completed_scan_base_query($search, $month, $status);

	    $this->db->order_by('cs.id', 'DESC');

	    if ($length != -1) {
	        $this->db->limit($length, $start);
	    }
	    return $this->db->get()->result();
	}


	public function count_bulk_scan_filtered($search, $month = '', $status = '')
	{
	    $this->bulk_scan_base_query($search, $month, $status);

	    return $this->db->count_all_results();
	}

	public function count_completed_scan_filtered($search, $month = '', $status = '')
	{
	    $this->completed_scan_base_query($search, $month, $status);

	    return $this->db->count_all_results();
	}

	public function count_bulk_scan_all()
	{
	    $customer_id = $this->session->userdata('logged_in_customer')['id'];

	    $this->db->where('customer_id', $customer_id);

	    return $this->db->count_all_results('customer_scans');
	}

	public function count_completed_scan()
	{
	    $customer_id = $this->session->userdata('logged_in_customer')['id'];

	    $this->db->where('status', 'completed');
	    $this->db->where('customer_id', $customer_id);

	    return $this->db->count_all_results('customer_scans');
	}

	public function get_que_limit($customer_id)
	{
		$this->db->select('p.queue_limit');
		$this->db->from('customer_subscriptions cs');
		$this->db->join('plans p', 'cs.plan_id = p.id');
		$this->db->where('cs.customer_id', $customer_id);
		$query = $this->db->get();

		return $queue_limit = $query->row()->queue_limit ?? 0;
	}

	public function get_scan_uploads($scan_id)
	{
		$this->db->select('cs.id as scan_id, cs.customer_id as customer_id, cu.id as customer_uploads_id, cu.formatted_file');
		$this->db->from('customer_scans cs');
		$this->db->join('customer_uploads cu', 'cs.customer_uploads_id = cu.id', 'left');
		$this->db->where('cs.id', $scan_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array();
		}else{
			return false;
		}
	}

	public function delete_customer_uploads($customer_uploads_id)
	{
		$this->db->select('*');
		$this->db->from('customer_uploads');
		$this->db->where('id', $customer_uploads_id);
		$query = $this->db->get();
		if($query->num_rows() >0)
		{
			$this->db->where('id',$customer_uploads_id); 
			$this->db->delete('customer_uploads'); 
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete_customer_scans($scan_id)
	{
		$this->db->select('*');
		$this->db->from('customer_scans');
		$this->db->where('id', $scan_id);
		$query = $this->db->get();
		if($query->num_rows() >0)
		{
			$this->db->where('id',$scan_id); 
			$this->db->delete('customer_scans'); 
			return true;
		}
		else
		{
			return false;
		}
	}





}
