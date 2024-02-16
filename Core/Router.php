<?php

namespace Core;

//
//$url = parse_url($_SERVER['REQUEST_URI'])['path'];
//
//
//$routes = require base_path('routes.php');
//
//  function routeToController($url, $routes)
//{
//    if (array_key_exists($url, $routes)) {
//        require base_path($routes[$url]);
//    } else {
//        abort();
//    }
//}
//function abort($code = 404)
//{
//    http_response_code($code);
//    require base_path("views/{$code}.view.php");
//}
//
//routeToController($url, $routes);

class Router {

    protected $routes = [];

    public function add($uri, $controller, $method) {
            $this->routes[] = compact($uri, $controller, $method);
       }
    public function get($uri, $controller)
    {

      $this->add($uri, $controller, 'GET');

    }

    public function post($uri, $controller)
    {

        $this->add($uri, $controller, 'POST');

    }

    public function delete($uri, $controller)
    {

        $this->add($uri, $controller, 'DELETE');

    }

    public function patch($uri, $controller)
    {

        $this->add($uri, $controller, 'PATCH');

    }

    public function put($uri, $controller)
    {

        $this->add($uri, $controller, 'PUT');

    }
}
