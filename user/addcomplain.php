<?php
	
	require "conn.php";

	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}

	$email=$_SESSION["Username"];
	$complain=$_POST['Complain'];
	$isactive=1;

	if($complain == "")
	{
		echo "Please , Enter All Information";
		exit();
	}

	$res=$conn->query("call addcomplain('$email','$complain',$isactive)");
	echo "success";

?>