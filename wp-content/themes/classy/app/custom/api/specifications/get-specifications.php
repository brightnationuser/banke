<?php
add_action('wp_ajax_user_get__specifications', 'user_get__specifications');
add_action('wp_ajax_nopriv_user_get__specifications', 'user_get__specifications');

function user_get__specifications() {

    $response = [];

    $terms = get_terms( [
        'taxonomy' => 'specification-type',
        'hide_empty' => false,
    ] );

    foreach ($terms as $term) {

        $tax_query = [
            [
                'taxonomy' => 'specification-type',
                'field' => 'slug',
                'terms' => $term->slug,
            ]
        ];

        $query = new WP_Query([
            'post_type' => 'specifications',
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