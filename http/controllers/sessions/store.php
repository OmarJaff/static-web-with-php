<?php


use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use http\forms\LoginForm;



$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);



if ((new Authenticator)->attempt($attributes['email'],$attributes['password'])) {
        redirect('/');
    }

$form->error('email', "Current credentials are incorrect");


return redirect('/login');

