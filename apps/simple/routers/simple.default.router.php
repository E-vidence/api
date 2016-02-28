<?php
// default index action, GET /
$app->get('/', 'Simple\Controller\IndexController:actionIndex')
    ->name('get-homepage');

// get users action, GET /users
$app->get('/users', 'Simple\Controller\UserController:actionGetUsers')
    ->name('get-user-list');
