<?php
$framework = get_theme_framework();

/* @var $post \Classy\Models\Post */
$post = $framework::get_post();

$data = compact(
    'post'
);