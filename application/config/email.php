<?php defined('BASEPATH') or exit('No direct script access allowed.');


// if 587 does not work try 

// $smtp_host = 'ssl://mail.plagiguardai.com';
// $smtp_port = 465;
// $config['smtp_crypto'] = 'ssl';

$config['useragent']        = 'CodeIgniter';
$config['protocol']         = 'smtp';
$config['smtp_host']        = 'mail.plagiguardai.com';
$config['smtp_user']        = 'info@plagiguardai.com';
$config['smtp_pass']        = 'ltp5YrygdT)K';
$config['smtp_port']        = 587;
$config['smtp_timeout']     = 30;

$config['smtp_crypto']      = 'tls';      // IMPORTANT for 587
$config['smtp_auto_tls']    = true;

$config['mailtype']         = 'html';
$config['charset']          = 'UTF-8';

$config['wordwrap']         = true;
$config['wrapchars']        = 76;

$config['crlf']             = "\r\n";
$config['newline']          = "\r\n";

$config['validate']         = true;
$config['priority']         = 3;

$config['bcc_batch_mode']   = false;
$config['bcc_batch_size']   = 200;

$config['encoding']         = '8bit';
