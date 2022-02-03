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
        && (is_page('epto-systems') || is_page('the-full-electric-powertrains') || is_page('electric-chassis-pto'))
    ) {
        $classes[] = "current-menu-item";
    }
    return $classes;
}
