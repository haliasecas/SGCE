<!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8>
		<link rel="icon" href="../Img/logoEscomR.png" type="image/x-icon">
		<link rel="shortcut icon" href="../Img/logoEscomR.png">
		<title>Cursos de verano ESCOM</title>
		<script type="text/javascript" src="Scr/jquery.min.js"></script>
		<script type="text/javascript" src="/Scr/alert.js"></script>
		<script type="text/javascript" src="/Scr/moment.min.js"></script>
		<script type="text/javascript" src="/Scr/bootstrap.js"></script>
		<script type="text/javascript" src="/Scr/bootstrap-datetimepicker.min.js"></script>
		<link type="text/css" rel="stylesheet" href="/Css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="/Css/bootstrap-datetimepicker.css">
		<link type="text/css" rel="stylesheet" href="/Css/modals.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>
	<body>
        <?php
            $server = "localhost";
            $user = "root";
            $pass = "6224";    
            $conn = new mysqli($server, $user, $pass);
        ?>
		<br>
		<div class="container">
			<div class="col-md-4" align="center"><img src="Img/logoSEP.png" border="0"></div>
			<div class="col-md-4" align="center"><img src="Img/logoEscom.png" border="0"></div>
			<div class="col-md-4" align="center"><img src="Img/logoIPNGris.png" border="0"></div>
		</div>
		<br><br>

		<button type="button" class="hidden" data-toggle="modal" data-target="#inicioSesion" id="1"></button>

		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="inicioSesion" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title">Iniciar sesión</h4>
					</div>

					<div class="modal-body">
						<form role="form" method="post">
							<fieldset>
								<div class="form-group" id="usuario">
									<label class="control-label">Usuario</label>
									<input name="nomusu" type="text" class="form-control" id="userIn" placeholder="Nombre de usuario">
									<span id="userO1" class="" aria-hidden="true"></span>
								</div>
								<div class="form-group" id="password">
									<label class="control-label">Contraseña</label>
									<input name="contrass" type="password" class="form-control" id="passwordIn" placeholder="Contraseña">
									<span id="passwordO1" class="" aria-hidden="true"></span>
									<span id="passwordO2" class="help-block hidden">Usuario y/o contraseña incorrectos.</span>
								</div>
								<div>
									<div class="checkbox">
										<label><input type="checkbox">Recordar mis datos</label>
									</div>
								</div>
								<div class="form-group">
									<span class="help-block">
										<a href="RecuperarPassword.php">¿Olvidó su contraseña?</a>
									</span>
								</div>
							</fieldset>
						</form>		
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-md btn-block" id="login">
							Iniciar Sesión
						</button>
                        <button class="hidden" id="login2"></button>
						<span class="help-block" align="center">
							¿No tiene una cuenta? <a href="RegistrarAlumno.php">Registrarse »</a>
						</span>
					</div>

					<script type="text/javascript">
						$('#inicioSesion').change(function () {
							if ($('#userIn').val().match(/^[\s]+$/) || $('#userIn').val() == ""
							|| $('#passwordIn').val().match(/^[\s]+$/) || $('#passwordIn').val() == "")
								$('#login').attr('data-dismiss', '');
						});

						$('#login').click(function () {
							var hora = moment().format('H');
							var saludo;
							if (hora >= 6 && hora < 12) saludo = 'Buenos días';
							else if (hora >= 12 && hora < 19) saludo = 'Buenas tardes';
							else saludo = 'Buenas noches';

							if ($('#userIn').val().match(/^[\s]+$/) || $('#userIn').val() == "" 
							|| $('#passwordIn').val().match(/^[\s]+$/) || $('#passwordIn').val() == "") {
								$('#usuario').addClass('has-error has-feedback');
								$('#password').addClass('has-error has-feedback');
								$('#userO1').attr('class', 'glyphicon glyphicon-remove form-control-feedback');
								$('#passwordO1').attr('class', 'glyphicon glyphicon-remove form-control-feedback');
								$('#passwordO2').removeClass('hidden');
								$('#passwordO2').text("Por favor introduzca su usuario y contraseña.");
							}
                            <?php
                                $pass = $_POST['contrass'];
                                $usuario = $_POST['nomusu'];
                                $sql = "select nombre from usuarios where usuario = $usuario and pass = $pass;";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                            ?>
							else {
								$('#bienvenida').removeClass('hidden');
								$('#central').removeClass('hidden');
								$('#bienvenida').html("<h2>" + saludo + "<br>" + $('#userIn').val() + "</h2>");
								$('#username').text($('#userIn').val());
								$('#cerrarSesion1').removeClass('hidden');
							}
                            $('#login2').attr('data-dismiss', 'modal');
                            <?php
                                }
                            else {
                            ?>
                            else {
                                $('#usuario').addClass('has-error has-feedback');
								$('#password').addClass('has-error has-feedback');
								$('#userO1').attr('class', 'glyphicon glyphicon-remove form-control-feedback');
								$('#passwordO1').attr('class', 'glyphicon glyphicon-remove form-control-feedback');
								$('#passwordO2').removeClass('hidden');
								$('#passwordO2').text("Usuario y/o contraseña incorrectos.");
                            }
                            <?php
                            }
                            echo ($_POST['nomusu']);
                            ?>
						});
					</script>

				</div>
			</div>
		</div>

		<div id="bienvenida" class="jumbotron hidden" align="center"></div>

		<div id="central" style="padding-bottom:55px;" class="container-fluid hidden">
			<div class="col-md-6 text-center">
				<h3>Administrador</h3>
				<div class="btn-group btn-group-justified">
					<a href="ModificarPassword.php" class="btn btn-primary">Modificar Contraseña</a>
				</div>
				<div class="col-md-6 text-center container-fluid">
					<h5>Cursos</h5>
					<div class="btn-group btn-group-justified">
						<a href="RegistrarCurso.php" class="btn btn-primary">Registrar Curso</a>
					</div>
					<div class="btn-group btn-group-justified">
						<a href="CursosAdmin.php" class="btn btn-default">Lista de Cursos</a>
					</div>
				</div>
				<div class="col-md-6 text-center container-fluid">
					<h5>Alumnos</h5>
					<div class="btn-group btn-group-justified">
						<a href="EliminarAlumno.php" class="btn btn-primary">Eliminar Alumno</a>
					</div>
				</div>
			</div>
			<div class="col-md-6" align="center">
				<h3>Alumno</h3>
				<div class="btn-group btn-group-justified">
					<a href="ModificarPassword.php" class="btn btn-default">Modificar Contraseña</a>
					<a href="InscribirACurso.php" class="btn btn-default">Inscribirse a Curso</a>
				</div>
				<div class="btn-group btn-group-justified">
					<a href="ModificarPerfil.php" class="btn btn-primary">Modificar Perfil</a>
				</div>
			</div>
		</div>

		<nav class="navbar navbar-default navbar-fixed-bottom">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navB" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse" id="navB">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<p id="username" class="navbar-text"></p>
						</li>
						<li>
							<button class="btn btn-default navbar-btn hidden" data-toggle="modal" data-target="#cerrarSesion2" id="cerrarSesion1">
								Cerrar sesión
							</button>
						<li>
						<li><p class="navbar-text"><p></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="cerrarSesion2" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-warning">
						<h4 class="modal-title">Mensaje de confirmación</h4>
					</div>
					<div class="modal-body">
						<p>¿Seguro que quieres cerrar sesión?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" onclick="window.location='Login.php';" data-dismiss="modal">
							Aceptar
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function (){
				$('#1').click();
			});
		</script>
        
	</body>
</html>
