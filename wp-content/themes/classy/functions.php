<?php
/**
 * Init our WordPress Theme.
 */
//require_once( __DIR__ . '/../../../../vendor/autoload.php' );
require_once(__DIR__ . '/../../../vendor/autoload.php');

\Classy\Classy::get_instance();

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{

    if (
        in_array($item->title, array('Produkte', 'Products'))
        && (is_page('epto-systems') || is_page('the-full-electric-powertrains') || is_page('electric_chassis_pto') || is_page('electric-chassis-pto'))
    ) {
        $classes[] = "current-menu-item";
    }
    return $classes;
}

//return all posts selected through ACF field type post object
add_filter('acf/fields/post_object/query', 'my_acf_fields_post_object_query', 10, 3);
function my_acf_fields_post_object_query( $args, $field, $post_id ) {
    $args['posts_per_page'] = -1;
    return $args;
}

//disable feed

function wp_disable_feeds() {
    wp_die( __('No feeds available!') );
}

add_action('do_feed', 'wp_disable_feeds', 1);
add_action('do_feed_rdf', 'wp_disable_feeds', 1);
add_action('do_feed_rss', 'wp_disable_feeds', 1);
add_action('do_feed_rss2', 'wp_disable_feeds', 1);
add_action('do_feed_atom', 'wp_disable_feeds', 1);
add_action('do_feed_rss2_comments', 'wp_disable_feeds', 1);
add_action('do_feed_atom_comments', 'wp_disable_feeds', 1);

function disable_wp_oembeds() {
    remove_action('rest_api_init', 'wp_oembed_register_route');
    add_filter('embed_oembed_discover', '__return_false');
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');

    remove_action('wp_head', 'feed_links', 2 );
    remove_action('wp_head', 'feed_links_extra', 3 );
    add_filter( 'feed_links_show_comments_feed', '__return_false' );
    add_filter( 'xmlrpc_enabled', '__return_false' );
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
}
add_action('init', 'disable_wp_oembeds');

