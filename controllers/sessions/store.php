<?php

//validate if the user provided correct email address.

//login the user if the credentials were correct

//if not, redirect a user with error

use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve('Core\Database');

$errors = [];

if(! Validator::email($email)) {
    $errors['email'] = "Please provide an email address.";
}

if(! Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide a password.";
}

if ( !empty($errors)) {
    view('/sessions/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query ('select * from users where email = :email', [
    'email' => $email
])->find();



 if(! $user) {

    view('/sessions/create.view.php', [
         'errors' => [
             'email' => 'Current credentials are incorrect'
         ]
    ]);
    exit();
}

$validated = password_verify($password, $user['password']);

if($validated) {
    login($user);
    header('location: /');
}
