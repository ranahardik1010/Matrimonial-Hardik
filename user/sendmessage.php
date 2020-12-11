<?php

	require "conn.php";

	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}
	$email=$_SESSION['Username'];
	
	$qry="SELECT * FROM user WHERE Email='$email'";

	$rs=mysqli_query($conn,$qry);
	$row=mysqli_fetch_assoc($rs);

	$sid=$row['Uid'];
	$rid=$_POST['Id'];
	$msg=$_POST['Message'];
	$isactive=1;

	if($msg=="")
	{
		header("location:friend.php");
		exit();
	}

	$qry1="INSERT INTO Message (Sid,Rid,Message,isactive) VALUES ($sid,$rid,'$msg',$isactive)";
	$rs1=mysqli_query($conn,$qry1);

	if($rs1)
	{
		header("location:friend.php");
		exit();
	}
	else
	{
		echo "failure";
	}
?>
