<?php
//global $wp_query;

$framework = get_theme_framework();

$current_page = $_GET['cpage'];

$_posts = new WP_Query([
    'post_type' => 'vacancies',
    'posts_per_page' => 6,
    'paged' => $current_page,
    'order' => 'DESC'
]);

$posts = [];

foreach ($_posts->posts as $item) {

    $posts[] = $framework::get_post([
        'post_type' => 'vacancies',
        'post__in' => [$item->ID]
    ]);

}

$links = paginate_links([
    'format' => '?cpage=%#%',
    'current' => max( 1, get_query_var('cpage') ),
    'total' => $_posts->max_num_pages,
    'prev_text' => _x( 'Previous', 'previous set of posts' ),
    'next_text' => _x( 'Next', 'next set of posts' ),
]);

$pagination_layout = _navigation_markup( $links, 'pagination', '');

$data = compact(
    'posts',
    'pagination_layout'
);

