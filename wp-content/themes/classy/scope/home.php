<?php
$framework = get_theme_framework();

$post = $framework::get_post();

$references = $framework::get_posts([
    'post_type' => 'page',
    'post_parent' => 214,
    'posts_per_page' => -1,
]);

$data = compact(
    'post', 'references'
);