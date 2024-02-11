<?php

$heading = "My Note";
$config = require ('config.php');



$db = new Database($config['database']);


$note = $db->query('select * from notes where id = :id', [':id' => $_GET['id']])->fetch();

if (!$note)
{
    abort();
}

if ($note['user_id'] !== 1) {
    abort(Response::NOT_FOUND);
}

require 'views/note.view.php';

