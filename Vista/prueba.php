<?php
					include("../Modelo/abre_conexion.php"); 
						$query = "SELECT * FROM HoraSol WHERE idSolicitud='2'";

						$result = mysqli_query($link,$query);

						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
							$idhorario=$row['idHorario'];
							$query2 = "SELECT * FROM HoraPref WHERE idHorario='$idhorario'";
							$result2=mysqli_query($link,$query2);
							$rowarea = mysqli_fetch_assoc($result2);
							echo $rowarea['hinicio'];
							echo $rowarea['hfin'];
						}
						/*while(){
							
							$idarea=$row['idarea'];
							$area = $row['area'];
							$depto = $row['depto'];
							echo "<tr>";
							echo "<th>$area</th>";
							echo "<th>$depto</th>";
							echo "<th><a class=' text-success text-right'  style = 'text-decoration:underline;' href='EditarAreas.php?id=$idarea'>Editar</a></th>";   
							echo "<th><a class=' text-success text-right' style = 'text-decoration:underline;'  href='eliminar_area.php?id=$idarea'>Eliminar</a></th>  ";
							echo "</tr>";
						}*/


							//$row_dia = mysqli_num_rows($resultdia);
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