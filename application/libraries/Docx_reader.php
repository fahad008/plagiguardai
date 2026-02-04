<?php
class Docx_reader {

    public function extract_text($file_path)
    {
        if (!file_exists($file_path)) {
            return ["status" => 'error', "message" => 'File not found!'];
        }

        try {
            $extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

            if ($extension === 'docx') {
                $reader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
            } elseif ($extension === 'doc') {
                $reader = \PhpOffice\PhpWord\IOFactory::createReader('MsDoc');
            } else {
                return ["status" => 'error', "message" => 'Unsupported file format'];
            }

            $phpWord = $reader->load($file_path);
            $text = '';

            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    $text .= $this->extractElementText($element);
                }
            }

            $text = text_cleaner($text);

            return ["status" => 'success', "text" => trim($text)];

        } catch (\Exception $e) {
            return ["status" => 'error', "message" => $e->getMessage()];
        }
    }

    private function extractElementText($element)
    {
        $text = '';

        // If element has direct text (Text, Title, etc.)
        if (method_exists($element, 'getText')) {
            return $element->getText() . ' ';
        }

        // If element is composite (TextRun, Table, ListItem, etc.)
        if (method_exists($element, 'getElements')) {
            foreach ($element->getElements() as $child) {
                $text .= $this->extractElementText($child);
            }
        }

        return $text;
    }
}
