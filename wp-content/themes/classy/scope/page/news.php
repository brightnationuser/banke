<?php
$framework = get_theme_framework();

$page = $framework::get_post();

$current_page = $_GET['page'];

$current_language = apply_filters( 'wpml_current_language', null );


$tags_text_singular = $current_language == 'en' ? 'tag' : 'schild';
$tags_text_plural = $current_language == 'en' ? 'tags' : 'stichworte';

$show_less_tags_text = $current_language == 'en' ? 'show less' : 'zeige weniger';

$tags = get_terms('news-tag');

$query = [
    'acf_date' => array(
        'key' => 'acf_date',
        'compare' => 'EXISTS'
    ),
];

$_news = new WP_Query([
    'post_type' => 'news',
    'posts_per_page' => 9,
    'paged' => $current_page,
    'orderby' => 'acf_date',
    'order' => 'DESC',
    'meta_query' => $query,
]);

$news = [];

foreach ($_news->posts as $item) {

    $news[] = $framework::get_post([
        'post_type' => 'news',
        'post__in' => [$item->ID]
    ]);

}

$links = paginate_links([
    'format' => '?page=%#%',
    'current' => max(1, get_query_var('page')),
    'total' => $_news->max_num_pages,
    'prev_text' => _x('Previous', 'previous set of posts'),
    'next_text' => _x('Next', 'next set of posts'),
//    'type' => 'array',
    'end_size' => 0,
    'mid_size' => get_query_var('page') > 1 ? 0 : 1,
]);

//var_dump($links);

//$current = $links['current'];
//
//$allowed = [
//    ' current',
//    'prev ',
//    'next ',
//    ' dots',
//    '/news/',
//    sprintf('/news/?cpage=%d/', $current - 1),
//    sprintf('/news/?cpage=%d/', $current + 1)
//];

//$paginate_links = array_filter(
//    $links,
//    function ($value) use ($allowed) {
//        foreach ($allowed as $tag) {
//            if (false !== strpos($value, $tag))
//                return true;
//        }
//        return false;
//    }
//);

$pagination_layout = _navigation_markup($links, 'pagination', '');

//$pagination_layout = sprintf("<ul class='page-numbers'>\n\t<li>%s</li>\n</ul>\n", join("</li>\n\t<li>", $paginate_links));

$data = compact(
    'page',
    '_news',
    'news',
    'pagination_layout',
    'tags',
    'tags_text_singular',
    'tags_text_plural',
    'show_less_tags_text'
);
