<?php
	require 'conn.php';

    session_start();

    if(!isset($_SESSION['Username']))
    {
        header("location:login.php");
        exit();
    }

	$id=$_GET['id'];

	$qry1="SELECT * FROM occupation WHERE Oid='$id'";
	$rs1=mysqli_query($conn,$qry1);
	$row1=mysqli_fetch_assoc($rs1);

	if($row1['isactive']==1)
	{
		$qry="UPDATE occupation SET isactive=0 WHERE Oid='$id'";
	}
	else
	{
		$qry="UPDATE occupation SET isactive=1 WHERE Oid='$id'";
	}
	
	$rs=mysqli_query($conn,$qry);

	if($rs)
	{
		header("location:viewoccupation.php");
		exit();
	}
	else
	{
		echo "failure";
	}
	
?>