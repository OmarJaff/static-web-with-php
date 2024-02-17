<?php


use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(! Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
 }

if(! Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide a password with minimum of 7 characters.";
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
       'errors' => $errors
    ]);
}

$db = App::resolve('Core\Database');

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user) {

    header('location: /');

} else {
    $db->query('INSERT INTO users(password,email) VALUES(:password, :email)', [
        'password'=>$password,
        'email'=>$email
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
}
exit();


