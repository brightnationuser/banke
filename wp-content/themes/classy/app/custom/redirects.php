<?php

$url_parts = explode('/', $_SERVER['REQUEST_URI']);

/////////////////////////////////////////////////////////////////////////////////////////////////////////

function redirect_with_exit($location, $status = 302) {
    wp_redirect($location, $status = 302);
    exit();
}