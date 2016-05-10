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
					<a class="navbar-brand" href="../index.php">
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

		<?php
		if(isset($_GET["id"]))
			$id = $_GET['id'];
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
				<form action="" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-2">Nombre(s)</label>
						<div class="col-md-10">
							<?php
							echo "<input type='nombre' class='form-control' value='$nombre' >"
							?>
						</div>						
					</div>
					<div class="form-group">
						<label class="control-label col-md-2">Apellido paterno</label>
						<div class="col-md-10">
							<?php 
								echo "<input type='appaterno' class='form-control' value='$appaterno' >"
							?>

						</div>
					</div>
					<div class="form-group">
						<label  for="" class="control-label col-md-2">Apellido materno</label>
						<div class="col-md-10">
							<?php 
								echo "<input type='apmaterno' class='form-control' value='$apmaterno' >"
							?>

						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2">Correo electrónico</label>
						<div class="col-md-10">
							<?php 
								echo "<input type='apmaterno' class='form-control' value='$correo'>"
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2">Repetir correo electrónico</label>
						<div class="col-md-10">
							<?php 
								echo "<input type='apmaterno' class='form-control' value='$correo'>"
							?>
						</div>
					</div>
					
					<div class="form-group">
						<label  for="" class="control-label col-md-2">Departamento</label>
						<div class="col-md-10">                                        
							<select name="departamento" class="form-control">
								<!-- <option value="DepartamentoA">Departamento A</option> -->
								<?php
								$query = "SELECT * FROM depto";
							$result2 = mysqli_query($link, $query);
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
							while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
								$nombredepto= $row['nombre'];
								echo "<option value='DepartamentoA'>$nombredepto</option>";
							}
								?>
							</select>
						</div>     
					</div>
					<div class="form-group">
						<div class="form-group text-right">
							<div class="col-md-8 col-md-offset-4">
								<a class="btn btn-success" style="width: 150px;" onclick="#">CANCELAR</a>
								<a class="btn btn-success" style="width: 150px;" onclick="enviarForm();">ENVIAR</a>
							</div>
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
		<script>
			$(document).ready(function(){
				$("#frmRestablecer").submit(function(event){
					event.preventDefault();
					$.ajax({
						url:'validaremail.php',
						type:'post',
						dataType:'json',
						data:$("#frmRestablecer").serializeArray()
					}).done(function(respuesta){
						$("#mensaje").html(respuesta.mensaje);
						$("#email").val('');
					});
				});
			});
		</script>
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