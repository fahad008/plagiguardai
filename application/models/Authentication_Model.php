<?php
class Authentication_Model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function email_check($email='')
	{
		if ($email) {
			$this->db->select('*');
			$this->db->from('customer');
			$this->db->where('email', $email);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return true;
			}
		}
		return false;
	}

	public function save_customer($data)
	{
		$this->db->insert('customer',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function get_customer($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('customer');
		$this->db->where('customer.id', $id);
		$query = $this->db->get();
        // echo $this->db->last_query(); die;
		if($query->num_rows() > 0){
			return $query->result_array()[0];
		}else{
			return false;
		}
	}

	public function password_check($email, $password)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('customer');
		$query = $this->db->where('email', $email);
		$query = $this->db->where('password', $password);
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->result_array()[0];
		else
			return false;
	}

	public function update_customer($id,$data)
	{
		if (is_array($data) && !empty($data)) {
			$this->db->where('id', $id);
			$return =  $this->db->update('customer', $data);
			return $return;
		}
		return false;
	}

}
