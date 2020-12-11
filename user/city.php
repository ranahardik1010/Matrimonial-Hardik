<?php

	require 'conn.php';

	$id=$_POST['id'];

	$qry="SELECT * FROM city WHERE Stid=$id";

	$rs=mysqli_query($conn,$qry);

	if(mysqli_num_rows($rs)>0)
	{
		echo "<option value='0' disabled selected>------SELECT CITY------</option>";

		while($row=mysqli_fetch_assoc($rs))
		{
			echo "<option value='".$row['Cityid']."'>".$row['Cityname']."</option>";
		}
	}
?>