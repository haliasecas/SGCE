<?php          
// Recibimos por POST los datos procedentes del formulario  
$nombrearea = $_POST["nombrearea"]; 
$iddepto = $_POST["iddepto"];  
$id = $_POST["idarea"];
include("abre_conexion.php");                

$query = "update area set nombre='$nombrearea', iddepto='$iddepto' WHERE idarea = $id";
mysqli_query($link, $query);
include("cierra_conexion.php");  
echo "hecho";
?>