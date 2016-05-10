<?php
function mandarCorreoInforme($departamento,$asunto,$contenido,$email){
    header("Content-Type: text/html;charset=utf-8");
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
    $mail->FromName = "Estimado ".$nombreEncargado." ".$appatEncargado." ".$apmatEncargado;
    $mail->Subject = "Informe o sugerencia";
    $msg="<div class=\"container-fluid\" style=\"padding-bottom:9px;\" id=\"header\">
            <img src=\"../Img/SEP.png\" height=\"64px\" style=\"float:left; padding-left:15px;\">
            <img class=\"img-head\" src=\"../Img/logoIPNGris.png\" style=\"float:right; padding-top:15px; padding-right:15px;\">
        </div><br><br><br><br> <br> ";
    include("abre_conexion.php"); 

    $id = sprintf("SELECT nombre,appaterno,apmaterno,correo FROM area WHERE idepto='$departamento'");
    $result=mysqli_query($link,$id);
    $rowpersonal = mysqli_fetch_assoc($result);
    $nombreEncargado = $rowpersonal['nombre'];
    $appatEncargado = $rowpersonal['appaterno'];
    $apmatEncargado = $rowpersonal['apmaterno'];
    $correoEncargado = $rowpersonal['correo'];

    $id = sprintf("SELECT nombre FROM depto WHERE idepto='$departamento'");
    $result2=mysqli_query($link,$id);
    $rowdepto = mysqli_fetch_assoc($result2);
    $nombreDepto = $rowdepto['nombre'];

    $msg=$msg."<b>Buen día </b> <br>".$nombre." ".$appatEncargado." ".$apmatEncargado."<br>";
    include("cierra_conexion.php"); 
    if($asunto=='1')
        $msg=$msg."Se ha realizado una solicitud de pedir informe <br> En el departamento".$nombreDepto."<br>";
    else
        $msg=$msg."Se ha realizado una solicitud de sugerencia <br> En el departamento".$nombreDepto."<br>";
    $msg=$msg."<b>Enviada desde el correo:."$email."</b><br>";
    $msg=$msg."Asunto: ".$asunto."<br>";
    $msg=$msg."Contenido: ".$contenido."<br>";
    $msg=$msg."Preste mucha atención a esta solicitud, puesto que nuestro principal objetivo es la comodidad de nuestros clientes, y así prestar un mejor servicio.<br>";
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
	header("Content-Type: text/html;charset=utf-8");
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
		</div><br><br><br><br> <br> <b>Buen día </b> <br> ".$nombre." ".$appat." ".$apmat."<br> <b>Haz pedido agendar una cita el/los día(s)</b><br>El dia: ".$_POST['date01']."<br>Con horarios:<br>";
	$horarios = array(' ','9:00-10:00','13:00-14:00','20:00-21:00','10:00-11:00','14:00-15:00','11:00-12:00','18:00-19:00','12:00-13:00','19:00-20:00');
	if(!empty($_POST['hora01'])){
		foreach($_POST['hora01'] as $selected){
			$msg = $msg.$horarios[$selected]."<br>";
		}
	}
	else
		$msg = $msg."(S/N)";
	$enlace = $_SERVER['SERVER_NAME']."/SGCE/Vista/Validar.php?token=".$stringtoken;
	$msg=$msg."<b>Da click en el siguiente enlace: <a href='$enlace'>Validar Cita</a></b> <br>";
	$msg=$msg."Recibirás un correo electrónico a esta misma dirección sobre la confirmación o negación de tu cita en menos de 24 horas, de lo contrario favor de comunicarte al 57296000<br>";
	$msg=$msg."Gracias por utilizar el sistema generador de citas de ESCOM <br>";
	$msg=$msg."<br><br><b>Si desconoce está solicitud, por favor haga caso omiso de este mensaje.</b>";
		$mail->MsgHTML($msg);
	$mail->AddAddress($email, "Holaaaaaaaa");
	$mail->IsHTML(true);
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}
function mandarCorreoAceptada($nombre,$appat,$apmat,$email,$dia,$hora){
    header("Content-Type: text/html;charset=utf-8");
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
    $mail->Subject = "Cita Aceptada";
    $msg="<div class=\"container-fluid\" style=\"padding-bottom:9px;\" id=\"header\">
            <img src=\"../Img/SEP.png\" height=\"64px\" style=\"float:left; padding-left:15px;\">
            <img class=\"img-head\" src=\"../Img/logoIPNGris.png\" style=\"float:right; padding-top:15px; padding-right:15px;\">
        </div><br><br><br><br> <br> ";
    $msg=$msg."<b>Buen día </b> <br>".$nombre." ".$appat." ".$apmat."<br>";
    $msg=$msg."Le informamos que su cita fue <b>Aceptada</b><br>";
    $msg=$msg."El dia: <b>".$dia."</b><br>";
    $msg=$msg."En un horario de: <b>".$hora."</b><br>";
    $msg=$msg."Gracias por utilizar el sistema generador de citas de ESCOM <br>";
    $mail->MsgHTML($msg);
    $mail->AddAddress($email, "Holaaaaaaaa");
    $mail->IsHTML(true);
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}
function mandarCorreoRechazada($nombre,$appat,$apmat,$email){
    header("Content-Type: text/html;charset=utf-8");
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
    $mail->Subject = "Cita Rechazada";
    $msg="<div class=\"container-fluid\" style=\"padding-bottom:9px;\" id=\"header\">
            <img src=\"../Img/SEP.png\" height=\"64px\" style=\"float:left; padding-left:15px;\">
            <img class=\"img-head\" src=\"../Img/logoIPNGris.png\" style=\"float:right; padding-top:15px; padding-right:15px;\">
        </div><br><br><br><br> <br> ";
    $msg=$msg."<b>Buen día </b> <br>".$nombre." ".$appat." ".$apmat."<br>";
    $msg=$msg."Le informamos que su cita fue <b>Rechazada</b><br>";
    $msg=$msg."Lamentamos mucho la perdida de su tiempo y le agradecemos que realice su solicitud nuevamente en un día distinto<br>";
    $msg=$msg."Gracias por utilizar el sistema generador de citas de ESCOM <br>";
    $mail->MsgHTML($msg);
    $mail->AddAddress($email, "Holaaaaaaaa");
    $mail->IsHTML(true);
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}