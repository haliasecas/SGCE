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
		<link type="text/css" rel="stylesheet" href="../Css/modals.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<div class="container-fluid" style="padding-bottom:9px;" id="header">
			<img src="../Img/SEP.png" height="64px" style="float:left; padding-left:15px;">
			<img class="img-head" src="../Img/logoIPNGris.png" style="float:right; padding-top:15px; padding-right:15px;">
		</div>

		<!-- Nueva nav -->
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
						<!--  Visitante -->
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
						<li class="">
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
						<span id="email02" class="text-center help-block hidden">El formato del campo correo es incorrecto</span>
					</div>
				</div>

				<div class="form-group" id="contra">
					<label class="col-lg-2 control-label">Contraseña</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" name="mipass" placeholder="***************">
						<span id="pass01" class=""></span>
						<span id="pass02" class="text-center help-block hidden">El formato del campo contraseña es incorrecto</span>
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
				function error(donde, str) {
					$(donde).addClass("has-error has-feedback");
					$("#pass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
					$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
					if (str != "")
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
					var tm = false, tp = false;
					var mail = $("[name='miemail']").val();
					var ps = $("[name='mipass']").val();
					if (mail == "") {
						$("#pass02").addClass("hidden");
						$("#contra").attr("class", "form-group has-error has-feedback");
						$("#correo").attr("class", "form-group has-error has-feedback");
						$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
						$("#pass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
					}
					else if (!validate(mail)) {
						$("#email02").text("Por favor, introduce una dirección de correo electrónico válida. Por ejemplo usuario@dominio.com");
						$("#contra").attr("class", "form-group has-error has-feedback");
						$("#correo").attr("class", "form-group has-error has-feedback");
						$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
						$("#pass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
						$("#email02").removeClass("hidden");
						$("#pass02").addClass("hidden");
					}
					else {
						$("#correo").attr("class", "form-group has-success has-feedback");
						$("#email01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
						$("#email02").addClass("hidden");
						$("#pass02").addClass("hidden");
						tm = true;
						if (ps == "") {
							$("#contra").attr("class", "form-group has-error has-feedback");
							$("#pass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
						}
						else {
							$("#contra").attr("class", "form-group");
							$("#pass01").addClass("hidden");
							tp = true;
						}
					}

					if (tm && tp) logIn2();
					else {
						$("#error").modal();
					}
				}

				function logIn2() {
					var m = $("[name='miemail']").val();
					var p = $("[name='mipass']").val();
					$.ajax({
						method: "POST",
						url: "../sesion_in.php",
						data: { miemail: m, mipass: p }
					}).done(function(msg) {
						if (msg == 1) {
							$("#correo").attr("class", "form-group has-error has-feedback");
							$("#contra").attr("class", "form-group has-error has-feedback");
							$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#pass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#pass02").removeClass("hidden");
							$("#pass02").text("Usuario y/o contraseña incorrectos.");
						}
						else if (msg == 2) {
							$("#correo").attr("class", "form-group has-error has-feedback");
							$("#contra").attr("class", "form-group has-error has-feedback");
							$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#pass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#pass02").removeClass("hidden");
							$("#pass02").text("Correo no registrado, por favor revise que haya escrito el correo correctamente.");
						}
						else {
							$("#correo").attr("class", "form-group has-success has-feedback");
							$("#contra").attr("class", "form-group has-success has-feedback");
							$("#pass01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
							$("#email01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
							$("#email02").addClass("hidden"); $("#pass02").addClass("hidden");
							//$("#bienvenido").modal();
                            window.location = '../';
						}
					});
				}
			</script>
		</div>

		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="bienvenido" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-success">
						<h4 class="modal-title">Mensaje de alerta</h4>
					</div>
					<div class="modal-body">
						<p>Bienvenido(a) al sistema generador de citas de ESCOM</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.location = '../';">
							Aceptar
						</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="error" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-error">
						<h4 class="modal-title">Mensaje de error</h4>
					</div>
					<div class="modal-body">
						<p>Falta al menos un dato obligatorio para efectuar la operación solicitada.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
					</div>
				</div>
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