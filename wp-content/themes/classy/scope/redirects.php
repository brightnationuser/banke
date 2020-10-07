<?php
$relations = [
    'epto-systems/references' => 'epto-systems/',
    'epto-systems/media' => 'epto-systems/',
    'epto-systems/products' => 'epto-systems/',
];

$request = trim($_SERVER['REQUEST_URI'], '/');

foreach($relations as $key => $val){
    if($key == $request){
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: http://". $_SERVER['SERVER_NAME'] . '/' . $val);
        exit();
    }
}
