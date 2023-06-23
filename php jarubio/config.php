<?php

require_once('parametros.php');

try {
	$dbConn = new PDO("mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}", $config['DB_USER'], $config['DB_PASS']);

	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
} catch(PDOException $e) {
	echo $e->getMessage();
}
//Variable Global
$sql = "SELECT * FROM producto ORDER BY id DESC";
?>