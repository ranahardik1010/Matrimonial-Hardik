<?php

	require "conn.php";

	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}

	$username=$_SESSION['Username'];
	$qry="SELECT * FROM user WHERE Email='$username'";
	$rs=mysqli_query($conn,$qry);
	$row=mysqli_fetch_assoc($rs);


	$stateid=$row['State'];
	$qry3="SELECT * FROM state Where Stid='$stateid'";
	$rs3=mysqli_query($conn,$qry3);
	$row3=mysqli_fetch_assoc($rs3);
	$statename=$row3['Name'];

    $cityid=$row['City'];
	$qry2="SELECT * FROM city Where Cityid='$cityid'";
	$rs2=mysqli_query($conn,$qry2);
	$row2=mysqli_fetch_assoc($rs2);
	$cityname=$row2['Cityname'];

	$relid=$row['Religion'];
	$qry5="SELECT * FROM religion Where Rid='$relid'";
	$rs5=mysqli_query($conn,$qry5);
	$row5=mysqli_fetch_assoc($rs5);
	$relname=$row5['Rname'];

	$occid=$row['Occupation'];
	$qry6="SELECT * FROM occupation Where Oid='$occid'";
	$rs6=mysqli_query($conn,$qry6);
	$row6=mysqli_fetch_assoc($rs6);
	$occname=$row6['Oname'];

	$eduid=$row['Education'];
	$qry7="SELECT * FROM education Where Eid='$eduid'";
	$rs7=mysqli_query($conn,$qry7);
	$row7=mysqli_fetch_assoc($rs7);
	$eduname=$row7['Ename'];
                           
?>

<!DOCTYPE html>

	<head>
		<?php
			require "header.php";
		?>
	</head>
	<body>
		<?php
		if(isset($_GET['msg']))
            {
                echo "<script>";
                echo '
                swal({
                    icon:"success",
                    title: "Profile Updated Successfully ",
                    type: "success",
                    html: true
                });';
                echo "</script>";
            }
            ?>
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.php"><strong>Wedding.</strong></a></div>
				</div> 
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About Us</a></li>
						<li><a href="story.php">Story</a></li>
						<li><a href="searchprofile.php">Search Profile</a></li>
						<li><a href="contact.php">Contact US</a></li>
											
						<li class="has-dropdown active">
							<a href="#">My profile</a>
							<ul class="dropdown">
								<li><a href="viewprofile.php">View Profile</a></li>
								<li><a href="" data-toggle="modal" data-target="#feedback">Feedback</a></li>
								<li><a href="" data-toggle="modal" data-target="#complain">Complain</a></li>
								<li><a href="requestlist.php">Request List</a></li>
								<li><a href="friend.php">Friend Circle</a></li>
								<li><a href="" data-toggle="modal" data-target="#changepw">Change password</a></li>
								<li><a href="logout.php">Log out</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<!-- Modal for password change -->
	<div class="modal fade" id="changepw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h2 class="modal-title text-center" id="exampleModalLabel">Change Password</h2>
	      </div>
	      <div class="modal-body">
	        <form id="changepwform" method="post" action="changepassword.php">
	        	<span style="color:black; text-transform: capitalize;">Old Password</span>
	        	<input type="password" class="form-control" placeholder="Enter Old Password" name="Oldpassword" required><br>
	        	<span style="color:black; text-transform: capitalize;">New Password</span>
	        	<input type="password" class="form-control" placeholder="Enter New Password" name="Password" required><br>
	        	<span style="color:black; text-transform: capitalize;">Confirm Password</span>
	        	<input type="password" class="form-control" placeholder="Reenter Password" name="Cpassword" required>
	        	<hr>
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	       		<button type="submit" class="btn btn-primary" name="submitpw" id="submitpw">Submit</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img4.jpg);height: 100px;">
		<div class="overlay"></div>
	</header>

	<div class="fh5co-section" style="padding-bottom: 40px;">
		<div class="container">
			<div class="row" style="border:2px solid lightgrey; padding:10px;">
				<div class="col-lg-12 col-md-6 mt-5 animate-box">
					<form action="editprofilepro.php" method="post" id="editprofileform" enctype="multipart/form-data">

						<div class="row form-group">
							<div class="col-md-12">
								<center>
									<img src="<?php echo $row['Image'] ?>" class="img-thumbnail" style="border-radius: 50%; width:200px;margin-bottom: 3%;height:200px;">

									 <input type="file" name="fileToUpload" id="fileToUpload">
								</center>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<input type="hidden" id="uid" name="Uid" class="form-control" value="<?php echo $row['Uid']?>">
							</div>
							<div class="col-md-6">
								<label for="fname">First Name</label>
								<input type="text" id="fname" name="Fname" class="form-control" value="<?php echo $row['First_Name']?>">
							</div>
							<div class="col-md-6">
								<label for="lname">Last Name</label>
								<input type="text" id="lname" name="Lname" class="form-control" value="<?php echo $row['Last_Name']?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="email">Email</label>
								<input type="email" id="email" name="Email" class="form-control" value="<?php echo $row['Email']?>"readonly>
							</div>
							<div class="col-md-6">
								<label for="subject">Phone no</label>
								<input type="text" id="subject" name="Phone" class="form-control" value="<?php echo $row['Phone']?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<div>
									<label for="message">Gender</label>
								</div>
								<input type="radio" name="Gender" value="Male"
										<?php
                                        	if($row['Gender']=='Male')
                                        	{
												echo 'checked';
                                        	}
                                        ?>
                                >Male
								<input type="radio" name="Gender" value="Female"
									<?php
                                        if($row['Gender']=='Female')
                                       	{
											echo 'checked';
                                       	}
                                    ?>
                                >Female									                          
							</div>
							<div class="col-md-6">
								<label for="subject">Age</label>
								<input type="date" id="subject" name="DOB" class="form-control" value="<?php echo $row['DOB']?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								
								<label for="email">State</label>
								<select class="form-control" name="State" id="statename">
					               	<?php
					                	$qry1="SELECT * FROM state where isactive=1";
					                	$rs1=mysqli_query($conn,$qry1);

					                	if(mysqli_num_rows($rs1)>0)
					                	{
					                		echo "<option value=0 selected disabled>------SELECT STATE------</option>";
					                		while($row1=mysqli_fetch_assoc($rs1))
					                		{

					               	?>
						                	<option value="<?php echo $row1['Stid']?>"
						                		<?php
						                			if($statename==$row1['Name'])
						                			{
						                				echo "selected";
						                			}
						                		?>
					                		><?php echo $row1['Name']?></option>
					                <?php
					                		}
					                	}
					                ?>					               
					            </select>
							</div>
							<div class="col-md-6">
								<label for="subject">City</label>
								<select class="form-control" name="City" id="cityname">	
					                <option value="0" selected disabled>------SELECT CITY------</option>
					                <?php
					                	$qry4="SELECT * FROM city where Stid='$stateid' and isactive=1";
					                	$rs4=mysqli_query($conn,$qry4);

					                	if(mysqli_num_rows($rs4)>0)
					                	{					                		
					                		while($row4=mysqli_fetch_assoc($rs4))
					                		{

					               	?>
						                	<option value="<?php echo $row4['Cityid']?>"
						                		<?php
						                			if($cityname==$row4['Cityname'])
						                			{
						                				echo "selected";
						                			}
						                		?>
					                		><?php echo $row4['Cityname']?></option>
					                <?php
					                		}
					                	}
					                ?>			
					            </select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="message">Address</label>
								<textarea name="Address" id="message" cols="30" rows="2" class="form-control"><?php echo $row['Address']?></textarea>
							</div>
							<div class="col-md-6">
									<label for="subject">Postal Code</label>
								<input type="text" id="subject" name="Postal" class="form-control" value="<?php echo $row['Postal_code']?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="email">Religion</label>
								<select class="form-control" name="Religion">
									<?php
					                	$qry8="SELECT * FROM religion where isactive=1";
					                	$rs8=mysqli_query($conn,$qry8);

					                	if(mysqli_num_rows($rs8)>0)
					                	{
					                		echo "<option value=0 selected disabled>------Select Religion------</option>";
					                		while($row8=mysqli_fetch_assoc($rs8))
					                		{

					               	?>
						                	<option value="<?php echo $row8['Rid']?>"
						                		<?php
						                			if($relname==$row8['Rname'])
						                			{
						                				echo "selected";
						                			}
						                		?>
					                		><?php echo $row8['Rname']?></option>
					                <?php
					                		}
					                	}
					                ?>
					            </select>
							</div>
							<div class="col-md-6">
								<label for="subject">Cast</label>
								<input type="text" id="subject" name="Cast" class="form-control" value="<?php echo $row['Cast']?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="email">Education</label>
								<select class="form-control" name="Education">
					                <?php
					                	$qry9="SELECT * FROM education where isactive=1";
					                	$rs9=mysqli_query($conn,$qry9);

					                	if(mysqli_num_rows($rs9)>0)
					                	{
					                		echo "<option value=0 selected disabled>------Select Religion------</option>";
					                		while($row9=mysqli_fetch_assoc($rs9))
					                		{

					               	?>
						                	<option value="<?php echo $row9['Eid']?>"
						                		<?php
						                			if($eduname==$row9['Ename'])
						                			{
						                				echo "selected";
						                			}
						                		?>
					                		><?php echo $row9['Ename']?></option>
					                <?php
					                		}
					                	}
					                ?>
					            </select>
							</div>
							<div class="col-md-6">
								<label for="subject">Occupation</label>
								<select class="form-control" name="Occupation">
					                <?php
					                	$qry10="SELECT * FROM occupation where isactive=1";
					                	$rs10=mysqli_query($conn,$qry10);

					                	if(mysqli_num_rows($rs10)>0)
					                	{
					                		echo "<option value=0 selected disabled>------Select Religion------</option>";
					                		while($row10=mysqli_fetch_assoc($rs10))
					                		{

					               	?>
						                	<option value="<?php echo $row10['Oid']?>"
						                		<?php
						                			if($occname==$row10['Oname'])
						                			{
						                				echo "selected";
						                			}
						                		?>
					                		><?php echo $row10['Oname']?></option>
					                <?php
					                		}
					                	}
					                ?>
					            </select>
							</div>
						</div>

						<div class="form-group text-center">
							<input type="submit" value="Update" name="submiteprofile" id="submiteprofile" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
		</div>
	</div>
	<hr>

	<?php
		require "footer.php";
	?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	</body>
</html>

