<?php
class Subscription_Model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function save_customer_credits($data)
	{
		$this->db->insert('customer_credits',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function update_customer_credits($customer_id,$data)
	{
		$this->db->where('customer_id', $customer_id);
		$return =  $this->db->update('customer_credits', $data);
		return $return;
	}

	public function get_customer_credits($customer_id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('customer_credits');
		$this->db->where('customer_credits.customer_id', $customer_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array()['credits'];
		}else{
			return 0;
		}
	}

	public function check_credits_row($customer_id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('customer_credits');
		$this->db->where('customer_credits.customer_id', $customer_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function save_customer_subscription($data)
	{
		$this->db->insert('customer_subscriptions',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function save_customer_reseller($data)
	{
		$this->db->insert('customer_reseller',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function get_customer_subscription($customer_id='')
	{
		if ($customer_id) {
			$query = $this->db->select('*');
			$query = $this->db->from('customer_subscriptions');
			$query = $this->db->where('customer_subscriptions.customer_id', $customer_id);
			$query = $this->db->where('customer_subscriptions.status', 'active');
			$query = $this->db->order_by('id', 'DESC');
			$query = $this->db->get();
			 // echo $this->db->last_query(); die;
			if($query->num_rows() > 0){
				return $query->result_array()[0];
			}
		}
		return false;
	}

	public function update_customer_reseller($id,$data)
	{
		$this->db->where('id', $id);
		$return =  $this->db->update('customer_reseller', $data);
		return $return;
	}

	public function check_reseller_row($customer_id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('customer_reseller');
		$this->db->where('customer_reseller.customer_id', $customer_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array()['id'];
		}else{
			return false;
		}
	}

	public function get_inactive_subscriptions()
	{
	    $query = $this->db
	        ->select('*')
	        ->from('customer_subscriptions')
	        ->where('status', 'inactive')
	        ->where('start_date <=', date('Y-m-d'))
	        ->order_by('id', 'ASC')
	        ->get();
	        // echo $this->db->last_query(); die;
	    if ($query->num_rows() > 0) {
	        return $query->result_array();
	    }

	    return false;
	}

	public function get_active_subscriptions()
	{
	    $query = $this->db
	        ->select('*')
	        ->from('customer_subscriptions')
	        ->where('status', 'active')
	        ->where('end_date =', date('Y-m-d'))
	        ->order_by('id', 'ASC')
	        ->get();
	        // echo $this->db->last_query(); die;
	    if ($query->num_rows() > 0) {
	        return $query->result_array();
	    }

	    return false;
	}

	public function update_customer_subscription($id,$data)
	{
		$this->db->where('id', $id);
		$return =  $this->db->update('customer_subscriptions', $data);
		return $return;
	}




}
