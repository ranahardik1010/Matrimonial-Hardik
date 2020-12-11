<?php
	
	$servername="localhost";
	$username="hardik";
	$password="addweb123";
	$dbname="Matrimonial";

	$conn=mysqli_connect($servername,$username,$password);

	if(!$conn)
	{
		die("connection failed".mysqli_connect_error());
	}
	//echo "connected successfully";

	$db=mysqli_select_db($conn,$dbname);

	if($db)
	{
		//echo "databese selected";
	}
	else
	{
		echo "database not selected";
	}
?>