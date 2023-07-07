<?php
$framework = get_theme_framework();

$post = $framework::get_post(false);

$current_language = apply_filters( 'wpml_current_language', null );

function get_back_button_translation($language) {
    switch ($language) {
        case 'en':
            return "back to all news";
        case 'de':
            return "zurück zu allen Neuigkeiten";
    }
};

$back_button_text = get_back_button_translation($current_language);

// News carousel
$query = [
    'acf_date' => array(
        'key' => 'acf_date',
        'compare' => 'EXISTS'
    ),
];

$two_columns_layout = $post->getAcfByKey('two_columns_layout');

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
    'slider',
    'two_columns_layout',
    'back_button_text'
);
