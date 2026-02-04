<?php
class Pages_model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_queries($status= 'pending')
	{
		$query = $this->db->select('*');
		$query = $this->db->from('contact_us');
		$query = $this->db->where('status', $status);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_query($id)
	{
		$query = $this->db->select('*');
		$query = $this->db->from('contact_us');
		$query = $this->db->where('id', $id);
		$query = $this->db->get();
        // echo $this->db->last_query(); die;
		if($query->num_rows() > 0){
			return $query->result_array()[0];
		}else{
			return false;
		}
	}

	public function save_contact_query($data)
	{
		$this->db->insert('contact_us',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function update_contact_query($id,$data)
	{
		if (is_array($data) && !empty($data)) {
			$this->db->where('id', $id);
			$return =  $this->db->update('contact_us', $data);
			return $return;
		}
		return false;
	}

	public function delete_contact_query($id)
	{
	    return $this->db->where('id', $id)->delete('contact_us');
	}


}
