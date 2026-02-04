<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get_author_image($image='')
{
	$avatar = '';
    if ($image) {
        $image_path = FCPATH . 'uploads/avatar/authors/' . $image;
        if (file_exists($image_path)) {
            $avatar = base_url('uploads/avatar/authors/' . $image);
        }
    }
    return $avatar;
}

function get_post_thumbnail($post_id, $image='')
{
	$thumb = '';
    if ($image) {
    	$image_path = FCPATH . 'uploads/blogs/post_'.(int)$post_id.'/'.$image;
        if (file_exists($image_path)) {
            $thumb = base_url('uploads/blogs/post_'.(int)$post_id.'/'.$image);
        }
    }
    return $thumb;
}

function get_post_image($post_id, $image='')
{
    $thumb = '';
    if ($image) {
        $image_path = FCPATH . 'uploads/blogs/post_'.(int)$post_id.'/'.$image;
        if (file_exists($image_path)) {
            $thumb = base_url('uploads/blogs/post_'.(int)$post_id.'/'.$image);
        }
    }
    return $thumb;
}