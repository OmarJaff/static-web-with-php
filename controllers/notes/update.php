<?php

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

$currentUserId = 1;


$note = $db->query('select * from notes where id = :id', [':id' => $_POST['id']])->findOrFail();


authorize($note['user_id'] === $currentUserId = 1);

$errors = [];

if(! Validator::string($_POST['body'],1, 1000)) {

    $errors['body'] = 'The body field that accept max of 1,000 characters is required';

}

if (count($errors)) {
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$note = $db->query('update notes set body = :body where id = :id', [
    "id"=> $_POST['id'],
    "body"=> $_POST['body']
]);

header('location: /notes');

die();
