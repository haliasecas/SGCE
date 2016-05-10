<?php
					include("../Modelo/abre_conexion.php"); 
					$dia= date_create('13/05/2016');
					//$dia=date("Y-m-d",$dias);
					echo date_format($dia, 'Y-m-d');
					
					$sql = sprintf("INSERT INTO diapref (idDia, dia) VALUES (NULL,'$dia')");
					$resultiddia=mysqli_query($link,$sql);
					echo mysqli_error($link);
    				/*$busquedadia = sprintf("SELECT dia FROM DiaPref WHERE dia='$dia'");
					$resultdia=mysqli_query($link, $busquedadia);
					$row_dia = mysqli_num_rows($resultdia);
					if($row_dia==1) {
						$id = sprintf("SELECT idDia FROM DiaPref WHERE dia='$dia'");
						$resultiddia=mysqli_query($link,$id);
					}
					else{
						$sql = sprintf("INSERT INTO DiaPref (idDia, dia) VALUES (NULL,'$dia')");
						$resultiddia=mysqli_query($link,$sql);
						$id = sprintf("SELECT idDia FROM DiaPref WHERE dia='$dia'");
						$resultiddia=mysqli_query($link,$id);
					}
					$row = mysqli_fetch_assoc($resultiddia);
					$idDiaa=$row["idDia"];

					$resultDiaSol=sprintf("INSERT INTO DiaSol (idDia, idSolicitud) VALUES ('$idDiaa','1')");
    				$result=mysqli_query($link,$resultDiaSol);*/
									include("../Modelo/cierra_conexion.php"); 
								?>