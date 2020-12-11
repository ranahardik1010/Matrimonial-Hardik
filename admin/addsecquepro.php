<?php

	require "conn.php";

    session_start();

    if(!isset($_SESSION['Username']))
    {
        header("location:login.php");
        exit();
    }

	$secque=$_POST['Secque'];
	$isactive=1;

	if($secque=="")
	{
		echo "Enter Security Question ";
		exit();
	}

	$qry1="SELECT Sqname FROM security_que WHERE Sqname='$secque'";
	$rs1=mysqli_query($conn,$qry1);

	if(mysqli_num_rows($rs1)>0)
	{
		echo "Question Already Exist";
		exit();
	}
	
	$qry="INSERT INTO security_que (Sqname,isactive) VALUES('$secque',$isactive)";

	$rs=mysqli_query($conn,$qry);

	if($rs)
	{
		echo "success";
	}
	else
	{
		echo "failure";
	}
?>