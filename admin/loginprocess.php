<?php
		
	if(!isset($_POST['submit']))
	{
		header("location:login.php");
		exit();
	}

	$email=$_POST['Email'];
	$pass=$_POST['Password'];

	if($email==="hardik1010@gmail.com")
	{
		if($pass==="hardik1010")
		{
			session_start();

			$_SESSION['Username']=$email;
			
			header("location:index.php");
			exit();
		}
	}
	else
	{
		header("location:login.php");
		exit();
	}
?>