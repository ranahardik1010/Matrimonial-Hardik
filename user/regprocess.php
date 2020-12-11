<?php
	
	require 'conn.php';
	
	session_start();

	if(!isset($_POST['submit']))
	{
		header("location:login.php");
		exit();
	}

	$fname=$_POST["Fname"];
	$lname=$_POST["Lname"];
	$phone=$_POST["Phone"];
	$email=$_POST["Email"];
	$dob=$_POST["DOB"];
	$gender=$_POST["Gender"];
	$image="upload/avtar.png";

	$state=$_POST["State"];
	$city=$_POST["City"];
	$address=$_POST["Address"];
	$postal=$_POST["Postal"];

	$religion=$_POST["Religion"];
	$cast=$_POST["Cast"];
	$education=$_POST["Education"];
	$occupation=$_POST["Occupation"];

	$password=$_POST["Password"];
	$cpassword=$_POST["Cpassword"];
	$squestion=$_POST['Question'];
	$answer=$_POST['Answer'];

	$isactive=1;

	$q="SELECT * FROM user WHERE email='".$email."'";
	$r=mysqli_query($conn,$q);

	if(mysqli_num_rows($r)>0)
	{
		header("location:reg.php?msg=true");
		exit();
	}

	if($password!=$cpassword)
	{
		header("location:reg.php?equal=false");
		exit();
	}

	$res=$conn->query("call reg('$fname','$lname','$email','$phone','$gender','$image','$password','$dob',$state,$city,'$address','$postal',$religion,'$cast',$education,$occupation,$squestion,'$answer',$isactive)");

		if($res)
		{	
			$_SESSION["Username"]=$email;

			header("location:index.php");
			exit();
		}
		else
		{
			echo "failure";
		}	
	
?>