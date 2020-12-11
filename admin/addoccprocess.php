<?php

	require "conn.php";
    
    session_start();

    if(!isset($_SESSION['Username']))
    {
        header("location:login.php");
        exit();
    }

	$occname=$_POST['Occupation'];
	$occname1=strtolower($occname);

	$isactive=1;

	$qry1="SELECT Oname FROM occupation WHERE Oname='$occname'";
	$rs1=mysqli_query($conn,$qry1);
	$row=mysqli_fetch_assoc($rs1);
	$name=strtolower($row['Oname']);

	if($occname1===$name)
	{
		echo "Occupation Name is Already Exist";
		exit();
	}

	$qry="INSERT INTO occupation (Oname,isactive) VALUES('$occname',$isactive)";

	$rs=mysqli_query($conn,$qry);

	if($rs)
	{
		echo "success";
		exit();
	}
	else
	{
		echo "failure";
		exit();
	}
?>