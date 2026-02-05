<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scanner
{
    protected $CI;
    protected $api_url = SCAN_URL;
    protected $balance_api_url = BALANCE_URL;

    public function __construct()
    {
        $this->CI =& get_instance();

        // load KeyManager for multi-key rotation
        $this->CI->load->library('KeyManager');
        $this->CI->load->model('Apikey_Model', 'apikey_model');
    }

    /**
     * Scan content using Originality API with multi-key support
     *
     * @param array $payload
     * @param int $retry
     * @return array
     */
    public function scanContent(array $payload, $estimated_credits, $maxRetries=3, $retry = 0)
    {
        if ($retry >= $maxRetries) {
            throw new Exception("all_api_keys");
        }

        $key = $this->CI->apikey_model->getActiveKey();

        if (!$key) {
            throw new Exception("api_key");
        }

        // echo "<pre>";print_r($key);die;
        // prepare cURL
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $this->api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_HTTPHEADER     => [
                'X-OAI-API-KEY: ' . $key->api_key,
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS     => json_encode($payload)
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            return [
                'api_key' => $key->id,
                'status' => 'CURL',
                'message' => 'cURL Error: ' . $error
            ];
        }

        curl_close($ch);
        // handle key exhausted or rate limited
        if ($httpCode != 200) {
            $this->CI->apikey_model->markExhausted($key->id);
            // $this->CI->keymanager->markExhausted($key->id);

            // retry with next key
            return $this->scanContent($payload, $estimated_credits, $maxRetries, $retry + 1);
        }

        $remaining = $key->credits_remaining - $estimated_credits;

        $this->CI->apikey_model->set_credits($key->id, $remaining);

        return [
            'status' => 'success',
            'http_code' => $httpCode,
            'api_key' => $key->id,
            'data' => json_decode($response, true)
        ];
    }

    public function instantScan(array $payload, $estimated_credits, $maxRetries=3, $retry = 0)
    {
        if ($retry >= $maxRetries) {
            return [
                'status' => 'error',
                'api_key' => '',
                'error_message' => 'Currently, System has reached its usage limit. We&#39;re actively resolving this.</br>Please try again in a few minutes or contact support for assistance.',
                'admin_error_message' => 'No active API keys available'
            ];
        }

        $key = $this->CI->apikey_model->getActiveKey();

        if (!$key) {
            return [
                'status' => 'error',
                'api_key' => '',
                'error_message' => 'Currently, system has reached its usage limit. We&#39;re actively resolving this.</br>Please try again in a few minutes or contact support for assistance.',
                'admin_error_message' => 'All API keys exhausted. Please try later.'
            ];
        }

        // echo "<pre>";print_r($key);die;
        // prepare cURL
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $this->api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_HTTPHEADER     => [
                'X-OAI-API-KEY: ' . $key->api_key,
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS     => json_encode($payload)
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);

            return [
                'status' => 'error',
                'api_key' => $key->id,
                'error_message' => 'PlagiGuardAI is unable to complete your request at the moment. Please try again shortly!',
                'admin_error_message' => 'cURL Error: ' . $error
            ];
        }

        curl_close($ch);
        // handle key exhausted or rate limited
        if ($httpCode != 200) {
            $this->CI->apikey_model->markExhausted($key->id);
            // $this->CI->keymanager->markExhausted($key->id);

            // retry with next key
            return $this->scanContent($payload, $estimated_credits, $maxRetries, $retry + 1);
        }

        $remaining = $key->credits_remaining - $estimated_credits;

        $this->CI->apikey_model->set_credits($key->id, $remaining);

        return [
            'status' => 'success',
            'http_code' => $httpCode,
            'api_key' => $key->id,
            'data' => json_decode($response, true)
        ];
    }


    public function getBalance($apiKey)
    {
        $ch = curl_init($this->balance_api_url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "X-OAI-API-KEY: {$apiKey}",
                "Content-Type: application/json"
            ],
            CURLOPT_TIMEOUT => 20
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);

            return [
                'status' => 'CURL',
                'message' => 'cURL Error: ' . $error
            ];
        }

        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($status !== 200) {
            return [
                'status' => 'CURL',
                'message' => 'Api Key you are trying to add is invalid. <br> Please tryout with different API key.'
            ];
        }

        $data = json_decode($response, true);

        if (!$data) {
            return [
                'status' => 'CURL',
                'message' => 'Invalid JSON response from balance API'
            ];
        }

        $data['status'] = 'success';
        $data['total_credits'] = $data['credits'] + $data['subscriptionCredits'];
        return $data;
    }

    public function scanContentold(array $payload)
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL            => $this->api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_HTTPHEADER     => [
                'X-OAI-API-KEY: ' . $this->api_key,
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS     => json_encode($payload)
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);

            return [
                'status'  => false,
                'message' => 'cURL Error: ' . $error
            ];
        }

        curl_close($ch);

        return [
            'status'    => ($httpCode === 200),
            'http_code' => $httpCode,
            'data'      => json_decode($response, true)
        ];
    }
}
