
<?php  

// Recibimos por POST los datos procedentes del formulario  
$nombre = $_POST["nombrearea"]; 
$appaterno = $_POST["iddepto"]; 
$apmaterno = $_POST["iddepto"]; 
$appaterno = $_POST["iddepto"]; 
$correo = $_POST["iddepto"]; 
$contrasena = $_POST["iddepto"]; 
$cargo = $_POST["iddepto"]; 


//if(isset($_GET["id"]))
// $idarea = $_GET['id'];
include("abre_conexion.php");


// $query = "update area set nombre='$nombrearea', iddepto='$iddepto' WHERE idarea = '$idarea'";
//mysqli_query($link, $query);
include("cierra_conexion.php");
echo "aooeu";
?>  
