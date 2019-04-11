<?php

//ИСПРАВЛЕНИЕ ОШИБКИ 404 В РЕЗУЛЬТАТАХ ПОИСКА!!!
//Поменял тут 999 на 1 и заработало https://cl.ly/4fc106e73822
//ВНИМАНИЕ - везде надо указывать 'posts_per_page' => -1, так как по умолчанию он как раз и будет равен 1
//Объяснение тут внизу https://wordpress.stackexchange.com/questions/83481/wordpress-triggers-404-on-page-2-for-custom-search-query


/**
 * Data that will be accessible on archive page (index).
 */
$framework = get_theme_framework();

$posts = $framework::get_posts([
    'post_type' => ['events', 'podcasts', 'post'],
    'posts_per_page' => 10,

    's' => $_GET['s'],
]);

//dd($posts);

//global $wp_query;
//$total_results = $wp_query->found_posts;

$data = compact(
    'posts'
);