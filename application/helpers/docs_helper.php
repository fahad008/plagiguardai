<?php
use PhpOffice\PhpWord\IOFactory;

function extract_docx_text($file_path)
{
    if (!file_exists($file_path)) {
        return '';
    }

    try {
        $phpWord = IOFactory::load($file_path);

        $text = '';

        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {

                // Plain text
                if (method_exists($element, 'getText')) {
                    $text .= $element->getText() . ' ';
                }

                // Text runs (bold, italic, etc.)
                if (method_exists($element, 'getElements')) {
                    foreach ($element->getElements() as $child) {
                        if (method_exists($child, 'getText')) {
                            $text .= $child->getText() . ' ';
                        }
                    }
                }
            }
        }

        // $word_count = ai_style_word_count($text);
        $text = gemini_text_cleaner($text);
        $word_count = !empty($text) ? count(explode(' ', $text)) : 0;
        // $word_count = !empty($text) ? str_word_count($text) : 0;

        return ["status" => 'success', "text" => $text, "word_count" => $word_count];

    } catch (Exception $e) {

        return ["status" => 'error', "message" => $e->getMessage(), "word_count" => 0];

    }
}