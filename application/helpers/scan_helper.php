<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get_scan_text($customer_id, $name='')
{
	$text = '';
	if ($name != '') {
		$file_path = FCPATH . 'uploads/scans/customer_'.(int)$customer_id.'/'.$name;
		if (file_exists($file_path)) {
            $text = file_get_contents($file_path);
            $text = trim($text);
        }
	}
	return $text;
}

function get_scan_expiry_date($days=7)
{
    $str_days = '+'.$days.' days';
    $now = new DateTime(); 
    $now->modify($str_days);
    return $expiry_time = $now->format('y-m-d H:m:s');
}