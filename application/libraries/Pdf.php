<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

class Pdf
{
    private $mpdf;

    public function __construct()
    {
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $this->mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_top' => 15,
            'margin_bottom' => 15,
            'margin_left' => 10,
            'margin_right' => 10,

            // Custom fonts
            'fontDir' => array_merge($fontDirs, [
                FCPATH . 'assets/fonts/poppins'
            ]),

            'fontdata' => $fontData + [
                'poppins' => [
                    'R' => 'Poppins-Regular.ttf',
                    'B' => 'Poppins-Bold.ttf',
                    'M' => 'Poppins-Medium.ttf',
                    'L' => 'Poppins-Light.ttf',
                ]
            ],

            'default_font' => 'poppins'
        ]);

        // Optional header/footer
        $this->mpdf->SetTitle('Report');
        $this->mpdf->SetAuthor('Your App');
        $this->mpdf->SetDisplayMode('fullpage');
    }

    /*
    |--------------------------------------------------------------------------
    | Create PDF
    |--------------------------------------------------------------------------
    */

    public function create($html, $filename = 'document', $mode = 'I')
    { 
        // echo "<pre>";print_r($html);die; 
        /*
        Modes:
        I = browser
        D = download
        F = save file
        S = return string
        */

        $this->mpdf->WriteHTML($html);

        return $this->mpdf->Output($filename . '.pdf', $mode);
    }

    /*
    |--------------------------------------------------------------------------
    | Optional Helpers
    |--------------------------------------------------------------------------
    */

    public function setHeader($html)
    {
        $this->mpdf->SetHTMLHeader($html);
    }

    public function setFooter($html)
    {
        $this->mpdf->SetHTMLFooter($html);
    }
}
