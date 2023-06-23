
<?php
	require 'config.php';

	if(isset($_POST['login'])) {
		$errMsg = '';

		// Get data from FORM
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username == '')
			$errMsg = 'Ingrese un usuario';
		if($password == '')
			$errMsg = 'ingrese una contraseña';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT id, fullname, username, password, secretpin FROM usuario WHERE username = :username');
				$stmt->execute(array(
					':username' => $username
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if($data == false){
					$errMsg = "Usuario $username no encontrado.";
				}
				else {
					if($password == $data['password']) {
						$_SESSION['name'] = $data['fullname'];
						$_SESSION['username'] = $data['username'];
						$_SESSION['password'] = $data['password'];
						$_SESSION['secretpin'] = $data['secretpin'];

						header('Location: ../php jarubio/panel.php');
						exit;
					}
					else
						$errMsg = 'Contraseña Incorrecta.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>

<html>
<head><title>Ingreso</title></head>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="stylelog.css">
<body>
	<div>
		<div>
			<div class="ing">
				<h1 class="f_h1">Ingresa</h1>
				<span class="re">o <a href="register.php">Registrate</a></span>
				<form action="" method="post">
					<div class="form">
					<input class="us" type="text" name="username" placeholder="usuario" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="password" placeholder="contraseña" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="box" /><br/><br />
					<input type="submit" name='login' value="Ingresar" class='submit'/><br />
					</div>
				</form>
				
			</div>
			<div class="foot">
				<span><a href="forgot.php">Olvidé la Contraseña</a></span><br>
				<span><a href="index.php">Volver al inicio</a></span>
				</div>
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
		</div>
	</div>	
</body>
</html>
