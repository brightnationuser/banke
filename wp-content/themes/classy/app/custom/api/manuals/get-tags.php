<?php
add_action('wp_ajax_user_get__manuals_tags', 'user_get__manuals_tags');
add_action('wp_ajax_nopriv_user_get__manuals_tags', 'user_get__manuals_tags');

function user_get__manuals_tags() {

    $terms = get_terms( [
        'taxonomy' => 'manual-type',
        'hide_empty' => false,
    ] );

    $response = $terms;

    echo json_encode($response);

    wp_die();
}