<?php
$id = $_POST['value'];
include("../Modelo/abre_conexion.php");
$query = "select * from solicitud where idarea = $id";
$result = mysqli_query($link, $query);
if (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) > 0) {
	echo "nohecho";
}
else {
	$query1 = "delete FROM area WHERE idarea = $id";
	mysqli_query($link, $query1);
	echo "hecho";
}
include("../Modelo/cierra_conexion.php");  
?>