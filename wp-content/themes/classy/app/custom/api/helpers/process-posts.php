<?php

function process_posts ($posts) {
    $response = [];

    foreach ($posts as $post) {
        $terms = get_the_terms($post->ID, 'manual-type');
        $_files = get_field('download_files', $post->ID);
        $files = [];

        foreach ($_files as $key => &$_file) {
            if($_file !== false) {
                $_file['lang'] = $key;
                $files[] = $_file;
            }
        }

        $response[] = [
            'id' =>  $post->ID,
            'image' => get_field('image', $post->ID),
            'files' => $files,
            'title' => $post->post_title,
            'category' => $terms[0]
        ];
    }

    return $response;
}