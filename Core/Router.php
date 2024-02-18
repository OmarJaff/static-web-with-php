<?php

namespace Core;


class Router {

    protected $routes = [];

    public function add($method,$uri, $controller, $middleware = null) {
            $this->routes[] = compact( 'method' ,'uri', 'controller', 'middleware');
            return $this;
       }
    public function get($uri, $controller)
    {

     return $this->add('GET',$uri, $controller);

    }

    public function post($uri, $controller)
    {

       return  $this->add('POST' ,$uri, $controller);

    }

    public function delete($uri, $controller)
    {
        return  $this->add('DELETE' ,$uri, $controller);

    }

    public function patch($uri, $controller)
    {

        return $this->add('PATCH',$uri, $controller);

    }

    public function put($uri, $controller)
    {

        return $this->add('PUT' ,$uri, $controller);

    }

    public function only($key)
    {
         $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }


    public function route($uri, $method)
    {
          foreach ($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if($route['middleware'] === 'guest') {
                    if($_SESSION['user'] ?? false) {

                        header('location: /');

                        exit();
                    }
                 }

                if($route['middleware'] === 'auth') {
                    if(! $_SESSION['user'] ?? true) {

                        header('location: /');

                        exit();
                    }
                }
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

   protected function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    die();
}



}
