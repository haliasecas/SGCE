<!DOCTYPE html>
<html>
	<head>
		<title>SGCE</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="../Scr/jquery-2.2.0.js"></script>
		<script type="text/javascript" src="../Scr/moment.min.js"></script>
		<script type="text/javascript" src="../Scr/bootstrap.js"></script>
		<script type="text/javascript" src="../Scr/bootstrap-datetimepicker.js"></script>
		<link type="text/css" rel="stylesheet" href="../Css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="../Css/letras.css">
		<link type="text/css" rel="stylesheet" href="../Css/modals.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<?php
	if (!isset($_GET["id"])) {
	?>
	<script type="text/javascript">
		window.location = "../";
	</script>
	<?php
	} else {
		$id = htmlspecialchars($_GET['id']);
	?>

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

						<?php
		if (isset($_COOKIE["cargo"])) {
						?>
						<?php
			if($_COOKIE["cargo"]==1){ 
						?>

						<!--  Administrador -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span><img src="../Img/bookmarkGreen.png" height="30px"></span> Administrador<span class="caret"></span>
							</a>
							<ul class="dropdown-menu dark">
								<li><a href="../Vista/AdministrarDepartamentos.php">
									<span><img src="../Img/Admin_Dep.png" height="36px"></span>
									Administrar departamentos
									</a></li>
								<li><a href="../Vista/AdministrarAreas.php">
									<span><img src="../Img/Admin_Area.png" height="36px"></span>
									Administrar areas
									</a></li>
								<li><a href="../Vista/AdministrarCuentas.php">
									<span><img src="../Img/Admin_Cont.png" height="36px"></span>
									Administrar cuentas
									</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span><img src="../Img/loginiGreen.png" height="30px"></span> Bienvenido(a)<span class="caret"></span>
							</a>
							<ul class="dropdown-menu dark">
								<li><a href="../Vista/CambiarContrasena.php">
									<span><img src="../Img/Edit2.png" height="36px"></span>
									Cambiar contraseña
									</a></li>
								<li><a href="../cierra_sesion.php">
									<span><img src="../Img/Out.png" height="36px"></span>
									Cerrar sesión
									</a></li>
							</ul>
						</li>

						<?php }else{?> 

						<! Personal administrativo -->                    
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span><img src="../Img/bookmarkGreen.png" height="30px"></span> Personal Administrativo<span class="caret"></span>
							</a>
							<ul class="dropdown-menu dark">
								<li><a href="../Vista/Calendario.php">
									<span><img src="../Img/333.png" height="36px"></span>
									Calendario
									</a></li>
								<li><a href="../Vista/VerInformesYS.php">
									<span><img src="../Img/22.png" height="36px"></span>
									Informes y Sugerencias
									</a></li>
								<li><a href="../Vista/SolicitudesCita.php">
									<span><img src="../Img/11.png" height="36px"></span>
									Solicitudes de citas
									</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span><img src="../Img/loginiGreen.png" height="30px"></span> Bienvenido(a)<span class="caret"></span>
							</a>
							<ul class="dropdown-menu dark">
								<li><a href="../Vista/CambiarContrasena.php">
									<span><img src="../Img/Edit2.png" height="36px"></span>
									Cambiar contraseña
									</a></li>
								<li><a href="../cierra_sesion.php">
									<span><img src="../Img/Out.png" height="36px"></span>
									Cerrar sesión
									</a></li>
							</ul>
						</li>
						<?php
			} } else {
						?>
						<script type="text/javascript">
							window.location = "../";
						</script>
						<?php }?>
					</ul>
				</div>
			</div>
		</nav>
		<div class="modal fade" id="MSGA_09" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-success">
						<h4 class="modal-title">Mensaje de alerta</h4>
					</div>
					<div class="modal-body">
						<p>Se te ha enviado un correo con instrucciones para continuar el proceso de solicitud de cita.
							Verifica que has recibido el correo, de lo contrario vuelve a llenar la solicitud.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.location = '../';">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" data-keyboard="false" id="MSG_E06" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-error">
						<h4 class="modal-title">Mensaje de error</h4>
					</div>
					<div class="modal-body">
						<p>Ocurrió un error interno al enviar el correo electrónico, por favor intente de nuevo.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location = '../';">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
		<?php
				if (!empty($_POST)) {

						$idmen = $_GET['id'];
						include("../Modelo/abre_conexion.php");
						$id = htmlspecialchars($_GET['id']);
						$q = "SELECT * FROM mensaje WHERE idMensaje = $id";
						$ans = mysqli_query($link, $q);
						$row = mysqli_fetch_array($ans, MYSQLI_ASSOC);
						$email=$row['correo']; 
						$respuesta=$_POST['respuesta'];
						require_once("../Modelo/enviarCorreo.php");
						if (mandarCorreoInformeRespuesta($email,$respuesta)) {
								$sql = sprintf("UPDATE mensaje SET estado='REVISADO' WHERE idMensaje='$idmen'");
								$result=mysqli_query($link,$sql);
								echo 
									"<script type='text/javascript'>
										$(document).ready(function() {
											$('#process').modal('hide');
											$('#MSGA_09').modal();
										});
									</script>";
							}
						else {
							echo 
								"<script type='text/javascript'>
									$(document).ready(function() {
										$('#process').modal('hide');
										$('#MSG_E06').modal();
									});
							</script>";
					} 

					}
		?>
		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="MSGC_02" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-warning">
						<h4 class="modal-title">Mensaje de confirmación</h4>
					</div>
					<div class="modal-body">
						<p>¿Está seguro de que desea cancelar Ver Solicitudes?.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
						<button type="button" class="btn btn-warning" onclick="window.location = 'SolicitudesCita.php'" data-dismiss="modal">Si</button>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid" style="padding-bottom:81px;" id="main-content">
			<div class="container-fluid col-md-10 col-md-offset-1">
				<h3><strong>Ver más</strong></h3>
				<p>La respuesta se enviará directamente al correo electrónico indicado y el estado del
					mensaje pasará a "REVISADO".</p>
				<br><br>
				<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$_GET['id']; ?>" id="Formulario" method="POST">
					<h4 class="text-uppercase">Datos del mensaje:</h4>

					<!-- Correo electrónico -->
					<?php
		include("../Modelo/abre_conexion.php");
		$id = htmlspecialchars($_GET['id']);
		$q = "SELECT * FROM mensaje WHERE idMensaje = $id";
		$ans = mysqli_query($link, $q);
		if (($row = mysqli_fetch_array($ans, MYSQLI_ASSOC)) > 0) {
					?>
					<div class="form-group has-feedback" id="Email01">                                                            
						<label  class="control-label col-md-2">Correo electrónico</label>
						<div class="col-md-10">
							<p class="form-control-static" id="correoE01" name="email">
								<?php
									echo htmlspecialchars($row["correo"]);
								?>
							</p>	
						</div>
						<br>
					</div>

					<!--Asunto-->
					<div class="form-group has-feedback" id="Asunto">
						<label class="control-label col-md-2">Asunto</label>
						<div class="col-md-10">
							<p class="form-control-static" id="asunto" name="asunto">
								<?php
			echo htmlspecialchars($row["asunto"]);
								?>
							</p>
						</div>
						<br> 
					</div>

					<!--Asunto-->
					<div class="form-group has-feedback" id="Contenido">
						<label class="control-label col-md-2">Contenido</label>
						<div class="col-md-10">
							<p class="form-control-static" id="contenido" name="contenido">
								<?php
									echo htmlspecialchars($row["contenido"]);
								?>
							</p>
						</div>
						<br><br><br>
					</div>
					<?php
			if ($row['estado'] == "PENDIENTE") {
					?>

					<h4 class="text-uppercase">Responder:</h4>
					<!-- Respuesta -->
					<div class="form-group has-feedback" id="Contenido">
						<label class="control-label col-md-2">Contenido</label>
						<div class="col-md-10">
							<textarea class="form-control" rows="3" id="respuesta" name="respuesta" 
									  placeholder="Exponga la respuesta para este mensaje."></textarea>
						</div>
						<br> 
					</div>
					<!-- Botones -->
					<div class="form-group text-right" style="padding-top: 9px;">
						<div class="col-md-10 col-md-offset-2">
							<a class="btn btn-success" data-toggle="modal" data-target="#MSGC_02" style="width: 150px;">CANCELAR</a>
							<a class="btn btn-success" style="width: 150px;" onclick="enviarRecuperar();">ENVIAR</a>
						</div>
					</div>
					<?php
			} else {
					?>

					<!-- Botones -->
					<?php
			}
		} else {
			include("../Modelo/cierra_conexion.php");
					?>
					<?php
		}
					?>
				</form>
				<script type="text/javascript">
						function enviarRecuperar() {
							$("#Formulario").submit();
						}
			</script>
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
							<img src="../Img/facebookWhite.png" height="24px">
						</a>
						<a class="navbar-brand" href="https://twitter.com/escomunidad?ref_src=twsrc%5Etfw">
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
	<?php
	}
	?>
</html>