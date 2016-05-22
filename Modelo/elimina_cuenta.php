<?php
include("../Modelo/abre_conexion.php");
$id = htmlspecialchars($_POST['value']);
$q = "SELECT * FROM personal WHERE idpersonal = $id";
$result = mysqli_query($link, $q);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if ($row['ocupado']) {
	echo "Nel prro";
}
else {
	$query = "DELETE FROM personal WHERE idpersonal = $id";
	mysqli_query($link, $query);
	echo "hecho";
}
include("../Modelo/cierra_conexion.php");
?>