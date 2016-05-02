<?php
header("Content-Type: text/html;charset=utf-8");
$email = $_POST['email'];
require_once('class.phpmailer.php');
require_once('class.smtp.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "sgceescom@gmail.com";
$mail->Password = "sgceescom10";
$mail->CharSet = 'UTF-8';
$mail->From = $email;
$mail->FromName = "Estimado ralvhe@gmail.com";
$mail->Subject = "Operación para restablecer la contraseña";
$mail->AltBody = "Este es un mensaje de prueba.";

$mail->MsgHTML("<div class=\"container-fluid\" style=\"padding-bottom:9px;\" id=\"header\">
			<img src=\"../Img/SEP.png\" height=\"64px\" style=\"float:left; padding-left:15px;\">
			<img class=\"img-head\" src=\"../Img/logoIPNGris.png\" style=\"float:right; padding-top:15px; padding-right:15px;\">
		</div>");
$mail->AddAddress($email, "Holaaaaaaaa");
$mail->IsHTML(true);
if(!$mail->Send()) {
	echo "Error: " . $mail->ErrorInfo;
 } else {
	echo "Mensaje enviado correctamente, á é í ó ú";
}
?>
