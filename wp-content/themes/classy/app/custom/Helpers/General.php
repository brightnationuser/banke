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

}