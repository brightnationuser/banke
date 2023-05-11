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

function disable_feed() {
    wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'disable_feed', 1);
add_action('do_feed_rdf', 'disable_feed', 1);
add_action('do_feed_rss', 'disable_feed', 1);
add_action('do_feed_rss2', 'disable_feed', 1);
add_action('do_feed_atom', 'disable_feed', 1);
add_action('do_feed_rss2_comments', 'disable_feed', 1);
add_action('do_feed_atom_comments', 'disable_feed', 1);

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
