<?php


use Core\Authenticator;
use http\forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', "Current credentials are incorrect");

}

redirect('/login');

