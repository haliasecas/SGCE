<!DOCTYPE html>
<html>  
	<head>  
		<title>SGCE</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="./Scr/jquery-2.2.0.js"></script>
		<script type="text/javascript" src="./Scr/moment.min.js"></script>
		<script type="text/javascript" src="./Scr/bootstrap.js"></script>
		<script type="text/javascript" src="./Scr/bootstrap-datetimepicker.js"></script>
		<link type="text/css" rel="stylesheet" href="./Css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="./Css/letras.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>  

	<body>
		<div class="container-fluid" style="padding-bottom:9px;" id="header">
			<img src="Img/SEP.png" height="64px" style="float:left; padding-left:15px;">
			<img class="img-head" src="./Img/logoIPNGris.png" style="float:right; padding-top:15px; padding-right:15px;">
		</div>

		<nav class="navbar navbar-inverse navbar-static-top" style="height:84px;" id="top-bar">
			<div class="container-fluid" style="padding-left:51px; padding-right:51px;">
				<div class="navbar-header">
					<a class="navbar-brand" href=".">
						<img id="logoSGCE" src="./Img/logoSGCE.png">
					</a>
					<div style="padding-top:33px;">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-bar" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>

				<div class="collapse navbar-collapse" id="header-bar">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<span><img src="./Img/bookmarkGreen.png" height="30px"></span> Visitante<span class="caret"></span>
						</a>
						<ul class="dropdown-menu dark">
							<li><a href="./Vista/SolicitarCita.php">
								<span><img src="./Img/333.png" height="36px"></span>
								Solicitar Cita
								</a></li>
							<li><a href="./Vista/InformesySugerencias.php">
								<span><img src="./Img/22.png" height="36px"></span>
								Informes y Sugerencias
								</a></li>
						</ul>
					</li>
					<li class="">
						<a href="Vista/IniciarSesion.php">
							<span><img src="./Img/loginiGreen.png" height="30px"></span> Iniciar sesión (Administrador)
						</a>
					</li>
				</div>
			</div>
		</nav>
		<div id="main-content" class="container-fluid" align="center" style="padding-bottom: 50px;">
			<div class="jumbotron">
				<?php

				// Recibimos por POST los datos procedentes del formulario  
				$miemail = $_POST["miemail"]; 
				$mipass = $_POST["mipass"]; 

				// Abrimos la conexion a la base de datos  
				include("Vista/abre_conexion.php");

				$nuevo_usuario = mysqli_query($link, "select correo, contrasena from personal where correo = '$miemail' and contrasena = aes_encrypt('$mipass','C1r4l3t1890')");
				if (mysqli_num_rows($nuevo_usuario)>0) { 
					$query = "select * from personal where correo='$miemail'";
					$result = mysqli_query($link, $query);
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					setcookie("cargo",$row["cargo"]);
					setcookie("id",$row["idpersonal"]);

					echo " 
                <p class='avisos'>Bienvenid@ " . $row["nombre"] . " \n, Sera redireccionado automaticamente en 3 segundos</p>";  
					header("refresh: 3; url = ./");//Linea de reedirección
					/**
                echo " 
                <p class='avisos'>Bienvenid@\n" . $_SESSION["Nombre"] . "</p> 
                <p><a href='index.php' >Continuar Navegando</a></p> 
                "; **/
				}
				else {

					// Cerramos la conexion a la base de datos  
					include("Vista/cierra_conexion.php");  

					echo "<p class='avisos'>Ningun usuario registrado coincide con los datos recibidos</p> <p><a href='Vista/IniciarSesion.php' >Regresar</a></p> "; 
				}
				?>  
			</div>
		</div>
		<nav class="navbar navbar-inverse navbar-fixed-bottom" id="bottom-bar">
			<div class="container-fluid" style="padding-right:51px;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer-bar" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse" id="footer-bar">
					<ul class="nav navbar-nav navbar-right">
						<p class="navbar-text">@2016 Team Rocket Inc.</p>
						<a class="navbar-brand" href="https://www.facebook.com/escom.iscipn.9/">
							<img src="./Img/facebookWhite.png" height="24px">
						</a>
						<a class="navbar-brand" href="https://twitter.com/escomunidad?ref_src=twsrc%5Etfw">
							<img src="./Img/twitterWhite.png" height="24px">
						</a>
						<a class="navbar-brand" href="https://plus.google.com/112263443520207638663/posts">
							<img src="./Img/googleWhite.png" height="24px">
						</a>
					</ul>
				</div>
			</div>
		</nav>		

		<script type="text/javascript">
			$(document).ready(function (){
				// Sticky bar plz
				$(window).scroll(function() {
					if ($(window).scrollTop() >= $("#header").height()) {
						$("#top-bar").addClass("navbar-fixed-top");
						$("#main-content").css({"padding-top":"90px"});
					}
					if ($(window).scrollTop() < $("#header").height()) {
						$("#top-bar").removeClass("navbar-fixed-top");
						$("#main-content").css({"padding-top":"0px"});
					}
				});

				if ($(window).width() <= 886) {
					$("#top-bar").removeAttr("style");
				}

				$(window).resize(function() {
					if ($(window).width() > 886) {
						$("#top-bar").attr({"style":"height:84px;"});
					}
					if ($(window).width() <= 886) {
						$("#top-bar").removeAttr("style");
					}
				}); 
			});
		</script>
	</body>  
</html> 