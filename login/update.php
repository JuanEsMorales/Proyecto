<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');

	if(isset($_POST['update'])) {
		$errMsg = '';

		// Getting data from FROM
		$fullname = $_POST['fullname'];
		$secretpin = $_POST['secretpin'];
		$password = $_POST['password'];
		$passwordVarify = $_POST['passwordVarify'];

		if($password != $passwordVarify)
			$errMsg = 'Error en la contraseña.';

		if($errMsg == '') {
			try {
		      $sql = "UPDATE usuario SET fullname = :fullname, password = :password, secretpin = :secretpin WHERE username = :username";
		      $stmt = $connect->prepare($sql);                                  
		      $stmt->execute(array(
		        ':fullname' => $fullname,
		        ':secretpin' => $secretpin,
		        ':password' => $password,
		        ':username' => $_SESSION['username']
		      ));
				header('Location: update.php?action=updated');
				exit;

			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'updated')
		$errMsg = 'Datos Actualizados Correctamente. <a href="logout.php">Salga</a> e ingrese de nuevo.';
?>

<html>
	<head><title>Actualizar</title></head>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="update.css">
	<style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>				
				<div class="content">
					<form action="" method="post" class="form">
						<h1>Actualizar datos de: <?php echo $_SESSION['name'] ?></h1>
						Nombre Completo
						<input type="text" name="fullname" value="<?php echo $_SESSION['name']; ?>" autocomplete="off" class="box"/><br>
						Usuario
						<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" disabled autocomplete="off" class="box"/><br>
						Pin Secreto
						<input type="text" name="secretpin" value="<?php echo $_SESSION['secretpin']; ?>" autocomplete="off" class="box"/><br>
						Contraseña
						<input type="password" name="password" value="<?php echo $_SESSION['password'] ?>" class="box" /><br>
						Validar Contraseña
						<input type="password" name="passwordVarify" value="<?php echo $_SESSION['password'] ?>" class="box" />
						<input type="submit" name='update' value="Actualizar" class='submit'/><br />
						<a href="../php jarubio/panel.php">Volver</a>
						<?php
						if(isset($errMsg)){
							echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
						}
						?>
					</form>
					
				</div>	
</body>
</html>
