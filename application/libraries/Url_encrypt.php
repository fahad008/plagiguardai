<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url_encrypt
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('encryption'); // CI3 encryption library
    }

    /**
     * Encode a numeric ID (URL-safe)
     */
    public function encode_id($id)
    {
        $encrypted = $this->CI->encryption->encrypt($id);

        // make URL-safe
        return strtr($encrypted, [
            '+' => '.',
            '=' => '-',
            '/' => '~',
        ]);
    }

    /**
     * Decode a numeric ID (URL-safe)
     */
    public function decode_id($string)
    {
        $decoded = strtr($string, [
            '.' => '+',
            '-' => '=',
            '~' => '/',
        ]);

        return $this->CI->encryption->decrypt($decoded);
    }
}
