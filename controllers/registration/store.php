<?php


use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];
$db = App::resolve('Core\Database');

$errors = [];

if(! Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
 }

if(! Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide a password with minimum of 7 characters.";
}


$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user) {

    $errors['email'] = "This email is already taken, please use another email.";

}

if (! empty($errors)) {
    return view('registration/create.view.php', [
       'errors' => $errors
    ]);
    exit();
}


    $db->query('INSERT INTO users(password,email) VALUES(:password, :email)', [
        'password'=>$password,
        'email'=>$email
    ]);

    $userId = $db->query('SELECT id from users where email = :email', [
        'email'=> $email
    ])->findOrFail();


    $_SESSION['user'] = [
        'id' => $userId,
        'email' => $email,

    ];

    header('location: /');

exit();


