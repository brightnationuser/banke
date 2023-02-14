<?php
$framework = get_theme_framework();

$post = $framework::get_post();

$references = $framework::get_posts([
    'post_type' => 'page',
    'post_parent' => 214,
    'posts_per_page' => -1,
]);

$case_studies = $framework::get_posts([
    'post_type' => 'case_studies',
    'posts_per_page' => -1,
]);

if (count($case_studies) < 4) {
    $references_filling = $framework::get_posts([
        'post_type' => 'page',
        'post_parent' => 214,
        'posts_per_page' => 4 - count($case_studies),
    ]);
    $case_studies = array_merge($case_studies, $references_filling);

}

$data = compact(
    'post', 'references', 'case_studies'
);