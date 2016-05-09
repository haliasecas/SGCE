<?php
include("abre_conexion.php"); 
$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $string = '';
            $random_string_length = 20;
            for ($i = 0; $i < $random_string_length; $i++) {
                $string .= $characters[rand(0, strlen($characters) - 1)];
            }
                    $enlace = $_SERVER['SERVER_NAME']."/SGCE/SGCE/Validar.php?token=".$string;
                echo $enlace;

                //echo $idint;
                include("cierra_conexion.php"); 
?>