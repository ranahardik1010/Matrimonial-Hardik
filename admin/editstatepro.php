<?php

	require "conn.php";
    
    $id=$_POST['id'];
    //echo $id;

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
		header("location:viewstate.php");
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
	
	$qry="UPDATE FROM state SET Name='$statename' WHERE Stid=$id";
	echo $qry;

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