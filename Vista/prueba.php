<?php
include("abre_conexion.php"); 
$id = sprintf("SELECT idSolicitud FROM SolicitudToken WHERE token='mw70k7f3gw45bk3kjah5'");
                    $result=mysqli_query($link,$id);
            $row = mysqli_fetch_assoc($result);
            $idSol=$row["idSolicitud"];

            $sql = sprintf("UPDATE solicitud SET estado='PENDIENTE' WHERE idSolicitud='$idSol'");
$result=mysqli_query($link,$sql);
            //echo $idint;

                //echo $idint;
                include("cierra_conexion.php"); 
?>