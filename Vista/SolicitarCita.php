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
								<li><a href="#">
									<span><img src="../Img/11.png" height="36px"></span>
									Ver mis citas
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

		<?php if (!empty($_POST)) { ?>

<<<<<<< HEAD
		<?php if (($_POST["g-recaptcha-response"])) { 
			if(!(empty($_POST))) {
				require_once("../Modelo/enviarCorreo.php");
				$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
				$string = '';
				$random_string_length = 20;
				for ($i = 0; $i < $random_string_length; $i++) {
					$string .= $characters[rand(0, strlen($characters) - 1)];
			}
			$email = $_POST['email'];
			$nombre = $_POST['nombre'];
			$appat = $_POST['appat'];
			$apmat = $_POST['apmat'];
			$asunto = $_POST['asunto'];
			$area = $_POST['area'];
			$dpto = $_POST['departamento'];
			$telefono=$_POST['telefono'];
			include("abre_conexion.php"); 
			$busqueda = sprintf("SELECT nombre,appaterno,apmaterno FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
			$result=mysqli_query($link,$busqueda);
			$row_cnt = mysqli_num_rows($result);
			if($row_cnt==1) {
				$id = sprintf("SELECT idinteresado FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
				$result=mysqli_query($link,$id);
			}
			else{
				$sql = sprintf("INSERT INTO interesado (idinteresado, nombre, appaterno,apmaterno,correo,telefono)
						VALUES (NULL,'$nombre','$appat','$apmat','$email','$telefono')");
				$result=mysqli_query($link,$sql);
				$id = sprintf("SELECT idinteresado FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
				$result=mysqli_query($link,$id);
			}
			$row = mysqli_fetch_assoc($result);
			$idint=$row["idinteresado"];
			$iddept=$_POST["departamento"];
			$idarea=$_POST["area"];
			$soli = sprintf("INSERT INTO solicitud (idSolicitud, asunto, estado,idinteresado,idarea,iddepto)
						VALUES (NULL,'$asunto',' ','$idint','$idarea','$iddept')");
			$result=mysqli_query($link,$soli);
			$idSol = sprintf("select AUTO_INCREMENT from information_schema.TABLES where TABLE_SCHEMA='mydb' and TABLE_NAME='solicitud'");
			$result=mysqli_query($link,$idSol);
			$row= mysqli_fetch_array($result);
			$idsolicitud=$row[0]-1;
			$tok=sprintf("INSERT INTO SolicitudToken (idtoken, idSolicitud, token) VALUES (NULL,'$idsolicitud','$string')");   
			$result=mysqli_query($link,$tok);    
			include("cierra_conexion.php"); 
			if(mandarCorreo($string)){
				echo "<script type='text/javascript'>
						$(document).ready(function() {
							$('#MSGA_09').modal();
						});
					</script>";
			}
			else {
				echo "<script type='text/javascript'>
=======
		<?php if (($_POST["g-recaptcha-response"]))  { 
	if(!(empty($_POST))){
		require_once("../Modelo/enviarCorreo.php");
		$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$string = '';
		$random_string_length = 20;
		for ($i = 0; $i < $random_string_length; $i++) {
			$string .= $characters[rand(0, strlen($characters) - 1)];
		}
		$email = $_POST['email'];
		$nombre = $_POST['nombre'];
		$appat = $_POST['appat'];
		$apmat = $_POST['apmat'];
		$asunto = $_POST['asunto'];
		$area = $_POST['area'];
		$dpto = $_POST['departamento'];
		$telefono=$_POST['telefono'];
		include("abre_conexion.php"); 
		$busqueda = sprintf("SELECT nombre,appaterno,apmaterno FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
		$result=mysqli_query($link,$busqueda);
		$row_cnt = mysqli_num_rows($result);
		if($row_cnt==1) {
			$id = sprintf("SELECT idinteresado FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
			$result=mysqli_query($link,$id);
		}
		else{
			$sql = sprintf("INSERT INTO interesado (idinteresado, nombre, appaterno,apmaterno,correo,telefono)
                    VALUES (NULL,'$nombre','$appat','$apmat','$email','$telefono')");
			$result=mysqli_query($link,$sql);
			$id = sprintf("SELECT idinteresado FROM interesado WHERE nombre='$nombre' AND appaterno='$appat' AND apmaterno='$apmat'");
			$result=mysqli_query($link,$id);
		}
		$row = mysqli_fetch_assoc($result);
		$idint=$row["idinteresado"];
		$iddept=$_POST["departamento"];
		$idarea=$_POST["area"];
        $timestamp = date('Y/m/d');
		$soli = sprintf("INSERT INTO solicitud (idSolicitud, asunto, estado,idinteresado,dia,idarea,iddepto)
                    VALUES (NULL,'$asunto',' ','$idint','$timestamp','$idarea','$iddept')");
		$result=mysqli_query($link,$soli);
		$idSol = sprintf("select AUTO_INCREMENT from information_schema.TABLES where TABLE_SCHEMA='mydb' and TABLE_NAME='solicitud'");
		$result=mysqli_query($link,$idSol);
		$row= mysqli_fetch_array($result);
		$idsolicitud=$row[0]-1;
		$tok=sprintf("INSERT INTO SolicitudToken (idtoken, idSolicitud, token) VALUES (NULL,'$idsolicitud','$string')");   
		$result=mysqli_query($link,$tok);    
		include("cierra_conexion.php"); 
		if(mandarCorreo($string)){
			echo "<script type='text/javascript'>
					$(document).ready(function() {
						$('#MSGA_09').modal();
					});
				</script>";
		}
		else{
			echo "<script type='text/javascript'>
>>>>>>> 06de6b6bf209b688b4a17c4cc5d3cbbe6e4f2e11
					$(document).ready(function() {
						$('#MSG_E06').modal();
					});
				</script>";
			} ?>
		<?php } else { 
		?>

		<?php }}}  ?>

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
							<input type="text" class="form-control" placeholder="ejemplo@dominio.com" id="correoE02">
							<span id="email02" style="padding-top: 6px;" class="hidden glyphicon form-control-feedback"></span>
						</div>
						<br>                                
					</div>
					<div class="form-group has-feedback has-error">
						<div class="col-md-10 col-md-offset-2">
							<span id="email03" class="text-center help-block hidden">
								Formato de correo electrónico incorrecto
							</span>
						</div>
					</div>
					<!--Nombre-->
					<div class="form-group has-feedback" id="Nombre">
						<label for="nombre" class="control-label col-md-2">Nombre(s)</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="Francisco" id="nombre" name="nombre">
							<span id="name01" class="hidden glyphicon form-control-feedback"></span>
						</div>
						<br>       
					</div>
					<!--Apellido Paterno-->
					<div class="form-group has-feedback" id="ApellidoP">
						<label  for="appat" class="control-label col-md-2">Apellido paterno</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="Pérez" id="appat" name="appat">
							<span id="app01" class="hidden glyphicon form-control-feedback"></span>
						</div>
						<br>       
					</div>
					<!--Apellido Materno-->
					<div class="form-group has-feedback" id="ApellidoM">
						<label  for="apmat" class="control-label col-md-2">Apellido materno</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="Pérez" id="apmat" name="apmat">
							<span id="apm01" class="hidden glyphicon form-control-feedback"></span>
						</div>
						<br>   
					</div>
					<div class="form-group has-feedback has-error">
						<div class="col-md-10 col-md-offset-2">
							<span id="apm02" class="text-center help-block hidden"></span>
						</div>
					</div>
					<!--Teléfono-->
					<div class="form-group has-feedback" id="Telefono">
						<label  for="telefono" class="control-label col-md-2">Teléfono</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="55555555" id="telefono" name="telefono">
							<span id="phone01" class="hidden glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group has-feedback has-error">
						<div class="col-md-10 col-md-offset-2">
							<span id="phone02" class="text-center help-block hidden"></span>
						</div> 
						<br>
					</div>
					<h4 class="text-uppercase">Datos de la cita:</h4>
					
					<!--Departamento-->
					<div class="form-group">
						<label for="departamento" class="control-label col-md-2">Departamento</label>        
						<div class="col-md-10">                                        
							<select name="departamento" class="form-control" onChange="despAreas();">
								<?php
								include("abre_conexion.php"); 
								$id = sprintf("SELECT * FROM depto");     
								$resulta = mysqli_query($link,$id);
								$numero = mysqli_num_rows($resulta); // obtenemos el número de filas
								for ($i = 1; $i <= $numero; $i++) {
									$sql = sprintf("SELECT nombre FROM depto WHERE iddepto='$i'");
									$result = mysqli_query($link, $sql);
									$row = mysqli_fetch_assoc($result);
									$nombre = $row["nombre"];
									echo ("<option value=$i>$nombre</option>");
								}
								include("cierra_conexion.php"); 
								?>
								<option>Hola</option>
							</select>
						</div>                        
					</div>
					
					<script type="text/javascript">
						function despAreas() {
							console.log($("[name='departamento']").val());
							$.ajax({
								method: "POST",
								url: "getAreas.php",
								data: { value: $("[name='departamento']").val() }
							});
						}
					</script>
					
					<!--Area-->
					<div class="form-group">
						<label for="area" class="control-label col-md-2">Área</label>        
						<div class="col-md-10">                                        
							<select name="area" class="form-control">
								<?php
								include("abre_conexion.php"); 
								$iddept='1'; //'$_POST["departamento"]'
								$id=sprintf("SELECT * FROM area WHERE iddepto='$iddept'");       
								$resulta=mysqli_query($link,$id);
								$numero = mysqli_num_rows($resulta); // obtenemos el número de filas

								for($i = 1; $i <= $numero; $i++){
									$sql=sprintf("SELECT nombre FROM area WHERE idarea='$i' AND iddepto='$iddept'");
									$result=mysqli_query($link,$sql);
									$row = mysqli_fetch_assoc($result);
									$nombre=$row["nombre"];
									echo ("<option value=$i>$nombre</option>");
								}
								include("cierra_conexion.php"); 
								?> 
							</select>
						</div>                        
					</div>
					<!--Asunto-->
					<div class="form-group has-feedback" id="Asunto">
						<label  for="asunto" class="control-label col-md-2">Asunto</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="Breve descripción del asunto de la cita" id="asunto" name="asunto">
							<span id="sub01" class="hidden glyphicon form-control-feedback"></span>
						</div>
						<br> 
					</div>

					<!--Dias preferentes-->
					<div class="form-group" id="checkboxes01">
						<label for="diapref" class="control-label col-md-2">
							Día(s) preferentes<br><small>(seleccione al<br>menos uno)</small>
						</label>        
						<div class="col-md-10">
							<div class='input-group date' id='datet1'>
								<input type='text' class="form-control" id="date01" name="date01">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar" id="icon01"></span>
								</span>
							</div>

							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox" class="hora01" value="1" name="hora01[]">9:00-10:00 hrs.
								</label>

								<label >
									<input type="checkbox" class="hora01" value="2" name="hora01[]">13:00-14:00 hrs.
								</label>

								<label>
									<input type="checkbox" class="hora01" value="3" name="hora01[]">20:00-21:00 hrs.
								</label>
							</div>

							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox" class="hora01" value="4" name="hora01[]">10:00-11:00 hrs.
								</label>

								<label >
									<input type="checkbox" class="hora01" value="5" name="hora01[]">14:00-15:00 hrs.
								</label>
							</div>

							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox" class="hora01" value="6" name="hora01[]">11:00-12:00 hrs.
								</label>

								<label >
									<input type="checkbox" class="hora01" value="7" name="hora01[]">18:00-19:00 hrs.
								</label>
							</div>

							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox" class="hora01" value="8" name="hora01[]">12:00-13:00 hrs.
								</label>

								<label >
									<input type="checkbox" class="hora01" value="9" name="hora01[]">19:00-20:00 hrs.
								</label>
							</div>
						</div>
					</div>

					<div class="form-group" id="checkboxes02">
						<div class="col-md-10 col-md-offset-2" style="padding-top: 10px;">
							<div class='input-group date' id='datet2'>
								<input type='text' class="form-control" id="date02" name="date02">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar" id="icon02"></span>
								</span>
							</div>

							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox" class="hora02" value="1" name="hora02[]">9:00-10:00 hrs.
								</label>

								<label >
									<input type="checkbox" class="hora02" value="2" name="hora02[]">13:00-14:00 hrs.
								</label>

								<label>
									<input type="checkbox" class="hora02" value="3" name="hora02[]">20:00-21:00 hrs.
								</label>
							</div>

							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox" class="hora02" value="4" name="hora02[]">10:00-11:00 hrs.
								</label>

								<label >
									<input type="checkbox" class="hora02" value="5" name="hora02[]">14:00-15:00 hrs.
								</label>
							</div>

							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox" class="hora02" value="6" name="hora02[]">11:00-12:00 hrs.
								</label>

								<label >
									<input type="checkbox" class="hora02" value="7" name="hora02[]">18:00-19:00 hrs.
								</label>
							</div>

							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox" class="hora02" value="8" name="hora02[]">12:00-13:00 hrs.
								</label>

								<label>
									<input type="checkbox" class="hora02" value="9" name="hora02[]">19:00-20:00 hrs.
								</label>
							</div>
						</div>                                                                      
					</div>
					<script type="text/javascript">
						$(function () {
							$('#datet1').datetimepicker({
								format: 'DD/MM/YYYY',
								minDate: moment().add(3, 'd'),
								maxDate: moment().add(33, 'd'),
								daysOfWeekDisabled: [0, 6]
							});
							$('#datet2').datetimepicker({
								format: 'DD/MM/YYYY',
								minDate: moment().add(4, 'd'),
								maxDate: moment().add(34, 'd'),
								daysOfWeekDisabled: [0, 6]
							});
							$("#date02").click(function() {
								$("#datet2").data("DateTimePicker").show();
							});
							$("#date01").click(function() {
								$("#datet1").data("DateTimePicker").show();
							});
						});
					</script>
					<div class="form-group text-right" id="recaptcha">
						<label for="nombre" class="control-label col-md-4" style="padding-top: 18px;">
							*Verifica que no eres un robot informático.
						</label>
						<div class="col-md-4" id="html_element" style="padding-top: 18px;"></div>
					</div>
					<!--Boton-->
					<div class="form-group text-right" style="padding-top: 9px;">
						<div class="col-md-10 col-md-offset-2">
							<button class="btn btn-success" type="reset" style="width: 150px;">CANCELAR</button>
							<a class="btn btn-success" style="width: 150px;" onclick="enviarForm();">ENVIAR</a>
						</div>
					</div>
				</form>
				<script type="text/javascript">
					var onloadCallback = function() {
						grecaptcha.render('html_element', {
							'sitekey' : '6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW'
						});
					};
				</script>
			</div>
		</div>

		<div class="modal fade" id="MSGA_09" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-success">
						<h4 class="modal-title">Enlace de validación de correo</h4>
					</div>
					<div class="modal-body">
						<p>Se le ha enviado un correo con instrucciones para continuar el proceso de solicitud de cita.
							Verifique que ha recibido el correo, de lo contrario vuelva a llenar la solicitud.</p>
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
						<h4 class="modal-title">Error al enviar el correo electrónico</h4>
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