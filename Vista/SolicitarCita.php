<!DOCTYPE html>
<html>
	<head>
		<title>Modelo</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="../Scr/jquery-2.2.0.js"></script>
		<script type="text/javascript" src="../Scr/moment.min.js"></script>
		<script type="text/javascript" src="../Scr/bootstrap.js"></script>
		<script type="text/javascript" src="../Scr/bootstrap-datetimepicker.js"></script>
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
			if (!empty($_POST)) {
				echo ("
				<script type='text/javascript'>
					$(document).ready(function() {
						$('#exitoso').modal();
					});
				</script>
				");
			}
		?>
		
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
                    <div class="form-group">                                                            
				   		<label  for="email" class="control-label col-md-2">Correo Electrónico</label>
						<div class="col-md-10">
							<input type="text" class="form-control" placeholder="ejemplo@dominio.com" id="correoE">
						</div>
						<br>                                
                    </div>
                    <!--Nombre-->
                    <div class="form-group">
                                <label  for="nombre" class="control-label col-md-2">Nombre(s)</label>
                                <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="Francisco">
                                </div>
                                <br>       
                    </div>
                    <!--Apellido Paterno-->
                    <div class="form-group">
                                <label  for="appat" class="control-label col-md-2">Apellido Paterno</label>
                                <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="Pérez">
                                </div>
                                <br>       
                    </div>
                    <!--Apellido Materno-->
                    <div class="form-group">
                                <label  for="apmat" class="control-label col-md-2">Apellido Materno</label>
                                <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="Pérez">
                                </div>
                                <br>   
                    </div>
                    <!--Teléfono-->
                    <div class="form-group">
                                <label  for="telefono" class="control-label col-md-2">Teléfono</label>
                                <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="55555555">
                                </div>
                                <br> 
                    </div>
                    <h4 class="text-uppercase">datos de la cita:</h4>
                    <!--Departamento-->
                    <div class="form-group">
                            <label for="departamento" class="control-label col-md-2">Departamento</label>        
                                        <div class="col-md-10">                                        
                                <select name="departamento" class="form-control">
                                              <option value="UPIS">Unidad Politécnica de Integración Social</option> 
                                </select>
                                        </div>                        
                    </div>
                    <!--Area-->
                    <div class="form-group">
                        <label for="area" class="control-label col-md-2">Área</label>        
                                        <div class="col-md-10">                                        
                                <select name="area" class="form-control">
                                              <option value="MovA">Movilidad académica</option>   
                                </select>
                                        </div>                        
                    </div>
                    <!--Asunto-->
                    <div class="form-group">
                           <label  for="asunto" class="control-label col-md-2">Asunto</label>
                                <div class="col-md-10">
                                            <input type="text" class="form-control" placeholder="Breve descripción del asunto de la cita">
                                </div>
                                <br> 
                    </div>
                    <!--Turno-->
                    <div class="form-group">
                                 <label for="turno" class="control-label col-md-2">Turno</label>        
                                        <div class="col-md-10">                                        
                                <select name="turno" class="form-control">
                                              <option value="Turno">Matutino</option>   
                                              <option value="Turno">Vespertino</option>   
                                </select>
                                        </div> 
                    </div>
                    <!--Horarios preferentes-->
                    <div class="form-group">
                        <label for="horpref" class="control-label col-md-2">Horario(s) preferentes<br></label>    
                        <div class="col-md-10">
							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox">9:00-10:00 hrs.
								</label>

								<label >
									<input type="checkbox">13:00-14:00 hrs.
								</label>
							</div>
                        
							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox">10:00-11:00 hrs.
								</label>

								<label >
									<input type="checkbox">14:00-15:00 hrs.
								</label>
							</div>
                        
							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox">11:00-12:00 hrs.
								</label>
							</div>
							
							<div class="checkbox col-md-3">
								<label >
									<input type="checkbox" name="checkbox">12:00-13:00 hrs.
								</label>
							</div>
                        </div>                                                                      
                    </div>
                    
                    <!--Dias preferentes-->
                    <div class="form-group">
						<label for="diapref" class="control-label col-md-2">Día(s) preferentes<br><small>(seleccione al<br>menos uno)</small></label>        
						<div class="col-md-10">
							<div class='input-group date' id='datet1'>
							<input type='text' class="form-control" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
							<br>
						</div>                            
						<div class="col-md-10">
							<div class='input-group date' id='datet2'>
							<input type='text' class="form-control" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
							<br>
						</div>
						<div class="col-md-10 col-md-offset-2">
							<div class='input-group date' id='datet3'>
							<input type='text' class="form-control" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
                    </div>
					
					<script type="text/javascript">
						$(function () {
							$('#datet1').datetimepicker({
								format: 'DD/MM/YYYY',
								minDate: moment().add(3, 'd'),
								daysOfWeekDisabled: [0, 6]
							});
							$('#datet2').datetimepicker({
								format: 'DD/MM/YYYY',
								minDate: moment().add(4, 'd'),
								daysOfWeekDisabled: [0, 6]
							});
							$('#datet3').datetimepicker({
								format: 'DD/MM/YYYY',
								minDate: moment().add(5, 'd'),
								daysOfWeekDisabled: [0, 6]
							});
						});
					</script>					
                     <!--Boton-->
					<div class="form-group text-right">
						 <div class="col-md-10 col-md-offset-2">
							 <a class="btn btn-success" style="width: 150px;" onclick="enviarForm();">ENVIAR</a>
						</div>
					</div>
                </form>
				<script type="text/javascript">
					function enviarForm() {
						$("#formCita").submit();
					}
				</script>
            </div>
		</div>
		
		<div class="modal fade" id="exitoso" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header modal-has-success">
						<h4 class="modal-title">Mensaje de alerta</h4>
					</div>
					<div class="modal-body">
						<p>Operación realizada exitosamente.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.location = '../index.php';">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" data-keyboard="false" data-backdrop="static" id="error" role="dialog">
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