<?php
$framework = get_theme_framework();

$page = $framework::get_post();

$query = [
    'acf_date' => array(
        'key' => 'acf_date',
        'compare' => 'EXISTS'
    ),
];

$news = $framework::get_posts([
    'post_type' => 'news',
    'posts_per_page' => 8,
    'orderby' => 'acf_date',
    'order' => 'DESC',
    'meta_query' => $query,
]);

$data = compact(
    'page',
    'news'
);
