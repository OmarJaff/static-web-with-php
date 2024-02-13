<?php

$config = require('config.php');
require 'Validator.php';
$db = new Database($config['database']);

$heading = "Create a note";


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];


    if(! Validator::string($_POST['body'],1, 1000)) {

        $errors['body'] = 'The body field that accept max of 1,000 characters is required';

    }



    if(empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', ['body' => $_POST['body'], 'user_id' => 1]);
    }

}

require 'views/create.view.php';

