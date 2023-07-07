<?php

$framework = get_theme_framework();

$post = $framework::get_post();

$current_language = apply_filters( 'wpml_current_language', null );

function get_back_button_translation($language) {
    switch ($language) {
        case 'en':
            return "back to all products";
        case 'de':
            return "zurück zu allen Produkten";
    }
};

$back_button_text = get_back_button_translation($current_language);

$pre_title = get_field('product_pre_title', $post->ID);
$image = get_field('product_image', $post->ID);
$features = get_field('product_features', $post->ID);
$specifications = get_field('product_specifications', $post->ID);

$data = compact(
    'pre_title',
    'post',
    'image',
    'features',
    'specifications',
    'back_button_text'
);
