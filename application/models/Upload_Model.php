<?php
class Upload_Model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function save_uploads($data)
	{
		$this->db->insert('customer_uploads',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function update_uploads($id,$data)
	{
		$this->db->where('id', $id);
		$return =  $this->db->update('customer_uploads', $data);
		return $return;
	}

	public function get_formatted_file($id='')
	{
		if ($id) {
			$query = $this->db->select('*');
			$query = $this->db->from('customer_uploads');
			$this->db->where('customer_uploads.id', $id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->row()->formatted_file;
			}
		}
		return false;
	}
}
