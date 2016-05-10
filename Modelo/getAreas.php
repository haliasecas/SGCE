<?php
$dpto = htmlspecialchars($_POST["value"]);
include("abre_conexion.php");

$areas = mysqli_query($link, "select nombre from area where iddepto = $dpto");

if (mysqli_num_rows($areas) > 0) { 
	$q = "select nombre from area where iddepto = $dpto";
	$p = mysqli_query($link, $q);
	while ($row = mysqli_fetch_array($p, MYSQLI_ASSOC)) {
		$nombredepto= $row['nombre'];
		$iddepto = $row["iddepto"];
		echo "<option value='$iddepto'>$nombredepto</option>";
	}
}

else {
	echo "<option value=0> No hay áreas disponibles </option>";
	include("cierra_conexion.php");
}
?>