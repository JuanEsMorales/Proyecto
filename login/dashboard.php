<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');
?>

<html>
	<head><title>Dashboard</title></head>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
	<style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>
	<div style="margin: 15px">
		<div align="center">
			<?php
					if(isset($errMsg)){
						echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
					}
				?>
			<div style=" border: solid 1px #079B96; " align="center">
				
				<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b><?php echo $_SESSION['name']; ?></b></div>
				<div style="margin: 15px">
					Bienvenido <?php echo $_SESSION['name']; ?> <br>
					<a href="add.php">Actualizar</a> <br>
					<a href="logout.php">Salir</a>
				</div>
			</div>
		</div>
	</div>
	<a href="#">consulta</a><br>
    <h1>agregar</h1><br>
    <h1>eliminar</h1>
	<a href="../php jarubio/index.php">index</a>
</body>
</html>
