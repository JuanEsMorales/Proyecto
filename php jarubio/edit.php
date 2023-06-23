<?php
include_once("config.php");
if(isset($_POST['update']))
{
$id = $_POST['id'];
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
} else {
$sql = "UPDATE producto SET nombre=:nombre,
cantidad=:cantidad, costo=:costo, sexo=:sexo, talla=:talla, fecha=:fecha WHERE
id=:id";
$query = $dbConn->prepare($sql);
$query->bindparam(':id', $id);
$query->bindparam(':nombre', $nombre);
$query->bindparam(':cantidad',$cantidad);
$query->bindparam(':costo', $costo);
$query->bindparam(':sexo', $sexo);
$query->bindparam(':talla', $talla);
$query->bindparam(':fecha', $fecha);
$query->execute();
header("Location: index.php");
}
}
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM producto WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
 $nombre = $row['nombre'];
$cantidad = $row['cantidad'];
$costo = $row['costo'];
$sexo = $row['sexo'];
$talla = $row['talla'];
$fecha = $row['fecha'];
}
?>
<html>
<head>
<title>Edit Data</title>
<link rel="stylesheet" href="styleedit.css">
</head>
<body>
<br/><br/>
<form name="form1" method="post" action="edit.php" class="form">
<h1>Editar</h1>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre"
value="<?php echo $nombre;?>" placeholder=""></td>
</tr>
<tr>
<td>Cantidad</td>
<td><input type="text" name="cantidad" value="<?php echo
$cantidad;?> "></td>
</tr>
<tr>
<td>Costo</td>
<td><input type="text" name="costo" value="<?php echo
$costo;?>" ></td>
</tr>
<tr>
<td>Destinatario</td>
<td><input type="text" name="sexo" value="<?php echo
$sexo;?>" ></td>
</tr>
<tr>
<td>Talla</td>
<td><input type="text" name="talla" value="<?php echo
$talla;?>" ></td>
</tr>
<tr>
<td>Fecha</td>
<td><input type="text" name="fecha" value="<?php echo
$fecha;?>"></td>
</tr>
<tr>
<td><input type="hidden" name="id" value=<?php echo
$_GET['id'];?>></td>
<td><input type="submit" name="update"
value="Guardar"></td>
</tr>
<a href="index.php">Volver</a>
</form>
</body>
</html>
