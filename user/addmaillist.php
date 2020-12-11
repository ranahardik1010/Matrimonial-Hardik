<?php
	
	require 'conn.php';

	$email=$_POST["Email"];
	$isactive=1;

	if($email=="")
	{
		echo "Please, Enter Email Address";
		exit();
	}

	$qry1="SELECT * FROM news_later WHERE Email='$email'";
	$rs1=mysqli_query($conn,$qry1);

	$cnt=mysqli_num_rows($rs1);

	if($cnt==0)
	{
		$qry="INSERT INTO news_later (Email,isactive) VALUES('$email',$isactive)";

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
	}
	else
	{
		echo "success";
	}
?>