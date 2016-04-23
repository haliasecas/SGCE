<!DOCTYPE html>
<html>
	<head>
		<title>Modelo</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="./Scr/moment.min.js"></script>
		<script type="text/javascript" src="./Scr/bootstrap.js"></script>
		<script type="text/javascript" src="./Scr/bootstrap-datetimepicker.js"></script>
		<link type="text/css" rel="stylesheet" href="./Css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style type="text/css">
			@font-face{
				font-family: "Arial";
				src: url("Fonts/arial.ttf") format("truetype");
				font-family: "Arial Rounded";
				src: url("Fonts/arial-rounded.ttf") format("truetype");
				font-family: "Oswald";
				src: url("Fonts/Oswald-Light.ttf") format("truetype");
			}
			#top-bar, #bottom-bar{
				font-family: "Oswald";
				font-size: 18px;
			}
			body {
				font-family: "Arial";
			}
			#logoSGCE, .img-head{
				max-width: 100%;
    			height: auto;
    			width: auto\9; /* ie8 */
			}
			textarea {
				resize: none;
			}
		</style>
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
					<ul class="nav navbar-nav navbar-right" style="padding-top:12px;">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span><img src="Img/bookmarkGreen.png" height="30px"></span> Visitante<span class="caret"></span>
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
								<li><a href="#">
									<span><img src="./Img/11.png" height="36px"></span>
									Ver mis citas
								</a></li>
							</ul>
						</li>
						<li class="">
							<a href="./Vista/IniciarSesion.php">
								<span><img src="./Img/loginiGreen.png" height="30px"></span> Iniciar sesión (Administrador)
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container-fluid" style="padding-bottom: 57px;" id="main-content">
			<div class="container-fluid col-md-offset-1 col-md-10">
				<form action="" method="GET" class="form-horizontal">
					<h3><strong> Informes y sugerencias</strong></h3>
					<p><strong class="text-success">Todos los campos son obligatorios.</strong>
					La respuesta a su pregunta o sugerencia llegará directamente al correo que<br>nos proporcione.</p><br>
				
					<div class="form-group ">
						<label  for="email" class="control-label col-md-2">Correo Electrónico</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="" placeholder="ejemplo@dominio.com">
						</div>
					</div>

					<div class="form-group">
						<label for="departamento" class="control-label col-md-2">Departamento</label>
						<div class="col-md-10">
							<select name="departamento" class="form-control">
								<option value="UPIS">Unidad Politécnica de Integración Social</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="asunto" class="control-label col-md-2">Asunto</label>
						<div class="col-md-10">
							<select name="asunto" class="form-control">
								<option value="informe" select>Pedir informe</option>
								<option value="sugerencia">Sugerencia</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="comentarios" class="control-label col-md-2">Contenido</label>
						<div class="col-md-10">
							<textarea name="comentarios" class="form-control" cols="30" rows="15" placeholder="Exprese su sugerencia o problemática"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2" align="right">
							<button type="submit" class="btn btn-success">ENVIAR</button>
						</div>
					</div>
				</form>
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
							<img src="./Img/facebookWhite.png" height="24px">
						</a>
						<a class="navbar-brand" href="https://twitter.com/escomunidad">
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