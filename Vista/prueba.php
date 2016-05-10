<?php
									include("../Modelo/abre_conexion.php"); 
									$tok=sprintf("INSERT INTO HoraSol (idHorario, idSolicitud) VALUES ('1','1')");
									$result=mysqli_query($link,$tok);
									include("../Modelo/cierra_conexion.php"); 
								?>