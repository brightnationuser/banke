<?php
/**
 * Theme main config.
 *
 * @package Classy
 */

/**
 * Textdomain.
 * If you're translating a theme, you'll need to use a text domain to denote all text belonging to that theme.
 *
 * @link https://codex.wordpress.org/I18n_for_WordPress_Developers
 * @var string
 */
$textdomain = 'themename';

/**
 * Environment.
 * Can be development/production.
 * In this theme it is used to deliver minified assets when environment is production and originals for development.
 *
 * @var string
 */
$environment = 'production';


/**
 * Minify Html.
 * If you want to have your html minified - set this to true.
 *
 * @var boolean
 */
$minify_html = false;

/**
 * Theme Post types.
 *
 * @link https://github.com/anrw/classy/wiki/Custom-post-types
 * @var array
 */
$post_types = array(
    'news' => array(
        'config' => array(
            'public' => true,
            //'exclude_from_search' => true,
            'menu_position' => 6,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'page-attributes',
            ),
            'show_in_nav_menus' => true,
            'rewrite' => array('with_front' => false),
            // with_front по умолчанию стоит true, а значит если в настройках пермалинка поставить /blogs/ то все абсолютно ссылки будут
            // префикшены этим /blogs/. Поставив with_front на false мы говорим, что этому post_type не нужно смотреть на наши настройки пермалинка
            // Все последующие новые post_type аналогично нужно указывать с этим параметром на false
            // Если понадобится здесь же можно и указать параметр 'slug' => 'что-то' если нужно кастомный url для post_type
            'show_in_rest' => true,
        ),
        'singular' => __( 'News', 'textdomain' ),
        'multiple' => __( 'News', 'textdomain' ),
    ),
);

/**
 * Theme Taxonomies.
 *
 * @link https://github.com/anrw/classy/wiki/Taxonomies
 * @var array
 */
$taxonomies = array(
//    'gallery-category' => array(
//        'for'		=> array( 'post' ),
//        'config'  	=> array(
//            'sort' 			=> true,
//            'args' 			=> array( 'orderby' => 'term_order' ),
//            'hierarchical' 	=> true,
//        ),
//        'singular'	=> 'Category',
//        'multiple'	=> 'Categories',
//    ),
);

/**
 * Theme post formats.
 *
 * @link https://github.com/anrw/classy/wiki/Post-formats
 * @var array
 */
$post_formats = array(
    'aside',
    'gallery',
    'link',
);

/**
 * Sidebars.
 *
 * @link https://github.com/anrw/classy/wiki/Sidebars
 * @var array
 */
$sidebars = array();


/**
 * Classy allows you to include custom modules, functions that are located in `app/custom/` directory.
 * To include them, just write here relative path like this:
 *
 * To include one file: `module/init.php`
 * To include all files from dir: `functions/*.php`
 *
 * @var array
 */
$include = array(
    'theme_settings.php',
    'redirects.php',
    're_order_menu.php',
    'spam.php',
);
