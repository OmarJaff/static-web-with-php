<?php


use Core\Authenticator;
use http\forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        $this->login($email);
        redirect('/');
    }

    $form->error('email', "Current credentials are incorrect");

}

view('/sessions/create.view.php', [
    'errors' => $form->errors()
]);



