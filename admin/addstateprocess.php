<?php

	require "conn.php";
    
    session_start();

    if(!isset($_SESSION['Username']))
    {
        header("location:login.php");
        exit();
    }

	$statename=$_POST['Statename'];
	$statename1=strtolower($statename);
	$isactive=1;

	if($statename=="")
	{
		echo "Enter State Name ";
		exit();
	}

	$qry1="SELECT Name FROM state WHERE Name='$statename'";
	$rs1=mysqli_query($conn,$qry1);
	$row=mysqli_fetch_assoc($rs1);
	$name=strtolower($row['Name']);

	if($statename1===$name)
	{
		echo "State Name is Already Exist";
		exit();
	}
	
	$qry="INSERT INTO state (Name,isactive) VALUES('$statename',$isactive)";

	$rs=mysqli_query($conn,$qry);

	if($rs)
	{
		echo "success";
		exit();
	}
	else
	{
		echo "failure";
	}
?>