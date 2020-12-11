<?php

	require "conn.php";
    
    session_start();

    if(!isset($_SESSION['Username']))
    {
        header("location:login.php");
        exit();
    }

	$cityname=$_POST['Cityname'];
	$cityname1=strtolower($cityname);

	$stid=$_POST['Statename'];
	$isactive=1;

	if($cityname=="")
	{
		echo "Please, Enter City Name ";
		exit();
	}
	if($stid==0)
	{
		echo "Please, Select State Name";
		exit();
	}

	$qry1="SELECT Cityname FROM city WHERE Cityname='$cityname'";
	$rs1=mysqli_query($conn,$qry1);
	$row=mysqli_fetch_assoc($rs1);
	$name=strtolower($row['Cityname']);

	if($cityname1===$name)
	{
		echo "City Name is Already Exist";
		exit();
	}

	$qry="INSERT INTO city (Stid,Cityname,isactive) VALUES($stid,'$cityname',$isactive)";

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