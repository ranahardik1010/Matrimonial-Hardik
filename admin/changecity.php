<?php
	require 'conn.php';
    
    session_start();

    if(!isset($_SESSION['Username']))
    {
        header("location:login.php");
        exit();
    }

	$id=$_GET['id'];

	$qry1="SELECT * FROM city WHERE Cityid='$id'";
	$rs1=mysqli_query($conn,$qry1);
	$row1=mysqli_fetch_assoc($rs1);

	if($row1['isactive']==1)
	{
		$qry="UPDATE city SET isactive=0 WHERE Cityid='$id'";
	}
	else
	{
		$qry="UPDATE city SET isactive=1 WHERE Cityid='$id'";
	}
	
	$rs=mysqli_query($conn,$qry);

	if($rs)
	{
		header("location:viewcity.php");
		exit();
	}
	else
	{
		echo "failure";
	}
	
?>