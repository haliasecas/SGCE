<?php
        include("abre_conexion.php");
            //Recibimos por POST los datos procedentes del formulario          
            if(isset($_GET["id"]))
	           $id = $_GET['id'];
                $query1 = "delete FROM depto d, area a WHERE a.idarea = '$id' and a.iddepto=d.iddepto";
                mysqli_query($link, $query1);            
                include("cierra_conexion.php");       
                header("refresh: 1; url = ../Vista/AdministrarAreas.php");//Linea de reedirección
?>
