<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeyManager {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    /**
     * Get next available key (round robin)
     */
    public function getKey()
    {
        $key = $this->CI->db
            ->where('status', 'active')
            ->order_by('last_used_at', 'ASC')
            ->limit(1)
            ->get('api_keys')
            ->row();

        if (!$key) {
            throw new Exception("No active Originality API keys available");
        }

        // update last used
        $this->CI->db
            ->where('id', $key->id)
            ->update('api_keys', [
                'last_used_at' => date('Y-m-d H:i:s')
            ]);

        return $key;
    }


    /**
     * Mark key exhausted
     */
    public function markExhausted($id)
    {
        $this->CI->db->where('id', $id)->update('api_keys', [
            'status' => 'exhausted'
        ]);
    }


    /**
     * Disable manually
     */
    public function disable($id)
    {
        $this->CI->db->where('id', $id)->update('api_keys', [
            'status' => 'disabled'
        ]);
    }
}