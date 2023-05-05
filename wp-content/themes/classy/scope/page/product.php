<?php

$framework = get_theme_framework();

$post = $framework::get_post();

$pre_title = get_field('product_pre_title', $post->ID);
$image = get_field('product_image', $post->ID);
$features = get_field('product_features', $post->ID);
$specifications = get_field('product_specifications', $post->ID);

$data = compact(
    'pre_title',
    'post',
    'image',
    'features',
    'specifications'
);
