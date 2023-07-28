<?php

if (!function_exists('write_log')) {

    function write_log($log)
    {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}

function get_news_by_tag()
{
    global $wp_query;

    $tags = $_POST['tags'];
    $page_id = $_POST['page_id'];
    $framework = get_theme_framework();
    $posts_per_page = 9;
    $current_page = isset($_POST['current_page']) ? $_POST['current_page'] : 1;
    $offset = $posts_per_page * ($current_page - 1);
    $tax_query = array();

    if ($tags) {
        $tax_query[] = array(
            'taxonomy' => 'news-tag',
            'field' => 'slug',
            'terms' => $tags,
        );
    };

    $news = $framework::get_posts(
        array(
            'post_type' => 'news',
            'posts_per_page' => $posts_per_page,
            'offset' => $offset,
            'tax_query' => $tax_query
        )
    );

    $total = $wp_query->found_posts;
    $total_pages = ceil($total / $posts_per_page);
    $base = get_permalink($page_id) . '?' . '%_%';

    $links = paginate_links([
        'base' => $base,
        'format' => 'page=%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text' => _x('Previous', 'previous set of posts'),
        'next_text' => _x('Next', 'next set of posts'),
        'end_size' => 0,
        'mid_size' => $current_page > 1 ? 0 : 1,
    ]);

    $pagination_layout = _navigation_markup($links, 'pagination', '');

    $data = compact(
        'news',
        'pagination_layout'
    );

    $framework::render('ajax/news', $data);

    exit();
}

add_action('wp_ajax_get_news_by_tag', 'get_news_by_tag');
add_action('wp_ajax_nopriv_get_news_by_tag', 'get_news_by_tag');