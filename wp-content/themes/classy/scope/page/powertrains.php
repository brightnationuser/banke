<?php

$framework = get_theme_framework();

$post = $framework::get_post();

//Related insights

$related_insights_title = get_field("related_insights_title", $post->post_id);
$related_insights_insights = get_field("related_insights_insights", $post->post_id);

$related_insights_posts = $related_insights_insights ? get_posts(array(
    'post_type' => 'news',
    'post__in' => $related_insights_insights,
)) : array(); //if there are insights - get them, otherwise return an empty array

$related_insights_formatted = array_map(function ($post) {
    return array(
        'title' => $post->post_title,
        'url' => get_permalink($post->ID),
        'image' => wp_get_attachment_url(get_field('acf_image', $post->ID))
    );
}, $related_insights_posts);

$related_insights = array(
    'title' => $related_insights_title,
    'insights' => $related_insights_formatted
);

$data = compact(
    'post',
    'related_insights'
);
