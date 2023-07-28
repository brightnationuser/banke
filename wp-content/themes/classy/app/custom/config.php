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
            'has_archive' => false,
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
    'case_studies' => array(
        'config' => array(
            'public' => true,
            //'exclude_from_search' => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'page-attributes',
            ),
            'show_in_nav_menus' => true,
            'rewrite' => array( 'slug' => 'case-studies','with_front' => false),
            // with_front по умолчанию стоит true, а значит если в настройках пермалинка поставить /blogs/ то все абсолютно ссылки будут
            // префикшены этим /blogs/. Поставив with_front на false мы говорим, что этому post_type не нужно смотреть на наши настройки пермалинка
            // Все последующие новые post_type аналогично нужно указывать с этим параметром на false
            // Если понадобится здесь же можно и указать параметр 'slug' => 'что-то' если нужно кастомный url для post_type
            'show_in_rest' => true,
        ),
        'singular' => __( 'Case study', 'textdomain' ),
        'multiple' => __( 'Case studies', 'textdomain' ),
    ),
    'vacancies' => array(
        'config' => array(
            'public' => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'page-attributes',
            ),
            'show_in_nav_menus' => true,
            'rewrite' => array('with_front' => false),
            'show_in_rest' => true,
        ),
        'singular' => __( 'Vacancies', 'textdomain' ),
        'multiple' => __( 'Vacancies', 'textdomain' )
    ),
    'stories' => array(
        'config' => array(
            'public' => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'page-attributes',
            ),
            'show_in_nav_menus' => true,
            'rewrite' => array('with_front' => false),
            'show_in_rest' => true,
        ),
        'singular' => __( 'Story', 'textdomain' ),
        'multiple' => __( 'Stories', 'textdomain' )
    ),
    'manuals' => array(
        'config' => array(
            'public' => true,
            'show_in_menu' => false,
            'has_archive' => false,
            'supports' => array(
                'title',
                'page-attributes',
            ),
            'taxonomies' => array('manual-type'),
            'show_in_nav_menus' => false,
            'rewrite' => array('with_front' => false),
        ),
        'singular' => __( 'Manual', 'textdomain' ),
        'multiple' => __( 'Manuals', 'textdomain' ),
    ),
    'specifications' => array(
        'config' => array(
            'public' => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'page-attributes',
            ),
            'taxonomies' => array('specification-type'),
            'show_in_menu' => false,
            'show_in_nav_menus' => false,
            'rewrite' => array('with_front' => false),
        ),
        'singular' => __( 'Specification', 'textdomain' ),
        'multiple' => __( 'Specifications', 'textdomain' ),
    ),
    'models3d' => array(
        'config' => array(
            'public' => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'page-attributes',
            ),
            'taxonomies' => array('model-type'),
            'show_in_menu' => false,
            'show_in_nav_menus' => false,
            'rewrite' => array('with_front' => false),
        ),
        'singular' => __( '3D model', 'textdomain' ),
        'multiple' => __( '3D models', 'textdomain' ),
    ),
    'team' => array(
        'config' => array(
            'public' => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'editor',
                'page-attributes',
            ),
            'show_in_nav_menus' => true,
            'rewrite' => array('with_front' => false, 'slug' => 'meet-banke-team'),
            // with_front по умолчанию стоит true, а значит если в настройках пермалинка поставить /blogs/ то все абсолютно ссылки будут
            // префикшены этим /blogs/. Поставив with_front на false мы говорим, что этому post_type не нужно смотреть на наши настройки пермалинка
            // Все последующие новые post_type аналогично нужно указывать с этим параметром на false
            // Если понадобится здесь же можно и указать параметр 'slug' => 'что-то' если нужно кастомный url для post_type
            'show_in_rest' => true,
        ),
        'singular' => __( 'Team member', 'textdomain' ),
        'multiple' => __( 'Team members', 'textdomain' ),
    ),

);

/**
 * Theme Taxonomies.
 *
 * @link https://github.com/anrw/classy/wiki/Taxonomies
 * @var array
 */
$taxonomies = array(
    'manual-type' => array(
        'for'		=> array( 'manuals' ),
        'config'  	=> array(
            'sort' 			=> true,
            'args' 			=> array( 'orderby' => 'term_order' ),
            'hierarchical' 	=> false,
        ),
        'singular'	=> 'Manual type',
        'multiple'	=> 'Manual types',
    ),
    'specification-type' => array(
        'for'		=> array( 'specifications' ),
        'config'  	=> array(
            'sort' 			=> true,
            'args' 			=> array( 'orderby' => 'term_order' ),
            'hierarchical' 	=> false,
        ),
        'singular'	=> 'Specification type',
        'multiple'	=> 'Specification types',
    ),
    'model-type' => array(
        'for'		=> array( 'models3d' ),
        'config'  	=> array(
            'sort' 			=> true,
            'args' 			=> array( 'orderby' => 'term_order' ),
            'hierarchical' 	=> false,
        ),
        'singular'	=> 'Models type',
        'multiple'	=> 'Models types',
    ),
    'news-tag' => array(
        'for'		=> array( 'news' ),
        'config'  	=> array(
            'sort' 			=> true,
            'args' 			=> array( 'orderby' => 'term_order' ),
            'hierarchical' 	=> false,
        ),
        'singular'	=> 'News tag',
        'multiple'	=> 'News tags',
    )
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
    'routes.php',
    'user_flow_config.php',
    'theme_settings.php',
    'redirects.php',
    're_order_menu.php',
    'spam.php',
    'functions.php',
    './api/index.php',
    'ajax/news.php'
);


function add_my_rule() {
    add_rewrite_rule('meet-banke-team/page/([0-9]+)','index.php?pagename=meet-banke-team&paged=$matches[1]','top');
    add_rewrite_rule('de/meet-banke-team/page/([0-9]+)','index.php?pagename=meet-banke-team&paged=$matches[1]&wpml_lang=de','top');
}
add_action('init', 'add_my_rule');