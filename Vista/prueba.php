<?php
					/*$email = 'ralvhe@gmail.com';
					$asunto = 'Hola papu';
					$dpto = '2';
					$contenido = 'ke hace prro';

					include("../Modelo/abre_conexion.php"); 
					require_once("../Modelo/enviarCorreo.php");
					$ans = mandarCorreoInforme($dpto, $asunto, $contenido, $email);
					if (ans) {
							
					}
					else {
							
					}*/

					include("../Modelo/abre_conexion.php"); 
					$timestamp = date('d/m/Y');
						$sql = sprintf("INSERT INTO mensaje (idMensaje, correo, asunto,contenido,estado,fecha,iddepto) VALUES (NULL,'ralvhe@gmail.com','Hola perro','Adios perro','PENDIENTE','$timestamp','2')");
							$result=mysqli_query($link,$sql);
							echo mysqli_error($link);
					/*$id = sprintf("SELECT * FROM depto WHERE iddepto='$dpto'");     
					$resulta = mysqli_query($link,$id);
					$numero = mysqli_num_rows($resulta); // obtenemos el número de filas
					$row = mysqli_fetch_array($resulta, MYSQLI_ASSOC);
					$nombredepto= $row['nombre'];
					$idpersonal = $row["idpersonal"];

					$id = sprintf("SELECT * FROM personal WHERE idpersonal='$idpersonal'");     
					$resulta = mysqli_query($link,$id);
					$numero = mysqli_num_rows($resulta); // obtenemos el número de filas
					$row = mysqli_fetch_array($resulta, MYSQLI_ASSOC);
					$correo= $row['correo'];



					//$idpersonal = $row["idpersonal"];
					echo $nombredepto;

					//echo mysqli_error($link);
									include("../Modelo/cierra_conexion.php"); */
								?>