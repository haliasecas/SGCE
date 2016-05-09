<?php 
	$link = mysqli_connect('localhost','root', '6224', 'SGCE');
	if (!$link) {
    	die("Connection failed: " . mysqli_connect_error());
	}
?>