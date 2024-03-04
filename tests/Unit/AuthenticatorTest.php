<?php

use Core\Authenticator;
use Core\Container;
use Core\Database;
use Core\Session;
use Core\ValidationException;
use Http\forms\LoginForm;

function base_path($path)
{
    return __DIR__.'/../../'. $path;
}


$container = new Container();

$container->bind('Core\Database', function () {

    $config = require base_path('config.php');

    return new Database($config['database']);

});

$db = $container->resolve('Core\Database');

App::setContainer($container);


it('validates if the user exists and if the credentials are correct', function () {

    $authenticated = LoginForm::validate([
        'email' => 'me@omarjaff.com',
        'password' => 'admin12345'
    ])->failed();

    expect($authenticated)->toBeFalse();

});

it('logs in the user and stores the user into the session', function () {

    $authenticated = LoginForm::validate($attributes = [
        'email' => 'me@omarjaff.com',
        'password' => 'admin12345'
    ]);

    $signedIn = (new Authenticator)->attempt(
        $attributes['email'],$attributes['password']
    );

    $session = \Core\Session::get('email');

    expect($signedIn)->toBeTrue()
        ->and($session)->toBeTrue();

})->only();
