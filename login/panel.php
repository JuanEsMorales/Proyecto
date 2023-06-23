<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paneles</title>
</head>
<body>
    <a href="#">consulta</a><br>
    <h1>agregar</h1><br>
    <h1>eliminar</h1>
    <a href="../php jarubio/index.php">index</a>
</body>
</html>