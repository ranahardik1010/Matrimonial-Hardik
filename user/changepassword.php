<?php
	
	require "conn.php";

	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}

	$email=$_SESSION["Username"];

	$oldpass=$_POST['Oldpassword'];
	$pass=$_POST['Password'];
	$cpass=$_POST['Cpassword'];

	if($oldpass == "" || $pass == "" || $cpass == "")
	{
		echo "Please , Enter All Information";
		exit();
	}

	$qry="SELECT Password FROM user WHERE Email='".$email."'";

	$rs=mysqli_query($conn,$qry);
	
	$row=mysqli_fetch_assoc($rs);

	$orpass=$row['Password'];

	if($orpass!=$oldpass)
	{
		echo "Please, Enter correct old password ";
		exit();
	}

	if($pass!=$cpass)
	{
		echo "New Password and Confirm Password must be same";
		exit();
	}

	$qry2="UPDATE user SET Password='".$pass."' WHERE Email='".$email."'";

	$rs2=mysqli_query($conn,$qry2);

	echo "success";
	exit();

?>