<?php
require 'vendor/autoload.php';
require 'database.php';

// echo "it works";

$app = new \Slim\Slim(array(
    'debug' => false
));

$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/', function () {
	echo "E-vidence API 0.1";
});

$app->get('/users', function () {
	$sql = "SELECT id,username,first_name,last_name,password FROM pg_users ORDER BY id DESC";
	try {
		$db = getDB();
		$stmt = $db->query($sql); 
		$users = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"users": ' . json_encode($users) . '}';
	} catch(PDOException $e) {
		//error_log($e->getMessage(), 3, '/var/tmp/phperror.log'); //Write error log
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
});




$app->run();



?>