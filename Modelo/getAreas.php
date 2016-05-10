<?php
$dpto = htmlspecialchars($_POST["value"]);
include("abre_conexion.php");

$areas = mysqli_query($link, "select nombre from area where iddepto = $dpto");

if(mysqli_num_rows($areas) > 0) { 
	$q = "select nombre from area where iddepto = $dpto";
	$p = mysqli_query($link, $q);
	$result = mysqli_fetch_array($p, MYSQLI_ASSOC);
	echo ($result["nombre"]);
}
else{
	include("cierra_conexion.php");  
	echo ("No hay áreas disponibles"); 
}
?>