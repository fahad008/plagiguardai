<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_Model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    public function update_settings($id,$data)
    {
        if (is_array($data) && !empty($data)) {
            $this->db->where('id', $id);
            $return =  $this->db->update('settings', $data);
            return $return;
        }
        return false;
    }
    
    public function get_settings($id = 1) {
        $query = $this->db->get_where('settings', ['id' => $id]);
        if($query->num_rows() > 0) {
            $row = $query->row();

            $value = isset($row->value) ? $row->value : null;

            return [
                'id'    => $row->id,
                'min_words'   => $row->min_words,
                'max_words'   => $row->max_words,
                'block_length'   => $row->block_length,
                'credits_per_block'   => $row->credits_per_block,
                'scans_expiry'   => $row->scans_expiry,
                'updated_at'   => $row->updated_at,
            ];
        }
        return null;
    }

    public function get($key) {
        $query = $this->db->get_where('settings', ['key' => $key]);
        if($query->num_rows()) {
            $value = $query->row()->value;
            return is_numeric($value) ? (int)$value : $value;
        }
        return null;
    }

    public function get_scan_expiry_days()
    {
        $this->db->select('settings.scans_expiry');
        $this->db->from('settings');
        $this->db->where('settings.id', '1');
        return $this->db->get()->row('scans_expiry');
    }

}
