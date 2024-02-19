<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "<pre>";
    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if(!$condition) {
       abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function login($email)
{
    $_SESSION['user'] = [
        'email' => $email,
    ];

    session_regenerate_id(true);

}

function logout()
{
    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time()-3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}