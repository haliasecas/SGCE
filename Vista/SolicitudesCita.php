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
								<span><img src="../Img/bookmarkGreen.png" height="30px"></span> Personal Administrativo<span class="caret"></span>
							</a>
							<ul class="dropdown-menu dark">
								<li><a href="../Vista/SolicitarCita.php">
									<span><img src="../Img/333.png" height="36px"></span>
									Calendario
									</a></li>
								<li><a href="./InformesySugerencias.php">
									<span><img src="../Img/22.png" height="36px"></span>
									Informes y Sugerencias
									</a></li>
								<li><a href="#">
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
								<li><a href="./CambiarContrasena.php">
									<span><img src="../Img/Edit2.png" height="36px"></span>
									Cambiar contraseña
									</a></li>
								<li><a href="../cierra_sesion.php">
									<span><img src="../Img/Out.png" height="36px"></span>
									Cerrar sesión
									</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container-fluid" style="padding-bottom:57px;" id="main-content">
			<div class="container">
				<h3><strong>Solicitudes de citas</strong></h3>
				<p>En esta sección  podrás consultar y administrar las solicitudes de citas recibidas.</p> 
				<br>
				<br>
				<div class="table-responsive">          
					<table class="table">
						<thead>
							<tr style="color: #FFF; background: #696969;">
								<th>Área</th>
								<th>Correo electrónico</th>
								<th>Recibido</th>
								<th colspan="4">Estado</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr id="eg1">
								<td>Departamento A</td>
								<td>ejemplo@dominio.com</td>
								<td>Nombre encargado</td>
								<td>PENDIENTE</td>
								<td><p class="click-me text-success text-right"  style="text-decoration:underline;" id="1">Editar</p></td>
								<td><p class="click-me text-success text-right" style="text-decoration:underline;"  id="2">Eliminar</p></td>
							</tr>
							<tr id="eg2">
								<td>Departamento B</td>
								<td>ejemplo@dominio.com</td>
								<td>Nombre encargado</td>
								<td>APROBADO</td>
								<td><p class="click-me text-success text-right"  style="text-decoration:underline;" id="1">Editar</p></td>
								<td><p class="click-me text-success text-right" style="text-decoration:underline;"  id="2">Eliminar</p></td>
							</tr>
							<script type="text/javascript">
								$(".click-me").click(function() {
									$idD = this.id;
									$idP = $(this).parent().id;
									$.ajax({
										method: "POST",
										url: "SolicitudCita.php",
										data: { value: $idD, parent: $idP }
									}).done(function(msg){
										console.log(msg);
									});
								});
							</script>
							<?php

							include("abre_conexion.php");
							$query = "SELECT idSolicitud,idarea,dia,estado,idinteresado FROM solicitud";
							$result = mysqli_query($link, $query);
							echo "<form action='prueba.php' method='post' name='testform'>";
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								$idarea=$row['idarea'];
								$id = sprintf("SELECT nombre FROM area WHERE idarea='$idarea'");
								$result2=mysqli_query($link,$id);
								$rowarea = mysqli_fetch_assoc($result2);
								$area = $rowarea['nombre'];
								$idinteresado=$row['idinteresado'];
								$id = sprintf("SELECT correo FROM interesado WHERE idinteresado='$idinteresado'");
								$result3=mysqli_query($link,$id);
								$rowinteresado = mysqli_fetch_assoc($result3);
								$correo = $rowinteresado['correo'];
								$recibido=$row['dia'];
								$estado=$row['estado'];
								$idsolicitud=$row['idSolicitud'];
								echo "<tr>";
								echo "<th>$area</th>";
								echo "<th>$correo</th>";
								echo "<th>$recibido</th>";
								echo "<th>$estado</th>";
								//echo "<input type='submit' name='data' value='M'.$idsolicitud>";
								//echo "<a name='adios' href = '#'  id = 'solution2' onClick='submit';'>Solution1 </a>";
								//echo "<a name='hola' href = '#'  id = 'solution1' onClick='submit';'>Solution1 </a>";
								echo "<input type='submit' name='data' value=$idsolicitud>";
								//echo "<th><a class=' text-success text-right '  style = 'text-decoration:underline;' id=$idsolicitud' >Ver más</a></th>";
								//echo "<th><a class=' text-success text-right delete-rod' style = 'text-decoration:underline;'  id=$idsolicitud' href=#>Eliminar</a></th> ";
								echo "</tr>";
							}
							echo"</form>";
							?>

						</tbody>
					</table>
				</div>
				<div class="form-group text-right">
					<div class="col-md-8 col-md-offset-4">							                     
						<a class="btn btn-success" style="width: 80px; height:40px;" onclick="enviarForm();"><span class="glyphicon glyphicon-plus"  style="color:#FFF; padding-top:5px;"></span></a>
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