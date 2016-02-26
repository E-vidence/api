<?php

require "config.php";

function getDB() {

	$dbhost=DB_HOST;
	$dbuser=DB_USER;
	$dbpass=DB_PASSWORD;
	$dbname=DB_NAME;
	$dbport=DB_PORT;

	
	$dbConnection = new PDO("pgsql:host=$dbhost;port=$dbport;dbname=$dbname", $dbuser, $dbpass); 
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $dbConnection;
}



?>