<?php
	
	require "conn.php";
	
	if(!isset($_POST['submit']))
	{
		header("location:login.php");
		exit();
	}

	session_start();

	$username=$_POST['username'];
	$password=$_POST['password'];

	$qry="SELECT * FROM user WHERE Email='$username' AND isactive=1";
	//echo $qry;

	$rs=mysqli_query($conn,$qry);

	$cnt=mysqli_num_rows($rs);

	if($cnt==1)
	{
		while($row=mysqli_fetch_assoc($rs))
		{	
			
			if($row['Password']==$password)
			{
				if(isset($_POST['Remember']))
				{
					setcookie("user",$username,time() + (86400*30), "/");
					setcookie("pass",$password,time() + (86400*30), "/");
				}

				$_SESSION['Username']=$username;
				header("location:index.php");
				exit();
			}
			else
			{
				header("location:login.php?msg=invalidpass");
				exit();
			}
		}
	}
	else
	{
		header("location:login.php?msg1=invalidusename");
		exit();
	}
?>