<!DOCTYPE html>
<html>  
	<head>  
		<title>SGCE</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="./Scr/jquery-2.2.0.js"></script>
		<script type="text/javascript" src="./Scr/moment.min.js"></script>
		<script type="text/javascript" src="./Scr/bootstrap.js"></script>
		<script type="text/javascript" src="./Scr/bootstrap-datetimepicker.js"></script>
		<link type="text/css" rel="stylesheet" href="./Css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="./Css/letras.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>  

	<body>
		<div class="container-fluid" style="padding-bottom:9px;" id="header">
			<img src="Img/SEP.png" height="64px" style="float:left; padding-left:15px;">
			<img class="img-head" src="./Img/logoIPNGris.png" style="float:right; padding-top:15px; padding-right:15px;">
		</div>

		<nav class="navbar navbar-inverse navbar-static-top" style="height:84px;" id="top-bar">
			<div class="container-fluid" style="padding-left:51px; padding-right:51px;">
				<div class="navbar-header">
					<a class="navbar-brand" href=".">
						<img id="logoSGCE" src="./Img/logoSGCE.png">
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
					</ul>
				</div>
			</div>
		</nav>

		<div id="main-content" class="container-fluid" align="center" style="padding-bottom: 50px;">
			<div class="jumbotron">
				<p class='avisos' id="aviso">Se ha cerrado sesion. Será redirigido automáticamente en 3 segundos</p>
				<?php 
				//setcookie("cargo", "", time()-3600);
                setcookie("cargo", "", 1);
				//setcookie("id", "", time()-3600);
                setcookie("id", "", 1);
				//setcookie("first", "", time()-3600);			
                setcookie("first", "", 1);                
				//setcookie("name", "", time()-3600);
                setcookie("name", "", 1);
                

				header("refresh: 3; url = ./");

				?>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function (){
				setTimeout(function(){
					$("#aviso").text("Se ha cerrado sesion. Será redirigido automáticamente en 2 segundos")
					setTimeout(function(){
						$("#aviso").text("Se ha cerrado sesion. Será redirigido automáticamente en 1 segundo");
					}, 1000);
				}, 1000);
			});
		</script>
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
							<img src="./Img/facebookWhite.png" height="24px">
						</a>
						<a class="navbar-brand" href="https://twitter.com/escomunidad?ref_src=twsrc%5Etfw">
							<img src="./Img/twitterWhite.png" height="24px">
						</a>
						<a class="navbar-brand" href="https://plus.google.com/112263443520207638663/posts">
							<img src="./Img/googleWhite.png" height="24px">
						</a>
					</ul>
				</div>
			</div>
		</nav>		

		<script type="text/javascript">
			$(document).ready(function (){
				// Sticky bar plz
				$(window).scroll(function() {
					if ($(window).scrollTop() >= $("#header").height()) {
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