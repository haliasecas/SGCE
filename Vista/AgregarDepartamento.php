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

		<!-- Nav arriba Administrador -->
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
								<li><a href="../Vista/EditarCuenta.php">
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
								<li><a href="../Vista/cierra_conexion.php">
									<span><img src="../Img/Out.png" height="36px"></span>
									Cerrar sesión
									</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>    		        

		<?php
		if (!empty($_POST)) {
			$nombre = htmlspecialchars($_POST["nombreDepto"]);
			$idPers = htmlspecialchars($_POST["personal"]);

			include("../Modelo/abre_conexion.php");

			$q = "INSERT INTO depto(nombre, idpersonal) VALUES ('$nombre', $idPers)";
			$j = "UPDATE personal SET ocupado = 1 WHERE idpersonal = $idPers";

			mysqli_query($link, $q);
			mysqli_query($link, $j);
		?>
		<script type='text/javascript'>
			$(document).ready(function() {
				$('#exitoso').modal();
			});
		</script>
		<?php
			include("../Modelo/cierra_conexion.php");
		}
		?>

		<div class="container-fluid" style="padding-bottom:57px;" id="main-content">
			<div class="container">
				<h3><strong>Agregar departamento</strong></h3>
				<p><strong class="text-success">Todos los campos son obligatorios.</strong> El correo electrónico 
					debe estar previamente registrado en el sistema.</p> 
				<br><br>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" id="Formulario">
					<div class="form-group" id="Departamento">
						<label class="control-label col-md-2">Nombre del departamento</label>
						<div class="col-md-10">
							<input type='text' class='form-control' name="nombreDepto" id="departamento" placeholder="Departamento D">
							<span id="depa01" class="hidden glyphicon form-control-feedback"></span>
							<span id="depa02" class="text-center help-block hidden"></span>
						</div>           	
					</div>

					<div class="form-group" id="Encargado">
						<label  for="" class="control-label col-md-2">Encargado</label>                     
						<div class="col-md-10">                                    
							<select name="personal" class="form-control">
								<?php
								include("../Modelo/abre_conexion.php");
								$query = "SELECT * FROM personal WHERE ocupado = 0";
								$result = mysqli_query($link, $query);
								if (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) > 0) {
									$result = mysqli_query($link, $query);
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$nombre= $row['correo'];
										$idpersona = $row["idpersonal"];
										echo "<option value='$idpersona'>$nombre</option>";
									}
								}
								else {
									echo "<option value='-1'>No hay personal disponible</option>";
								}
								include("../Modelo/cierra_conexion.php")
								?>
							</select>
						</div>    			       						                               					                              
					</div>

					<div class="form-group">
						<div class="form-group text-right">
							<div class="col-md-8 col-md-offset-4">
								<a class="btn btn-success" style="width: 150px;" onclick="window.location = './AdministrarDepartamentos.php'">
									CANCELAR
								</a>
								<a class="btn btn-success" style="width: 150px;" onclick="enviarForm();">ENVIAR</a>
							</div>	                             
						</div>
					</div>
					<script type="text/javascript">
						function enviarForm() {
							var a1 = false, a2 = false;
							var depto = $("#departamento").val();
							var ts = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]+$/u;
							if (depto == "") {
								$("#Departamento").attr("class", "form-group has-feedback has-error");
								$("#depa01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
								$("#depa02").removeClass("hidden");
								$("#depa02").text("El campo nombre del departamento no puede estar vacío.");
								a1 = false;
							}
							else if (!ts.test(depto)) {
								$("#Departamento").attr("class", "form-group has-feedback has-error");
								$("#depa01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
								$("#depa02").removeClass("hidden");
								$("#depa02").text("El formato del campo nombre del departamento es incorrecto.");
								a1 = false;
							}
							else {
								$("#Departamento").attr("class", "form-group has-feedback has-success");
								$("#depa01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
								$("#depa02").addClass("hidden");
								a1 = true;
							}

							if ($("[name='personal']").val() == -1){
								$("#Encargado").attr("class", "form-group has-feedback has-error");
								a2 = false;
							}
							else {
								$("#Encargado").attr("class", "form-group has-feedback has-success");
								a2 = true;
							}

							if (a1 && a2) $("#Formulario").submit();
							else {
								$(window).scrollTop(0);
								$("#error").modal();
							}
						}
					</script>
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
						<p>El departamento ha sido registrado exitosamente.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal"
								onClick="window.location = 'AdministrarDepartamentos.php';">
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