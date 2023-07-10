<?php
$framework = get_theme_framework();

$page = $framework::get_post();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$query = [
    'acf_date' => array(
        'key' => 'acf_date',
        'compare' => 'EXISTS'
    ),
];

$_news = new WP_Query([
    'post_type' => 'team',
    'posts_per_page' => 9,
    'paged' => $paged,
    'orderby' => 'acf_date',
    'order' => 'DESC',
    'meta_query' => $query,
]);

if ($_news->have_posts()) {
    if ($paged > $_news->max_num_pages) {
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        wp_redirect( '/404' );
    }
}

$news = [];

foreach ($_news->posts as $item) {

    $news[] = $framework::get_post([
        'post_type' => 'team',
        'post__in' => [$item->ID]
    ]);

}

$links = paginate_links([
    'current' => max( 1, get_query_var('paged') ),
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
