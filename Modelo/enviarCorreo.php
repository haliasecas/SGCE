<?php
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
$mail->MsgHTML($msg);
$mail->AddAddress($email, "Holaaaaaaaa");
$mail->IsHTML(true);
if(!$mail->Send()) {
	return 0;
 } else {
	return 1;
}
}
?>