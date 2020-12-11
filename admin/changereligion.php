<?php
	require 'conn.php';
    
    session_start();

    if(!isset($_SESSION['Username']))
    {
        header("location:login.php");
        exit();
    }

	$id=$_GET['id'];

	$qry1="SELECT * FROM religion WHERE Rid='$id'";
	$rs1=mysqli_query($conn,$qry1);
	$row1=mysqli_fetch_assoc($rs1);

	if($row1['isactive']==1)
	{
		$qry="UPDATE religion SET isactive=0 WHERE Rid='$id'";
	}
	else
	{
		$qry="UPDATE religion SET isactive=1 WHERE Rid='$id'";
	}
	
	$rs=mysqli_query($conn,$qry);

	if($rs)
	{
		header("location:viewreligion.php");
		exit();
	}
	else
	{
		echo "failure";
	}
	
?>