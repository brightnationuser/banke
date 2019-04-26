<?php
$framework = get_theme_framework();

$page = $framework::get_post();

$query = [
    'acf_date' => array(
        'key' => 'acf_date',
        'compare' => 'EXISTS'
    ),
];

$references = $framework::get_posts([
    'post_type' => 'page',
    'post_parent' => 214,
    'posts_per_page' => -1,
]);

$data = compact(
    'page',
    'references'
);
