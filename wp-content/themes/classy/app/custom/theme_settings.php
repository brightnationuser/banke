<?php
/**
 * Created by PhpStorm.
 * User: Zavr
 * Date: 05.07.2018
 * Time: 0:08
 */

/*-- Init Theme Settings --*/
function al_theme_setup()
{

    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array(
            'page_title' => __('Theme Settings', preg_replace('/^www\./','',$_SERVER['SERVER_NAME'])),
            //'menu_title' => __('Theme Settings', preg_replace('/^www\./','',$_SERVER['SERVER_NAME'])),
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));

        acf_add_options_sub_page(array(
            'page_title' => __('Phrases', preg_replace('/^www\./','',$_SERVER['SERVER_NAME'])),
            'menu_title' => __('Phrases', preg_replace('/^www\./','',$_SERVER['SERVER_NAME'])),
            'parent_slug' => 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title' => __('Account Translate', preg_replace('/^www\./','',$_SERVER['SERVER_NAME'])),
            'menu_title' => __('Account Translate', preg_replace('/^www\./','',$_SERVER['SERVER_NAME'])),
            'parent_slug' => '/edit.php?post_type=manuals',
        ));

        acf_add_options_sub_page(array(
            'page_title' => __('Video Gallery', preg_replace('/^www\./','',$_SERVER['SERVER_NAME'])),
            'menu_title' => __('Video Gallery', preg_replace('/^www\./','',$_SERVER['SERVER_NAME'])),
            'parent_slug' => '/edit.php?post_type=manuals',
        ));

//        acf_add_options_sub_page(array(
//            'page_title' => __('Header', preg_replace('/^www\./','',$_SERVER['SERVER_NAME'])),
//            'menu_title' => __('Header', preg_replace('/^www\./','',$_SERVER['SERVER_NAME'])),
//            'parent_slug' => 'theme-general-settings',
//        ));

    }

}
add_action('after_setup_theme', 'al_theme_setup');


function my_unregister_post_type(){
    unregister_taxonomy_for_object_type('post_tag', 'post');
    unregister_taxonomy_for_object_type('category', 'post');
}
add_action('init', 'my_unregister_post_type');


//отключить обновление
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');


//отключить обновление плагинов
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );
define( 'AUTOMATIC_UPDATER_DISABLED', true );
//define( 'DISALLOW_FILE_MODS', true );


//убрать иконку обновления из хедера
function wph_new_toolbar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'wph_new_toolbar');


//убрать текст из футера
function wph_admin_footer_text () {
    echo '';
}
add_filter('admin_footer_text', 'wph_admin_footer_text');


//убрать из меню не нужные пункты
function remove_menus(){
    //remove_menu_page( 'index.php' );                  //Консоль
    //remove_menu_page( 'edit.php' );                   //Записи
    //remove_menu_page( 'upload.php' );                 //Медиафайлы
    //remove_menu_page( 'edit.php?post_type=page' );    //Страницы
    //remove_menu_page( 'edit-comments.php' );          //Комментарии

    if (!current_user_can('super-administrator')):
        remove_menu_page( 'themes.php' );                 //Внешний вид
        remove_menu_page( 'plugins.php' );                //Плагины
        remove_menu_page( 'options-general.php' );        //Настройки
        //remove_menu_page( 'users.php' );                  //Пользователи
        remove_menu_page( 'tools.php' );                  //Инструменты
        remove_menu_page( 'edit.php?post_type=acf-field-group' );                  //Группы полей
        //remove_menu_page( 'edit.php?post_type=popup' );                  //popup
        remove_menu_page( 'wpcf7' );                  //wpcf7
        remove_menu_page( 'ultimatemember' );                  //ultimatemember
        remove_menu_page( 'wp-ulike-settings' );                  //ulike
        remove_menu_page( 'sitepress-multilingual-cms-3-7/menu/languages.php' );   //WPML
    endif;

    //убрать из консоли (главная страница) блоки
    remove_meta_box('dashboard_activity', 'dashboard', 'core');
    remove_meta_box('dashboard_primary', 'dashboard', 'core');
    remove_meta_box('wp-admin-bar-customize', 'dashboard', 'core');


    //Tags reorganise
//    remove_submenu_page( 'edit.php?post_type=tag', 'post-new.php?post_type=tag' );
//    add_submenu_page( 'edit.php?post_type=tag', 'Markets', 'Markets', 'manage_options', 'edit.php?post_type=market');
//    add_submenu_page( 'edit.php?post_type=tag', 'Topics', 'Topics', 'manage_options', 'edit.php?post_type=topic');
//    add_submenu_page( 'edit.php?post_type=tag', 'Regions', 'Regions', 'manage_options', 'edit.php?post_type=region');
//    add_submenu_page( 'edit.php?post_type=tag', 'Resources', 'Resources', 'manage_options', 'edit.php?post_type=resource');
//    remove_menu_page( 'edit.php?post_type=market' );
//    remove_menu_page( 'edit.php?post_type=topic' );
//    remove_menu_page( 'edit.php?post_type=region' );
//    remove_menu_page( 'edit.php?post_type=resource' );
}
add_action( 'admin_menu', 'remove_menus' );


//убрать customize
function remove_some_nodes_from_admin_top_bar_menu( $wp_admin_bar ) {
    $wp_admin_bar->remove_menu( 'customize' );
}
add_action( 'admin_bar_menu', 'remove_some_nodes_from_admin_top_bar_menu', 999 );


//убираем emoji
function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    //add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );


/*-- Подгрузить js-скрипты и стили --*/
function kd_load_scripts()
{
    global $wp_query;

    if (is_page('news')) {
        $file = '/dist/news.js';
        wp_enqueue_script('news', get_template_directory_uri() . $file, array('jquery'), filemtime(get_theme_file_path().$file), true);

        wp_localize_script( 'news', 'frontend_ajax_object',
            array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'page_id' => $wp_query->post->ID,
            )
        );
    }

    if (is_front_page()) {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' );
    }

    if (is_page('bes-86')) {
        $file = '/dist/landing.js';
        wp_enqueue_script('landing', get_template_directory_uri() . $file, array('jquery'), filemtime(get_theme_file_path().$file), true);
    } else {
        $file = '/dist/index.js';
        wp_enqueue_script('webpack_bundle', get_template_directory_uri().$file, array('jquery'), filemtime(get_theme_file_path().$file), true);
    }

    if (is_page_template('classy-product')) {
        $file = '/dist/product.js';
        wp_enqueue_script('product', get_template_directory_uri() . $file, array('jquery'), filemtime(get_theme_file_path().$file), true);
    }

    if (is_page('customized-solutions')) {
        $file = '/dist/customized-solutions.js';
        wp_enqueue_script('customized-solutions', get_template_directory_uri() . $file, array('jquery'), filemtime(get_theme_file_path().$file), true);
    }

    if (is_page('projects')) {
        $file = '/dist/projects.js';
        wp_enqueue_script('projects', get_template_directory_uri() . $file, array('jquery'), filemtime(get_theme_file_path().$file), true);
    }

}
add_action('wp_enqueue_scripts', 'kd_load_scripts');


function kd_load_styles()
{

    if (is_page('bes-86')) {
        $file = '/dist/landing.css';
        wp_enqueue_style('landing', get_template_directory_uri().$file, [], filemtime(get_theme_file_path().$file));
    } else {
        $file = '/dist/style.css';
        wp_enqueue_style('webpack_styles', get_template_directory_uri().$file, [], filemtime(get_theme_file_path().$file));
    }


//    wp_enqueue_style('custom-scrollbar', get_template_directory_uri() . '/css/custom-scrollbar.css');
//не добавил    wp_enqueue_style('jquery-ui-datepicker-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css');
    //wp_enqueue_style('timepicker', get_template_directory_uri() . '/css/timepicker.css');
    //wp_enqueue_style('lightgallery', get_template_directory_uri() . '/css/lightgallery.css');
//    wp_enqueue_style('main-styles', get_stylesheet_directory_uri() . '/style.css');
//    wp_enqueue_style('adaptive', get_stylesheet_directory_uri() . '/css/adaptive.css');
//    wp_enqueue_style('scrollbar', get_stylesheet_directory_uri() . '/js/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.css');
}
add_action('wp_enqueue_scripts', 'kd_load_styles');


//кастомные стили для админ панели
add_action( 'admin_enqueue_scripts', function (){
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/dist/admin.css', false, '1.0.0' );
} );


//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

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


function remove_shortlink() {
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    remove_action( 'template_redirect', 'wp_shortlink_header', 11);
}

add_filter('after_setup_theme', 'remove_shortlink');

//setting target blank to be checked by default
function default_target_blank() {
    ?>
    <script>
        jQuery(document).on( 'wplink-open', function( wrap ) {
            if ( jQuery( 'input#wp-link-url' ).val() <= 0 )
                jQuery( 'input#wp-link-target' ).prop('checked', true );
        });
    </script>
    <?php
}
add_action( 'admin_footer-post-new.php', 'default_target_blank', 10, 0 );
add_action( 'admin_footer-post.php', 'default_target_blank', 10, 0 );




//function get_news_by_tag() {
//
//    $term_slug = $_POST['term_slug'];
//
//    $posts = get_posts(
//        array(
//            'posts_per_page' => 9,
//            'post_type' => 'news',
//            'tax_query' => array(
//                array(
//                    'taxonomy' => 'news-tag',
//                    'field' => 'slug',
//                    'terms' => $term_slug,
//                )
//            )
//        )
//    );
//
//    ob_start();
//
//    foreach ($posts as $post) {
//        set_query_var( 'news_item', $post );
//        get_template_part('views/partials/news-card');
//    }
//
//    $content = ob_get_clean();
//
//    echo json_encode( $content ) ;
//
//    wp_die();
//}
//
//add_action('wp_ajax_get_news_by_tag', 'get_news_by_tag' );
//add_action('wp_ajax_nopriv_get_news_by_tag', 'get_news_by_tag' );