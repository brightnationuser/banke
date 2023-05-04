<?php

$framework = get_theme_framework();

$post = $framework::get_post();

$image = get_field('product_image', $post->ID);
$features = get_field('product_features', $post->ID);
$specifications = get_field('product_specifications', $post->ID);

$data = compact(
    'post',
    'image',
    'features',
    'specifications'
);
