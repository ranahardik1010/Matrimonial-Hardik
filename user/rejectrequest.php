<?php

	require "conn.php";

	$id=$_GET['id'];
	//echo $id;

	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}
	
	$email=$_SESSION["Username"];

	$qry1="DELETE FROM request WHERE Reciever='$email' AND Sender=$id";

	$rs1=mysqli_query($conn,$qry1);
	if($rs1)
	{
		echo "success";
		header("location:requestlist.php");
		exit();
	}
	else
	{
		echo "failure";
	}	
?>