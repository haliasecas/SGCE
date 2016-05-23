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
					$busqueda = sprintf("SELECT idSolicitud FROM solicitud WHERE idSolicitud=1 AND estado='ACEPTADA'");
						$result=mysqli_query($link, $busqueda);
						$row_cnt = mysqli_num_rows($result);
						echo $row_cnt;
                   /* $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
					$string = '';
					$random_string_length = 20;	//GENERAMOS EL TOKEN
					for ($i = 0; $i < $random_string_length; $i++) {
						$string .= $characters[rand(0, strlen($characters) - 1)];
					}
                    $tok=sprintf("INSERT INTO solicitudtoken (idSolicitud, token) VALUES (2,'$string')");   
						$result=mysqli_query($link,$tok);
echo mysqli_error($link);*/
					/*$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
					$contrasena = '';
					$random_string_length = 10;	//GENERAMOS EL TOKEN
					for ($i = 0; $i < $random_string_length; $i++) {
						$contrasena .= $characters[rand(0, strlen($characters) - 1)];
					}
					echo $contrasena;
					$sql = sprintf("UPDATE personal SET contrasena=aes_encrypt('admin123','C1r4l3t1890') WHERE correo='nathaniel981@gmail.com'");
					$result=mysqli_query($link,$sql);
					echo mysqli_error($link);*/
					//$nueva=aes_encrypt('$contrasena','C1r4l3t1890');
					//echo $nueva;
					/*$busqueda = sprintf("SELECT * FROM personal WHERE correo='nathaniel981@gmail.com'");
					$result=mysqli_query($link, $busqueda);
					$row_cnt = mysqli_num_rows($result);
					$row = mysqli_fetch_assoc($result);
					echo $row['apmaterno'];*/
					/*$busqueda = sprintf("SELECT dia FROM cita WHERE dia='2016/05/20'");
			$result=mysqli_query($link, $busqueda);
			$row_cnt = mysqli_num_rows($result);


			$busqueda2 = sprintf("SELECT hinicio FROM cita WHERE hinicio='09:00:00'");
			$result2=mysqli_query($link, $busqueda2);
			$row_cnt2 = mysqli_num_rows($result2);
			echo $row_cnt2;
			echo $row_cnt;*/
					//$sql = sprintf("INSERT INTO cita (idCita,hinicio,hfin,dia,idarea,iddepto,idinteresado) VALUES (NULL,'09:00:00','09:30:00','2016/05/20','1','1','1')");
					//	$result=mysqli_query($link,$sql);
					//		echo mysqli_error($link);
					/*$busqueda = sprintf("SELECT dia FROM cita WHERE dia='2016/05/20'");
					$result=mysqli_query($link, $busqueda);
					$row_cnt = mysqli_num_rows($result);

					$busqueda2 = sprintf("SELECT hinicio FROM cita WHERE hinicio='09:00:00'");
					$result2=mysqli_query($link, $busqueda);
					$row_cnt2 = mysqli_num_rows($result2);

					echo $row_cnt2;
					echo $row_cnt;

					if($row_cnt=='1' && $row_cnt2=='1')
						echo "Hola";*/
					//$query = "SELECT * FROM horapref WHERE idHorario='1'";
					//$result = mysqli_query($link, $query);
					//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					//$hinicio=$row['hinicio'];
					//echo $hinicio;
						/*if($row_cnt==1) {
							$id = sprintf("SELECT idinteresado FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
							$result=mysqli_query($link,$id);
						}
						else{
							$sql = sprintf("INSERT INTO interesado (idinteresado, nombre, appaterno,apmaterno,correo,telefono) VALUES (NULL,'$nombre','$appat','$apmat','$email','$telefono')");
							$result=mysqli_query($link,$sql);
							$id = sprintf("SELECT idinteresado FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
							$result=mysqli_query($link,$id);
						}*/
						//$sql = sprintf("INSERT INTO cita (idCita,hinicio,hfin,dia,idarea,iddepto,idinteresado) VALUES (NULL,'ralvhe@gmail.com','Hola perro','Adios perro','PENDIENTE','$timestamp','2')");
							//$result=mysqli_query($link,$sql);
							//echo mysqli_error($link);
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