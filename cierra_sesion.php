
<html>  

<head>  
<title>Cerrar Sesion</title>  
</head>  

<body>  
<?php 
				setcookie("cargo","",time()-3600);			
				setcookie("id","",time()-3600);
				
				echo " 
<p class='avisos'>Se ha cerrado sesion.Sera redirigido automaticamente en 1 segundos</p> 

"; 
header("refresh: 1; url = index.php");

?>


</body>  

</html> 