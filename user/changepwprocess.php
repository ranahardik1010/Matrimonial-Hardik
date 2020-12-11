<?php
	
	require "conn.php";

	session_start();

	if(!isset($_SESSION['email']))
	{
		header("location:login.php");
		exit();
	}

	$email=$_SESSION["email"];

	$pass=$_POST['Password'];
	$cpass=$_POST['Cpassword'];

	if($pass == "" || $cpass == "")
	{
		echo "Please , Enter All Information";
		exit();
	}

	if($pass!=$cpass)
	{
		echo "New Password and Confirm Password must be same";
		exit();
	}

	$qry="UPDATE user SET Password='".$pass."' WHERE Email='".$email."'";

	$rs=mysqli_query($conn,$qry);

	session_destroy();
	session_unset();

	echo "success";
	exit();

?>