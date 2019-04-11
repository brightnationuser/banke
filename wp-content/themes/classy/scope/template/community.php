<?php
//global $wp_query;

$framework = get_theme_framework();

@include 'community-base.php';

$posts = $framework::get_posts([
    'post_type' => ['post','discussion'],
    'order' => 'DESC',
    'posts_per_page' => 12,

    'meta_query' => [
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'key'	 	=> 'acf_community',
                'value'	  	=> $community_id,
                'compare' 	=> 'LIKE',
            )
        )
    ]

], '\Classy\Models\Post');

$data = compact(
    'page',
    'community',
    'community_permalink',
    'community_id',
    'posts'
);

