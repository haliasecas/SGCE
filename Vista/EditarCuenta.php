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

		<?php
		if(isset($_GET["id"])) {
			$id = $_GET['id'];
		}
		else {
			echo "<script type='text/javascript'>";
			echo "window.location='../';";
			echo "</script>";
		}
		include("../Modelo/abre_conexion.php");
		$query = "SELECT * FROM personal WHERE idpersonal = '$id'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$appaterno=$row['appaterno'];
		$nombre = $row['nombre'];
		$apmaterno=$row['apmaterno'];
		$correo = $row['correo'];        
		?>
		<div class="container-fluid" style="padding-bottom:81px;" id="main-content">
			<div class="container">
				<h3><strong>Editar cuenta</strong></h3>
				<p><strong class="text-success">Todos los campos son obligatorios.</strong> El nombre del departamento debe estar previamente registrado en el sistema.</p> 
				<br>
				<br>                                
				<form class="form-horizontal">
					<div class="form-group" id="Nombre">
						<label class="control-label col-md-2">Nombre(s)</label>
						<div class="col-md-10">
							<?php
							echo "<input type='text'  id='nombre' class='form-control' value='$nombre' placeholder='Rodrigo'>"
							?>
							<span id="nombre01" class="hidden glyphicon form-control-feedback"></span>
							<span id="nombre02" class="text-center help-block hidden"></span>
						</div>						
					</div>
					<div class="form-group" id="Appaterno">
						<label class="control-label col-md-2">Apellido paterno</label>
						<div class="col-md-10">
							<?php 
								echo "<input type='text' id='appat' class='form-control' value='$appaterno' placeholder='Perez'>"
							?>
							<span id="appat01" class="hidden glyphicon form-control-feedback"></span>
							<span id="appat02" class="text-center help-block hidden"></span>
						</div>
					</div>
					<div class="form-group" id="Apmaterno">
						<label  for="" class="control-label col-md-2">Apellido materno</label>
						<div class="col-md-10">
							<?php 
								echo "<input type='text' id='apmat' class='form-control' value='$apmaterno' placeholder='Perez'>"
							?>
							<span id="apmat01" class="hidden glyphicon form-control-feedback"></span>
							<span id="apmat02" class="text-center help-block hidden"></span>
						</div>
					</div>
					<div class="form-group" id="Correo">
						<label class="control-label col-md-2">Correo electrónico</label>
						<div class="col-md-10">
							<?php 
								echo "<input type='text' id='correo1' class='form-control' value='$correo' placeholder='ejemplo@dominio.com'>"
							?>
							<span id="correo01" class="hidden glyphicon form-control-feedback"></span>
							<span id="correo02" class="text-center help-block hidden"></span>
						</div>
					</div>
					<div class="form-group" id="Correo2">
						<label class="control-label col-md-2">Repetir correo electrónico</label>
						<div class="col-md-10">
							<?php 
								echo "<input type='text' id='correo2' class='form-control' value='$correo' placeholder='ejemplo@dominio.com'>"
							?>
							<span id="repcorreo01" class="hidden glyphicon form-control-feedback"></span>
							<span id="repcorreo02" class="text-center help-block hidden"></span>
						</div>
					</div>

					<div class="form-group" id="Departamento">
						<label  for="" class="control-label col-md-2">Departamento</label>
						<div class="col-md-10">                                        
							<select name="departamento" id= 'departamento' class="form-control">
								<option value="-1">Selecciona un Departamento</option> 
								<?php
								$query = "SELECT * FROM depto";
							$result2 = mysqli_query($link, $query);
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
							while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
								$nombredepto= $row['nombre'];
								echo "<option value='$nombredepto'>$nombredepto</option>";
							}
								?>
							</select>
						</div>     
					</div>                    
					<div class="form-group">
						<div class="form-group text-right">
							<div class="col-md-8 col-md-offset-4">
								<a class="btn btn-success" style="width: 150px;" onclick="$('#seguro').modal();">CANCELAR</a>
								<?php 
								echo "<a class='btn btn-success' style='width: 150px; cursor: pointer;' onclick='editarCuenta()'>ENVIAR</a>"
								?>
							</div>
						</div>
						<script>
							function editarCuenta(){
								var nombres = false, correos = false,depas = false;                                        
								var c1 = $("#correo1").val(); //Correo 
								var c2 = $("#correo2").val(); //Repite correo
								var nombre = $("#nombre").val();
								var appat = $("#appat").val();
								var apmat = $("#apmat").val();                                        
								var depa = $("#departamento").val();                                                                                
								// Validando el nombre,apellido paterno y materno                
								if (nombre == "" ) {
									$("#Nombre").attr("class", "form-group has-feedback has-error");
									$("#nombre01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
									$("#nombre02").removeClass("hidden");
									$("#nombre02").text("El campo nombre no puede estar vacío.");
									nombres = false;
								}else if(!valname(nombre)){
									$("#Nombre").attr("class", "form-group has-feedback has-error");
									$("#nombre01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
									$("#nombre02").removeClass("hidden");
									$("#nombre02").text("El formato del campo nombre  es incorrecto.");                                
									nombres = false;
								}else{
									$("#Nombre").attr("class", "form-group has-feedback has-success");
									$("#nombre01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
									$("#nombre02").addClass("hidden");                                
									nombres = true;
								}                                        
								//Apellido Paterno
								if (appat == "" ) {
									$("#Appaterno").attr("class", "form-group has-feedback has-error");
									$("#appat01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
									$("#appat02").removeClass("hidden");
									$("#appat02").text("El campo apellido paterno no puede estar vacío.");
									nombres = false;
								}else if(!valname(appat)){
									$("#Appaterno").attr("class", "form-group has-feedback has-error");
									$("#appat01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
									$("#appat02").removeClass("hidden");
									$("#appat02").text("El formato del campo apellido paterno es incorrecto.");                        
									nombres = false;
								}else{
									$("#Appaterno").attr("class", "form-group has-feedback has-success");
									$("#appat01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
									$("#appat02").addClass("hidden");                   
									nombres = true;
								}
								//Apellido Materno
								if(apmat == ""){
									$("#Apmaterno").attr("class", "form-group has-feedback has-error");
									$("#apmat01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
									$("#apmat02").removeClass("hidden");
									$("#apmat02").text("El campo apellido materno no puede estar vacío.");
									nombres = false;
								}else if (!valname(apmat)) {                            
									$("#Apmaterno").attr("class", "form-group has-feedback has-error");
									$("#apmat01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
									$("#apmat02").removeClass("hidden");
									$("#apmat02").text("El formato del campo apellido materno es incorrecto.");
									nombres = false;
								}else {                              
									$("#Apmaterno").attr("class", "form-group has-feedback has-success");
									$("#apmat01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
									$("#apmat02").addClass("hidden");
									nombres = true;
								}
								//Validando Correo
								if(c1 == ""){
									$("#Correo").attr("class", "form-group has-feedback has-error");
									$("#correo01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
									$("#correo02").removeClass("hidden");
									$("#correo02").text("El campo correo electrónico no puede estar vacío.");
									correos = false;
								}else if (!validate(c1)) {
									$("#Correo").attr("class", "form-group has-feedback has-error");
									$("#correo01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
									$("#correo02").removeClass("hidden");
									$("#correo02").text("El formato del campo correo electrónico es incorrecto.");
									correos  = false;
								}else if(c1 != c2){
									$("#Correo").attr("class", "form-group has-feedback has-success");
									$("#correo01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
									$("#correo02").removeClass("hidden");
									$("#Correo2").attr("class", "form-group has-feedback has-success");
									$("#repcorreo01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
									$("#repcorreo02").removeClass("hidden");
									$("#repcorreo02").text("Los correos electrónicos no coinciden");
									correos = false;
								}else{
									$("#Correo").attr("class", "form-group has-feedback has-success");
									$("#correo01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
									$("#correo02").addClass("hidden");
									$("#Correo2").attr("class", "form-group has-feedback has-success");
									$("#repcorreo01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
									$("#repcorreo02").addClass("hidden");
									correos = true; 
								}                                                           
								//Validando el departamento
								if(depa == -1){
									$("#Departamento").attr("class", "form-group has-feedback has-error");                    			              	
									depas = false;
								}else{
									$("#Departamento").attr("class", "form-group has-feedback has-success");                                            
									depas = true;
								}
								// Si los tres fueron correctos
								if(nombres && correos  && depas){
									$("#confirmacion").modal();
									$("#Neta").click(function() {
										$.ajax({
											url: "../Modelo/edita_cuenta.php",
											method: "POST",
											data: {
												value:  "<?php echo htmlspecialchars($id); ?>",
												name: nombre,
												appat: appat,
												apmat: apmat,                                                    
												correo: c1,
												dep: depa                                                    
											}
										}).done(function(msg) {
											if(msg != "hecho"){
												$("#exitoso").modal();                                                    
											}else{
												$("#error").modal();
											}                                                                           
										});
									});
								}else{
									$(window).scrollTop(0);
									$("#error").modal();
								}                                           
							}
						</script>					   
					</div>
				</form>   
			</div>
		</div>

		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="exitoso" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-success">
						<h4 class="modal-title">Mensaje de alerta</h4>
					</div>
					<div class="modal-body">
						<p>La cuenta se ha editado exitosamente</p>
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

		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="confirmacion" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-warning">
						<h4 class="modal-title">Mensaje de confirmación</h4>
					</div>
					<div class="modal-body">
						<p>¿Seguro que desea editar ésta cuenta?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" onclick="window.location = 'AdministrarCuentas.php';"
								data-dismiss="modal">No</button>
						<button type="button" class="btn btn-warning" id="Neta" data-dismiss="modal">Si</button>
					</div>
				</div>
			</div>
		</div>        

		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="seguro" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-warning">
						<h4 class="modal-title">Mensaje de confirmación</h4>
					</div>
					<div class="modal-body">
						<p>¿Seguro que desea cancelar la edición de ésta cuenta?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
						<button type="button" class="btn btn-warning" onclick="window.location = 'AdministrarCuentas.php';"
								data-dismiss="modal">Si</button>
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