<?php

add_action('wp_ajax_user_run_search', 'user_run_search');
add_action('wp_ajax_nopriv_user_run_search', 'user_run_search');

function user_run_search() {

    $search = $_POST['search'];

    $user = wp_get_current_user();
    $approved = get_field('user_approved', $user);

    if($approved) {
        $categories = ['manuals', 'specifications', 'models3d'];
    }
    else {
        $categories = ['specifications', 'models3d'];
    }

    $query = new WP_Query([
        'post_type' => $categories,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        's' => $search
    ]);

    $manuals = $query->get_posts();

    $response = process_posts($manuals);

    echo json_encode($response);

    wp_die();
}
