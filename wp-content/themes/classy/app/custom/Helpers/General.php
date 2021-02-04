<?php namespace Helpers;

use Carbon\Carbon;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

class General
{

    public static $resourceActionNames = [
        'events' => 'Sign up',
        'webinars' => 'Sign up',
        'podcasts' => 'Listen',
        'articles' => 'Read',
        'discussion' => 'View discussion'
    ];

    /**
     * Returns formatted date
     *
     * @return string
     */
    public static function getFormattedDate($date, $format = 'd/m/Y')
    {
        if ($format == 'for_humans') return Carbon::parse($date)->diffForHumans();

        return $date ? $str = ltrim(Carbon::parse($date)->format($format), '0') : null;
    }

    /**
     * Returns truncated string with '...' ellipsis
     *
     * @return string
     */
    public static function getTruncatedString($string, $length = 100, $append = "&hellip;")
    {
        $string = self::fixFigureTag($string);
        $string = self::fixDiscussionSymbol($string);
        $string = self::fixTextIssues($string);

        $string = strip_tags(trim($string));

        return preg_replace('/\s+?(\S+)?$/', $append, substr($string, 0, $length));

        if (strlen($string) > $length) {
            $string = wordwrap($string, $length);
            $string = explode("\n", $string, 2);
            $string = self::fixLikesCounter($string);
            $string = $string[0] . $append;
        }
        return $string;
    }

    // Remove weird symbols from discussions
    public static function fixDiscussionSymbol($string)
    {
        $string = str_replace('┬á', ' ', $string);
        $string = str_replace('ΓÇï', '', $string);
        return $string;
    }

    // Transform text to look nicely
    public static function fixTextIssues($string)
    {
        $string = html_entity_decode($string);
        return $string;
    }

    // Remove weird <figure> tag from old psf.net articles
    public static function fixFigureTag($string)
    {
        $string = preg_replace('#(<figure.*?>).*?(</figure>)#', '', $string);
        return $string;
    }

    //file with hash (updated)
    public static function asset_hash($file) {

        if(file_exists('.'.$file)) {
            $hash = hash('crc32', filemtime('.'.$file));
            return ($file.'?'.$hash);
        }

        return $file;
    }

    public static function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    /**
     * @param array $data
     * @param array $view_path
     * @param string $css_path
     * @return string
     */
    public static function getEmailHtml($data, $view_path, $css_path = '/wp-content/themes/classy/dist/style.css') {

        $framework = get_theme_framework();

        ob_start();

        $cssToInlineStyles = new CssToInlineStyles();

        $framework::render($view_path[ICL_LANGUAGE_CODE], ['post' => $data]);

        $html_clean = ob_get_clean();
        $css = file_get_contents(WP_HOME . $css_path);

        $html = $cssToInlineStyles->convert(
            $html_clean,
            $css
        );

        return $html;
    }

    /**
     * Upload file to wordpress storage from base64
     * @param $image - base64 image
    */
    public static function wpUploadFromBase64($image) {
        $upload_dir = wp_upload_dir();

        // @new
        $upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

        $decoded = $image;
        $filename = 'my-base64-image.png';

        $hashed_filename = md5( $filename . microtime() ) . '_' . $filename;

        // @new
        $image_upload = file_put_contents( $upload_path . $hashed_filename, $decoded );

        //HANDLE UPLOADED FILE
        if( !function_exists( 'wp_handle_sideload' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
        }

        // Without that I'm getting a debug error!?
        if( !function_exists( 'wp_get_current_user' ) ) {
            require_once( ABSPATH . 'wp-includes/pluggable.php' );
        }

        // @new
        $file             = array();
        $file['error']    = '';
        $file['tmp_name'] = $upload_path . $hashed_filename;
        $file['name']     = $hashed_filename;
        $file['type']     = 'image/png';
        $file['size']     = filesize( $upload_path . $hashed_filename );

        // upload file to server
        // @new use $file instead of $image_upload
        $file_return = wp_handle_sideload( $file, array( 'test_form' => false ) );

        $filename = $file_return['file'];
        $attachment = array(
            'post_mime_type' => $file_return['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit',
            'guid' => $upload_dir['url'] . '/' . basename($filename)
        );
        $attach_id = wp_insert_attachment( $attachment, $filename );
    }

}