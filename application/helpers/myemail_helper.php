<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('send_email')) {

    function send_email($to, $subject, $message, $type = 'admin')
    {
        $CI =& get_instance();
        $CI->load->library('email');

        // Sender Mapping
        $senders = [
            'admin'   => 'admin@plagiguardai.com',
            'info'    => 'info@plagiguardai.com',
            'sales'   => 'sales@plagiguardai.com',
            'support' => 'support@plagiguardai.com'
        ];

        $from_email = isset($senders[$type]) ? $senders[$type] : $senders['admin'];

        $CI->email->clear(true);

        $CI->email->from($from_email, 'PlagiGuardAI');
        $CI->email->to($to);
        $CI->email->subject($subject);
        $CI->email->message($message);

        if ($CI->email->send()) {
            return true;
        } else {
            // log_message('error', $CI->email->print_debugger());
            return $CI->email->print_debugger();
        }
    }
}