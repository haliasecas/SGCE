<!DOCTYPE html>
<html>
	<head>
		<title>SGCE</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="../Scr/jquery-2.2.0.js"></script>
		<script type="text/javascript" src="../Scr/moment.min.js"></script>
		<script type="text/javascript" src="../Scr/bootstrap.js"></script>
		<script type="text/javascript" src="../Scr/bootstrap-datetimepicker.js"></script>
		<script type="text/javascript" src="../Scr/validator.js"></script>
		<link type="text/css" rel="stylesheet" href="../Css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="../Css/letras.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<div class="container-fluid" style="padding-bottom:9px;" id="header">
			<img src="../Img/SEP.png" height="64px" style="float:left; padding-left:15px;">
			<img class="img-head" src="../Img/logoIPNGris.png" style="float:right; padding-top:15px; padding-right:15px;">
		</div>

		<nav class="navbar navbar-inverse navbar-static-top" style="height:84px;" id="top-bar">
			<div class="container-fluid" style="padding-left:51px; padding-right:51px;">
				<div class="navbar-header">
					<a class="navbar-brand" href="../">
						<img id="logoSGCE" src="../Img/logoSGCE.png">
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
					<ul class="nav navbar-nav navbar-right" style="padding-top:12px;">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span><img src="../Img/bookmarkGreen.png" height="30px"></span> Visitante<span class="caret"></span>
							</a>
							<ul class="dropdown-menu dark">
								<li><a href="../Vista/SolicitarCita.php">
									<span><img src="../Img/333.png" height="36px"></span>
									Solicitar Cita
									</a></li>
								<li><a href="../Vista/InformesySugerencias.php">
									<span><img src="../Img/22.png" height="36px"></span>
									Informes y Sugerencias
									</a></li>
							</ul>

						</li>
						<li>
							<a href="../Vista/IniciarSesion.php">
								<span><img src="../Img/loginiGreen.png" height="30px"></span> Iniciar sesión (Administrador)
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div style="padding-bottom: 57px;" id="main-content" class="container-fluid col-md-offset-1 col-md-10">
			<form class="form-horizontal" method="post" id="iniciaSes">
				<h2><p><strong>Iniciar sesión Administrador</strong></p></h2>
				<p>Ingresa los campos correspondientes a tu cuenta para iniciar sesión</p>
				<br><br>
				<div class="form-group" id="correo">
					<label class="col-lg-2 control-label">Correo electrónico</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="miemail" placeholder="ejemplo@dominio.com">
						<span id="email01" class=""></span>
					</div>
				</div>

				<div class="form-group" id="contra">
					<label class="col-lg-2 control-label">Contraseña</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" name="mipass" placeholder="***************">
						<span id="pass01" class=""></span>
						<span id="pass02" class="text-center help-block hidden"></span>
					</div>
				</div>

				<div class="form-group text-right">
					<div class="col-md-10 col-md-offset-2">
						<span class="help-block">
							<a href="RecuperarC.php" style="color: #00B85D">¿Olvidaste tu contraseña?</a>
							&nbsp; &nbsp;
							<a class="btn btn-success" style="width: 150px;" onclick="logIn();">ENVIAR</a>
						</span>
					</div>
				</div>
			</form>
			<script type="text/javascript">
				function error(str) {
					$("#correo").addClass("has-error has-feedback");
					$("#contra").addClass("has-error has-feedback");
					$("#pass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
					$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
					$("#pass02").removeClass("hidden");
					$("#pass02").text(str);
				}

				function nohayerror() {
					$("#contra").removeClass("has-error has-feedback");
					$("#correo").removeClass("has-error has-feedback");
					$("#email01").addClass("hidden");
					$("#user01").attr("class", "hidden");
					$("#user02").addClass("hidden");
					$("#pass01").attr("class", "hidden");
					$("#pass02").addClass("hidden");
				}
				
				function logIn() {
					var mail = $("[name='miemail']").val();
					var ps = $("[name='mipass']").val();
					if (ps == "") error("El correo electrónico y la contraseña que ingresaste no coinciden.");
					else if (validate(mail)) logIn2();
					else error("Por favor, introduce una dirección de correo electrónico válida. Por ejemplo usuario@dominio.com");
				}

				function logIn2() {
					var m = $("[name='miemail']").val();
					var p = $("[name='mipass']").val();
					$.ajax({
						method: "POST",
						url: "../Modelo/sesion_in.php",
						data: { miemail: m, mipass: p }
					}).done(function(msg) {
						if (msg == 1) error("Usuario y/o contraseña incorrectos.");
						else if (msg == 2) error("Correo no registrado, por favor revise que haya escrito el correo correctamente.");
						else {
							nohayerror();
							window.location = "../";
						}
					});
				}
			</script>
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
						<a class="navbar-brand" href="https://www.facebook.com/escom.iscipn.9/?fref=nf">
							<img src="../Img/facebookWhite.png" height="24px">
						</a>
						<a class="navbar-brand" href="https://twitter.com/escomunidad">
							<img src="../Img/twitterWhite.png" height="24px">
						</a>
						<a class="navbar-brand" href="https://plus.google.com/112263443520207638663/posts">
							<img src="../Img/googleWhite.png" height="24px">
						</a>
					</ul>
				</div>
			</div>
		</nav>

		<script type="text/javascript">
			$(document).ready(function() {
				// Sticky bar plz
				$(window).scroll(function() {
					if ($(window).scrollTop() > $("#header").height()) {
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