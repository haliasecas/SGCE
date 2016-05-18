<?php
include("../Modelo/abre_conexion.php");
$id = htmlspecialchars($_POST['value']);
$nombre = htmlspecialchars($_POST['nombre']);

$ex = mysqli_query($link, "SELECT * FROM depto WHERE nombre = '$nombre' AND iddepto != $id");
if (mysqli_num_rows($ex) > 0) {
	echo "Nel papú";
}
else {
	$query = "UPDATE depto SET nombre = '$nombre' WHERE iddepto = $id";
	mysqli_query($link, $query);
	echo "hecho";
}
include("../Modelo/cierra_conexion.php");
?>