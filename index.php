<?php
require 'vendor/autoload.php';

// echo "it works";

$app = new \Slim\Slim(array(
    'debug' => false
));

$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/', function () {
	echo "E-Vidence API 0.1";
});


?>