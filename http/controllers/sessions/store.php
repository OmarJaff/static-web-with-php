<?php


use Core\Authenticator;
use Core\Validator;
use Core\App;
use http\forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve('Core\Database');

$form = new LoginForm();

if(! $form->validate($email, $password)) {
    return view('/sessions/create.view.php', [
       'errors' => $form->errors()
    ]);
}

$auth = new Authenticator();


if ( $auth->attempt($email, $password)) {
    $this->login($email);
    header('location: /');
} else {
    view('/sessions/create.view.php', [
        'errors' => [
            'email' => 'Current credentials are incorrect'
        ]
    ]);

}



