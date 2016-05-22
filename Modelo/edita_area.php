<?php          
            // Recibimos por POST los datos procedentes del formulario  
            if(isset($_GET["id"]))
                $id = $_GET["id"];
            $nombrearea = $_POST["nombrearea"]; 
            $iddepto = $_POST["iddepto"];   
            echo "$nombrearea     $iddepto"
            if(isset($_GET["id"]))
	           $idarea = $_GET['id'];
            include("abre_conexion.php");                
            $query = "update area set nombre='$nombrearea', iddepto='$iddepto' WHERE idarea = '$idarea'";
            mysqli_query($link, $query);
            include("cierra_conexion.php");  
            echo "hecho";
           // header("refresh: 2; url = ../Vista/AdministrarAreas.php");//Linea de reedirección
?>  