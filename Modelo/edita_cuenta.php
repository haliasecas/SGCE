<?php          
            include("../Modelo/abre_conexion.php");                
            // Recibimos por POST los datos procedentes del formulario                              
            $id = htmlspecialchars($_POST['value']);
            $nombre = $_POST["name"];
            $appat = $_POST["appat"];
            $apmat = $_POST["apmat"];
            $correo = $_POST["correo"]; 
            #$depa = $_POST["dep"];                             
	                   $query = "UPDATE personal SET nombre='$nombre', appaterno='$appat' , apmaterno = '$apmat', correo = '$correo'  WHERE idpersonal = '$id' ";
	                   mysqli_query($link, $query);            
	                   echo "hecho";
            include("cierra_conexion.php");       
?>  