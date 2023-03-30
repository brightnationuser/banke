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

$_case_studies = new WP_Query([
    'post_type' => 'case_studies',
    'posts_per_page' => 4,
    'paged' => $current_page,

]);

$case_studies = [];

foreach ($_case_studies->posts as $item) {

    $case_studies[] = $framework::get_post([
        'post_type' => 'case_studies',
        'post__in' => [$item->ID]
    ]);

}

$links = paginate_links([
    'format' => '?cpage=%#%',
    'current' => max( 1, get_query_var('cpage') ),
    'total' => $_case_studies->max_num_pages,
    'prev_text' => _x( 'Previous', 'previous set of posts' ),
    'next_text' => _x( 'Next', 'next set of posts' ),
]);

$pagination_layout = _navigation_markup( $links, 'pagination', '');

$data = compact(
    'page',
    '_case_studies',
    'case_studies',
    'pagination_layout'
);
