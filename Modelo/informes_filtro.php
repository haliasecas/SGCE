<?php
include("abre_conexion.php");
$val = $_POST["value"];
switch ($val) {
	case 1: $q = "SELECT * FROM Mensaje;"
		break;
	case 2: $q = "SELECT * FROM Mensaje WHERE ESTADO = 'RESUELTO'";
		break:
	case 3: $q = "SELECT * FROM Mensaje WHERE ESTADO = 'PENDIENTE'";
		break;
}

$result = mysqli_query($link, $q);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$idMensaje = $row['idMensaje'];
	$correo = $row['correo'];
	$asunto = $row['asunto'];
	$contenido = $row['contenido'];
	$estado = $row['estado'];
	$fecha = $row['fecha'];
	$idDepto = $row['depto_iddepto'];

	echo "<tr id='IS$idMensaje'>";
	echo "<td>$asunto</td>";
	echo "<td>$correo</td>";
	echo "<td>$fecha</td>";
	echo "<p><td>$estado</td></p>";
	echo "<td><a class='text-success text-right' style='text-decoration:underline;' href='VerInforme.php?id=$idMensaje'>Ver más</a></td>";
	echo "<td><a class='text-success text-right' style='text-decoration:underline;' onClick='EliminarIS();'>Eliminar</p></td>";
	echo "</tr>";
}
include("cierra_conexion.php");
?>