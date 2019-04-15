<?php
$framework = get_theme_framework();

$post = $framework::get_post(false);

// News carousel
$query = [
    'acf_date' => array(
        'key' => 'acf_date',
        'compare' => 'EXISTS'
    ),
];
$news_carousel = $framework::get_posts([
    'post_type' => 'news',
    'posts_per_page' => 10,
    'orderby' => 'acf_date',
    'order' => 'DESC',
    'meta_query' => $query,
]);

$data = compact(
    'post',
    'news_carousel'
);