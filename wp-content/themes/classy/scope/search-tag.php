<?php

$framework = get_theme_framework();

$tag = $_GET['tagtitle'];

$posts = $framework::get_posts([
    'post_type' => ['events', 'podcasts', 'post'],
	'meta_query'	=> array(
		array(
			'key'	 	=> 'acf_tags',
			'value'	  	=> get_page_by_title($tag, OBJECT, array('tag'))->ID,
			'compare' 	=> 'LIKE',
		)
	),
    'posts_per_page' => 10,
], '\Classy\Models\BasisPost');

$data = compact(
    'posts', 'tag'
);