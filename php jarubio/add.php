<html>
<head>
<title>Adicionar Datos</title>
</head>
<body style=background-color:black;>
<?php
include_once("config.php");
if(isset($_POST['Submit'])) {
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$costo = $_POST['costo'];
$sexo = $_POST['sexo'];
$talla = $_POST['talla'];
$fecha = $_POST['fecha'];
if(empty($nombre) || empty($cantidad) || empty($costo) ||
empty($sexo) || empty($talla) || empty($fecha)) {
if(empty($nombre)) {
echo "<font color='red'>Campo: nombre esta
vacio.</font><br/>";
}
if(empty($cantidad)) {
echo "<font color='red'>Campo: cantidad esta
vacio.</font><br/>";
}
if(empty($costo)) {
echo "<font color='red'>Campo: costo esta
vacio.</font><br/>";
}
if(empty($sexo)) {
echo "<font color='red'>Campo: sexo esta
vacio.</font><br/>";
}
if(empty($talla)) {
echo "<font color='red'>Campo: talla esta
vacio.</font><br/>";
}
if(empty($fecha)) {
echo "<font color='red'>Campo: fecha esta
vacio.</font><br/>";
}
echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
} else {
	$sql = "INSERT INTO producto(nombre, cantidad, costo,
sexo, talla, fecha) VALUES(:nombre, :cantidad, :costo, :sexo, :talla,
:fecha)";
$query = $dbConn->prepare($sql);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':cantidad', $cantidad);
$query->bindparam(':costo', $costo);
$query->bindparam(':sexo', $sexo);
$query->bindparam(':talla', $talla);
$query->bindparam(':fecha', $fecha);
$query->execute();
echo "<font color='#fff'>Registro Agregado Correctamente.". "<br>". "<br>";
echo "<br/><a href='añadir.html' style='text-decoration:none; color:green;'>Agregar otro producto</a>"."<br>";
echo "<br/><a href='index.php' style='text-decoration:none; color:green;'>Ver Todos los Registros</a>";

} 
}
?>
</body>
</html> 