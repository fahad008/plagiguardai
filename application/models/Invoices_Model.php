<?php
class Invoices_Model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function save_invoice($data)
	{
		$this->db->insert('invoices',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function get_invoice($id)
	{
		if ($id) {
			$query = $this->db->select('*');
			$query = $this->db->from('invoices');
			$query = $this->db->where('id', $id);
			$query = $this->db->get();
	        // echo $this->db->last_query(); die;
			if($query->num_rows() > 0){
				return $query->result_array()[0];
			}
		}
		return false;
	}

	public function get_invoices_datatable($customer_id, $start, $length)
	{
	    $this->db->select('*');
	    $this->db->from('invoices');
	    $this->db->where('customer_id', $customer_id);
	    $this->db->order_by('id', 'DESC');

	    if ($length != -1) {
	        $this->db->limit($length, $start);
	    }

	    $query = $this->db->get();
	    // echo $this->db->last_query(); die;
	    return $query->result();
	}

	public function count_all_invoices($customer_id)
	{
	    $this->db->where('customer_id', $customer_id);
	    return $this->db->count_all_results('invoices');
	}

	public function get_reseller_invoices_datatable($reseller_id, $start, $length)
	{
	    $this->db->select('invoices.*, customer.full_name');
	    $this->db->from('invoices');
	    $this->db->join('customer', 'customer.id = invoices.customer_id', 'left');
	    $this->db->where('invoices.reseller_id', $reseller_id);
	    $this->db->order_by('invoices.id', 'DESC');

	    if ($length != -1) {
	        $this->db->limit($length, $start);
	    }

	    $query = $this->db->get();
	    return $query->result();
	}

	public function count_all_reseller_invoices($reseller_id)
	{
	    $this->db->where('reseller_id', $reseller_id);
	    return $this->db->count_all_results('invoices');
	}
}