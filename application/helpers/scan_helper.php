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

function countWords($text) {
    // 1. Check empty or whitespace-only
    if (!$text || trim($text) === '') {
        return 0;
    }

    // 2. Remove URLs
    $text = preg_replace('#\b(?:https?://|www\.)\S+\b#i', '', $text);

    // 3. Match tokens: words or consecutive dots
    preg_match_all("/[a-zA-Z0-9']+|\.{2,}/", $text, $matches);

    // 4. Return number of tokens
    return count($matches[0] ?? []);
}

function calculateCredits($words, $blockLength = 100) {
    if ($words < $blockLength) {
        return 0; // Less than BLOCK_LENGTH → 0 credits
    }

    if ($words === $blockLength) {
        return 2; // Exactly BLOCK_LENGTH → 2 credits
    }

    // 101+ words: each BLOCK_LENGTH after first adds 2 credits
    return 2 + floor(($words - 1) / $blockLength) * 2;
}

