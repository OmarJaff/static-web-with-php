<?php

$url = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = require base_path('routes.php');

  function routeToController($url, $routes)
{
    if (array_key_exists($url, $routes)) {
        require base_path($routes[$url]);
    } else {
        abort();
    }
}
function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.view.php");
}

routeToController($url, $routes);
