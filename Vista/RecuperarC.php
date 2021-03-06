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
		<link type="text/css" rel="stylesheet" href="../Css/modals.css">
		<link type="text/css" rel="stylesheet" href="../Css/letras.css">
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

						<?php
						if (isset($_COOKIE["cargo"])) {
						?>
						<?php if($_COOKIE["cargo"]==1){ ?>

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
								<li><a href="cierra_sesion.php">
									<span><img src="../Img/Out.png" height="36px"></span>
									Cerrar sesión
									</a></li>
							</ul>
						</li>


						<?php }else{?> 


						<!-- Personal administrativo -->                    
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
								<li><a href="cierra_sesion.php">
									<span><img src="../Img/Out.png" height="36px"></span>
									Cerrar sesión
									</a></li>
							</ul>
						</li>



						<?php } ?>


						<?php
						}else{
						?>

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

						<?php
						}			
						?>
					</ul>
				</div>
			</div>
		</nav>
		<div class="modal fade" id="MSGA_04" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-success">
						<h4 class="modal-title">Mensaje de Alerta</h4>
					</div>
					<div class="modal-body">
						<p>Se ha enviado un correo con su nueva contraseña a la dirección proporcionada.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.location = '../';">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" data-keyboard="false" id="MSGE_06" role="dialog">
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
		<div class="modal fade" id="process" role="dialog" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-success">
						<h4 class="modal-title">Mensaje de alerta</h4>
					</div>
					<div class="modal-body">
						<p>Tu solicitud está siendo procesada</p>
						<div class="progress progress-striped active">
							<div class="progress-bar progress-bar-success" style="width: 100%"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" data-keyboard="false" id="MSGE_13" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-error">
						<h4 class="modal-title">Mensaje de error</h4>
					</div>
					<div class="modal-body">
						<p>Correo no registrado, por favor revise que haya escrito el correo correctamente.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal";>Aceptar</button>
					</div>
				</div>
			</div>
		</div>

		<?php 
		if (!empty($_POST)) {
			include("../Modelo/abre_conexion.php"); 
			$email=$_POST['email'];
			$busqueda = sprintf("SELECT * FROM personal WHERE correo='$email'");
			$result=mysqli_query($link, $busqueda);
			$row_cnt = mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result);
			$nombre=$row['nombre'];
			$appaterno=$row['appaterno'];
			$apmaterno=$row['apmaterno'];

			$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
			$contrasena = '';
			$random_string_length = 10;	//GENERAMOS EL TOKEN
			for ($i = 0; $i < $random_string_length; $i++) {
				$contrasena .= $characters[rand(0, strlen($characters) - 1)];
			}
			if($row_cnt > 0){
				require_once("../Modelo/enviarCorreo.php");
				if(mandarCorreoRecuperar($nombre,$appaterno,$apmaterno,$email,$contrasena)){
					$sql = sprintf("UPDATE personal SET contrasena=aes_encrypt('$contrasena','C1r4l3t1890') WHERE correo='$email'");
					$result=mysqli_query($link,$sql);
					echo 
						"<script type='text/javascript'>
								$(document).ready(function() {
									$('#process').modal('hide');
									$('#MSGA_04').modal();
								});
							</script>";
				}
				else{
					echo 
						"<script type='text/javascript'>
								$(document).ready(function() {
									$('#process').modal('hide');
									$('#MSGE_06').modal();
								});
							</script>";
					//MSGE_06 "ERROR AL ENVIAR EL CORREO ELECTRÓNICO"
				}	
			}
			else{
				echo 
					"<script type='text/javascript'>
								$(document).ready(function() {
									$('#process').modal('hide');
									$('#MSGE_13').modal();
								});
							</script>";
				//MSGE_13 "CORREO ELECTRONICO NO REGISTRADO"
			}
		}
		?>
		<div style="padding-bottom:57px;" id="main-content">
			<form class="form-horizontal" role="form" id="frmRestablecer" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="container">
					<div class="container">
						<h2>Recuperar contraseña</h2>
						<h5>Ingresa los campos correspondientes a tu cuenta para recuperar tu contraseña</h5>
						<br><br>
						<div class="form-group" id="Email">
							<label class="control-label col-sm-2" for="email">Correo electrónico</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="email" placeholder="ejemplo@dominio.com">
								<span id="email01" class="hidden glyphicon form-control-feedback"></span>
								<span id="email03" class="text-center help-block hidden">
									Por favor, introduce una dirección de correo electrónico válida. Por ejemplo usuario@dominio.com
								</span>
							</div>
						</div>
						<div class="form-group text-right">
							<div class="col-md-offset-2 col-md-10 ">
								<a class="btn btn-success" style="width: 150px;" onclick="enviarRecuperar();">ENVIAR</a>
							</div>
						</div>
					</div>
				</div>
			</form>
			<script type="text/javascript">
				function enviarRecuperar() {
					var correo = $("[name='email']").val();
					if (correo == "" || !validate(correo)) {
						$("#Email").attr("class", "form-group has-feedback has-error");
						$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
						$("#email03").removeClass("hidden");
						$("#error").modal();
					}
					else {
						$("#Email").attr("class", "form-group has-feedback has-success");
						$("#email01").attr("class", "glyphicon glyphicon-ok form-control-feedback");		
						$("#email03").addClass("hidden");
						$("#frmRestablecer").submit();
					}
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
					<ul class="nav navbar-nav navbar-right">IniciarSesion.php
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

		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="error" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-error">
						<h4 class="modal-title">Mensaje de error</h4>
					</div>
					<div class="modal-body">
						<p>Falta un dato obligatorio para efectuar la operación solicitada</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				// Sticky bar plz
				$(window).scroll(function() {
					if ($(window).scrollTop() > $("#header").height()) {
						$("#top-bar").addClass("navbar-fixed-top");
						$("#main-content").css({"padding-top":"90px"});
					}
					else {
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
					else {
						$("#top-bar").removeAttr("style");
					}
				}); 
			});
		</script>
	</body>
</html>