<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OriginalityClient {

    protected $CI;
    protected $keyManager;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('KeyManager');
        $this->keyManager = $this->CI->keymanager;
    }

    public function scanText($text)
    {
        $key = $this->keyManager->getKey();

        $headers = [
            "X-API-KEY: {$key->api_key}",
            "Content-Type: application/json"
        ];

        $payload = json_encode([
            "content" => $text
        ]);

        $ch = curl_init("https://api.originality.ai/api/v1/scan");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => $headers
        ]);

        $response = curl_exec($ch);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        // credits finished or payment required
        if ($status == 402 || $status == 429) {
            $this->keyManager->markExhausted($key->id);
            throw new Exception("API key exhausted. Retrying with another key.");
        }

        return json_decode($response, true);
    }
}