<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH  . 'vendor/autoload.php';

class Pdf
{
    public function create($html, $filename = 'document', $download = true)
    {
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_top' => 15,
            'margin_bottom' => 15,
            'margin_left' => 10,
            'margin_right' => 10
        ]);

        $mpdf->WriteHTML($html);

        if ($download) {
            $mpdf->Output($filename . '.pdf', 'D'); // download
        } else {
            return $mpdf->Output($filename . '.pdf', 'S'); // return as string
        }
    }
}
