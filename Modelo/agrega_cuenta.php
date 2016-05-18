
<?php  
// Recibimos por POST los datos procedentes del formulario  
$nombre = $_POST["nombre"]; 
$appaterno = $_POST["appat"]; 
$apmaterno = $_POST["apmat"]; 
$correo = $_POST["correo"]; 
$contrasena = $_POST["p1"]; 
$cargo = $_POST["cargo"]; 

include("../Modelo/abre_conexion.php");
$query = "INSERT INTO personal(nombre,appaterno,apmaterno,correo,contrasena,cargo) VALUES(' "$nombre" ','  "$appaterno" ',' "$apmaterno" ',' "$correo" ', ' "$cargo" ');" 
mysqli_query($link, $query);
include("../Modelo/cierra_conexion.php");
echo "Insertado en BD";
?>  
