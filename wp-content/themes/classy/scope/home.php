<?php
$framework = get_theme_framework();

$post = $framework::get_post();

$data = compact(
    'post'
);