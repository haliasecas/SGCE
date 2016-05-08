<html>  

    <head>  
        <title>Verificamos Sesion</title>  
    </head>  

    <body>  
        <?php  

            // Recibimos por POST los datos procedentes del formulario  


            $miemail = $_POST["miemail"]; 
            $mipass = $_POST["mipass"]; 



            // Abrimos la conexion a la base de datos  
            include("abre_conexion.php");  

            $nuevo_usuario=mysqli_query($link,"select correo,contrasena from personal where correo='$miemail' and contrasena=aes_encrypt('$mipass','C1r4l3t1890')");
            if(mysqli_num_rows($nuevo_usuario)>0) { 
                $query = "select * from personal where correo='$miemail'";
                                $result = mysqli_query($link, $query);
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                setcookie("cargo",$row["cargo"]);
                                setcookie("id",$row["idpersonal"]);

                    echo " 
                <p class='avisos'>Bienvenid@ " . $row["nombre"] . " \n Sera redireccionado automaticamente en 2 segundos</p>";  
                header("refresh: 2; url = ../index.php");//Linea de reedirección
                /**
                echo " 
                <p class='avisos'>Bienvenid@\n" . $_SESSION["Nombre"] . "</p> 
                <p><a href='index.php' >Continuar Navegando</a></p> 
                "; **/
            }


            else{

                // Cerramos la conexion a la base de datos  
                include("cierra_conexion.php");  

                echo "<p class='avisos'>Ningun usuario registrado coincide con los datos recibidos</p> <p><a href='IniciarSesion.php' >Regresar</a></p> "; 
            }
        ?>  



    </body>  

</html> 