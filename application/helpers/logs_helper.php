<?php 

if (!function_exists('log_cron')) {
    function log_cron($level, $msg) {
        $CI =& get_instance();

        // Only for CLI requests
        // if (!$CI->input->is_cli_request()) {
        //     return FALSE;
        // }

        // Make sure logs folder exists
        $log_path = APPPATH . 'logs/';
        if (!is_dir($log_path)) {
            mkdir($log_path, 0755, true);
        }

        // Log file name
        $filepath = $log_path . 'cron-' . date('Y-m-d') . '.php';
        $is_new_file = !file_exists($filepath);

        // Open file
        if ($fp = fopen($filepath, 'a')) {

            // Add PHP security header for new file
            if ($is_new_file) {
                fwrite($fp, "<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>\n\n");
            }

            // Format message
            $date = date('Y-m-d H:i:s');
            $output = strtoupper($level) . ' - ' . $date . ' --> ' . $msg . "\n";

            fwrite($fp, $output);
            fclose($fp);
            return TRUE;
        }

        return FALSE;
    }
}
