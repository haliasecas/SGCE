
<?php  

// Recibimos por POST los datos procedentes del formulario  
$nombrearea = $_POST["area"]; 
$iddepto = $_POST["departamento"]; 

include("abre_conexion.php");
echo "$iddepto";
echo "$nombrearea";

$query = "insert into area values(NULL,'$nombrearea','$iddepto')";
mysqli_query($link, $query);
include("cierra_conexion.php");
header("refresh: 0; url = ../Vista/AdministrarAreas.php");//Linea de reedirección
?> 