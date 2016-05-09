<html>  

    <head>  
        <title> Eliminar Área</title>  
    </head>  

    <body>  
        <?php  

         
            if(isset($_GET["id"]))
	           $id = $_GET['id'];
            include("abre_conexion.php");
            $query = "delete FROM area WHERE idarea = '$id'";
            mysqli_query($link, $query);
            
            include("cierra_conexion.php");
       
                header("refresh: 1; url = AdministrarAreas.php");//Linea de reedirección
               
            
        ?>  



    </body>  

</html> 