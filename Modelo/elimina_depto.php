<?php
$id = htmlspecialchars($_POST['value']);
include("../Modelo/abre_conexion.php");


$q = "SELECT idpersonal FROM depto WHERE iddepto = $id";
$result = mysqli_query($link, $q);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$query = "DELETE FROM depto WHERE iddepto = $id";
$idPer = $row['idpersonal'];
$j = "UPDATE personal SET ocupado = 0 WHERE idpersonal = $idPer";

mysqli_query($link, $query);
mysqli_query($link, $j);
echo "hecho";
include("../Modelo/cierra_conexion.php");
?>