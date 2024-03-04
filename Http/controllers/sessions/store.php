<?php


use Core\Authenticator;
use Http\forms\LoginForm;



$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);


$signedIn = (new Authenticator)->attempt(
    $attributes['email'],$attributes['password']
);


if (!$signedIn) {
    $form->error('email',
        "Current credentials are incorrect")
        ->throw();
}

redirect('/');

