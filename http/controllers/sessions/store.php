<?php

//validate if the user provided correct email address.

//login the user if the credentials were correct

//if not, redirect a user with error

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


$user = $db->query ('select * from users where email = :email', [
    'email' => $email
])->find();


$validated = password_verify($password, $user['password']);

if($validated) {
    login($email);
    header('location: /');
}

view('/sessions/create.view.php', [
    'errors' => [
        'email' => 'Current credentials are incorrect'
    ]
]);
