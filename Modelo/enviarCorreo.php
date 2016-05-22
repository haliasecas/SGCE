<?php
header("Content-Type: text/html;charset=utf-8");
function mandarCorreoInforme($departamento,$asunto,$contenido,$emailinforme){
	//header("Content-Type: text/html;charset=utf-8");
	require 'PHPMailerAutoload.php';

		include("abre_conexion.php"); 

	$id = sprintf("SELECT * FROM depto WHERE iddepto='$departamento'");     
	$resulta = mysqli_query($link,$id);
	$numero = mysqli_num_rows($resulta); // obtenemos el número de filas
	$row = mysqli_fetch_array($resulta, MYSQLI_ASSOC);
	$nombredepto= $row['nombre'];
	$idpersonal = $row["idpersonal"];


	$id = sprintf("SELECT * FROM personal WHERE idpersonal='$idpersonal'");     
	$resulta = mysqli_query($link,$id);
	$numero = mysqli_num_rows($resulta); // obtenemos el número de filas
	$row = mysqli_fetch_array($resulta, MYSQLI_ASSOC);
	$nombreEncargado = $row['nombre'];
	$appatEncargado = $row['appaterno'];
	$apmatEncargado = $row['apmaterno'];
	$correoEncargado = $row['correo'];

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPKeepAlive = true;
	$mail->Username = "sgceescom@gmail.com";
	$mail->Password = "sgceescom10";
	$mail->CharSet = 'UTF-8';
	$mail->From = $emailinforme;
	$mail->FromName = "Estimado ".$nombreEncargado." ".$appatEncargado." ".$apmatEncargado;
	$mail->Subject = "Informe o sugerencia";
	$msg="<div class=\"container-fluid\" style=\"padding-bottom:9px;\" id=\"header\">
            <img src=\"../Img/SEP.png\" height=\"64px\" style=\"float:left; padding-left:15px;\">
            <img class=\"img-head\" src=\"../Img/logoIPNGris.png\" style=\"float:right; padding-top:15px; padding-right:15px;\">
        </div><br><br><br><br> <br> ";

	$msg=$msg."<b>Buen día </b> <br>".$nombreEncargado." ".$appatEncargado." ".$apmatEncargado."<br>";
	include("cierra_conexion.php"); 
	if($asunto=='1')
		$msg=$msg."Se ha realizado una solicitud de <b>pedir informe</b> <br> En el departamento: ".$nombredepto."<br>";
	else
		$msg=$msg."Se ha realizado una solicitud de <b> sugerencia</b> <br> En el departamento: ".$nombredepto."<br>";
	$msg=$msg."<b>Enviada desde el correo: ".$emailinforme."</b><br>";
	$msg=$msg."Contenido: ".$contenido."<br>";
	$msg=$msg."Preste mucha atención a esta solicitud, puesto que nuestro principal objetivo es la comodidad de nuestros clientes y esto nos ayudaría a prestar un mejor servicio. <br>";
	$mail->MsgHTML($msg);
	$mail->AddAddress($correoEncargado, "Holaaaaaaaa");
	$mail->IsHTML(true);
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}

function mandarCorreoSolicitud($nombre,$appat,$apmat,$email,$stringtoken) {
	//header("Content-Type: text/html;charset=utf-8");
	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPKeepAlive = true;
	$mail->Username = "sgceescom@gmail.com";
	$mail->Password = "sgceescom10";
	$mail->CharSet = 'UTF-8';
	$mail->From = $email;
	$mail->FromName = "Estimado ".$nombre." ".$appat." ".$apmat;
	$mail->Subject = "Operación para validar la cita.";
	$mail->AltBody = "Este es un mensaje de prueba.";
	$msg="<div class=\"container-fluid\" style=\"padding-bottom:9px;\" id=\"header\">
			<img src=\"../Img/SEP.png\" height=\"64px\" style=\"float:left; padding-left:15px;\">
			<img class=\"img-head\" src=\"../Img/logoIPNGris.png\" style=\"float:right; padding-top:15px; padding-right:15px;\">
		</div><br><br><br><br> <br> <b>Buen día </b> <br> ".$nombre." ".$appat." ".$apmat."<br> <b>Has solicitado agendar una cita el día</b><br> ".$_POST['date01']."<br>En un horario:<br>";
	$horarios = array(' ','9:00-10:00','13:00-14:00','20:00-21:00','10:00-11:00','14:00-15:00','11:00-12:00','18:00-19:00','12:00-13:00','19:00-20:00');
	if(!empty($_POST['hora01'])){
		foreach($_POST['hora01'] as $selected){
			$msg = $msg.$horarios[$selected]."<br>";
		}
	}
	else
		$msg = $msg."(S/N)";
	$enlace = $_SERVER['SERVER_NAME']."/SGCE/Vista/Validar.php?token=".$stringtoken;
	$msg=$msg."Debes acceder al siguiente enlace para continuar con el proceso<br>";
	$msg=$msg."<b>Enlace para confirmación: <a href='$enlace'>Validar Cita</a></b> <br>";
	$msg=$msg."Recibirás un correo electrónico a esta misma dirección sobre la confirmación o negación de tu cita en menos de 24 horas, de lo contrario favor de comunicarte al 57296000<br>";
	$msg=$msg."Gracias por utilizar el sistema generador de citas de ESCOM <br>";
	$msg=$msg."<br><br><b>Si no has sido tú el que agendó la cita en el sistema, por favor haga caso omiso de este correo electrónico.</b>";
	$mail->MsgHTML($msg);
	$mail->AddAddress($email, $nombre);
	$mail->IsHTML(true);
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}

function mandarCorreoAceptada($nombre,$appaterno,$apmaterno,$correo,$dia,$horainicio,$horafinal){
	//header("Content-Type: text/html;charset=utf-8");
	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPKeepAlive = true;
	$mail->Username = "sgceescom@gmail.com";
	$mail->Password = "sgceescom10";
	$mail->CharSet = 'UTF-8';
	$mail->From = $correo;
	$mail->FromName = "Estimado ".$nombre." ".$appaterno." ".$apmaterno;
	$mail->Subject = "Cita Aceptada";
	$msg="<div class=\"container-fluid\" style=\"padding-bottom:9px;\" id=\"header\">
            <img src=\"../Img/SEP.png\" height=\"64px\" style=\"float:left; padding-left:15px;\">
            <img class=\"img-head\" src=\"../Img/logoIPNGris.png\" style=\"float:right; padding-top:15px; padding-right:15px;\">
        </div><br><br><br><br> <br> ";
	$msg=$msg."<b>Buen día </b> <br>".$nombre." ".$appaterno." ".$apmaterno."<br>";
	$msg=$msg."Le informamos que su cita fue <b>Aceptada</b><br>";
	$msg=$msg."El dia: <b>".$dia."</b><br>";
	$msg=$msg."En un horario de: <b>".$horainicio."-".$horafinal."</b><br>";
	$msg=$msg."Gracias por utilizar el sistema generador de citas de ESCOM <br>";
	$mail->MsgHTML($msg);
	$mail->AddAddress($correo, $nombre);
	$mail->IsHTML(true);
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}

function mandarCorreoRechazada($nombre,$appaterno,$apmaterno,$correo){
	//header("Content-Type: text/html;charset=utf-8");
	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPKeepAlive = true;
	$mail->Username = "sgceescom@gmail.com";
	$mail->Password = "sgceescom10";
	$mail->CharSet = 'UTF-8';
	$mail->From = $correo;
	$mail->FromName = "Estimado ".$nombre." ".$appaterno." ".$apmaterno;
	$mail->Subject = "Cita Rechazada";
	$msg="<div class=\"container-fluid\" style=\"padding-bottom:9px;\" id=\"header\">
            <img src=\"../Img/SEP.png\" height=\"64px\" style=\"float:left; padding-left:15px;\">
            <img class=\"img-head\" src=\"../Img/logoIPNGris.png\" style=\"float:right; padding-top:15px; padding-right:15px;\">
        </div><br><br><br><br> <br> ";
	$msg=$msg."<b>Buen día </b> <br>".$nombre." ".$appaterno." ".$apmaterno."<br>";
	$msg=$msg."Le informamos que su cita fue <b>Rechazada</b><br>";
	$msg=$msg."Lamentamos mucho la perdida de su tiempo y le agradecemos que realice su solicitud nuevamente en un día distinto<br>";
	$msg=$msg."Gracias por utilizar el sistema generador de citas de ESCOM <br>";
	$mail->MsgHTML($msg);
	$mail->AddAddress($correo, $nombre);
	$mail->IsHTML(true);
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}
function mandarCorreoRecuperar($nombre,$appaterno,$apmaterno,$correo,$contrasena){
	//header("Content-Type: text/html;charset=utf-8");
	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPKeepAlive = true;
	$mail->Username = "sgceescom@gmail.com";
	$mail->Password = "sgceescom10";
	$mail->CharSet = 'UTF-8';
	$mail->From = $correo;
	$mail->FromName = "Estimado ".$nombre." ".$appaterno." ".$apmaterno;
	$mail->Subject = "Cambio de contraseña";
	$msg="<div class=\"container-fluid\" style=\"padding-bottom:9px;\" id=\"header\">
            <img src=\"../Img/SEP.png\" height=\"64px\" style=\"float:left; padding-left:15px;\">
            <img class=\"img-head\" src=\"../Img/logoIPNGris.png\" style=\"float:right; padding-top:15px; padding-right:15px;\">
        </div><br><br><br><br> <br> ";
	$msg=$msg."<b>Buen día </b> <br>".$nombre." ".$appaterno." ".$apmaterno."<br>";
	$msg=$msg."Usted ha solicitado recuperar su contraseña, su nueva contraseña es: <br><br> ";
	$msg=$msg."<b>".$contrasena."</b><br><br>";
	$msg=$msg."Se le recomienda que una vez acceda al sistema cambie su contraseña a una más segura.<br>";
	$mail->MsgHTML($msg);
	$mail->AddAddress($correo, $nombre);
	$mail->IsHTML(true);
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}
?>