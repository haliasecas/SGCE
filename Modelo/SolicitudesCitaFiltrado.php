<?php
$value = htmlspecialchars($_POST["value"]);
include("../Modelo/abre_conexion.php");
switch($value){
	case 1:
		$query = "SELECT idSolicitud,idarea,dia,estado,idinteresado FROM solicitud";
		break;
	case 2:
		$query = "SELECT idSolicitud,idarea,dia,estado,idinteresado FROM solicitud WHERE estado='ACEPTADA'";
		break;
	case 3:
		$query = "SELECT idSolicitud,idarea,dia,estado,idinteresado FROM solicitud WHERE estado='PENDIENTE'";
		break;
}
$result = mysqli_query($link, $query);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
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
	echo "<td>$area</td>";
	echo "<td>$correo</td>";
	echo "<td>$recibido</td>";
	echo "<p><td>$estado</td></p>";
	echo "<td><a class='text-success text-right'  style = 'text-decoration:underline;' href='VerSolicitudesCita.php?id=$idsolicitud'>Ver más</a></td>";
	//echo "<td><p class='click-me text-success text-right'  style='text-decoration:underline;'' id='1'>Ver más</p></td>
	//	<td><p class='click-me text-success text-right' style='text-decoration:underline;''  id='2'>Eliminar</p></td>";
	echo "</tr>";
}
include("../Modelo/cierra_conexion.php");
?>