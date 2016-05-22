<?php
$value = htmlspecialchars($_POST["value"]);
include("../Modelo/abre_conexion.php");
switch($value){
	case 1:
		$query = "SELECT * FROM solicitud WHERE estado!=' ' order by estado ";
		break;
	case 2:
		$query = "SELECT * FROM solicitud WHERE estado='AGENDADA'";
		break;
	case 3:
		$query = "SELECT * FROM solicitud WHERE estado='PENDIENTE'";
		break;
}
$result = mysqli_query($link,$query);

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$busquedaSol = sprintf("SELECT idSolicitud FROM solicitud WHERE idSolicitud=1 AND estado='ACEPTADA'");
		$resultSol=mysqli_query($link, $busquedaSol);
		$row_cntSol = mysqli_num_rows($resultSol); // Busco si ya hay una solicitud aceptada para

		$idarea=$row['idarea'];
		$id = sprintf("SELECT nombre FROM area WHERE idarea='$idarea'");
		$result2=mysqli_query($link,$id);
		$rowarea = mysqli_fetch_assoc($result2);
		$area = $rowarea['nombre'];
		$idinteresado=$row['idinteresado'];
		$id = sprintf("SELECT correo FROM interesado WHERE idinteresado='$idinteresado'");
		$result3=mysqli_query($link,$id);
		$rowinteresado = mysqli_fetch_assoc($result3);
		$correo = $rowinteresado['correo'];
		$recibido=$row['dia'];
		$estado=$row['estado'];
		$idsolicitud=$row['idSolicitud'];
		echo "<tr>";
		echo "<th>$area</th>";
		echo "<td>$correo</td>";
		echo "<td>$recibido</td>";
		echo "<p><td>$estado</td></p>";
		if(!$row_cntSol==1){
				echo "<th><a class='text-success text-right'  style = 'text-decoration:underline;' href='VerSolicitudesCita.php?id=$idsolicitud'>Ver más</a></th>";
		}
		else{
			echo "<th><a class='text-success text-right'  style = 'text-decoration:underline;'>Ver más</a></th>";
		}
		//echo "<td><p class='click-me text-success text-right'  style='text-decoration:underline;'' id='1'>Ver más</p></td>
		//	<td><p class='click-me text-success text-right' style='text-decoration:underline;''  id='2'>Eliminar</p></td>";
		echo "</tr>";
	}

include("../Modelo/cierra_conexion.php");
?>
