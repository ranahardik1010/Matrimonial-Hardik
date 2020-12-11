<?php
	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}

	/*unset($_SESSION["Username"]);*/

	session_destroy();
	
	header("location:index.php?lgout=success");
	exit();
?>