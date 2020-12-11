<?php

	require "conn.php";

	$id=$_GET['id'];

	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}
	
	$email=$_SESSION["Username"];
	
	$qry="SELECT * FROM user WHERE Email='$email'";
	$rs=mysqli_query($conn,$qry);
	$row=mysqli_fetch_assoc($rs);
	
	$uid=$row['Uid'];


	$qry1="DELETE FROM friend WHERE User=$uid AND Friend=$id OR User=$id AND Friend=$uid ";
	$rs1=mysqli_query($conn,$qry1);
	if($rs1)
	{
		echo "success";
	}
	else
	{
		echo "failure";
	}
	
	header("location:friend.php");
	exit();
	
?>