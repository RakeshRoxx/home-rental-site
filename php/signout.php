<?php 
	session_start();
	session_unset();
	session_destroy();
	// echo $_SESSION['email'];
	header("Location:../index.php");
	exit();
 ?>