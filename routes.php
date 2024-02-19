<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');


$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');

$router->post('/notes', 'controllers/notes/store.php');
$router->patch('/notes', 'controllers/notes/update.php');

$router->get('/notes/edit', 'controllers/notes/edit.php');

$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');

$router->get('/login', 'controllers/sessions/create.php');
$router->post('/sessions', 'controllers/sessions/store.php')->only('guest');
