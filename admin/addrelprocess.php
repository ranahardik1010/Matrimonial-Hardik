<?php

	require "conn.php";
    
    session_start();

    if(!isset($_SESSION['Username']))
    {
        header("location:login.php");
        exit();
    }

	$relname=$_POST['Religion'];
	$relname1=strtolower($relname);

	$isactive=1;

	$qry1="SELECT Rname FROM religion WHERE Rname='$relname'";
	$rs1=mysqli_query($conn,$qry1);
	$row=mysqli_fetch_assoc($rs1);
	$name=strtolower($row['Rname']);

	if($relname1===$name)
	{
		echo "Religion Name is Already Exist";
		exit();
	}

	$qry="INSERT INTO religion (Rname,isactive) VALUES('$relname',$isactive)";

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