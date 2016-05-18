<?php  
// Recibimos por POST los datos procedentes del formulario  
$nombre = $_POST["name"]; 
$appaterno = $_POST["appat"]; 
$apmaterno = $_POST["apmat"]; 
$correo = $_POST["correo"]; 
$contrasena = $_POST["pass"]; 
$cargo = $_POST["cargo"]; 
include("../Modelo/abre_conexion.php");
//Creando una sentencia
$query = "INSERT INTO personal(nombre,appaterno,apmaterno,correo,contrasena,cargo) VALUES('$nombre','$appaterno','$apmaterno',' $correo','$contrasena','$cargo')"; 
mysqli_query($link, $query);
include("../Modelo/cierra_conexion.php");
echo "Insertado";
?>  
    