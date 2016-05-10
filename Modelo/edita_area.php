<html>  

    <head>  
        <title> Agrega Área</title>  
    </head>  

    <body>  
        <?php  
        
            // Recibimos por POST los datos procedentes del formulario  
            $nombrearea = $_POST["nombrearea"]; 
            $iddepto = $_POST["iddepto"]; 
        
            if(isset($_GET["id"]))
	           $idarea = $_GET['id'];
            include("abre_conexion.php");
        
        
            $query = "update area set nombre='$nombrearea', iddepto='$iddepto' WHERE idarea = '$idarea'";
            mysqli_query($link, $query);
            include("cierra_conexion.php");
       
                header("refresh: 2; url = AdministrarAreas.php");//Linea de reedirección
        ?>  
    </body>  
</html> 