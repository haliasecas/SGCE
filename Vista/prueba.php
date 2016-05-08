<?php

            include("abre_conexion.php"); 
echo ("<select name='departamento' class='form-control' >");
                $id=sprintf("SELECT * FROM depto");       
                $resulta=mysqli_query($link,$id);
                $numero = mysqli_num_rows($resulta); // obtenemos el número de filas
                
                for($i = 1; $i <= $numero; $i++){
                    $sql=sprintf("SELECT nombre FROM depto WHERE iddepto='$i'");
                    $result=mysqli_query($link,$id);
                    $row = mysqli_fetch_assoc($result);
                    
                    $nombre=$row["nombre"];
                                        echo ("<option value='UPIS'>$nombre</option>");
                }
                                              
                                echo ("</select>");
            
            include("cierra_conexion.php"); 
?>