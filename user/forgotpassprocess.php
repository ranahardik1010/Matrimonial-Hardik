<?php

	require "conn.php";

	$email=$_POST['Email'];
	$sq=$_POST['Securityque'];
	$ans=$_POST['Answer'];

	if($sq==0 || $email=="" ||$ans=="")
	{
		echo "Please, Enter All the Details";
		exit();
	}

	$qry="SELECT * FROM user WHERE Email='$email'";
	$rs=mysqli_query($conn,$qry);
	$row=mysqli_fetch_assoc($rs);

	if(mysqli_num_rows($rs)>0)
	{
		
		if($row['Securityans']==$ans)
		{
			session_start();
			$_SESSION['email']=$email;

			echo "success";
			exit();
		}
		else
		{
			echo "Invalid Answer";
			exit();
		}
	}
	else
	{
		echo "Invalid Email Address";
		exit();
	}
?>