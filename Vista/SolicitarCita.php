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
		<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>		
		<link type="text/css" rel="stylesheet" href="../Css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="../Css/bootstrap-datetimepicker.css">
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

		<?php 
		if (!empty($_POST)) {
			if (($_POST["g-recaptcha-response"])) { 
				if (!(empty($_POST))) {
					$email = $_POST['email'];
					$nombre = $_POST['nombre'];
					$appat = $_POST['appat'];
					$apmat = $_POST['apmat'];
					$asunto = $_POST['asunto'];
					$area = $_POST['area'];
					$dpto = $_POST['departamento'];
					$telefono = $_POST['telefono'];

					include("../Modelo/abre_conexion.php"); 
					require_once("../Modelo/enviarCorreo.php");
					$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
					$string = '';
					$random_string_length = 20;	//GENERAMOS EL TOKEN
					for ($i = 0; $i < $random_string_length; $i++) {
						$string .= $characters[rand(0, strlen($characters) - 1)];
					}

					$ans = mandarCorreoSolicitud($nombre, $appat, $apmat, $email, $string);
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
					} 
				}
			}
		}
		?>

		<div class="container-fluid" style="padding-bottom:57px;" id="main-content">
			<!--Contenedor principal-->
			<div class="container-fluid col-md-10 col-md-offset-1">
				<h3><strong>Solicitar Cita</strong></h3>
				<p><strong class="text-success">Todos los campos son obligatorios.</strong>
					La respuesta a su solicitud llegará directamente al correo que nos proporcione.</p>
				<br><br>
				<h4 class="text-uppercase">datos del interesado:</h4>
				<!--Formulario-->
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-horizontal" id="formCita">
					<!--Correo Electrónico-->
					<div class="form-group has-feedback" id="Email01">                                                            
						<label  for="email" class="control-label col-md-2">Correo electrónico</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="ejemplo@dominio.com" id="correoE01" name="email">
							<span id="email01" class="hidden glyphicon form-control-feedback"></span>
						</div>
						<br>                                
					</div>

					<!--Repetir Correo Electrónico-->
					<div class="form-group has-feedback" id="Email02">                                                            
						<label  for="email" class="control-label col-md-2">Repetir correo electrónico</label>
						<div class="col-md-10" style="padding-top: 6px;">
							<input type="text" class="form-control" placeholder="ejemplo@dominio.com" id="correoE02"
								   value="<?php if(!ans) echo $email ?>">
							<span id="email02" style="padding-top: 6px;" class="hidden glyphicon form-control-feedback"></span>
							<span id="email03" class="text-center help-block hidden">
								Por favor, introduce una dirección de correo electrónico válida. Por ejemplo usuario@dominio.com
							</span>
						</div>
						<br>                                
					</div>

					<!--Nombre-->
					<div class="form-group has-feedback" id="Nombre">
						<label for="nombre" class="control-label col-md-2">Nombre(s)</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="Francisco" id="nombre" name="nombre"
								   value="<?php if(!ans) echo $nombre ?>">
							<span id="name01" class="hidden glyphicon form-control-feedback"></span>
						</div>
						<br>       
					</div>

					<!--Apellido Paterno-->
					<div class="form-group has-feedback" id="ApellidoP">
						<label  for="appat" class="control-label col-md-2">Apellido paterno</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="Pérez" id="appat" name="appat"
								   value="<?php if(!ans) echo $appat ?>">
							<span id="app01" class="hidden glyphicon form-control-feedback"></span>
						</div>
						<br>       
					</div>

					<!--Apellido Materno-->
					<div class="form-group has-feedback" id="ApellidoM">
						<label  for="apmat" class="control-label col-md-2">Apellido materno</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="Pérez" id="apmat" name="apmat"
								   value="<?php if(!ans) echo $apmat ?>">
							<span id="apm01" class="hidden glyphicon form-control-feedback"></span>
							<span id="apm02" class="text-center help-block hidden"></span>
						</div>
						<br>   
					</div>

					<!--Teléfono-->
					<div class="form-group has-feedback" id="Telefono">
						<label  for="telefono" class="control-label col-md-2">Teléfono</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="55555555" id="telefono" name="telefono"
								   value="<?php if(!ans) echo $telefono ?>">
							<span id="phone01" class="hidden glyphicon form-control-feedback"></span>
							<span id="phone02" class="text-center help-block hidden">En este campo sólo se pueden escribir números.
								Evite los espacios en blanco u otros caracteres,
								como los puntos o las comas, por ejemplo.</span>
						</div>
					</div>

					<h4 class="text-uppercase">Datos de la cita:</h4>

					<!--Departamento-->
					<div class="form-group" id="Departamento">
						<label class="control-label col-md-2">Departamento</label>        
						<div class="col-md-10">                                        
							<select name="departamento" class="form-control" onChange="despAreas();">
								<option value='-1'>Selecciona un departamento</option>
								<?php
	include("../Modelo/abre_conexion.php"); 
								   $id = sprintf("SELECT * FROM depto WHERE iddepto > 1");     
								   $resulta = mysqli_query($link,$id);
								   $numero = mysqli_num_rows($resulta); // obtenemos el número de filas
								   if ($numero > 0) {
									   while ($row = mysqli_fetch_array($resulta, MYSQLI_ASSOC)) {
										   $nombredepto= $row['nombre'];
										   $iddepto = $row["iddepto"];
										   echo "<option value='$iddepto'>$nombredepto</option>";
									   }
								   }
								   else echo "<option value='-1'>No hay departamentos disponibles</option>";
								   include("../Modelo/cierra_conexion.php"); 
								?>
							</select>
							<span id="depto01" class="text-center help-block hidden">Por favor seleccione una opción en este campo</span>
						</div>                        
					</div>

					<!--Area-->
					<div class="form-group" id="Area">
						<label class="control-label col-md-2">Área</label>        
						<div class="col-md-10">                                        
							<select name="area" class="form-control">
								<script type="text/javascript">
									function despAreas() {
										$("[name='area']").text("");
										$.ajax({
											method: "POST",
											url: "../Modelo/getAreas.php",
											data: { value: $("[name='departamento']").val() }
										}).done(function(msg){
											$("[name='area']").append(msg);
										});
									}
								</script>
							</select>
							<span id="area01" class="text-center help-block hidden">Por favor seleccione una opción en este campo</span>
						</div>                        
					</div>

					<!--Asunto-->
					<div class="form-group has-feedback" id="Asunto">
						<label  for="asunto" class="control-label col-md-2">Asunto</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="Breve descripción del asunto de la cita" id="asunto" name="asunto"
								   value="<?php if(!ans) echo $asunto ?>">
							<span id="sub01" class="hidden glyphicon form-control-feedback"></span>
							<span id="sub02" class="text-center help-block hidden"></span>
						</div>
						<br> 
					</div>

					<div class="form-group has-feedback" id="fecha">
						<label for="diapref" class="control-label col-md-2">Día preferente</label>
						<div class="col-md-10">
							<div class='input-group date' id='datet1'>
								<input type='text' class="form-control" placeholder="Haga clic aquí" id="date01" name="date01">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar" id="icon01"></span>
								</span>
							</div>
							<span id="fecha02" class="text-center help-block hidden"></span>
						</div>
					</div>

					<!-- Horario preferentes-->
					<div class="form-group" id="checkboxes01">
						<label for="diapref" class="control-label col-md-2">
							Horario preferente<br><small>(seleccione al<br>menos uno)</small>
						</label>        
						<div class="col-md-10">
							<div class="checkbox col-md-3">
								<label>
									<input type="checkbox" class="hora01" value="1" name="hora01[]">9:00-10:00 hrs.
								</label>

								<label>
									<input type="checkbox" class="hora01" value="4" name="hora01[]">10:00-11:00 hrs.
								</label>

								<label>
									<input type="checkbox" class="hora01" value="6" name="hora01[]">11:00-12:00 hrs.
								</label>
							</div>

							<div class="checkbox col-md-3">
								<label>
									<input type="checkbox" class="hora01" value="8" name="hora01[]">12:00-13:00 hrs.
								</label>

								<label>
									<input type="checkbox" class="hora01" value="2" name="hora01[]">13:00-14:00 hrs.
								</label>
							</div>

							<div class="checkbox col-md-3">	
								<label >
									<input type="checkbox" class="hora01" value="5" name="hora01[]">14:00-15:00 hrs.
								</label>

								<label>
									<input type="checkbox" class="hora01" value="7" name="hora01[]">18:00-19:00 hrs.
								</label>
							</div>

							<div class="checkbox col-md-3">
								<label>
									<input type="checkbox" class="hora01" value="9" name="hora01[]">19:00-20:00 hrs.
								</label>

								<label>
									<input type="checkbox" class="hora01" value="3" name="hora01[]">20:00-21:00 hrs.
								</label>
							</div>
						</div>
					</div>

					<div class="form-group has-feedback has-error" id="fecha">
						<div class="col-md-10 col-md-offset-2">
							<span id="hora02" class="text-center help-block hidden"></span>
						</div>
					</div>

					<script type="text/javascript">
						$(function () {
							$('#datet1').datetimepicker({
								format: 'YYYY/MM/DD',
								minDate: moment().add(3, 'd'),
								maxDate: moment().add(33, 'd'),
								daysOfWeekDisabled: [0, 6]
							});
							$("#date01").click(function() {
								$("#datet1").data("DateTimePicker").show();
							});
						});
					</script>

					<div class="form-group text-right" id="recaptcha">
						<label id="recaptcha" class="control-label col-md-4" style="padding-top: 18px;">
							*Verifica que no eres un robot informático.
						</label>
						<div class="col-md-4" id="html_element" style="padding-top: 18px;"></div>
					</div>

					<!--Boton-->
					<div class="form-group text-right" style="padding-top: 9px;">
						<div class="col-md-10 col-md-offset-2">
							<a class="btn btn-success" style="width: 150px; cursor: pointer;" onclick="$('#confirmacion').modal();">CANCELAR</a>
							<a class="btn btn-success" style="width: 150px; cursor: pointer;" onclick="enviarForm();">ENVIAR</a>
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

		/* MSGC 02 */
		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="confirmacion" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-warning">
						<h4 class="modal-title">Mensaje de confirmación</h4>
					</div>
					<div class="modal-body">
						<p>¿Está seguro de que desea cancelar solicitar cita?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
						<button type="button" class="btn btn-warning" onclick="window.location = '../';" data-dismiss="modal">Sí</button>
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
						<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" data-keyboard="false" id="error" role="dialog">
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
				despAreas();
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