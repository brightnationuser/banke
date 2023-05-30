<?php

$framework = get_theme_framework();

$post = $framework::get_post();

$references = $framework::get_posts([
    'post_type' => 'page',
    'post_parent' => 214,
    'orderby' => 'rand',
    'posts_per_page' => -1,
]);

//Related insights

$related_insights_title = get_field("related_insights_title", $post->post_id);
$related_insights_insights = get_field("related_insights_insights", $post->post_id);

$related_insights_posts = $related_insights_insights ? get_posts(array(
    'post_type' => 'news',
    'post__in' => $related_insights_insights,
    'posts_per_page' => 15
)) : array(); //if there are insights - get them, otherwise return an empty array

$related_insights_formatted = array_map(function ($post) {
    return array(
        'title' => $post->post_title,
        'url' => get_permalink($post->ID),
        'image' => wp_get_attachment_image_url(get_field('acf_image', $post->ID), 'large')
    );
}, $related_insights_posts);

$related_insights = array(
    'title' => $related_insights_title,
    'insights' => $related_insights_formatted
);

$products_title = get_field('acf_title_main', $post->ID);

$specifications_title = get_field('specifications_title', $post->ID);
$specifications_button = get_field('specifications_button', $post->ID);

$products = $framework::get_posts([
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent' => $post->ID,
]);

$data = compact(
    'post',
    'references',
    'related_insights',
    'products_title',
    'specifications_title',
    'specifications_button',
    'products'
);
