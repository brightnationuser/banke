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
$related = $framework::get_posts([
    'post_type' => 'news',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'acf_date',
    'order' => 'DESC',
    'meta_query' => $query,
]);

$slider = $post->getAcfByKey('slider');

$data = compact(
    'post',
    'related',
    'slider'
);