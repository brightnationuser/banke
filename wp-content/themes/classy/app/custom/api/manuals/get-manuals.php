<?php
require_once 'get-tags.php';

add_action('wp_ajax_user_get__manuals', 'user_get__manuals');
add_action('wp_ajax_nopriv_user_get__manuals', 'user_get__manuals');

function user_get__manuals() {

    $my_current_lang = apply_filters( 'wpml_current_language', NULL );

    $query = new WP_Query([
        'post_type' => 'manuals',
        'suppress_filters' => false,
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ]);

    $manuals = $query->get_posts();

    $response = process_posts($manuals);

    echo json_encode($response);

    wp_die();
}

add_action('wp_ajax_user_get__manuals_by_term', 'user_get__manuals_by_term');
add_action('wp_ajax_nopriv_user_get__manuals_by_term', 'user_get__manuals_by_term');

function user_get__manuals_by_term() {

    $term_slug = $_POST['term_slug'];
    $tax_query = [];

    if($term_slug !== '*') {
        $tax_query = [
            [
                'taxonomy' => 'manual-type',
                'field' => 'slug',
                'terms' => $term_slug,
            ]
        ];
    }

    $query = new WP_Query([
        'post_type' => 'manuals',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' => $tax_query
    ]);

    $manuals = $query->get_posts();

    $response = process_posts($manuals);

    echo json_encode($response);

    wp_die();
}
