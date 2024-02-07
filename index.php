<?php

require 'functions.php';


$url = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php'
];

function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.view.php";
}

if (array_key_exists($url, $routes)) {
    require $routes[$url];
} else {
    abort();
}

