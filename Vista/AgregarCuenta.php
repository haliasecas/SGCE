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
			<div class="container">
				<h3><strong>Agregar cuenta</strong></h3>
				<p><strong class="text-success">Todos los campos son obligatorios.</strong></p> 
				<br>
				<br>                                
				<form class="form-horizontal" id="Formulario">
					<div class="form-group" id="Nombre">
						<label  for="" class="control-label col-md-2">Nombre(s)</label>
						<div class="col-md-10">
							<input type='text' id="nombre" class='form-control' placeholder="Rodrigo">
							<span id="nombre01" class="hidden glyphicon form-control-feedback"></span>
							<span id="nombre02" class="text-center help-block hidden"></span>
						</div>
					</div>
					<div class="form-group" id="Appaterno">
						<label  for="" class="control-label col-md-2">Apellido paterno</label>
						<div class="col-md-10">
							<input type='text' id="appat" class='form-control' placeholder="Perez">
							<span id="appat01" class="hidden glyphicon form-control-feedback"></span>
							<span id="appat02" class="text-center help-block hidden"></span>
						</div>
					</div>
					<div class="form-group" id="Apmaterno">
						<label  for="" class="control-label col-md-2">Apellido materno</label>
						<div class="col-md-10">
							<input type='text' id="apmat" class='form-control' placeholder="Perez">
							<span id="apmat01" class="hidden glyphicon form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group has-error has-feedback">
						<div class="col-md-10 col-md-offset-2">
							<span id="apmat02" class="text-center help-block hidden"></span>
						</div>
					</div>
					<div class="form-group" id="Correo">
						<label  for="" class="control-label col-md-2">Correo electrónico</label>
						<div class="col-md-10">
							<input type='correo' id="correo" class='form-control' placeholder="ejemplo@dominio.com">
							<span id="correo01" class="hidden glyphicon form-control-feedback"></span>
							<span id="correo02" class="text-center help-block hidden"></span>
						</div>
					</div>
					<div class="form-group" id="Pass1">
						<label class="control-label col-md-2">Contraseña</label>
						<div class="col-md-10">
							<input type='password' id="pass1" class='form-control' placeholder="***************">
							<span id="pass01" class="hidden glyphicon form-control-feedback"></span>
							<span id="pass02" class="text-center help-block hidden"></span>
						</div>
					</div>
					<div class="form-group" id="Pass2">
						<label  for="" class="control-label col-md-2">Repetir contraseña</label>
						<div class="col-md-10">
							<input type='password' id="pass2" class='form-control' placeholder="***************">
							<span id="repass01" class="hidden glyphicon form-control-feedback"></span>
							<span id="repass02" class="text-center help-block hidden"></span>
						</div>
					</div>
					<div class="form-group" id="Cargo">
						<label class="control-label col-md-2">Cargo</label>
						<div class="col-md-10">                                        
							<select id="cargo" class="form-control">
								<option value="-1">Selecciona un cargo</option>
								<option value="1">Administrador</option> 
								<option value="2">Personal Administrativo</option>                                 
							</select>
						</div>
					</div>
					<div class="form-group" id="Botones">                                             
						<div class="form-group text-right">
							<div class="col-md-10 col-md-offset-2">
								<a class="btn btn-success" style="width: 150px;" onclick="window.location = './AdministrarCuentas.php';">CANCELAR</a>
								<a class="btn btn-success" style="width: 150px;" onclick="ingresacuenta()">ENVIAR</a>
							</div>
						</div>
					</div>
				</form>
				<script type="text/javascript">
					function ingresacuenta(){
						var nombres = false, correos = false, contrasenas = false, cargos = false;
						var nomb = false, app = false, apm = false;
						var p1 = $("#pass1").val();
						var p2 = $("#pass2").val();
						var nombre = $("#nombre").val();
						var appat = $("#appat").val();
						var apmat = $("#apmat").val();
						var correo = $("#correo").val();
						var cargo = $("#cargo").val();
						// Validando el nombre,apellido paterno y materno
						$("#apmat02").text("El formato del campo nombre o apellido es incorrecto");
						if(!valname(nombre) || nombre == "") {
							$("#Nombre").attr("class", "form-group has-feedback has-error");
							$("#nombre01").attr("class", "glyphicon glyphicon-remove form-control-feedback");							
						}else{
							$("#Nombre").attr("class", "form-group has-feedback has-success");
							$("#nombre01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
							nomb = true;
						}
						//Apellido Paterno
						if(!valname(appat) || appat == "") {
							$("#Appaterno").attr("class", "form-group has-feedback has-error");
							$("#appat01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
						}else{
							$("#Appaterno").attr("class", "form-group has-feedback has-success");
							$("#appat01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
							app = true;
						}
						//Apellido Materno
						if (!valname(apmat) || apmat == "") {   
							$("#Apmaterno").attr("class", "form-group has-feedback has-error");
							$("#apmat01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#apmat02").removeClass("hidden");
						}else {                              
							$("#Apmaterno").attr("class", "form-group has-feedback has-success");
							$("#apmat01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
							apm = true;
						}

						nombres = nomb && apm && app;
						if (nombres) $("#apmat02").addClass("hidden");
						else $("#apmat02").removeClass("hidden");
						//Validando Correo
						if(correo == ""){
							$("#Correo").attr("class", "form-group has-feedback has-error");
							$("#correo01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#correo02").removeClass("hidden");
							$("#correo02").text("El campo correo electrónico no puede estar vacío");
							correos = false;
						}else if (!validate(correo)) {
							$("#Correo").attr("class", "form-group has-feedback has-error");
							$("#correo01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#correo02").removeClass("hidden");
							$("#correo02").text("El formato del campo correo electrónico es incorrecto");
							correos  = false;
						}else {
							$("#Correo").attr("class", "form-group has-feedback has-success");
							$("#correo01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
							$("#correo02").addClass("hidden");
							correos = true;
						}                       
						//Validando contraseñas y que no este vacio
						if(p1 == ""){
							$("#Pass1").attr("class", "form-group has-feedback has-error");
							$("#pass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#pass02").removeClass("hidden");				            
							contrasenas = false;
						}if(p2 == ""){
							$("#Pass2").attr("class", "form-group has-feedback has-error");
							$("#repass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#repass02").removeClass("hidden");
							$("#repass02").text("El campo contraseña  no puede estar vacío");
							contrasenas = false;                        
						}else if(p1 != p2){
							$("#Pass1").attr("class", "form-group has-feedback has-error");
							$("#pass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#pass02").removeClass("hidden");		
							$("#Pass2").attr("class", "form-group has-feedback has-error");
							$("#repass01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
							$("#repass02").removeClass("hidden");
							$("#repass02").text("Las contraseñas no coinciden");
							contrasenas = false;
						}else{
							$("#Pass1").attr("class", "form-group has-feedback has-success");
							$("#pass01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
							$("#pass02").addClass("hidden");
							$("#Pass2").attr("class", "form-group has-feedback has-success");
							$("#repass01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
							$("#repass02").addClass("hidden");
							contrasenas= true;
						}
						//Validando el cargo
						if(cargo == -1){
							$("#Cargo").attr("class", "form-group has-feedback has-error");                              
							$("#cargo02").removeClass("hidden");						              	
							cargos = false;
						}else{
							$("#Cargo").attr("class", "form-group has-feedback has-success");
							$("#cargo01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
							$("#cargo02").addClass("hidden");
							cargos = true;
						}
						// Si los cuatro fueron correctos
						if(nombres && correos && contrasenas && cargos){
		                          $.ajax({
											method: "POST",
											url: "../Modelo/agrega_cuenta.php",
											data: { value: 
                                                   
                                                  }
										}).done(function(msg){
											$("[name='area']").append(msg);
										});
						}else{
							$(window).scrollTop(0);
							$("#error").modal();
						}                        
					}
				</script>
			</div>
		</div>
		
		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="exitoso" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-success">
						<h4 class="modal-title">Mensaje de alerta</h4>
					</div>
					<div class="modal-body">
						<p>La cuenta se ha creado exitosamente.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal"
								onClick="window.location = 'AdministrarCuentas.php';">
							Aceptar
						</button>
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
				// Sticky bar plz
				$(window).scroll(function() {
					if ($(window).scrollTop() > $("#header").height()) {
						$("#top-bar").addClass("navbar-fixed-top");
						$("#main-content").css({"padding-top":"90px"});
					}
					if ($(window).scrollTop() <= $("#header").height()) {
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