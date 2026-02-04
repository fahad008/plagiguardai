<?php
class Plan_Model extends CI_Model{

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function save_plan($data)
	{
		$this->db->insert('plans',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function update_plan($id,$data)
	{
		if (is_array($data) && !empty($data)) {
			$this->db->where('id', $id);
			$return =  $this->db->update('plans', $data);
			return $return;
		}
		return false;
	}

	public function get_plans()
	{
		$query = $this->db->select('*');
		$query = $this->db->from('plans');
		$query = $this->db->get();
        // echo $this->db->last_query(); die;
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_plans_by_duration($duration='30', $limit='3')
	{
		$query = $this->db->select('*');
		$query = $this->db->from('plans');
		$query = $this->db->where('duration', $duration);
		$query = $this->db->where('status', '1');
		$this->db->order_by('credits', 'desc');
		$this->db->limit($limit);
		$query = $this->db->get();
        // echo $this->db->last_query(); die;
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function get_plan($id='')
	{
		if ($id) {
			$query = $this->db->select('*');
			$query = $this->db->from('plans');
			$query = $this->db->where('id', $id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array()[0];
			}
		}
		return false;
	}
}
