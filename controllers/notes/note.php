<?php

$heading = "My Note";
$config = require('config.php');

$db = new Database($config['database']);


$note = $db->query('select * from notes where id = :id', [':id' => $_GET['id']])->findOrFail();


authorize($note['user_id'] === 1);


require 'views/show.view.php';

