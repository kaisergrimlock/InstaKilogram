<?php 
	session_start();
	$_SESSION['email'];
	session_destroy();
	header('location:/InstaKilogram/index.php');
 ?>