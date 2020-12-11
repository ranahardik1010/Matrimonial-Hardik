<?php
	require 'conn.php';
    
    session_start();

    if(!isset($_SESSION['Username']))
    {
        header("location:login.php");
        exit();
    }

	$id=$_GET['id'];


	$qry1="SELECT * FROM user WHERE Uid='$id'";
	$rs1=mysqli_query($conn,$qry1);
	$row1=mysqli_fetch_assoc($rs1);

	if($row1['isactive']==1)
	{
		$qry="UPDATE user SET isactive=0 WHERE Uid='$id'";
	}
	else
	{
		$qry="UPDATE user SET isactive=1 WHERE Uid='$id'";
	}
	
	$rs=mysqli_query($conn,$qry);

	if($rs)
	{
		header("location:viewuser.php");
		exit();
	}
	else
	{
		echo "failure";
	}
	
?>