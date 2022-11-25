<?php namespace Helpers;

use Carbon\Carbon;
use Imagick;
use JB\FlyImages;
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

    //получить ID базового языка
    public static function getIdGlobal($post_id) {
        global $sitepress;

        $post_id_global = wpml_object_id_filter($post_id, 'page', true, $sitepress->get_default_language());

        return $post_id_global;
    }

    public static function getFlyWebpImage($attachment = 0, $size = '', $crop = null) {
        $fly_path = self::getFlyImage($attachment, $size, $crop);

        return self::convertToWebp($fly_path);
    }

    public static function getFlyImage($attachment_id = 0, $size = '', $crop = null)
    {
        if(!function_exists('fly_get_attachment_image_src')) {
            return wp_get_attachment_url($attachment_id);
        }

        $scale = defined('FLY_IMAGE_SCALE') ? FLY_IMAGE_SCALE : 1;

        $image = fly_get_attachment_image_src($attachment_id, [$size[0] * $scale , $size[1] * $scale], $crop);

        return isset( $image['src'] ) ? $image['src'] : '';
    }

    public static function getFlyThumbnail($post_id = 0, $size = '', $crop = null)
    {
        $post_id = self::getIdGlobal($post_id);

        $thumbnail = intval(get_post_thumbnail_id($post_id));

        return self::getFlyImage($thumbnail, $size, $crop);
    }

    public static function flyImageSrcFromUrl($attachment_url = '', $size = '', $crop = null) {
        $fly_images = FlyImages\Core::get_instance();

        $attachment_url = str_replace(' ', '%20', $attachment_url);

        if ( empty($attachment_url) || empty( $size ) ) {
            return array();
        }

        // If size is 'full', we don't need a fly image
        if ( 'full' === $size ) {
            return $attachment_url;
        }

        // Get the attachment image
        $image = self::getImageInfo( $attachment_url );

        if ( false !== $image && $image ) {
            // Determine width and height based on size
            switch ( gettype( $size ) ) {
                case 'string':
                    $image_size = $fly_images->get_image_size( $size );
                    if ( empty( $image_size ) ) {
                        return [];
                    }
                    $width  = $image_size['size'][0];
                    $height = $image_size['size'][1];
                    $crop   = isset( $crop ) ? $crop : $image_size['crop'];
                    break;
                case 'array':
                    $width  = $size[0];
                    $height = $size[1];
                    break;
                default:
                    return [];
            }

            $image_fly_url = str_replace('%20', '_', $image['url']);

            // Get file path
            $fly_dir       = $fly_images->get_fly_dir();
            $fly_file_path = $fly_dir . DIRECTORY_SEPARATOR . $fly_images->get_fly_file_name( basename( $image_fly_url ), $width, $height, $crop );

            // Check if file exsists
            if ( file_exists( $fly_file_path ) ) {
                $image_size = getimagesize( $fly_file_path );
                if ( ! empty( $image_size ) ) {
                    return $fly_images->get_fly_path( $fly_file_path );
                } else {
                    return [];
                }
            }

            // Check if images directory is writeable
            if ( ! $fly_images->fly_dir_writable() ) {
                return [];
            }

            // File does not exist, lets check if directory exists
            $fly_images->check_fly_dir();

            // Create new image
            if($image['ext'] == 'jpg' || $image['ext'] == 'jpeg') {
                imagejpeg(self::resizeImage($attachment_url, $width, $height, $crop, $image['ext']), $fly_file_path);
            }
            elseif($image['ext'] == 'png') {
                imagepng(self::resizeImage($attachment_url, $width, $height, $crop, $image['ext']), $fly_file_path);
            }

            $image_dimensions = self::getImageInfo($fly_file_path);
            return $fly_images->get_fly_path( $fly_file_path );
        }

        // Something went wrong
        return [];
    }


    private static function getImageInfo($url) {
        $image_sizes = getimagesize($url);
        $image_info = pathinfo($url);

        $res = [
            'width' =>  $image_sizes[0],
            'height' =>  $image_sizes[1],
            'name' => $image_info['filename'],
            'ext' => $image_info['extension'],
            'url' => $url
        ];

        return $res;
    }

    private static function resizeImage($file, $w, $h, $crop = false, $ext = 'jpeg') {

        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
            } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }

        if($ext == 'jpeg' || $ext = 'jpg') {
            $src = imagecreatefromjpeg($file);
        }
        elseif ($ext == 'png') {
            $src = imagecreatefrompng($file);
        }
        else {
            return 'false';
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        return $dst;
    }

    public static function convertToWebp($attachment_url) {

        $url = str_replace(WP_SITEURL . '/wp-content', WP_CONTENT_DIR, $attachment_url);
        $dest = $url . '.webp';

        $dest = str_replace('/themes/classy/images', '/uploads/fly-images', $dest);
        $dest_dir = str_replace(basename($dest), '', $dest);

        if(!is_dir($dest_dir)) {
            mkdir($dest_dir, 0755, true);
        }

        if(!file_exists($dest)) {
            if(!extension_loaded('imagick')) {
                return $attachment_url;
            }

            $im = new Imagick($url);

            if(method_exists($im,'writeImage') && is_writable($dest_dir)) {
                $im->writeImage($dest);
            }
            else {
                return $attachment_url;
            }
        }

        return str_replace(WP_CONTENT_DIR, WP_SITEURL . '/wp-content', $dest);
    }

}
