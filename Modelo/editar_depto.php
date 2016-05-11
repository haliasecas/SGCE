<?php
include("../Modelo/abre_conexion.php");
$id = htmlspecialchars($_POST['value']);
$nombre = htmlspecialchars($_POST['nombre']);

$query = "UPDATE depto SET nombre = '$nombre' WHERE iddepto = $id";

mysqli_query($link, $query);
echo "hecho";
include("../Modelo/cierra_conexion.php");
?>