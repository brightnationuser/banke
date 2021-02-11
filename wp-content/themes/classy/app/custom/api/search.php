<?php

add_action('wp_ajax_user_run_search', 'user_run_search');
add_action('wp_ajax_nopriv_user_run_search', 'user_run_search');

function user_run_search() {

    $search = $_POST['search'];

    $query = new WP_Query([
        'post_type' => ['manuals', 'specifications', 'models3d'],
        'post_status' => 'publish',
        'posts_per_page' => -1,
        's' => $search
    ]);

    $manuals = $query->get_posts();

    $response = process_posts($manuals);

    echo json_encode($response);

    wp_die();
}