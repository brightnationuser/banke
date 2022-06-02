<?php
$framework = get_theme_framework();

$post = $framework::get_post(false);

// News carousel
$related = $framework::get_posts([
    'post_type' => 'stories',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'post__not_in' => [$post->ID],
    'orderby' => 'date',
    'order' => 'DESC',
]);

$slider = $post->getAcfByKey('slider');

$data = compact(
    'post',
    'related',
    'slider'
);