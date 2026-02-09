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

	public function save_credit_transactions($data)
	{
		$this->db->insert('credit_transactions',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function update_customer_credits($customer_id,$data)
	{
		$this->db->where('customer_id', $customer_id);
		$return =  $this->db->update('customer_credits', $data);
		return $return;
	}

	public function get_customer_credits_count($customer_id)
	{
		return $this->db
        ->select_sum('remaining_credits')
        ->where('customer_id', $customer_id)
        ->where('expire_at >=', date('Y-m-d'))
        ->get('customer_credits')
        ->row()
        ->remaining_credits ?? 0;
	}

	public function get_customer_credits($customer_id)
	{
	    return $this->db
	        ->select_sum('cc.remaining_credits')
	        ->from('customer_credits cc')
	        ->join('customer_subscriptions cs', 'cs.id = cc.subscription_id')
	        ->where('cc.customer_id', $customer_id)
	        ->where('cc.expire_at >=', date('Y-m-d'))
	        ->where('cs.status', 'active')
	        ->get()
	        ->row()
	        ->remaining_credits ?? 0;
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

	public function get_inactive_subscription($customer_id='')
	{
		if ($customer_id) {
			$query = $this->db->select('*');
			$query = $this->db->from('customer_subscriptions');
			$query = $this->db->where('customer_subscriptions.customer_id', $customer_id);
			$query = $this->db->where('customer_subscriptions.status', 'inactive');
			$query = $this->db->order_by('id', 'DESC');
			$query = $this->db->get();
			 // echo $this->db->last_query(); die;
			if($query->num_rows() > 0){
				return $query->row_array();
			}
		}
		return false;
	}

	public function get_subscription_info($id='')
	{
		if ($id) {
			$query = $this->db->select('*');
			$query = $this->db->from('customer_subscriptions');
			$query = $this->db->where('customer_subscriptions.id', $id);
			$query = $this->db->get();
			 // echo $this->db->last_query(); die;
			if($query->num_rows() > 0){
				return $query->row_array();
			}
		}
		return false;
	}

	public function get_subscription_status($customer_id='')
	{
		if ($customer_id) {
			$query = $this->db->select('customer_subscriptions.status');
			$query = $this->db->from('customer_subscriptions');
			$query = $this->db->where('customer_subscriptions.customer_id', $customer_id);
			$query = $this->db->order_by('id', 'DESC');
			$query = $this->db->get();
			 // echo $this->db->last_query(); die;
			if($query->num_rows() > 0){
				return $query->row_array()['status'];
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

	public function deduct($customer_id, $amount = 1)
	{
	    $batches = $this->db
	        ->where('customer_id', $customer_id)
	        ->where('remaining_credits >', 0)
	        ->where('expire_at >=', date('Y-m-d'))
	        ->order_by('expire_at', 'ASC') // FIFO
	        ->get('customer_credits')
	        ->result();

	    $need = $amount;

	    foreach ($batches as $row)
	    {
	        if ($need <= 0) break;

	        $use = min($row->remaining_credits, $need);

	        $this->db->where('id', $row->id)->update('customer_credits', [
	            'remaining_credits' => $row->remaining_credits - $use
	        ]);

	        $this->db->insert('credit_transactions', [
	            'customer_id' => $customer_id,
	            'credits_id' => $row->id,
	            'type' => 'use',
	            'amount' => $use
	        ]);

	        $need -= $use;
	    }

	    return $need == 0;
	}

	public function topup($customer_id, $subscription_id, $admin_id, $credits, $expiry_days = 30)
	{
	    $expire_at = date('Y-m-d', strtotime("+$expiry_days days"));

	    $this->db->insert('customer_credits', [
	        'admin_id' => $admin_id,
	        'customer_id' => $customer_id,
	        'subscription_id' => $subscription_id,
	        'remaining_credits' => $credits,
	        'expire_at' => $expire_at
	    ]);

	    $credits_id = $this->db->insert_id();

	    $this->db->insert('credit_transactions', [
	        'customer_id' => $customer_id,
	        'credits_id' => $credits_id,
	        'type' => 'add',
	        'amount' => $credits
	    ]);

	    return $credits_id;
	}





}
