<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$note = $db->query('select * from notes where id = :id', [':id' => $_GET['id']])->findOrFail();


authorize($note['user_id'] === 1);


view("notes/edit.view.php", [
    'heading' => 'Edit a Note',
    'errors' => [],
    'note' => $note
]);
