<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if(! Validator::string($_POST['body'],1, 1000)) {

    $errors['body'] = 'The body field that accept max of 1,000 characters is required';

}

if(! empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create a note',
        'errors' => $errors
    ]);
}

if(empty($errors)) {

    $id =  $_SESSION['user']['id'];

     $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)',

         [
             'body' => $_POST['body'],
           'user_id' => implode($id)
         ]);

    header('location: /notes');

    die();
}