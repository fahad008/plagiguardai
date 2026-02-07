<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get_expiry()
{
    $days = '+'.EXPIRY_WINDOW.' days';
    $now = new DateTime(); 
    $now->modify($days);
    return $expiry_time = $now->format('y-m-d H:m:s');
}

function save_formatted_content_old($privateID, $content, $customer_id)
{
    $directory = FCPATH . 'uploads/scans/customer_' . $customer_id;

    if (!is_dir($directory)) {
        if (!mkdir($directory, 0755, true) && !is_dir($directory)) {
            return false;
        }
    }

    $file_name = $privateID . '.txt';
    $filePath = $directory . '/' . $file_name;

    if (file_put_contents($filePath, $content) !== false) {
        return $file_name;
    }

    return false;
}

function save_formatted_content($customer_id, $scan_job_id, $content)
{
    $directory = FCPATH . 'uploads/scans/customer_' . $customer_id;

    if (!is_dir($directory)) {
        if (!mkdir($directory, 0755, true) && !is_dir($directory)) {
            return false;
        }
    }

    $file_name = 'scan_'.$customer_id.'_'.$scan_job_id.'.txt';
    $filePath = $directory . '/' . $file_name;

    if (file_put_contents($filePath, $content) !== false) {
        return $file_name;
    }

    return false;
}

function ai_style_word_count($text) {
    $text = trim(preg_replace('/\s+/', ' ', $text));
    preg_match_all("/[\p{L}\p{N}]+(?:['-][\p{L}\p{N}]+)*/u", $text, $matches);
    return count($matches[0]);
}

function text_cleaner($text=''){
    if ($text) {

        $clean_text = preg_replace('/\b(?:https?:\/\/|www\.)\S+\b/i', '', $text);
        $clean_text = preg_replace('/[\[\]()<>{}]/', '', $clean_text);
        $clean_text = trim(preg_replace('/\s+/', ' ', $clean_text));
        
        return $clean_text;
    }
    return false;
}

function getAIDetectionColor($score) {
    if ($score >= 0 && $score <= 20) {
        return '#28a745'; // Green
    } elseif ($score >= 21 && $score <= 40) {
        return '#8bc34a'; // Light Green
    } elseif ($score >= 41 && $score <= 60) {
        return '#ffc107'; // Yellow
    } elseif ($score >= 61 && $score <= 80) {
        return '#fd7e14'; // Orange
    } elseif ($score >= 81 && $score <= 95) {
        return '#ff5722'; // Dark Orange
    } elseif ($score >= 96 && $score <= 100) {
        return '#dc3545'; // Red
    } else {
        return '#d3dce3'; // Default Gray for invalid input
    }
}

function getAIDetectionLightColor($score) {
    if ($score >= 0 && $score <= 20) {
        return '#d4edda'; // Very Light Green
    } elseif ($score >= 21 && $score <= 40) {
        return '#e6f4d9'; // Very Light Lime
    } elseif ($score >= 41 && $score <= 60) {
        return '#fff3cd'; // Very Light Yellow
    } elseif ($score >= 61 && $score <= 80) {
        return '#ffe5d0'; // Very Light Orange
    } elseif ($score >= 81 && $score <= 95) {
        return '#ffd8c1'; // Very Light Dark Orange
    } elseif ($score >= 96 && $score <= 100) {
        return '#f8d7da'; // Very Light Red / Pink
    } else {
        return '#f1f3f5'; // Very Light Gray for invalid input
    }
}

function getAIDetectionLightClass($score) {
    if ($score >= 0 && $score <= 20) {
        return 'bg-light-original'; // Very Light Green
    } elseif ($score >= 21 && $score <= 40) {
        return 'bg-light-low'; // Very Light Lime
    } elseif ($score >= 41 && $score <= 60) {
        return 'bg-light-medium'; // Very Light Yellow
    } elseif ($score >= 61 && $score <= 80) {
        return 'bg-light-likely'; // Very Light Orange
    } elseif ($score >= 81 && $score <= 95) {
        return 'bg-light-high'; // Very Light Dark Orange
    } elseif ($score >= 96 && $score <= 100) {
        return 'bg-light-very-high'; // Very Light Red / Pink
    } else {
        return 'bg-light-default'; // Very Light Gray
    }
}



function getAIDetectionColorClass($score) {
    if ($score >= 0 && $score <= 20) {
        return 'bg-original'; // Green
    } elseif ($score >= 21 && $score <= 40) {
        return 'bg-low'; // Light Green
    } elseif ($score >= 41 && $score <= 60) {
        return 'bg-medium'; // Yellow
    } elseif ($score >= 61 && $score <= 80) {
        return 'bg-likely'; // Orange
    } elseif ($score >= 81 && $score <= 95) {
        return 'bg-high'; // Dark Orange
    } elseif ($score >= 96 && $score <= 100) {
        return 'bg-very-high'; // Red
    } else {
        return 'bg-default';
    }
}

function getAIDetectionTextColorClass($score) {
    if ($score >= 0 && $score <= 20) {
        return 'text-original'; // Green
    } elseif ($score >= 21 && $score <= 40) {
        return 'text-low'; // Light Green
    } elseif ($score >= 41 && $score <= 60) {
        return 'text-medium'; // Yellow
    } elseif ($score >= 61 && $score <= 80) {
        return 'text-likely'; // Orange
    } elseif ($score >= 81 && $score <= 95) {
        return 'text-high'; // Dark Orange
    } elseif ($score >= 96 && $score <= 100) {
        return 'text-very-high'; // Red
    } else {
        return 'text-default';
    }
}

function getAIDominatedScore($ai=0,$or=0) {
    if ($ai > $or) {
        $dominant = $ai;
    } elseif ($or > $ai) {
        $dominant = $or;
    } else {
        $dominant = $ai;
    }
    return $dominant;
}

function getAIDominatedText($score) {
    if ($score >= 0 && $score <= 20) {
        return 'Original'; 
    } elseif ($score >= 21 && $score <= 40) {
        return 'Mostly Human'; 
    } elseif ($score >= 41 && $score <= 60) {
        return 'Partial AI'; 
    } elseif ($score >= 61 && $score <= 80) {
        return 'Likely AI'; 
    } elseif ($score >= 81 && $score <= 95) {
        return 'High AI'; 
    } elseif ($score >= 96 && $score <= 100) {
        return 'AI Generated'; 
    } else {
        return 'Unknown';
    }
}

function getPLDominatedText($score) {
    if ($score >= 0 && $score <= 20) {
        return 'Highly Unique'; // Minimal AI influence, content is mostly human
    } elseif ($score >= 21 && $score <= 40) {
        return 'Mostly Unique'; // Mostly human-written, minor AI influence
    } elseif ($score >= 41 && $score <= 60) {
        return 'Partially Plagiarized'; // Mix of human and AI content
    } elseif ($score >= 61 && $score <= 80) {
        return 'Mostly Plagiarized'; // Majority of content shows AI influence
    } elseif ($score >= 81 && $score <= 95) {
        return 'Highly Plagiarized'; // Content is largely AI-written
    } elseif ($score >= 96 && $score <= 100) {
        return 'Extensively Plagiarized'; // Almost entirely AI-written
    } else {
        return 'Unknown'; // Score out of range or invalid
    }
}

function getAIDetectionBorderClass($score) {
    if ($score >= 0 && $score <= 20) {
        return 'border-original'; // Green
    } elseif ($score >= 21 && $score <= 40) {
        return 'border-low'; // Light Green
    } elseif ($score >= 41 && $score <= 60) {
        return 'border-medium'; // Yellow
    } elseif ($score >= 61 && $score <= 80) {
        return 'border-likely'; // Orange
    } elseif ($score >= 81 && $score <= 95) {
        return 'border-high'; // Dark Orange
    } elseif ($score >= 96 && $score <= 100) {
        return 'border-very-high'; // Red
    } else {
        return 'border-default'; // Gray for invalid input
    }
}


function getAIClassificationStatement($score) {
    if ($score >= 0 && $score <= 20) {
        return "This content is mostly written by a human, showing very little AI influence. The ideas, phrasing, and structure appear natural, authentic, and reliable, reflecting genuine human authorship throughout the text.";
    } elseif ($score >= 21 && $score <= 40) {
        return "Content is largely human-written, though small parts may show minor AI assistance. Overall, the text remains natural and authentic, and any AI influence does not significantly affect the originality or clarity of the content.";
    } elseif ($score >= 41 && $score <= 60) {
        return "The content contains a mix of human and AI-generated text. Some sections clearly reflect human authorship, while others show patterns typical of AI, indicating partial AI involvement without fully dominating the content.";
    } elseif ($score >= 61 && $score <= 80) {
        return "This content is likely generated by AI. Human input may exist in small areas, but the majority of the text shows AI influence in phrasing, structure, and style, dominating the overall content.";
    } elseif ($score >= 81 && $score <= 95) {
        return "Most of this content appears AI-generated, with very few human-written sections. The text reflects AI patterns and structure, and originality is limited, suggesting strong reliance on AI-generated writing tools.";
    } elseif ($score >= 96 && $score <= 100) {
        return "The content appears fully AI-generated, with almost no evidence of human authorship. The text shows consistent AI patterns, uniform phrasing, and structure, indicating that AI created or heavily influenced the entire content.";
    } else {
        return "The AI classification could not be determined for this content. The system cannot confidently assess AI involvement, so manual review is recommended to evaluate authorship and content originality.";
    }
}

function getAIConfidenceStatement($score) {
    if ($score >= 0 && $score <= 20) {
        return "The system is confident that the content is human-written, with minimal AI influence. This does not mean AI is completely absent, but it is negligible. AI confidence is very low.";
    } elseif ($score >= 21 && $score <= 40) {
        return "The system indicates that most of the content is human-written. Small portions may show AI influence, but the majority remains authentically human. AI confidence is low.";
    } elseif ($score >= 41 && $score <= 60) {
        return "The system detects a mix of human and AI-generated text. Some parts may show AI influence, while others are clearly human-written, reflecting partial AI involvement. AI confidence is moderate.";
    } elseif ($score >= 61 && $score <= 80) {
        return "The system indicates that much of the text is likely influenced by AI. Human input may exist in certain sections, but AI patterns dominate the content. AI confidence is high.";
    } elseif ($score >= 81 && $score <= 100) {
        return "We are confident that the content shows strong AI influence. This does not mean 100% of the text was AI-generated, but AI patterns are dominant. AI confidence is very high.";
    } else {
        return "The system cannot reliably assess AI involvement, so manual review is recommended to evaluate human or AI authorship. AI confidence is unknown.";
    }
}

function getPlagiarismStatement($score) {
    if ($score >= 0 && $score <= 20) {
        return "Content shows minimal similarity with other sources. It is highly original and human-written, safe for professional or academic use. Plagiarism is very low.";
    } elseif ($score >= 21 && $score <= 40) {
        return "Content is mostly unique, with minor matches to other sources. Human authorship is clear, and only small sections may require review or citation. Plagiarism is low.";
    } elseif ($score >= 41 && $score <= 60) {
        return "Content shows moderate similarity to existing sources. Some sections are original, while others may be Plagiarized or closely paraphrased. Review and citation may be necessary. Plagiarism is medium.";
    } elseif ($score >= 61 && $score <= 80) {
        return "Content exhibits high similarity with other sources. Most text may be Plagiarized, requiring significant rewriting or citation to ensure originality. Plagiarism is high.";
    } elseif ($score >= 81 && $score <= 100) {
        return "Content is almost entirely Plagiarized from other sources. Very little originality is present, and it should not be used without substantial rewriting or proper citation. Plagiarism is very high.";
    } else {
        return "Plagiarism check could not produce a reliable result. Manual review is recommended to verify originality and ensure the content does not violate copyright or plagiarism standards. Plagiarism is unknown.";
    }
}

function formatGroupedSimilarityResults(array $originalityResponse) {

    $groupedResults = [];

    if (empty($originalityResponse['results'])) {
        return $groupedResults;
    }

    foreach ($originalityResponse['results'] as $phraseData) {

        $phrase = trim($phraseData['phrase'] ?? '');

        if ($phrase === '' || empty($phraseData['results'])) {
            continue;
        }

        $highestScore = 0;
        $sources = [];

        foreach ($phraseData['results'] as $source) {

            if (empty($source['scores'])) {
                continue;
            }

            foreach ($source['scores'] as $scoreData) {

                $percent = isset($scoreData['score'])
                    ? round($scoreData['score'] * 100)
                    : 0;

                $highestScore = max($highestScore, $percent);

                $sources[] = [
                    'source_title'     => $source['title'] ?? '',
                    'source_link'      => $source['link'] ?? '',
                    'matched_sentence' => $scoreData['sentence'] ?? '',
                    'similarity_score' => $percent,
                    'label'            => getSimilarityLabel($percent),
                    'border_class'     => getSimilarityBorderClass($percent),
                    'published_date'   => $source['timestamps']['date_published'] ?? null,
                    'source_category'  => $source['source_category'] ?? 'web',
                ];
            }
        }

        if (empty($sources)) {
            continue;
        }

        $groupedResults[] = [
            'matched_text'        => $phrase,
            'highest_similarity'  => $highestScore,
            'similarity_label'    => getSimilarityLabel($highestScore),
            'border_class'        => getSimilarityBorderClass($highestScore),
            'sources_count'       => count($sources),
            'sources'             => $sources,
        ];
    }

    return $groupedResults;
}
function formatPhraseSimilarityResults(array $response) {

    $output = [];

    if (empty($response['results'])) {
        return $output;
    }

    foreach ($response['results'] as $phraseData) {

        $phrase = trim($phraseData['phrase'] ?? '');
        if ($phrase === '' || empty($phraseData['results'])) {
            continue;
        }

        $sources = [];

        foreach ($phraseData['results'] as $source) {

            // Limit to 3 sources per phrase
            if (count($sources) >= 3) {
                break;
            }

            if (empty($source['scores'][0]['score'])) {
                continue;
            }

            $percent = round($source['scores'][0]['score'] * 100);

            $sources[] = [
                'link'  => $source['link'] ?? '',
                'score' => $percent,
                'label' => getPLDominatedText($percent),
                'border' => getAIDetectionBorderClass($percent),
                'bg_light' => getAIDetectionLightClass($percent),
                'color' => getAIDetectionTextColorClass($percent),
            ];
        }

        if (empty($sources)) {
            continue;
        }

        $output[] = [
            'phrase'  => $phrase,
            'sources' => $sources
        ];
    }

    return $output;
}


function getBlackBoxData($scan=[]) {

    $data = [];

    $ai_classification = json_decode($scan['ai_classification'], true);

    $data['one_ai'] = $ai_classification['AI'] * 100;
    $data['one_or'] = $ai_classification['Original'] * 100;

    $classificationData = getClassification($data['one_ai'], $data['one_or']);


    // $data['one_ai_color'] = getAIDetectionColor($data['one_ai']);
    // $data['one_or_color'] = getAIDetectionColor($data['one_or']);
    // $data['one_ai_class'] = getAIDetectionColorClass($data['one_ai']);
    // $data['one_or_class'] = getAIDetectionColorClass($data['one_or']);
    // $data['one_do_score'] = getAIDominatedScore($data['one_ai'], $data['one_or']);
    // $data['one_do_text'] = getAIDominatedText($data['one_do_score']);
    // $data['one_do_color'] = getAIDetectionTextColorClass($data['one_do_score']);
    // $data['one_do_light'] = getAIDetectionLightClass($data['one_do_score']);
    // $data['one_do_state'] = getAIClassificationStatement($data['one_do_score']);
    // $data['one_do_border'] = getAIDetectionBorderClass($data['one_do_score']);

    $data = array_merge($data, $classificationData);

    $ai_confidence = json_decode($scan['ai_confidence'], true);

    $data['two_ai'] = $ai_confidence['AI'] * 100;
    $data['two_or'] = $ai_confidence['Original'] * 100;

    
    $confidenceData = getConfidence($data['two_ai'], $data['two_or']);

    $data = array_merge($data, $confidenceData);

    // $data['two_ai_color'] = getAIDetectionColor($data['two_ai']);
    // $data['two_or_color'] = getAIDetectionColor($data['two_or']);
    // $data['two_ai_class'] = getAIDetectionColorClass($data['two_ai']);
    // $data['two_or_class'] = getAIDetectionColorClass($data['two_or']);
    // $data['two_do_score'] = getAIDominatedScore($data['two_ai'], $data['two_or']);
    // $data['two_do_text'] = getAIDominatedText($data['two_do_score']);
    // $data['two_do_color'] = getAIDetectionTextColorClass($data['two_do_score']);
    // $data['two_do_light'] = getAIDetectionLightClass($data['two_do_score']);
    // $data['two_do_state'] = getAIConfidenceStatement($data['two_do_score']);
    // $data['two_do_border'] = getAIDetectionBorderClass($data['two_do_score']);

    $plagiarism_score = json_decode($scan['plagiarism_score'], true);
    // echo "<pre>";print_r($plagiarism_score);die;
    $data['three_pl'] = $plagiarism_score['score'];
    $data['three_or'] = 100 - $plagiarism_score['score'];

    $PlagiarismData = getPlagiarismData($data['three_pl'], $data['three_or']);

    $data = array_merge($data, $PlagiarismData);

    // echo "<pre>";print_r($data);die;

    // $data['three_pl_color'] = getAIDetectionColor($data['three_pl']);
    // $data['three_or_color'] = getAIDetectionColor($data['three_or']);

    // $data['three_pl_class'] = getAIDetectionColorClass($data['three_pl']);
    // $data['three_or_class'] = getAIDetectionColorClass($data['three_or']);

    // $data['three_do_score'] = getAIDominatedScore($data['three_pl'], $data['three_or']);
    // $data['three_do_text'] = getPLDominatedText($data['three_do_score']);

    // $data['three_do_color'] = getAIDetectionTextColorClass($data['three_do_score']);


    // $data['three_do_light'] = getAIDetectionLightClass($data['three_do_score']);

    // $data['three_do_state'] = getPlagiarismStatement($data['three_do_score']);

    // $data['three_do_border'] = getAIDetectionBorderClass($data['three_do_score']);
    
    $data['plagiarism_sources'] = formatPhraseSimilarityResults($plagiarism_score);
    // echo "<pre>";print_r($data);die;

    $data['created_at'] = $scan['created_at'];

    return $data;
}


function getClassification($ai=0, $or=0) {

    $classification_info = [];

    if ($ai >= 0 && $ai <= 20) {
        $classification_info['one_ai_color'] = '#28a745';
    } elseif ($ai >= 21 && $ai <= 40) {
        $classification_info['one_ai_color'] = '#8bc34a';
    } elseif ($ai >= 41 && $ai <= 60) {
        $classification_info['one_ai_color'] = '#ffc107';
    } elseif ($ai >= 61 && $ai <= 80) {
        $classification_info['one_ai_color'] = '#fd7e14';
    } elseif ($ai >= 81 && $ai <= 95) {
        $classification_info['one_ai_color'] = '#ff5722';
    } elseif ($ai >= 96 && $ai <= 100) {
        $classification_info['one_ai_color'] = '#dc3545';
    } else {
        $classification_info['one_ai_color'] = '#d3dce3';
    }

    if ($or >= 0 && $or <= 20) {
        $classification_info['one_or_color'] = '#dc3545';
    } elseif ($or >= 21 && $or <= 40) {
        $classification_info['one_or_color'] = '#ff5722';
    } elseif ($or >= 41 && $or <= 60) {
        $classification_info['one_or_color'] = '#fd7e14';
    } elseif ($or >= 61 && $or <= 80) {
        $classification_info['one_or_color'] = '#ffc107';
    } elseif ($or >= 81 && $or <= 95) {
        $classification_info['one_or_color'] = '#8bc34a';
    } elseif ($or >= 96 && $or <= 100) {
        $classification_info['one_or_color'] = '#28a745';
    } else {
        $classification_info['one_or_color'] = '#d3dce3';
    }

    if ($ai >= 0 && $ai <= 20) {
        $classification_info['one_ai_class'] = 'bg-original';
    } elseif ($ai >= 21 && $ai <= 40) {
        $classification_info['one_ai_class'] = 'bg-low'; 
    } elseif ($ai >= 41 && $ai <= 60) {
        $classification_info['one_ai_class'] = 'bg-medium'; 
    } elseif ($ai >= 61 && $ai <= 80) {
        $classification_info['one_ai_class'] = 'bg-likely'; 
    } elseif ($ai >= 81 && $ai <= 95) {
        $classification_info['one_ai_class'] = 'bg-high'; 
    } elseif ($ai >= 96 && $ai <= 100) {
        $classification_info['one_ai_class'] = 'bg-very-high'; 
    } else {
        $classification_info['one_ai_class'] = 'bg-default';
    }

    if ($or >= 0 && $or <= 20) {
        $classification_info['one_or_class'] = 'bg-very-high';
    } elseif ($or >= 21 && $or <= 40) {
        $classification_info['one_or_class'] = 'bg-high'; 
    } elseif ($or >= 41 && $or <= 60) {
        $classification_info['one_or_class'] = 'bg-likely'; 
    } elseif ($or >= 61 && $or <= 80) {
        $classification_info['one_or_class'] = 'bg-medium'; 
    } elseif ($or >= 81 && $or <= 95) {
        $classification_info['one_or_class'] = 'bg-low'; 
    } elseif ($or >= 96 && $or <= 100) {
        $classification_info['one_or_class'] = 'bg-original'; 
    } else {
        $classification_info['one_or_class'] = 'bg-default';
    }

    // dominated score
    $dominated_score = '';
    if ($or > $ai) {

        // $dominated_info['type'] = 'UNIQUENESS';
        $dominated_score = $or;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_text'] = 'AI Generated'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_text'] = 'High AI'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_text'] = 'Likely AI'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_text'] = 'Partial AI';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_text'] = 'Mostly Human'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_text'] = 'Original Content';
        } else {
            $classification_info['one_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_color'] = 'text-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_color'] = 'text-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_color'] = 'text-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_color'] = 'text-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_color'] = 'text-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_color'] = 'text-original'; 
        } else {
            $classification_info['one_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_light'] = 'bg-light-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_light'] = 'bg-light-high'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_light'] = 'bg-light-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_light'] = 'bg-light-medium'; 
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_light'] = 'bg-light-low'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_light'] = 'bg-light-original'; 
        } else {
            $classification_info['one_do_light'] = 'bg-light-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_border'] = 'border-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_border'] = 'border-high'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_border'] = 'border-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_border'] = 'border-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_border'] = 'border-low'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_border'] = 'border-original';
        } else {
            $classification_info['one_do_border'] = 'border-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {

                $classification_info['one_do_state'] =
                    "The content is classified as predominantly human-written, with minimal AI involvement detected. The writing style, structure, and phrasing appear natural and authentic, indicating strong human authorship.";

            } elseif ($dominated_score >= 21 && $dominated_score <= 40) {

                $classification_info['one_do_state'] =
                    "The content is classified as largely human-written, with minor signs of AI assistance. Overall expression remains natural, and AI involvement does not significantly influence the content.";

            } elseif ($dominated_score >= 41 && $dominated_score <= 60) {

                $classification_info['one_do_state'] =
                    "The content is classified as a mix of human and AI-generated text. Some sections reflect human authorship, while others display patterns typically associated with AI-generated writing.";

            } elseif ($dominated_score >= 61 && $dominated_score <= 80) {

                $classification_info['one_do_state'] =
                    "The content is classified as primarily AI-influenced. While limited human input may be present, AI-driven structure and phrasing dominate most sections.";

            } elseif ($dominated_score >= 81 && $dominated_score <= 95) {

                $classification_info['one_do_state'] =
                    "The content is classified as predominantly AI-generated, with minimal evidence of human authorship. Consistent AI patterns are present throughout the text.";

            } elseif ($dominated_score >= 96 && $dominated_score <= 100) {

                $classification_info['one_do_state'] =
                    "The content is classified as almost entirely AI-generated. The text shows uniform structure and phrasing, indicating very limited or no human contribution.";

            } else {

                $classification_info['one_do_state'] =
                    "The content could not be classified reliably. A manual review is recommended to evaluate authorship and content characteristics.";

            }

        
    } else {
        // $dominated_type = 'AI';
        $dominated_score = $ai;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_text'] = 'Original Content'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_text'] = 'Mostly Human'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_text'] = 'Partial AI'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_text'] = 'Likely AI';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_text'] = 'Highly AI'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_text'] = 'AI Generated';
        } else {
            $classification_info['one_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_color'] = 'text-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_color'] = 'text-low';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_color'] = 'text-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_color'] = 'text-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_color'] = 'text-high';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_color'] = 'text-very-high'; 
        } else {
            $classification_info['one_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_light'] = 'bg-light-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_light'] = 'bg-light-low'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_light'] = 'bg-light-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_light'] = 'bg-light-likely'; 
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_light'] = 'bg-light-high'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_light'] = 'bg-light-very-high'; 
        } else {
            $classification_info['one_do_light'] = 'bg-light-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_border'] = 'border-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_border'] = 'border-low'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_border'] = 'border-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_border'] = 'border-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_border'] = 'border-high'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_border'] = 'border-very-high';
        } else {
            $classification_info['one_do_border'] = 'border-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_state'] = "This content is mostly written by a human, showing very little AI influence. The ideas, phrasing, and structure appear natural, authentic, and reliable, reflecting genuine human authorship throughout the text.";
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_state'] = "Content is largely human-written, though small parts may show minor AI assistance. Overall, the text remains natural and authentic, and any AI influence does not significantly affect the originality or clarity of the content.";
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_state'] = "The content contains a mix of human and AI-generated text. Some sections clearly reflect human authorship, while others show patterns typical of AI, indicating partial AI involvement without fully dominating the content.";
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_state'] = "This content is likely generated by AI. Human input may exist in small areas, but the majority of the text shows AI influence in phrasing, structure, and style, dominating the overall content.";
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_state'] = "Most of this content appears AI-generated, with very few human-written sections. The text reflects AI patterns and structure, and originality is limited, suggesting strong reliance on AI-generated writing tools.";
        } elseif ($dominated_score >= 96 && $dominated_score <= 100){
            $classification_info['one_do_state'] = "The content appears fully AI-generated, with almost no evidence of human authorship. The text shows consistent AI patterns, uniform phrasing, and structure, indicating that AI created or heavily influenced the entire content.";
        }else{
            $classification_info['one_do_state'] = "The AI classification could not be determined for this content. The system cannot confidently assess AI involvement, so manual review is recommended to evaluate authorship and content originality.";
        }
    }

    $classification_info['one_do_score'] = $dominated_score;

    return $classification_info;
}



function getConfidence($ai=0, $or=0) {

    $confidence_info = [];

    if ($ai >= 0 && $ai <= 20) {
        $confidence_info['two_ai_color'] = '#28a745';
    } elseif ($ai >= 21 && $ai <= 40) {
        $confidence_info['two_ai_color'] = '#8bc34a';
    } elseif ($ai >= 41 && $ai <= 60) {
        $confidence_info['two_ai_color'] = '#ffc107';
    } elseif ($ai >= 61 && $ai <= 80) {
        $confidence_info['two_ai_color'] = '#fd7e14';
    } elseif ($ai >= 81 && $ai <= 95) {
        $confidence_info['two_ai_color'] = '#ff5722';
    } elseif ($ai >= 96 && $ai <= 100) {
        $confidence_info['two_ai_color'] = '#dc3545';
    } else {
        $confidence_info['two_ai_color'] = '#d3dce3';
    }

    if ($or >= 0 && $or <= 20) {
        $confidence_info['two_or_color'] = '#dc3545';
    } elseif ($or >= 21 && $or <= 40) {
        $confidence_info['two_or_color'] = '#ff5722';
    } elseif ($or >= 41 && $or <= 60) {
        $confidence_info['two_or_color'] = '#fd7e14';
    } elseif ($or >= 61 && $or <= 80) {
        $confidence_info['two_or_color'] = '#ffc107';
    } elseif ($or >= 81 && $or <= 95) {
        $confidence_info['two_or_color'] = '#8bc34a';
    } elseif ($or >= 96 && $or <= 100) {
        $confidence_info['two_or_color'] = '#28a745';
    } else {
        $confidence_info['two_or_color'] = '#d3dce3';
    }

    if ($ai >= 0 && $ai <= 20) {
        $confidence_info['two_ai_class'] = 'bg-original';
    } elseif ($ai >= 21 && $ai <= 40) {
        $confidence_info['two_ai_class'] = 'bg-low'; 
    } elseif ($ai >= 41 && $ai <= 60) {
        $confidence_info['two_ai_class'] = 'bg-medium'; 
    } elseif ($ai >= 61 && $ai <= 80) {
        $confidence_info['two_ai_class'] = 'bg-likely'; 
    } elseif ($ai >= 81 && $ai <= 95) {
        $confidence_info['two_ai_class'] = 'bg-high'; 
    } elseif ($ai >= 96 && $ai <= 100) {
        $confidence_info['two_ai_class'] = 'bg-very-high'; 
    } else {
        $confidence_info['two_ai_class'] = 'bg-default';
    }

    if ($or >= 0 && $or <= 20) {
        $confidence_info['two_or_class'] = 'bg-very-high';
    } elseif ($or >= 21 && $or <= 40) {
        $confidence_info['two_or_class'] = 'bg-high'; 
    } elseif ($or >= 41 && $or <= 60) {
        $confidence_info['two_or_class'] = 'bg-likely'; 
    } elseif ($or >= 61 && $or <= 80) {
        $confidence_info['two_or_class'] = 'bg-medium'; 
    } elseif ($or >= 81 && $or <= 95) {
        $confidence_info['two_or_class'] = 'bg-low'; 
    } elseif ($or >= 96 && $or <= 100) {
        $confidence_info['two_or_class'] = 'bg-original'; 
    } else {
        $confidence_info['two_or_class'] = 'bg-default';
    }

    // dominated score
    $dominated_score = '';
    if ($or > $ai) {

        // $dominated_info['type'] = 'UNIQUENESS';
        $dominated_score = $or;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_text'] = 'AI Generated'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_text'] = 'High AI'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_text'] = 'Likely AI'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_text'] = 'Partial AI';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_text'] = 'Mostly Human'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_text'] = 'Original Content';
        } else {
            $confidence_info['two_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_color'] = 'text-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_color'] = 'text-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_color'] = 'text-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_color'] = 'text-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_color'] = 'text-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_color'] = 'text-original'; 
        } else {
            $confidence_info['two_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_light'] = 'bg-light-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_light'] = 'bg-light-high'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_light'] = 'bg-light-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_light'] = 'bg-light-medium'; 
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_light'] = 'bg-light-low'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_light'] = 'bg-light-original'; 
        } else {
            $confidence_info['two_do_light'] = 'bg-light-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_border'] = 'border-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_border'] = 'border-high'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_border'] = 'border-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_border'] = 'border-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_border'] = 'border-low'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_border'] = 'border-original';
        } else {
            $confidence_info['two_do_border'] = 'border-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_state'] =
                "We are confident that the content is predominantly human-written, with minimal AI influence. Writing style, phrasing, and structure appear fully natural and authentic, reflecting strong human authorship.";
        } 
        elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_state'] =
                "We are confident that most of the content is human-written. Minor sections may show traces of AI, but the majority of the text remains natural, authentic, and human-driven.";
        } 
        elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_state'] =
                "We are confident that the content contains a mix of human-written and AI-assisted text. Some areas show clear human authorship, while others may reflect minor AI patterns, indicating partial AI involvement.";
        } 
        elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_state'] =
                "We are confident that the content is largely human-authored. While AI patterns may appear in certain sections, most of the text shows natural phrasing, authentic structure, and strong human authorship.";
        } 
        elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_state'] =
                "We are confident that the content is highly human-authored, with minimal AI influence. Nearly all sections reflect natural writing and human creativity, maintaining authenticity throughout.";
        } 
        elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_state'] =
                "We are confident that the content is fully human-written, with almost no AI involvement detected. Writing style, structure, and phrasing are entirely natural and authentic, reflecting exceptional human authorship.";
        } 
        else {
            $confidence_info['two_do_state'] =
                "We cannot reliably assess the content at this time. A manual review is recommended to evaluate human authorship and content uniqueness accurately.";
        }

        
    } else {
        // $dominated_type = 'AI';
        $dominated_score = $ai;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_text'] = 'Original Content'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_text'] = 'Mostly Human'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_text'] = 'Partial AI'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_text'] = 'Likely AI';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_text'] = 'Highly AI'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_text'] = 'AI Generated';
        } else {
            $confidence_info['two_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_color'] = 'text-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_color'] = 'text-low';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_color'] = 'text-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_color'] = 'text-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_color'] = 'text-high';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_color'] = 'text-very-high'; 
        } else {
            $confidence_info['two_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_light'] = 'bg-light-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_light'] = 'bg-light-low'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_light'] = 'bg-light-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_light'] = 'bg-light-likely'; 
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_light'] = 'bg-light-high'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_light'] = 'bg-light-very-high'; 
        } else {
            $confidence_info['two_do_light'] = 'bg-light-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_border'] = 'border-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_border'] = 'border-low'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_border'] = 'border-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_border'] = 'border-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_border'] = 'border-high'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_border'] = 'border-very-high';
        } else {
            $confidence_info['two_do_border'] = 'border-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_state'] = "The system is confident that the content is human-written, with minimal AI influence. This does not mean AI is completely absent, but it is negligible. AI confidence is very low.";
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_state'] = "The system indicates that most of the content is human-written. Small portions may show AI influence, but the majority remains authentically human. AI confidence is low.";
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_state'] = "The system detects a mix of human and AI-generated text. Some parts may show AI influence, while others are clearly human-written, reflecting partial AI involvement. AI confidence is moderate.";
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_state'] = "The system indicates that much of the text is likely influenced by AI. Human input may exist in certain sections, but AI patterns dominate the content. AI confidence is high.";
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_state'] = "We are confident that the content shows strong AI influence. This does not mean 100% of the text was AI-generated, but AI patterns are dominant. AI confidence is very high.";
        } elseif ($dominated_score >= 96 && $dominated_score <= 100){
            $confidence_info['two_do_state'] = "We are confident that the content appears fully AI-generated, with almost no evidence of human authorship. The text shows consistent AI patterns, uniform phrasing, and structure, indicating that AI created or heavily influenced the entire content.";
        }else{
            $confidence_info['two_do_state'] = "The system cannot reliably assess AI involvement, so manual review is recommended to evaluate human or AI authorship. AI confidence is unknown.";
        }
    }

    $confidence_info['two_do_score'] = $dominated_score;

    return $confidence_info;
}

function getPlagiarismData($pl=0, $or=0) {

    $plagiarism_info = [];

    if ($pl >= 0 && $pl <= 20) {
        $plagiarism_info['three_pl_color'] = '#28a745';
    } elseif ($pl >= 21 && $pl <= 40) {
        $plagiarism_info['three_pl_color'] = '#8bc34a';
    } elseif ($pl >= 41 && $pl <= 60) {
        $plagiarism_info['three_pl_color'] = '#ffc107';
    } elseif ($pl >= 61 && $pl <= 80) {
        $plagiarism_info['three_pl_color'] = '#fd7e14';
    } elseif ($pl >= 81 && $pl <= 95) {
        $plagiarism_info['three_pl_color'] = '#ff5722';
    } elseif ($pl >= 96 && $pl <= 100) {
        $plagiarism_info['three_pl_color'] = '#dc3545';
    } else {
        $plagiarism_info['three_pl_color'] = '#d3dce3';
    }

    if ($or >= 0 && $or <= 20) {
        $plagiarism_info['three_or_color'] = '#dc3545';
    } elseif ($or >= 21 && $or <= 40) {
        $plagiarism_info['three_or_color'] = '#ff5722';
    } elseif ($or >= 41 && $or <= 60) {
        $plagiarism_info['three_or_color'] = '#fd7e14';
    } elseif ($or >= 61 && $or <= 80) {
        $plagiarism_info['three_or_color'] = '#ffc107';
    } elseif ($or >= 81 && $or <= 95) {
        $plagiarism_info['three_or_color'] = '#8bc34a';
    } elseif ($or >= 96 && $or <= 100) {
        $plagiarism_info['three_or_color'] = '#28a745';
    } else {
        $plagiarism_info['three_or_color'] = '#d3dce3';
    }

    if ($pl >= 0 && $pl <= 20) {
        $plagiarism_info['three_pl_class'] = 'bg-original';
    } elseif ($pl >= 21 && $pl <= 40) {
        $plagiarism_info['three_pl_class'] = 'bg-low'; 
    } elseif ($pl >= 41 && $pl <= 60) {
        $plagiarism_info['three_pl_class'] = 'bg-medium'; 
    } elseif ($pl >= 61 && $pl <= 80) {
        $plagiarism_info['three_pl_class'] = 'bg-likely'; 
    } elseif ($pl >= 81 && $pl <= 95) {
        $plagiarism_info['three_pl_class'] = 'bg-high'; 
    } elseif ($pl >= 96 && $pl <= 100) {
        $plagiarism_info['three_pl_class'] = 'bg-very-high'; 
    } else {
        $plagiarism_info['three_pl_class'] = 'bg-default';
    }

    if ($or >= 0 && $or <= 20) {
        $plagiarism_info['three_or_class'] = 'bg-very-high';
    } elseif ($or >= 21 && $or <= 40) {
        $plagiarism_info['three_or_class'] = 'bg-high'; 
    } elseif ($or >= 41 && $or <= 60) {
        $plagiarism_info['three_or_class'] = 'bg-likely'; 
    } elseif ($or >= 61 && $or <= 80) {
        $plagiarism_info['three_or_class'] = 'bg-medium'; 
    } elseif ($or >= 81 && $or <= 95) {
        $plagiarism_info['three_or_class'] = 'bg-low'; 
    } elseif ($or >= 96 && $or <= 100) {
        $plagiarism_info['three_or_class'] = 'bg-original'; 
    } else {
        $plagiarism_info['three_or_class'] = 'bg-default';
    }

    // dominated score
    $dominated_score = '';
    if ($pl > $or) {
        // $dominated_type = 'PLAGIARISM';
        $dominated_score = $pl;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_text'] = 'Highly Unique'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_text'] = 'Mostly Unique'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_text'] = 'Partially Plagiarized'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_text'] = 'Mostly Plagiarized';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_text'] = 'Highly Plagiarized'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_text'] = 'Extensively Plagiarized';
        } else {
            $plagiarism_info['three_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_color'] = 'text-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_color'] = 'text-low';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_color'] = 'text-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_color'] = 'text-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_color'] = 'text-high';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_color'] = 'text-very-high'; 
        } else {
            $plagiarism_info['three_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_light'] = 'bg-light-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_light'] = 'bg-light-low'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_light'] = 'bg-light-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_light'] = 'bg-light-likely'; 
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_light'] = 'bg-light-high'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_light'] = 'bg-light-very-high'; 
        } else {
            $plagiarism_info['three_do_light'] = 'bg-light-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_border'] = 'border-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_border'] = 'border-low'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_border'] = 'border-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_border'] = 'border-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_border'] = 'border-high'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_border'] = 'border-very-high';
        } else {
            $plagiarism_info['three_do_border'] = 'border-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_state'] = "Content shows minimal similarity with other sources. It is highly original and human-written, safe for professional or academic use. Plagiarism is very low.";
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_state'] = "Content is mostly unique, with minor matches to other sources. Human authorship is clear, and only small sections may require review or citation. Plagiarism is low.";
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_state'] = "Content shows moderate similarity to existing sources. Some sections are original, while others may be Plagiarized or closely paraphrased. Review and citation may be necessary. Plagiarism is medium.";
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_state'] = "Content exhibits high similarity with other sources. Most text may be Plagiarized, requiring significant rewriting or citation to ensure originality. Plagiarism is high.";
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_state'] = "Content is almost entirely Plagiarized from other sources. Very little originality is present, and it should not be used without substantial rewriting or proper citation. Plagiarism is very high.";
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_state'] = "Content is entirely Plagiarized from other sources. Very little originality is present, and it should not be used without substantial rewriting or proper citation. Plagiarism is very high.";
        } else {
            $plagiarism_info['three_do_state'] = "Plagiarism check could not produce a reliable result. Manual review is recommended to verify originality and ensure the content does not violate copyright or plagiarism standards. Plagiarism is unknown.";
        }

    } elseif ($or > $pl) {
        // $dominated_info['type'] = 'UNIQUENESS';
        $dominated_score = $or;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_text'] = 'Extensively Plagiarized'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_text'] = 'Highly Plagiarized'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_text'] = 'Mostly Plagiarized'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_text'] = 'Partially Plagiarized';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_text'] = 'Mostly Unique'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_text'] = 'Highly Unique';
        } else {
            $plagiarism_info['three_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_color'] = 'text-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_color'] = 'text-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_color'] = 'text-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_color'] = 'text-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_color'] = 'text-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_color'] = 'text-original'; 
        } else {
            $plagiarism_info['three_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_light'] = 'bg-light-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_light'] = 'bg-light-high'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_light'] = 'bg-light-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_light'] = 'bg-light-medium'; 
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_light'] = 'bg-light-low'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_light'] = 'bg-light-original'; 
        } else {
            $plagiarism_info['three_do_light'] = 'bg-light-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_border'] = 'border-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_border'] = 'border-high'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_border'] = 'border-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_border'] = 'border-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_border'] = 'border-low'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_border'] = 'border-original';
        } else {
            $plagiarism_info['three_do_border'] = 'border-default';
        }

        if ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_state'] = "The content demonstrates exceptional uniqueness with virtually no similarity to external sources. Human authorship is evident throughout, reflecting fully natural, authentic, and high-quality writing.";
        } 
        elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_state'] = "The content demonstrates a high level of uniqueness with limited similarity to external sources. Human authorship is clearly evident throughout most of the text, though minor sections may benefit from light refinement.";
        }
        elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_state'] = "The content reflects good uniqueness. Human authorship is evident across most sections, though some areas may show minor similarities and could benefit from light revision.";
        } 
        elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_state'] = "The content shows moderate uniqueness. Some sections are clearly human-written, while others may resemble existing material, indicating room for improvement through refinement or rewriting.";
        } 
        elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_state'] = "The content exhibits low uniqueness, with noticeable similarities to existing sources. Significant revisions are recommended to improve human authorship and distinctiveness.";
        } 
        elseif ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_state'] = "The content has very low uniqueness and closely mirrors existing material. Extensive rewriting is required to enhance human authorship, clarity, and overall content quality.";
        } 
        else {
            $plagiarism_info['three_do_state'] = "The uniqueness analysis could not produce a reliable result. A manual review is recommended to accurately assess content authenticity.";
        }

    } else {

        $dominated_score = $pl;
        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_text'] = 'Extensively Plagiarized'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_text'] = 'Highly Plagiarized'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_text'] = 'Mostly Plagiarized'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_text'] = 'Partially Plagiarized';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_text'] = 'Mostly Unique'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_text'] = 'Highly Unique';
        } else {
            $plagiarism_info['three_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_color'] = 'text-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_color'] = 'text-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_color'] = 'text-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_color'] = 'text-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_color'] = 'text-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_color'] = 'text-original'; 
        } else {
            $plagiarism_info['three_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_light'] = 'bg-light-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_light'] = 'bg-light-low'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_light'] = 'bg-light-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_light'] = 'bg-light-likely'; 
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_light'] = 'bg-light-high'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_light'] = 'bg-light-very-high'; 
        } else {
            $plagiarism_info['three_do_light'] = 'bg-light-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_border'] = 'border-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_border'] = 'border-low'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_border'] = 'border-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_border'] = 'border-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_border'] = 'border-high'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_border'] = 'border-very-high';
        } else {
            $plagiarism_info['three_do_border'] = 'border-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_state'] = "Content shows minimal similarity with other sources. It is highly original and human-written, safe for professional or academic use. Plagiarism is very low.";
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_state'] = "Content is mostly unique, with minor matches to other sources. Human authorship is clear, and only small sections may require review or citation. Plagiarism is low.";
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_state'] = "Content shows moderate similarity to existing sources. Some sections are original, while others may be Plagiarized or closely paraphrased. Review and citation may be necessary. Plagiarism is medium.";
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_state'] = "Content exhibits high similarity with other sources. Most text may be Plagiarized, requiring significant rewriting or citation to ensure originality. Plagiarism is high.";
        } elseif ($dominated_score >= 81 && $dominated_score <= 100) {
            $plagiarism_info['three_do_state'] = "Content is almost entirely Plagiarized from other sources. Very little originality is present, and it should not be used without substantial rewriting or proper citation. Plagiarism is very high.";
        } else {
            $plagiarism_info['three_do_state'] = "Plagiarism check could not produce a reliable result. Manual review is recommended to verify originality and ensure the content does not violate copyright or plagiarism standards. Plagiarism is unknown.";
        }
    }

    $plagiarism_info['three_do_score'] = $dominated_score;

    // echo "<pre>";print_r($dominated_info);die;

    return $plagiarism_info;
}



function getDefaultBlackBoxData() {

    $data = [];

    $data['one_ai'] = 50;
    $data['one_or'] = 50;
    $data['one_ai_color'] = '#d3dce3';
    $data['one_or_color'] = '#d3dce3';
    $data['one_ai_class'] = 'bg-default';
    $data['one_or_class'] = 'bg-default';
    $data['one_do_score'] = 0;
    $data['one_do_text'] = 'Unknown';
    $data['one_do_color'] = 'text-default';
    $data['one_do_light'] = 'bg-light-default';
    $data['one_do_border'] = 'border-default';
    $data['one_do_state'] = 'No analysis has been performed yet. PlagiGuardAI is ready to scan and deliver reliable AI classification results.';

    $data['two_ai'] = 50;
    $data['two_or'] = 50;
    $data['two_ai_color'] = '#d3dce3';
    $data['two_or_color'] = '#d3dce3';
    $data['two_ai_class'] = 'bg-default';
    $data['two_or_class'] = 'bg-default';
    $data['two_do_score'] = 0;
    $data['two_do_text'] = 'Unknown';
    $data['two_do_color'] = 'text-default';
    $data['two_do_light'] = 'bg-light-default';
    $data['two_do_border'] = 'border-default';
    $data['two_do_state'] = 'No analysis has been performed yet. PlagiGuardAI is ready to scan and deliver reliable AI confidence results.';

    $data['three_pl'] = 50;
    $data['three_or'] = 50;
    $data['three_pl_color'] = '#d3dce3';
    $data['three_or_color'] = '#d3dce3';
    $data['three_pl_class'] = 'bg-default';
    $data['three_or_class'] = 'bg-default';
    $data['three_do_score'] = 0;
    $data['three_do_text'] = 'Unknown';
    $data['three_do_color'] = 'text-default';
    $data['three_do_light'] = 'bg-light-default';
    $data['three_do_border'] = 'border-default';
    $data['three_do_state'] = 'No analysis has been performed yet. PlagiGuardAI is ready to scan and deliver reliable Plagiarism results.';

    $data['created_at'] = '';

    return $data;
}

function getScanOverviewDataOLD($scan=[]) {

    $data = [];

    $ai_classification = json_decode($scan['ai_classification'], true);
    $data['one_ai'] = $ai_classification['AI'] * 100;
    $data['one_or'] = $ai_classification['Original'] * 100;
    $classificationData = getClassificationOverview($data['one_ai'], $data['one_or']);

    $data = array_merge($data, $classificationData);

    $ai_confidence = json_decode($scan['ai_confidence'], true);
    $data['two_ai'] = $ai_confidence['AI'] * 100;
    $data['two_or'] = $ai_confidence['Original'] * 100;
    $confidenceData = getConfidenceOverview($data['two_ai'], $data['two_or']);

    $data = array_merge($data, $confidenceData);

    $plagiarism_score = json_decode($scan['plagiarism_score'], true);
    $data['three_pl'] = $plagiarism_score['score'];
    $data['three_or'] = 100 - $plagiarism_score['score'];
    $PlagiarismData = getPlagiarismOverview($data['three_pl'], $data['three_or']);

    $data = array_merge($data, $PlagiarismData);

    return $data;
}

function getScanOverviewData($scan=[]) {

    $data = [];
    if ($scan['status'] == 'completed') {
        $ai_classification = json_decode($scan['ai_classification'], true);
        $data['one_ai'] = $ai_classification['AI'] * 100;
        $data['one_or'] = $ai_classification['Original'] * 100;
        $classificationData = getClassificationOverview($data['one_ai'], $data['one_or']);

        $data = array_merge($data, $classificationData);

        $ai_confidence = json_decode($scan['ai_confidence'], true);
        $data['two_ai'] = $ai_confidence['AI'] * 100;
        $data['two_or'] = $ai_confidence['Original'] * 100;
        $confidenceData = getConfidenceOverview($data['two_ai'], $data['two_or']);

        $data = array_merge($data, $confidenceData);

        $plagiarism_score = json_decode($scan['plagiarism_score'], true);
        $data['three_pl'] = $plagiarism_score['score'];
        $data['three_or'] = 100 - $plagiarism_score['score'];
        $PlagiarismData = getPlagiarismOverview($data['three_pl'], $data['three_or']);

        $data = array_merge($data, $PlagiarismData);
    }else{

        $data['one_ai'] = 0;
        $data['one_or'] = 0;
        $data['one_do_text'] = '-';
        $data['one_do_color'] = 'text-default';
        $data['one_do_icon'] = 'svg-icon-default';
        $data['one_do_score'] = 0;
        $data['two_ai'] = 0;
        $data['two_or'] = 0;
        $data['two_do_text'] = '-';
        $data['two_do_color'] = 'text-default';
        $data['two_do_icon'] = 'svg-icon-default';
        $data['two_do_score'] = 0;
        $data['three_pl'] = 0;
        $data['three_or'] = 0;
        $data['three_do_text'] = '-';
        $data['three_do_color'] = 'text-default';
        $data['three_do_icon'] = 'svg-icon-default';
        $data['three_do_score'] = 0;
    }
    return $data;
}

function getScanOverviewObj(object $scan): object
{
    $data = [];

    if ($scan->status === 'completed') {

        $ai_classification = json_decode($scan->ai_classification, true);
        $data['one_ai'] = $ai_classification['AI'] * 100;
        $data['one_or'] = $ai_classification['Original'] * 100;

        $classificationData = getClassificationOverview($data['one_ai'], $data['one_or']);
        $data = array_merge($data, $classificationData);


        $ai_confidence = json_decode($scan->ai_confidence, true);
        $data['two_ai'] = $ai_confidence['AI'] * 100;
        $data['two_or'] = $ai_confidence['Original'] * 100;

        $confidenceData = getConfidenceOverview($data['two_ai'], $data['two_or']);
        $data = array_merge($data, $confidenceData);


        $plagiarism_score = json_decode($scan->plagiarism_score, true);
        $data['three_pl'] = $plagiarism_score['score'];
        $data['three_or'] = 100 - $plagiarism_score['score'];

        $PlagiarismData = getPlagiarismOverview($data['three_pl'], $data['three_or']);
        $data = array_merge($data, $PlagiarismData);

    } else {

        $data = [
            'one_ai' => 0,
            'one_or' => 0,
            'one_do_text' => '-',
            'one_do_color' => 'text-default',
            'one_do_icon' => 'svg-icon-default',
            'one_do_score' => 0,

            'two_ai' => 0,
            'two_or' => 0,
            'two_do_text' => '-',
            'two_do_color' => 'text-default',
            'two_do_icon' => 'svg-icon-default',
            'two_do_score' => 0,

            'three_pl' => 0,
            'three_or' => 0,
            'three_do_text' => '-',
            'three_do_color' => 'text-default',
            'three_do_icon' => 'svg-icon-default',
            'three_do_score' => 0
        ];
    }

    // return as object instead of array
    return (object) $data;
}


function getClassificationOverview($ai=0, $or=0) {

    $classification_info = [];

    // dominated score
    $dominated_score = '';
    if ($or > $ai) {

        // $dominated_info['type'] = 'UNIQUENESS';
        $dominated_score = $or;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_text'] = 'AI Generated'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_text'] = 'High AI'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_text'] = 'Likely AI'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_text'] = 'Partial AI';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_text'] = 'Mostly Human'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_text'] = 'Original Content';
        } else {
            $classification_info['one_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_color'] = 'text-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_color'] = 'text-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_color'] = 'text-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_color'] = 'text-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_color'] = 'text-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_color'] = 'text-original'; 
        } else {
            $classification_info['one_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_icon'] = 'svg-icon-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_icon'] = 'svg-icon-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_icon'] = 'svg-icon-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_icon'] = 'svg-icon-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_icon'] = 'svg-icon-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_icon'] = 'svg-icon-original'; 
        } else {
            $classification_info['one_do_icon'] = 'svg-icon-default';
        }

        
    } else {
        // $dominated_type = 'AI';
        $dominated_score = $ai;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_text'] = 'Original Content'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_text'] = 'Mostly Human'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_text'] = 'Partial AI'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_text'] = 'Likely AI';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_text'] = 'Highly AI'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_text'] = 'AI Generated';
        } else {
            $classification_info['one_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_color'] = 'text-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_color'] = 'text-low';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_color'] = 'text-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_color'] = 'text-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_color'] = 'text-high';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_color'] = 'text-very-high'; 
        } else {
            $classification_info['one_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $classification_info['one_do_icon'] = 'svg-icon-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $classification_info['one_do_icon'] = 'svg-icon-low';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $classification_info['one_do_icon'] = 'svg-icon-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $classification_info['one_do_icon'] = 'svg-icon-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $classification_info['one_do_icon'] = 'svg-icon-high';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $classification_info['one_do_icon'] = 'svg-icon-very-high'; 
        } else {
            $classification_info['one_do_icon'] = 'svg-icon-default';
        }

    }

    $classification_info['one_do_score'] = $dominated_score;

    return $classification_info;
}

function getConfidenceOverview($ai=0, $or=0) {

    $confidence_info = [];

    // dominated score
    $dominated_score = '';
    if ($or > $ai) {

        // $dominated_info['type'] = 'UNIQUENESS';
        $dominated_score = $or;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_text'] = 'AI Generated'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_text'] = 'High AI'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_text'] = 'Likely AI'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_text'] = 'Partial AI';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_text'] = 'Mostly Human'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_text'] = 'Original Content';
        } else {
            $confidence_info['two_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_color'] = 'text-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_color'] = 'text-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_color'] = 'text-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_color'] = 'text-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_color'] = 'text-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_color'] = 'text-original'; 
        } else {
            $confidence_info['two_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_icon'] = 'svg-icon-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_icon'] = 'svg-icon-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_icon'] = 'svg-icon-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_icon'] = 'svg-icon-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_icon'] = 'svg-icon-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_icon'] = 'svg-icon-original'; 
        } else {
            $confidence_info['two_do_icon'] = 'svg-icon-default';
        }
        
    } else {
        // $dominated_type = 'AI';
        $dominated_score = $ai;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_text'] = 'Original Content'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_text'] = 'Mostly Human'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_text'] = 'Partial AI'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_text'] = 'Likely AI';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_text'] = 'Highly AI'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_text'] = 'AI Generated';
        } else {
            $confidence_info['two_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_color'] = 'text-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_color'] = 'text-low';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_color'] = 'text-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_color'] = 'text-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_color'] = 'text-high';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_color'] = 'text-very-high'; 
        } else {
            $confidence_info['two_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $confidence_info['two_do_icon'] = 'svg-icon-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $confidence_info['two_do_icon'] = 'svg-icon-low';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $confidence_info['two_do_icon'] = 'svg-icon-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $confidence_info['two_do_icon'] = 'svg-icon-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $confidence_info['two_do_icon'] = 'svg-icon-high';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $confidence_info['two_do_icon'] = 'svg-icon-very-high'; 
        } else {
            $confidence_info['two_do_icon'] = 'svg-icon-default';
        }
    }

    $confidence_info['two_do_score'] = $dominated_score;

    return $confidence_info;
}

function getPlagiarismOverview($pl=0, $or=0) {

    $plagiarism_info = [];

    // dominated score
    $dominated_score = '';
    if ($pl > $or) {
        // $dominated_type = 'PLAGIARISM';
        $dominated_score = $pl;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_text'] = 'Highly Unique'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_text'] = 'Mostly Unique'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_text'] = 'Partially Plagiarized'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_text'] = 'Mostly Plagiarized';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_text'] = 'Highly Plagiarized'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_text'] = 'Extensively Plagiarized';
        } else {
            $plagiarism_info['three_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_color'] = 'text-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_color'] = 'text-low';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_color'] = 'text-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_color'] = 'text-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_color'] = 'text-high';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_color'] = 'text-very-high'; 
        } else {
            $plagiarism_info['three_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-original'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-low';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-medium'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-likely';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-high';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-very-high'; 
        } else {
            $plagiarism_info['three_do_icon'] = 'svg-icon-default';
        }

    } elseif ($or > $pl) {
        // $dominated_info['type'] = 'UNIQUENESS';
        $dominated_score = $or;

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_text'] = 'Extensively Plagiarized'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_text'] = 'Highly Plagiarized'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_text'] = 'Mostly Plagiarized'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_text'] = 'Partially Plagiarized';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_text'] = 'Mostly Unique'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_text'] = 'Highly Unique';
        } else {
            $plagiarism_info['three_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_color'] = 'text-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_color'] = 'text-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_color'] = 'text-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_color'] = 'text-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_color'] = 'text-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_color'] = 'text-original'; 
        } else {
            $plagiarism_info['three_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-original'; 
        } else {
            $plagiarism_info['three_do_icon'] = 'svg-icon-default';
        }

    } else {

        $dominated_score = $pl;
        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_text'] = 'Extensively Plagiarized'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_text'] = 'Highly Plagiarized'; 
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_text'] = 'Mostly Plagiarized'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_text'] = 'Partially Plagiarized';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_text'] = 'Mostly Unique'; 
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_text'] = 'Highly Unique';
        } else {
            $plagiarism_info['three_do_text'] = 'Unknown';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_color'] = 'text-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_color'] = 'text-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_color'] = 'text-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_color'] = 'text-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_color'] = 'text-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_color'] = 'text-original'; 
        } else {
            $plagiarism_info['three_do_color'] = 'text-default';
        }

        if ($dominated_score >= 0 && $dominated_score <= 20) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-very-high'; 
        } elseif ($dominated_score >= 21 && $dominated_score <= 40) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-high';
        } elseif ($dominated_score >= 41 && $dominated_score <= 60) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-likely'; 
        } elseif ($dominated_score >= 61 && $dominated_score <= 80) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-medium';
        } elseif ($dominated_score >= 81 && $dominated_score <= 95) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-low';
        } elseif ($dominated_score >= 96 && $dominated_score <= 100) {
            $plagiarism_info['three_do_icon'] = 'svg-icon-original'; 
        } else {
            $plagiarism_info['three_do_icon'] = 'svg-icon-default';
        }
    }

    $plagiarism_info['three_do_score'] = $dominated_score;

    // echo "<pre>";print_r($dominated_info);die;

    return $plagiarism_info;
}

function get_file_data($customer_id, $file = []) {

    $data = [
        'file_link' => 'javascript:void(0)',
        'icon_path' => base_url() . 'assets/media/svg/files/default.svg'
    ];

    if (!is_array($file) || empty($file)) {
        return $data;
    }

    if (!isset($file['file_name']) || trim($file['file_name']) === '') {
        return $data;
    }

    $customer_id = (int) $customer_id;
    $file_name   = trim($file['file_name']);
    $extension = trim($file['file_type']);

    switch ($extension) {
        case 'docx':
            $file_path = FCPATH . "uploads/docs/customer_{$customer_id}/{$file_name}";

            if (!file_exists($file_path)) {
                return $data;
            }
            // $data['file_link'] = base_url() . "uploads/docs/customer_{$customer_id}/{$file_name}";
            $data['file_link'] = base_url('file_manager/download?n='.$file_name."&e=".$extension);
            $data['icon_path'] = base_url() . 'assets/media/svg/files/doc.svg';
            break;

        case 'txt':
            $file_path = FCPATH . "uploads/text/customer_{$customer_id}/{$file_name}";

            if (!file_exists($file_path)) {
                return $data;
            }

            // $data['file_link'] = base_url() . "uploads/text/customer_{$customer_id}/{$file_name}";
            $data['file_link'] = base_url('file_manager/download?n='.$file_name."&e=".$extension);
            $data['icon_path'] = base_url() . 'assets/media/svg/files/txt.svg';
            break;
    }

    return $data;
}

function getAdminAvatar($image=''){
    $avatar_path = '';
    if ($image) {
        $avatar_path = FCPATH . 'uploads/avatar/admin/'.$image;
        if (file_exists($avatar_path)) {
            $avatar_path = base_url() . 'uploads/avatar/admin/'.$image;
        }
    }
    return $avatar_path;
}

function daysToYearMonthString($days)
{
    if ($days < 365) {
        $months = floor($days / 30);
        return $months . ' month' . ($months > 1 ? 's' : '');
    }

    $years  = floor($days / 365);
    $remain = $days % 365;
    $months = floor($remain / 30);

    if ($months > 0) {
        return $years . ' year' . ($years > 1 ? 's' : '') . ' ' .
               $months . ' month' . ($months > 1 ? 's' : '');
    }

    return $years . ' year' . ($years > 1 ? 's' : '');
}

function formatPlanPromo($credits, $days, $price) {
    $duration = daysToYearMonthString($days);
    return "{$credits} Credits for {$duration} - Only ₨ " . number_format($price) . "!";
}

function formatDate($activationDate)
{
    $dateObj = DateTime::createFromFormat('Y-m-d', $activationDate);
    $dateObj->setTime(0, 0, 0);
    return $date = $dateObj->format('Y-m-d H:i:s');
}

function getEndDate($activationDate, $durationDays)
{
    $dateObj = DateTime::createFromFormat('Y-m-d', $activationDate);
    $dateObj->setTime(0, 0, 0);
    $dateObj->modify("+{$durationDays} days");

    return $date = $dateObj->format('Y-m-d H:i:s');
}

function getTodayDate()
{
    $today = new DateTime();
    $today->setTime(0, 0, 0);

    $todayStr = $today->format('Y-m-d H:i:s');

    return $todayStr;

}

function getMonthsTillCurrent()
{
    $currentMonth = date('n'); // 1 to 12
    $months = [];

    for ($i = 1; $i <= $currentMonth; $i++) {
        $months[] = [
            'number' => str_pad($i, 2, '0', STR_PAD_LEFT), // 01, 02, ...
            'name'   => date('F', mktime(0, 0, 0, $i, 1))  // January, February...
        ];
    }

    return $months;
}

function generateInvoiceNumber($prefix = 'PLAGI') {
    return $prefix . '-' . strtoupper(substr(md5(uniqid()), 0, 6));
}

function getPerCreditPrice($totalPrice, $totalCredits)
{
    if ($totalCredits == 0) {
        return 0;
    }
    return $totalPrice / $totalCredits;
}
function getplanText(){
    return $text = [
        "1"  => "Silver",
        "2"  => "Gold",
        "3"  => "Platinum",
        "4"  => "Diamond",
        "5"  => "Elite",
        "6"  => "Legend"
    ];
}

function get_footer_links(){
    return array(
        '1' => array(
            'title' => 'Pricing',
            'link' => base_url().'home/pricing/',
        ),
        '2' => array(
            'title' => 'Blogs',
            'link' => base_url().'blogs/',
        ),
        '3' => array(
            'title' => 'Contact Us',
            'link' => base_url().'home/contact_us/',
        )
    );
}









