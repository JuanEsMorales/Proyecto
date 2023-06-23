<!DOCTYPE html>
<html>
<head>
	<title>Panel</title>
	<link rel="stylesheet" href="stylepan.css">
	<style>
.sa{
	margin-top: 1rem;
	width: 150px;
	height: 50px;
	border: 1px solid #1A2;
	border-radius: 7px;
	font-size: 30px;
	display: flex;
	justify-content: center;
	align-items: center;
	background-color: #1A2;
	opacity: 0;
	animation: sa 2s forwards 1.5s;
}
@keyframes sa{
	100%{
		opacity: 1;
	}
}
	</style>
</head>
<body>
<div class="foot" style="height: 80% !important; margin-top:-2px;">
<a href="index.php" >Consulta</a> <br> <br><br><br><br>
<a href="añadir.html" class="se">Agrega</a> <br> <br><br><br><br>
<a href="../login/update.php" class="te" style="height:70px; display:flex; justify-content:center; align-items:center; padding-left:10px;">Actualizar datos</a> <br> <br><br><br><br>
<a href="../login/logout.php" class="sa">Salir</a> 
</div>
</body>
</html>
