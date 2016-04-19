<!DOCTYPE html>
<html>
	<head>
		<title>Modelo</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="Scr/jquery-2.2.0.js"></script>
		<script type="text/javascript" src="Scr/moment.min.js"></script>
		<script type="text/javascript" src="Scr/bootstrap.js"></script>
		<script type="text/javascript" src="Scr/bootstrap-datetimepicker.js"></script>
		<link type="text/css" rel="stylesheet" href="Css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style type="text/css">
			@font-face{
				font-family: "Arial";
				src: url("Fonts/arial.ttf") format("truetype");
				font-family: "Arial Rounded";
				src: url("Fonts/arial-rounded.ttf") format("truetype");
				font-family: "Oswald";
				src: url("Fonts/Oswald-Light.ttf") format("truetype");
			}
			#top-bar, #bottom-bar{
				font-family: "Oswald";
				font-size: 18px;
			}
			body {
				font-family: "Arial";
			}
			#logoSGCE, .img-head{
				max-width: 100%;
    			height: auto;
    			width: auto\9; /* ie8 */
			}
		</style>
	</head>
	<body>
        <?php
            $server = "localhost";
            $user = "root";
            $pass = "6224";    
            $conn = new mysqli($server, $user, $pass);
        ?>
		<div class="container-fluid" style="padding-bottom:9px;" id="header">
			<img src="Img/SEP.png" height="64px" style="float:left; padding-left:15px;">
			<img class="img-head" src="Img/logoIPNGris.png" style="float:right; padding-top:15px; padding-right:15px;">
		</div>

		<nav class="navbar navbar-inverse navbar-static-top" style="height:84px;" id="top-bar">
			<div class="container-fluid" style="padding-left:51px; padding-right:51px;">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">
						<img id="logoSGCE" src="Img/logoSGCE.png">
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
								<span><img src="Img/bookmarkGreen.png" height="30px"></span> Visitante<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">
									<span><img src="Img/333.png" height="36px"></span>
									Solicitar Cita
								</a></li>
								<li><a href="#">
									<span><img src="Img/22.png" height="36px"></span>
									Informes y Sugerencias
								</a></li>
								<li><a href="#">
									<span><img src="Img/11.png" height="36px"></span>
									Ver mis citas
								</a></li>
							</ul>
						</li>
						<li class="">
							<a href="#" data-toggle="modal" data-target="#inicioSesion" onclick="reloadMod();">
								<span><img src="Img/loginiGreen.png" height="30px"></span> Iniciar sesión (Administrador)
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="modal fade" data-keyboard="true" id="inicioSesion" role="dialog" aria-hidden="true">
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
						<button type="button" class="btn btn-success btn-md btn-block" id="login">
							Iniciar Sesión
						</button>
                        <button class="hidden" id="login2"></button>
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

		<div id="bienvenida" class="container-fluid" align="center">
			
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
						<a class="navbar-brand" href="#">
							<img src="Img/facebookWhite.png" height="24px">
						</a>
						<a class="navbar-brand" href="#">
							<img src="Img/twitterWhite.png" height="24px">
						</a>
						<a class="navbar-brand" href="#">
							<img src="Img/googleWhite.png" height="24px">
						</a>
					</ul>
				</div>
			</div>
		</nav>		
		
		<script type="text/javascript">
			$(document).ready(function (){
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
