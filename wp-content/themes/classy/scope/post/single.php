<?php
$framework = get_theme_framework();

$page = $framework::get_post();

/////////////////////featured_posts///////////////////////////
$query = [
    'acf_date' => array(
        'key' => 'acf_date',
        'compare' => 'EXISTS'
    ),
];
$posts = $framework::get_posts([
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'acf_date',
    'meta_query' => $query,
]);

$data = compact(
    'page',
    'posts'
);