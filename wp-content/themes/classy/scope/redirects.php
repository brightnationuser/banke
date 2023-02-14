<?php
global $wp, $sitepress;
$default_language = $sitepress->get_default_language();
$languages = apply_filters('wpml_active_languages', NULL, 'skip_missing=0&orderby=id&order=desc') ?: array(
    array(
        'active' => 1,
        'url' => home_url($wp->request),
        'language_code' => $default_language
    )
);

if ((strripos($_SERVER['HTTP_ACCEPT_LANGUAGE'], "de") !== false || strripos($_SERVER['HTTP_ACCEPT_LANGUAGE'], "de_DE") !== false) && strripos($_SERVER["REQUEST_URI"], "/de/") === false && !isset($_COOKIE['language_checked'])) {
    setcookie('language_checked', true);
    header('Location: ' . $languages['de']['url']);
}
$relations = [
    'epto-systems/references' => 'epto-systems/',
    'epto-systems/media' => 'epto-systems/',
    'epto-systems/products' => 'epto-systems/',
];

$request = trim($_SERVER['REQUEST_URI'], '/');

foreach ($relations as $key => $val) {
    if ($key == $request) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: http://" . $_SERVER['SERVER_NAME'] . '/' . $val);
        exit();
    }
}
