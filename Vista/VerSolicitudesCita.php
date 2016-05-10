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
		
		<div class="container-fluid" style="padding-bottom:81px;" id="main-content">
			<div class="container-fluid col-md-10 col-md-offset-1">
				<h3><strong>Ver más</strong></h3>
				<p>Una vez agendada la cita se enviará la confirmación directamente al correo electrónico
					indicado y el estado de la solicitud pasará a "AGENDADA".Si la cita es rechazada, 
					se notificará automáticamente al correo electrónico indicado y el estado
					de la solicitud parasá a "RECHAZADA"</p>
				<br><br>
				<form class="form-horizontal">
					<h4 class="text-uppercase">Datos del interesado:</h4>
					<?php
							if(isset($_GET["id"]))
								$idsol = $_GET['id'];
							include("../Modelo/abre_conexion.php");
							$query = "SELECT * FROM solicitud WHERE idsolicitud = '$idsol'";
							$result = mysqli_query($link, $query);
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
							$idinteresado=$row['idinteresado'];

							$query = "SELECT * FROM interesado WHERE idinteresado='$idinteresado'";
							$result2 = mysqli_query($link, $query);
							$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

							$idarea=$row['idarea'];
							$query = "SELECT * FROM area WHERE idarea='$idarea'";
							$result3 = mysqli_query($link, $query);
							$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
							

							
							$asunto=$row['asunto'];
							$appaterno=$row2['appaterno'];
							$nombre = $row2['nombre'];
							$apmaterno=$row2['apmaterno'];
							$correo = $row2['correo'];
							$telefono = $row2['telefono'];
							$area = $row3['nombre'];
					?>
					<!-- Correo electrónico -->
					<div class="form-group has-feedback" id="Email01">                                                            
						<label  class="control-label col-md-2">Correo electrónico</label>
						<div class="col-md-10">
							<?php 
								echo "<p class='form-control-static' id='correo' name='nombre'>$correo</p>";
								?>
						</div>
						<br>
					</div>

					<!--Nombre-->
					<div class="form-group has-feedback" id="Nombre">
						<label class="control-label col-md-2">Nombre(s)</label>
						<div class="col-md-10">
						<?php 
								echo "<p class='form-control-static' id='nombre' name='nombre'>$nombre</p>";
								?>
						</div>
						<br>       
					</div>

					<!--Apellido Paterno-->
					<div class="form-group has-feedback" id="ApellidoP">
						<label  for="appat" class="control-label col-md-2">Apellido paterno</label>
						<div class="col-md-10">
							<?php 
								echo "<p class='form-control-static' id='appat' name='nombre'>$appaterno</p>";
								?>
						</div>
						<br>       
					</div>

					<!--Apellido Materno-->
					<div class="form-group has-feedback" id="ApellidoM">
						<label  for="apmat" class="control-label col-md-2">Apellido materno</label>
						<div class="col-md-10">
							<?php 
								echo "<p class='form-control-static' id='apmat' name='nombre'>$apmaterno</p>";
								?>
						</div>
						<br>   
					</div>

					<!--Teléfono-->
					<div class="form-group has-feedback" id="Telefono">
						<label  for="telefono" class="control-label col-md-2">Teléfono</label>
						<div class="col-md-10">
							<?php 
								echo "<p class='form-control-static' id='tel' name='nombre'>$telefono</p>";
								?>
							<br><br>
						</div>
					</div>

					<h4 class="text-uppercase">Datos de la cita:</h4>

					<!--Area-->
					<div class="form-group">
						<label class="control-label col-md-2">Área</label>        
						<div class="col-md-10">                                        
							<?php 
								echo "<p class='form-control-static' id='area' name='nombre'>$area</p>";
								?>
						</div>                        
					</div>

					<!--Asunto-->
					<div class="form-group has-feedback" id="Asunto">
						<label class="control-label col-md-2">Asunto</label>
						<div class="col-md-10">
							<?php 
								echo "<p class='form-control-static'  name='asunto'>$asunto</p>";
								?>
						</div>
						<br> 
					</div>

					<!-- Horarios -->
					<div class="form-group has-feedback" id="Horarios">
						<label class="control-label col-md-2">Horario(s) preferente(s)</label>
						<div class="col-md-10">
						<?php
							$busquedadia = sprintf("SELECT idDia FROM DiaSol WHERE idsolicitud='$idsol'");
							$resultdia=mysqli_query($link, $busquedadia);
							$row = mysqli_fetch_assoc($resultdia);
							$Dia=$row["idDia"];

							$busquedadia = sprintf("SELECT dia FROM DiaPref WHERE idDia='$Dia'");
							$resultdia=mysqli_query($link, $busquedadia);
							$row = mysqli_fetch_assoc($resultdia);
							$Dia=$row["dia"];
							$query = "SELECT * FROM HoraSol WHERE idSolicitud='$idsol'";
							$result = mysqli_query($link,$query);
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								$idhorario=$row['idHorario'];
								$query2 = "SELECT * FROM HoraPref WHERE idHorario='$idhorario'";
								$result2=mysqli_query($link,$query2);
								$rowarea = mysqli_fetch_assoc($result2);
								echo "<p class='form-control-static' id='horario' name='horario'>".$Dia." ".$rowarea['hinicio']."-".$rowarea['hfin']."</p>";
						}
							//$row_dia = mysqli_num_rows($resultdia);

							//
							//
							//<p class="form-control-static" id="horario" name="horario">DD/MM/AAAA HoraIni - HoraFin</p>
						
							
							?>
						</div>
						<br> 
					</div>

					<!-- Acción -->
					<div class="form-group has-feedback" id="Accion">
						<label class="control-label col-md-2"><p class="text-success">¿QUÉ DESEA HACER?</p></label>
						<div class="col-md-10">
							<select class="form-control">
								<option>Agendar</option>
								<option>Rechazar</option>
							</select>
						</div>
						<br> 
					</div>

					<!-- Día -->
					<div class="form-group has-feedback" id="Dia">
						<label class="control-label col-md-2">Día</label>
						<div class="col-md-10">
							<select class="form-control">
							<?php
								echo "<option>$Dia</option>";
								?>
							</select>
						</div>
						<br> 
					</div>

					<!-- Horario -->
					<div class="form-group has-feedback" id="Horario">
						<label class="control-label col-md-2">Hora</label>
						<div class="col-md-10">
							<select class="form-control">
							<?php
									$query = "SELECT * FROM HoraSol WHERE idSolicitud='$idsol'";
									$result = mysqli_query($link,$query);
									while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
										$idhorario=$row['idHorario'];
										$query2 = "SELECT * FROM HoraPref WHERE idHorario='$idhorario'";
										$result2=mysqli_query($link,$query2);
										$rowarea = mysqli_fetch_assoc($result2);
										echo "<option>".$rowarea['hinicio']."-".$rowarea['hfin']."</option>";
									}
							?>
								
							</select>
						</div>
						<br> 
					</div>
					
					<!-- Botones -->
					<div class="form-group text-right" style="padding-top: 9px;">
						 <div class="col-md-10 col-md-offset-2">
							 <button class="btn btn-success" type="reset" style="width: 150px;">CANCELAR</button>
							 <a class="btn btn-success" style="width: 150px;">ENVIAR</a>
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
</html>