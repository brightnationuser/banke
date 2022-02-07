<?php

global $wp;
global $sitepress;

/**
 * Data that will be accessible in every view.
 */

if (is_single()) {
    $post_type = get_query_var('post_type');
    $body_additional = 'p-' . $post_type;
} elseif (is_post_type_archive()) {
    $post_type = get_query_var('post_type');
    $body_additional = 'archive-' . $post_type;
} else {
    $_post = get_queried_object();
    $body_additional = 'p-' . $_post->post_name;
}

// because wpml_active_languages won't return any
// languages at all if the post type is set to not translatable
// we hand it a dummy array with the default site wide language

$default_language = $sitepress->get_default_language();

$languages = apply_filters('wpml_active_languages', NULL, 'skip_missing=0&orderby=id&order=desc') ?: array(
    array(
        'active' => 1,
        'url' => home_url($wp->request),
        'language_code' => $default_language
    )
);

$data = array(
    //'menu' => new Classy\Menu(),
    'body_additional' => $body_additional,
    'languages' => $languages
);