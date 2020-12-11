<?php
	
	require 'conn.php';

	$fname=$_POST["Fname"];
	$lname=$_POST["Lname"];
	$email=$_POST["Email"];
	$subject=$_POST["Subject"];
	$message=$_POST["Message"];
	$isactive=1;


	if($fname=="" || $lname=="" || $email=="" || $subject=="" || $message=="")
	{
		echo "Please, Enter All the Information";
		exit();
	}

	$qry="INSERT INTO contact_inq (First_Name,Last_Name,Email,Subject,Message,isactive) VALUES('$fname','$lname','$email','$subject','$message',$isactive)";

		//echo $qry;

		$rs=mysqli_query($conn,$qry);

		if($rs)
		{
			echo "success";
			exit();
			//header("location:contact.php");
		}
		else
		{
			echo "failure";
			exit();
		}
?>