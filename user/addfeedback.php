<?php
	
	require "conn.php";

	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}

	$email=$_SESSION["Username"];
	$feedback=$_POST['Feedback'];
	$isactive=1;

	if($feedback == "")
	{
		echo "Please , Enter All Information";
		exit();
	}

	$res=$conn->query("call addfeedback('$email','$feedback',$isactive)");
	echo "success";

?>