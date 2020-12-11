<?php

	require "conn.php";

	session_start();

	$email=$_SESSION['Username'];
	//echo $email;


	/*File Upload*/

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

//echo $_FILES["fileToUpload"]["name"];

//echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


	if($_FILES["fileToUpload"]["name"]=="") 
	{
		require "conn.php";
		$q="SELECT * FROM user WHERE Email='$email'";
		//echo $q;
		$rq=mysqli_query($conn,$q);
		$rowr=mysqli_fetch_assoc($rq);

		$target_file=$rowr['Image'];
	}
	else
	{
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  	if($check !== false) 
	  	{
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
	 	}
	 	else
	 	{
	    	echo "File is not an image.";
	    	$uploadOk = 0;
	  	}
	}

if ($uploadOk == 0) 
{
  	echo "Sorry, your file was not uploaded.";
  	exit();
} 
else 
{
	//echo $target_file;
  	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
  	{
   		 echo "success";
 	}
}

//---------------------------------------------------
 	$fname=$_POST['Fname'];
	$lname=$_POST['Lname'];
	$phone=$_POST["Phone"];
	$dob=$_POST["DOB"];
	$gender=$_POST["Gender"];
	$img=$target_file;

	$state=$_POST["State"];
	$city=$_POST["City"];
	$address=$_POST["Address"];
	$postal=$_POST["Postal"];

	$religion=$_POST["Religion"];
	$cast=$_POST["Cast"];
	$education=$_POST["Education"];
	$occupation=$_POST["Occupation"];

	$isactive=1;

	$qry="UPDATE user SET First_Name='$fname',Last_Name='$lname',Phone='$phone',Gender='$gender',Image='$img',DOB='$dob',State=$state,City=$city,Address='$address',Postal_code='$postal',Religion=$religion,Cast='$cast',Education=$education,Occupation=$occupation WHERE Email='$email'";

	$rs=mysqli_query($conn,$qry);

	if($rs)
	{
		echo "success";
		header("location:editprofile.php?msg=true");
		exit();
	}

	else
		echo "failure";
?>