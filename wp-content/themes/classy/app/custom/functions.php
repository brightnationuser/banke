<?php
use \Helpers\Kama_Breadcrumbs;

function autodetect_language(){
    global $wp,$sitepress;
    $default_language = $sitepress->get_default_language();
    $languages = apply_filters('wpml_active_languages', NULL, 'skip_missing=0&orderby=id&order=desc') ?: array(
        array(
            'active' => 1,
            'url' => home_url($wp->request),
            'language_code' => $default_language
        )
    );

    if((strripos($_SERVER['HTTP_ACCEPT_LANGUAGE'],"de")!==false || strripos($_SERVER['HTTP_ACCEPT_LANGUAGE'],"de_DE")!==false) && strripos($_SERVER["REQUEST_URI"],"/de/") === false && !isset($_COOKIE['language_checked']) ){
        setcookie('language_checked',true);
        header('Location: '.$languages['de']['url']);
    }
}
autodetect_language();
function kama_breadcrumbs( $sep = '>', $l10n = array(), $args = array() ){
    $kb = new Kama_Breadcrumbs;
    echo $kb->get_crumbs( $sep, $l10n, $args );
}

/**
 * Get Alt attribute
 *
 * @param int $attachment_id
 *
 * @return string
 */
function wp_get_image_alt( $attachment_id ) {
    return trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
}


add_shortcode('insert_video', 'insert_video');

function insert_video($atts) {

    $framework = get_theme_framework();

    ob_start();

    $video_url = $atts['url'];

    $framework::render('partials.video', ['video_url' => $video_url]);

    $html = ob_get_clean();

    return $html;
}

add_filter('wpseo_opengraph_desc', '__return_false' );

//add_filter('wpseo_metadesc','custom_meta');
//function custom_meta( $desc ){
//
//    global $post;
//
//    $stripped_content = preg_replace('/\[[A-Za-z_\s="0-9]*\]/', '', strip_tags($post->post_content));
//    $stripped_content = preg_replace('/\n/', ' ', $stripped_content);
//    $stripped_content = preg_replace('/\t/', '', $stripped_content);
//
//    if(empty($desc)) {
//        $desc = substr(preg_replace('/\s\s+/', ' ', $stripped_content), 0, 130) . '...';
//    }
//
//    return $desc;
//}

function url_parts($n = null) {
    $url = $_SERVER["REQUEST_URI"];
    $path = parse_url($url, PHP_URL_PATH);
    $url_parts = explode("/", trim($path, "/"));

    if($n !== null) {
        return $url_parts[$n];
    }

    return $url_parts;
}

function admin_scripts() {

    wp_enqueue_script('admin_jq_mask', get_template_directory_uri() . '/js/admin/jquery.mask.min.js');
    wp_enqueue_script('admin_jq_input', get_template_directory_uri() . '/js/admin/admin_js.js');
}

add_action('admin_footer', 'admin_scripts');

add_filter( 'wpseo_metadesc', 'custom_wpseo_metadesc_filter', 10, 2 );

function custom_wpseo_metadesc_filter( $meta_description ){
    global $post;

    if(!empty($meta_description)) {
        return $meta_description;
    }
    else {
        if(!empty($post->post_content)) {
            return esc_attr(substr(strip_tags($post->post_content), 0, 200)) . '...';
        }
    }

    return "";
}