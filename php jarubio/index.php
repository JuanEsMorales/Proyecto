<?php
include_once("config.php");
$result = $dbConn->query("SELECT * FROM producto ORDER BY id ASC");
?>
<html>
<head>
<title> Listado de Productos</title>
<script>
		function Confirmacion(mensaje) {
    		return confirm(mensaje);
		}
	</script>
<link rel="stylesheet" href="indexstyle.css">
<meta charset="UTF-8">
</head>
<body>
<table width='80%' border=0>
<tr bgcolor='#1A2'>
<td align="center">Nombre</td>
<td align="center">Cantidad</td>
<td align="center">Costo</td>
<td align="center">Destinatario</td>
<td align="center">Talla</td>
<td align="center">Fecha</td>
<td align="center">Accion</td>
</tr>
<?php
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
echo "<tr>";
echo "<td style='background-color: #111'>".$row['nombre']."</td>";
echo "<td style='background-color: #111'>".$row['cantidad']."</td>";
echo "<td style='background-color: #111'>".$row['costo']."</td>";
echo "<td style='background-color: #111'>".$row['sexo']."</td>";
echo "<td style='background-color: #111'>".$row['talla']."</td>";
echo "<td style='background-color: #111'>".$row['fecha']."</td>";
echo "<td> <div class='boto'> <a href=\"edit.php?id=$row[id]\" class='edi'>Editar</a> <a href=\"delete.php?id=$row[id]\" onClick=\"return Confirmacion('¿Está seguro de eliminar el Producto?')\" class='de'>Eliminar</a> </div> </td>";
}
?>
</table>
<div class="foot">
<form action="buscar.php" method="get">
	<input type="text" name="buscador" placeholder="Filtar"> 
	<input type="submit" name="buscar" value="Buscar">
</form> <br>
<a href="genratepdf.php" target="_blank">Generar Archivo PDF</a> <br>
<a href="panel.php">Volver</a>
</div>

</body>
</html>
