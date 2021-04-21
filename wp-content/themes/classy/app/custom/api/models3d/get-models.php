<?php
add_action('wp_ajax_user_get__models', 'user_get__models');
add_action('wp_ajax_nopriv_user_get__models', 'user_get__models');

function user_get__models() {

    $response = [];

    $terms = get_terms( [
        'taxonomy' => 'model-type',
        'hide_empty' => false,
    ] );

    foreach ($terms as $term) {

        $tax_query = [
            [
                'taxonomy' => 'model-type',
                'field' => 'slug',
                'terms' => $term->slug,
            ]
        ];

        $query = new WP_Query([
            'post_type' => 'models3d',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => $tax_query
        ]);

        $specifications = $query->get_posts();

        $response[$term->name] = process_posts($specifications);
    }

    echo json_encode($response);

    wp_die();
}
