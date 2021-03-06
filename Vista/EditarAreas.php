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
		if(isset($_GET["id"]))
			$id = $_GET['id'];
		include("../Modelo/abre_conexion.php");
		$query = "SELECT a.nombre as nombrearea,a.idarea as idarea FROM area a WHERE idarea = '$id'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$nombrearea = $row['nombrearea'];
		?>

		<!-- Mensajes bajo el campo -->
		<div class="container-fluid" style="padding-bottom:57px;" id="main-content">
			<div class="container">
				<h3><strong>Editar área</strong></h3>
				<p><strong class="text-success">Todos los campos son obligatorios.</strong>
					El nombre del departamento debe estar previamente registrado en el sistema.</p> 
				<br>
				<br>                                
				<form method="post" class="form-horizontal">
					<div class="form-group" id='Nombre'>
						<label  for="" class="control-label col-md-2">Nombre del área</label>
						<div class="col-md-10">
							<?php echo "<input type='text' class='form-control' value='$nombrearea' name='nombrearea'>"; ?>
							<span id="nombre01" class="hidden glyphicon form-control-feedback"></span>
							<span id="nombre02" class="text-center help-block hidden">
							</span>
						</div>
					</div> 
					<div class="form-group" id="Depa">
						<label class="control-label col-md-2">Nombre del departamento</label>						                                                                
						<div class="col-md-10" >                                        
							<select  class="form-control" name='iddepto'>
								<option value="-1">Seleccione un departamento</option>
								<?php
								$query = "SELECT * FROM depto where iddepto>1";
								$result2 = mysqli_query($link, $query);
								$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
								while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
									$nombredepto= $row['nombre'];
									$iddepto = $row["iddepto"];
									echo "<option value='$iddepto' >$nombredepto</option>";
								}
								?>
							</select>
						</div>                                                                       
					</div>    
					<div class="form-group">
						<div class="form-group text-right">
							<div class="col-md-8 col-md-offset-4">
								<a class="btn btn-success" style="width: 150px;" onclick="window.location = 'AdministrarAreas.php'">CANCELAR</a>
								<a class='btn btn-success' style='width: 150px; cursor: pointer;' onclick='editarArea();'>ENVIAR</a>
							</div>					                                                                               						                             
						</div>
					</div>
					<script>
						function error(donde, str) {
							$(donde).addClass("has-error has-feedback");
							if (donde == "#Nombre") {
								$("#nombre01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
								$("#nombre02").removeClass("hidden");
								$("#nombre02").text(str);
							}
						}

						function nohayerror(donde) {
							$(donde).removeClass("has-error has-feedback");
							$(donde).addClass("has-success has-feedback");
							if (donde == "#Nombre") {
								$("#nombre01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
								$("#nombre02").addClass("hidden");
							}
						}

						function editarArea() {
							var a1 = false, a2 = false;
							var ts = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]+$/u;
							var iddepto = $("[name='iddepto']").val();
							var nombrearea = $("[name='nombrearea']").val();
							if (nombrearea == "") {
								error("#Nombre", "El campo nombre del área no puede estar vacio.");
								a1 = false;
							}
							else if (!ts.test(nombrearea)) {
								error("#Nombre", "El formato del campo nombre del área es incorrecto.");
							}
							else {
								nohayerror("#Nombre");
								a1 = true;
							}
							if (iddepto == "-1") {
								error("#Depa", "El nombre del departamento no puede estar vacio.");
								a2 = false;
							}
							else {
								nohayerror("#Depa");
								a2 = true;
							}

							if (a1 && a2) {
								$("#confirmacion").modal();
								$("#Neta").click(function() {
									$.ajax({
										url: '../Modelo/edita_area.php',
										method: "POST",
										data: { nombrearea: nombrearea, iddepto: iddepto, idarea: "<?php echo "$id"; ?>" }
									}).done(function(msg){
										console.log(msg);
										if (msg == "hecho") {
											window.location = "AdministrarAreas.php";
										}
										else {
											$("#error02").modal();
										}
									});
								});
							}
							else {
								$("#error").modal();
							}
						}

					</script>
				</form>   
			</div>
		</div>                                

		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="confirmacion" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-warning">
						<h4 class="modal-title">Mensaje de confirmación</h4>
					</div>
					<div class="modal-body">
						<p>¿Seguro que desea editar ésta área?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
						<button type="button" class="btn btn-warning" id="Neta" data-dismiss="modal">Si</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" data-keyboard="false" id="error" role="dialog" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-error">
						<h4 class="modal-title">Mensaje de error</h4>
					</div>
					<div class="modal-body">
						<p>Falta al menos un dato obligatorio para efectuar la operación solicitada</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" data-keyboard="false" id="error02" role="dialog" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-error">
						<h4 class="modal-title">Mensaje de error</h4>
					</div>
					<div class="modal-body">
						<p>El nombre de este departamento ya existe en el sistema</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Nav de abajo -->
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