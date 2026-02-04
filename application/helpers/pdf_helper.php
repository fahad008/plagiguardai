<?php
use Smalot\PdfParser\Parser;

function extract_pdf_text($filePath)
{
    require_once FCPATH . 'vendor/autoload.php';

    try {
        $parser = new Parser();
        $pdf    = $parser->parseFile($filePath);
        $text   = trim($pdf->getText());

        // Normalize text
        $text = preg_replace('/\s+/', ' ', $text);

        return [
            'success' => strlen($text) > 200,
            'text'    => $text
        ];

    } catch (Exception $e) {
        return [
            'success' => false,
            'text'    => ''
        ];
    }
}

function ocr_pdf_text($filePath)
{
    $cmd = "pdftoppm {$filePath} /tmp/page -png";
    exec($cmd);

    $text = '';
    foreach (glob('/tmp/page-*.png') as $img) {
        $text .= shell_exec("tesseract {$img} stdout -l eng");
    }

    return trim($text);
}

