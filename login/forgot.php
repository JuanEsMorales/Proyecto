<?php
	require 'config.php';

	if(isset($_POST['forgotpass'])) {
		$errMsg = '';

		// Getting data from FROM
		$secretpin = $_POST['secretpin'];

		if(empty($secretpin))
			$errMsg = 'Por favor ingrese su pin secreto para recordar su contraseña.';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT password, secretpin FROM users WHERE secretpin = :secretpin');
				$stmt->execute(array(
					':secretpin' => $secretpin
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				if($secretpin == $data['secretpin']) {
					$viewpass = 'Su Contraseña es: ' . $data['password'] . '<br><a href="login.php">Ingrese Ahora!!</a>';
				}
				else {
					$errMsg = 'No coincide el Pin Secreto.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>

<html>
	<head><title>Olvido Contraseña</title></head>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="styleforgot.css">
	<style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>
	<div>
		<div>
			<div class="recu">
				<h2>Recupera tu contraseña</h2>
				<div>
					<form action="" method="post" class="form">
						<input type="text" name="secretpin" placeholder="Pin Secreto" autocomplete="off" class="box"/><br /><br />
						<input type="submit" name='forgotpass' value="Validar" class='submit'/><br />
					</form>
					<span class="foot"><a href="login.php">Volver</a></span>
				</div>
			</div>
			<?php
					if(isset($errMsg)){
						echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
					}
			?>
			
			<?php
					if(isset($viewpass)){
						echo '<div style="color:#198E35;text-align:center;font-size:17px;margin-top:5px">'.$viewpass.'</div>';
					}
			?>
		</div>
	</div>
</body>
</html>
