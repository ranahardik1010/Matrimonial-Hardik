<?php

	require "conn.php";
    
    session_start();

    if(!isset($_SESSION['Username']))
    {
        header("location:login.php");
        exit();
    }

	$eduname=$_POST['Education'];
	$eduname1=strtolower($eduname);

	$isactive=1;

	$qry1="SELECT Ename FROM education WHERE Ename='$eduname'";
	$rs1=mysqli_query($conn,$qry1);
	$row=mysqli_fetch_assoc($rs1);
	$name=strtolower($row['Ename']);

	if($eduname1===$name)
	{
		echo "Education Name is Already Exist";
		exit();
	}

	$qry="INSERT INTO education (Ename,isactive) VALUES('$eduname',$isactive)";

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