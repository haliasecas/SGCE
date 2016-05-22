<?php
$dpto = htmlspecialchars($_POST["value"]);
include("abre_conexion.php");

$areas = mysqli_query($link, "select nombre from area where iddepto = $dpto");

if (mysqli_num_rows($areas) > 0) { 
	$q = "select nombre, idarea from area where iddepto = $dpto";
	$p = mysqli_query($link, $q);
	while ($row = mysqli_fetch_array($p, MYSQLI_ASSOC)) {
		$nombredepto= $row['nombre'];
		$iddepto = $row["idarea"];
		echo "<option value='$iddepto'>$nombredepto</option>";
	}
}

else {
	echo "<option value='-1'>Selecciona un área</option>";
	include("cierra_conexion.php");
}
?>