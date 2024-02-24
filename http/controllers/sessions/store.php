<?php


use Core\Authenticator;
use Core\Session;
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

Session::flash('errors', $form->errors());

return redirect('/login');

