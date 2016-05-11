<?php
					include("../Modelo/abre_conexion.php"); 
						//$dia=$_POST['date01'];
					$timestamp = date('Y/m/d');
					$soli = sprintf("INSERT INTO solicitud (idSolicitud, asunto, estado,dia,idinteresado,dia,idarea,iddepto) VALUES (NULL,'hola',' ','11/05/2016','1','$timestamp','1','1')");
					$result=mysqli_query($link,$soli);
					echo mysqli_error($link);
									include("../Modelo/cierra_conexion.php"); 
								?>