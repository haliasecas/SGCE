<!DOCTYPE html>
<html>
	<head>
		<title>SGCE</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="../Scr/jquery-2.2.0.js"></script>
		<script type="text/javascript" src="../Scr/moment.min.js"></script>
		<script type="text/javascript" src="../Scr/bootstrap.js"></script>
		<script type="text/javascript" src="../Scr/bootstrap-datetimepicker.js"></script>
		<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
		<script type="text/javascript" src="../Scr/verificaInformes.js"></script>
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

		<?php 
		if (!empty($_POST)) {
			if (($_POST["g-recaptcha-response"])) { 
				if (!(empty($_POST))) {
					$email = $_POST['email'];
					$asunto = $_POST['asunto'];
					$dpto = $_POST['departamento'];

					include("../Modelo/abre_conexion.php"); 
					require_once("../Modelo/enviarCorreo.php");
					echo $_POST['iddepto'];
echo 
							"<script type='text/javascript'>
								$(document).ready(function() {
									$('#process').modal('hide');
									$('#MSGA_09').modal();
								});
							</script>";
					/*$ans = mandarCorreoInforme($departamento, $asunto, $contenido, $emailinforme);
					if (ans) {
						$busqueda = sprintf("SELECT nombre,appaterno,apmaterno FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
						$result=mysqli_query($link, $busqueda);
						$row_cnt = mysqli_num_rows($result);
						if($row_cnt==1) {
							$id = sprintf("SELECT idinteresado FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
							$result=mysqli_query($link,$id);
						}
						else{
							$sql = sprintf("INSERT INTO interesado (idinteresado, nombre, appaterno,apmaterno,correo,telefono) VALUES (NULL,'$nombre','$appat','$apmat','$email','$telefono')");
							$result=mysqli_query($link,$sql);
							$id = sprintf("SELECT idinteresado FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
							$result=mysqli_query($link,$id);
						}
						$row = mysqli_fetch_assoc($result);
						$idint=$row["idinteresado"];
						$iddept=$_POST["departamento"];
						$idarea=$_POST["area"];
						//echo "$iddept";
						//echo $_POST['datas'];
						$timestamp = date('d/m/Y');
						$dia=$_POST['date01'];
						$soli = sprintf("INSERT INTO solicitud (idSolicitud, asunto, estado,dia,diaSol,idinteresado,idarea,iddepto) VALUES (NULL,'$asunto',' ','$dia','$timestamp','$idint','$idarea','$iddept')");
						$result=mysqli_query($link,$soli);
						$idSol = sprintf("select AUTO_INCREMENT from information_schema.TABLES where TABLE_SCHEMA='mydb' and TABLE_NAME='solicitud'");
						$result=mysqli_query($link,$idSol);
						$row= mysqli_fetch_array($result);
						$idsolicitud=$row[0]-1;
						$tok=sprintf("INSERT INTO SolicitudToken (idtoken, idSolicitud, token) VALUES (NULL,'$idsolicitud','$string')");   
						$result=mysqli_query($link,$tok);
						if(!empty($_POST['hora01'])){
							foreach($_POST['hora01'] as $selected){
								$tok=sprintf("INSERT INTO HoraSol (idHorario, idSolicitud) VALUES ('$selected','$idsolicitud')");
								$result=mysqli_query($link,$tok);
							}
						}

						$tok=sprintf("INSERT INTO HoraSol (idHorario, idSolicitud) VALUES ('$selected','$idsolicitud')");
						$result=mysqli_query($link,$tok);
						include("../Modelo/cierra_conexion.php");
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
					}*/
				}
			}
		}
		?>
		
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

		<div class="container-fluid" style="padding-bottom: 57px;" id="main-content">
			<div class="container-fluid col-md-offset-1 col-md-10">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" id="informe">
					<h3><strong> Informes y sugerencias</strong></h3>
					<p><strong class="text-success">Todos los campos son obligatorios.</strong>
						La respuesta a su pregunta o sugerencia llegará directamente al correo que<br>nos proporcione.</p><br>

					<div class="form-group" id="Email01">
						<label class="control-label col-md-2">Correo electrónico</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="correoE01" placeholder="ejemplo@dominio.com">
							<span id="email01" class="hidden glyphicon form-control-feedback"></span>
						</div>
					</div>

					<div class="form-group" id="Email02">
						<label class="control-label col-md-2">Repetir correo electrónico</label>
						<div class="col-md-10" style="padding-top: 6px;">
							<input type="text" class="form-control" name="correoE02" placeholder="ejemplo@dominio.com">
							<span id="email02" style="padding-top: 6px;" class="hidden glyphicon form-control-feedback"></span>
							<span id="email03" class="text-center help-block hidden">
								Formato de correo electrónico incorrecto
							</span>
						</div>
					</div>

					<div class="form-group" id="Departamento">
						<label for="departamento" class="control-label col-md-2">Departamento</label>
						<div class="col-md-10">
							<select name="departamento" class="form-control">
								<option value="-1">Selecciona un elemento de la lista</option>
								<?php
								include("../Modelo/abre_conexion.php"); 
								$id = sprintf("SELECT * FROM depto");     
								$resulta = mysqli_query($link,$id);
								$numero = mysqli_num_rows($resulta);
								while ($row = mysqli_fetch_array($resulta, MYSQLI_ASSOC)) {
									$nombredepto= $row['nombre'];
									$iddepto = $row["iddepto"];
									if ($iddepto != 1)
										echo "<option value='$iddepto'>$nombredepto</option>";
								}
								include("../Modelo/cierra_conexion.php"); 
								?>
							</select>
							<span id="depto01" class="text-center help-block hidden">Por favor seleccione una opción en este campo</span>
						</div>
					</div>

					<div class="form-group" id="Asunto">
						<label for="asunto" class="control-label col-md-2">Asunto</label>
						<div class="col-md-10">
							<select name="asunto" class="form-control">
								<option value="-1">Selecciona un elemento de la lista</option>
								<option value="Informe" select>Pedir informe</option>
								<option value="Sugerencia">Sugerencia</option>
							</select>
							<span id="asunto01" class="text-center help-block hidden">Por favor seleccione una opción en este campo</span>
						</div>
					</div>

					<div class="form-group" id="Comentarios">
						<label class="control-label col-md-2">Contenido</label>
						<div class="col-md-10">
							<textarea name="comentarios" class="form-control" cols="30" rows="15" placeholder="Exprese su sugerencia o problemática"></textarea>
						</div>
					</div>

					<div class="form-group text-right" id="recaptcha">
						<label id="captcha" class="control-label col-md-4" style="padding-top: 18px;">
							*Verifica que no eres un robot informático.
						</label>
						<div class="col-md-4" id="html_element" style="padding-top: 18px;"></div>
					</div>

					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2" align="right">
							<a class="btn btn-success" style="width: 150px; cursor: pointer;" onclick="$('#confirmacion').modal();">
								CANCELAR
							</a>
							<a class="btn btn-success" style="width: 150px;" onclick="enviarForm();">ENVIAR</a>
						</div>
					</div>
				</form>
				<script type="text/javascript">
					var onloadCallback = function() {
						grecaptcha.render('html_element', {
							'sitekey' : '6Lc_3h8TAAAAABVp2WYPRtTdy4wkZeL2w_vgazih'
						});
					};
				</script>
			</div>
		</div>

		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="confirmacion" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-warning">
						<h4 class="modal-title">Mensaje de confirmación</h4>
					</div>
					<div class="modal-body">
						<p>¿Esta seguro de que desea cancelar Enviar informe o sugerencia?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
						<button type="button" class="btn btn-warning" onclick="window.location = '../';" data-dismiss="modal">Sí</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="exitoso" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-success">
						<h4 class="modal-title">Mensaje de alerta</h4>
					</div>
					<div class="modal-body">
						<p>Se ha enviado el correo exitosamente.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.location = '../';">Aceptar</button>
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
						<p>Falta un dato obligatorio para efectuar la operación solicitada.</p>
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
