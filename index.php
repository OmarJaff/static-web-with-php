<?php

require 'functions.php';

//require 'routes.php';


$db = new Database();

$posts = $db->query("select * from posts where id > 1")->fetchAll(PDO::FETCH_ASSOC);

dd($posts);

//foreach ($posts as $post) {
//    echo "<li>" . $post['title'] ."</li>";
//}




