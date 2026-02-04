<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function extract_file_text($filePath)
{
    if (!file_exists($filePath)) {
        return ["status" => 'error', "message" =>  'Unable to fetch uploaded file.'];
    }

    try {
        $text = file_get_contents($filePath);
        $text = trim($text);              
        $text = preg_replace('/\s+/', ' ', $text);
        $text = text_cleaner($text);
        if ($text) {
            return ["status" => 'success', "text" => $text];
        }else{
            return ["status" => 'error', "message" => 'No text found from uploaded file.'];
        }
    } catch (Exception $e) {
        return ["status" => 'error', "message" =>  $e->getMessage()];
    }
}