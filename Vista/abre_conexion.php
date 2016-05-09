<?php 
	$link = mysqli_connect('localhost','root', 'rodrigo10', 'mydb');
	if (!$link) {
    	die("Connection failed: " . mysqli_connect_error());
	}
?>