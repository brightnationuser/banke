<?php
$framework = get_theme_framework();

$page = $framework::get_post();

$current_page = $_GET['cpage'];

$query = [
    'acf_date' => array(
        'key' => 'acf_date',
        'compare' => 'EXISTS'
    ),
];

$_news = new WP_Query([
    'post_type' => 'stories',
    'posts_per_page' => 8,
    'paged' => $current_page,
    'orderby' => 'acf_date',
    'order' => 'DESC',
    'meta_query' => $query,
]);

$news = [];

foreach ($_news->posts as $item) {

    $news[] = $framework::get_post([
        'post_type' => 'stories',
        'post__in' => [$item->ID]
    ]);

}

$links = paginate_links([
    'format' => '?cpage=%#%',
    'current' => max( 1, get_query_var('cpage') ),
    'total' => $_news->max_num_pages,
    'prev_text' => _x( 'Previous', 'previous set of posts' ),
    'next_text' => _x( 'Next', 'next set of posts' ),
]);

$pagination_layout = _navigation_markup( $links, 'pagination', '');

$data = compact(
    'page',
    '_news',
    'news',
    'pagination_layout'
);
