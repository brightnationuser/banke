<?php
add_action('wp_ajax_user_get__manuals', 'user_get__manuals');
add_action('wp_ajax_nopriv_user_get__manuals', 'user_get__manuals');

function user_get__manuals() {

    $query = new WP_Query([
        'post_type' => 'manuals',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ]);

    $manuals = $query->get_posts();
    $response = [];

    foreach ($manuals as $manual) {
        $terms = get_the_terms($manual->ID, 'manual-type');
        $_files = get_field('download_files', $manual->ID);
        $files = [];

        foreach ($_files as $key => &$_file) {
            if($_file !== false) {
                $_file['lang'] = $key;
                $files[] = $_file;
            }
        }

        $response[] = [
            'id' =>  $manual->ID,
            'image' => get_field('image', $manual->ID),
            'files' => $files,
            'title' => $manual->post_title,
            'category' => $terms[0]
        ];
    }

    echo json_encode($response);

    wp_die();
}