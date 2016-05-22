 
        <?php  
        // Recibimos por POST los datos procedentes del formulario  
        $pass = $_POST["pass"]; 
            if(isset($_GET["id"]))
	           $id = $_GET['id'];
        
            include("abre_conexion.php");
            $query1 = "update personal set contrasena=aes_encrypt('$pass','C1r4l3t1890')   where idpesonal=$id";
            mysqli_query($link, $query1);
            
            include("cierra_conexion.php");
       
                //header("refresh: 1; url = ../");//Linea de reedirección
        ?>  
