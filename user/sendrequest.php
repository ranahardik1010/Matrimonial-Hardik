<?php

	require "conn.php";

	//$id=$_GET['id'];
	//echo $id."<br>";

	$rid=$_GET['rid'];
	//echo $rid."<br>";

	$eid=$_GET['eid'];
	//echo $eid."<br>";

	$aid=$_GET['aid'];
	//echo $aid."<br>";


	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}

	$S_email=$_SESSION['Username'];

	$qry1="SELECT * FROM user WHERE Email='$S_email'";
	$rs1=mysqli_query($conn,$qry1);
	$row1=mysqli_fetch_assoc($rs1);
	$Sid=$row1['Uid'];


	$id=$_GET['id'];

	$qry="SELECT * FROM user WHERE Uid='$id'";
	$rs=mysqli_query($conn,$qry);
	$row=mysqli_fetch_assoc($rs);

	$R_email=$row['Email'];
	$isactive=1;

	$qry3="SELECT * FROM request WHERE Sender=$Sid AND Reciever='$R_email'";
	//echo $qry3;

	$rs3=mysqli_query($conn,$qry3);

	$cnt=mysqli_num_rows($rs3);

	if($cnt==0)
	{
		$qry2="INSERT INTO request (Sender,Reciever,isactive) VALUES ($Sid,'$R_email',$isactive)";
		$rs2=mysqli_query($conn,$qry2);
		if($rs2)
		{
			header("location:searchprofile.php?rid=$rid&&eid=$eid&&aid=$aid&&ok=true");
			exit();
		}
		else
		{
			echo "Failure";
		}
	}
	else
	{
		header("location:searchprofile.php?rid=$rid&&eid=$eid&&aid=$aid&&ok=true");
		exit();
	}	
?>