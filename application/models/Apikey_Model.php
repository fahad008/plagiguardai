<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apikey_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get next available key (round-robin)
     */
    public function getActiveKey()
    {
        $key = $this->db
            ->where('status', 'active')
            ->order_by('last_used_at', 'ASC')
            ->limit(1)
            ->get('api_keys')
            ->row();

        if ($key) {
            // update last used timestamp
            $this->db->where('id', $key->id)->update('api_keys', [
                'last_used_at' => date('Y-m-d H:i:s')
            ]);
        }

        return $key;
    }

    /**
     * Mark key exhausted
     */
    public function markExhausted($id, $reason = null)
    {
        $data = ['status' => 'exhausted', 'last_used_at' => date('Y-m-d H:i:s')];
        if ($reason) $data['note'] = $reason;

        $this->db->where('id', $id)->update('api_keys', $data);
    }

    /**
     * Disable key manually
     */
    public function disable($id, $reason = null)
    {
        $data = ['status' => 'disabled'];
        if ($reason) $data['note'] = $reason;

        $this->db->where('id', $id)->update('api_keys', $data);
    }

    /**
     * Reactivate key
     */
    public function reactivate($id)
    {
        $this->db->where('id', $id)->update('api_keys', ['status' => 'active']);
    }

    /**
     * Reset exhausted keys
     */
    public function resetExhaustedKeys()
    {
        $this->db->where('status', 'exhausted')->update('api_keys', ['status' => 'active']);
    }

    public function countActiveKeys()
	{
	    return $this->db->where('status', 'active')->count_all_results('api_keys');
	}

	public function set_credits($key_id, $credits)
	{
	    $this->db->set('credits_remaining', $credits);
	    $this->db->where('id', $key_id);
	    return $this->db->update('api_keys');
	}

    public function getAllKeys()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('api_keys');
        $query = $this->db->get();
        // echo $this->db->last_query(); die;
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function get_api_Key($id='')
    {
        if ($id) {
            $query = $this->db->select('*');
            $query = $this->db->from('api_keys');
            $query = $this->db->where('id', $id);
            $query = $this->db->get();
            // echo $this->db->last_query(); die;
            if($query->num_rows() > 0){
                return $query->row_array();
            }
        }
        return false;
    }

    public function duplicate_key_check($api_key, $api_key_id='')
    {
        $this->db->select('*');
        $this->db->from('api_keys');
        $this->db->where('api_key', $api_key);
        if (!empty($api_key_id)) {
            $this->db->where('id !=', $api_key_id);
        }
        return $this->db->count_all_results() > 0;
    }

    public function save_key($data)
    {
        $this->db->insert('api_keys',$data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
    }

    public function update_key($id, $data)
    {
        if (is_array($data) && !empty($data)) {
            $this->db->where('id', $id);
            $return =  $this->db->update('api_keys', $data);
            return $return;
        }
        return false;
    }
}