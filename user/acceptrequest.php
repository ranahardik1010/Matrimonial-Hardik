<?php

	require "conn.php";

	$sid=$_GET['id'];
	//echo $id;

	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}
	
	$email=$_SESSION["Username"];
	$isactive=1;

	$qry3="SELECT * FROM user WHERE Email='$email'";
	echo $qry3;
	$rs3=mysqli_query($conn,$qry3);
	while($row3=mysqli_fetch_assoc($rs3))
		$rid =$row3['Uid'];
	

	$qry="INSERT INTO friend (User,Friend,isactive) VALUES ($rid,$sid,$isactive)";
	$rs=mysqli_query($conn,$qry);
	if($rs)
	{
		echo "Success";
	}
	else
	{
		echo "Failure";
	}

	$qry1="DELETE FROM request WHERE Reciever='$email' AND Sender=$sid";
	$rs1=mysqli_query($conn,$qry1);
	if($rs1)
	{
		echo "success";
	}
	else
	{
		echo "failure";
	}

	header("location:requestlist.php");
	exit();
	
?>