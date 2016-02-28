<?php
// default index action, GET /
$app->get('/', 'Simple\Controller\IndexController:actionIndex')
    ->name('get-homepage');
