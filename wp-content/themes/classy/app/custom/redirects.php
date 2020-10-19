<?php

$url_parts = explode('/', $_SERVER['REQUEST_URI']);

/////////////////////////////////////////////////////////////////////////////////////////////////////////

function redirect_with_exit($location, $status = 302) {
    wp_redirect($location, $status = 302);
    exit();
}

$relations = [
    'de'  => '',
];

$request = trim($_SERVER['REQUEST_URI'], '/');

foreach($relations as $key => $val){
    if($key == $request){
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ". WP_HOME . '/' . $val);
        exit();
    }
}