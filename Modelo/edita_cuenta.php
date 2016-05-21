<?php          
            // Recibimos por POST los datos procedentes del formulario  
            $nombre = $_POST["name"];
            $appat = $_POST["appat"];
            $apmat = $_POST["apmat"];
            $correo = $_POST["correo"]; 
            $depa = $_POST["dep"];         
            # if(isset($_GET["id"]))
	       #  $idarea = $_GET['id'];
            include("../Modelo/abre_conexion.php");                
            $query = "UPDATE personal SET nombre='$nombre', appaterno='$appat' , apmaterno = '$apmat', correo = '$correo' WHERE iddepto = '$depa'";
            mysqli_query($link, $query);
            include("cierra_conexion.php");       
            header("refresh: 2; url = ../Vista/AdministrarCuentas.php");//Linea de reedirección
?>  