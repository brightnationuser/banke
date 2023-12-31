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

$two_columns_layout = $post->getAcfByKey('two_columns_layout');

$related = $framework::get_posts([
    'post_type' => 'team',
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
    'slider',
    'two_columns_layout'
);
