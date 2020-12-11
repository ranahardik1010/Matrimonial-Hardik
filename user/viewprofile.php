<?php

	require "conn.php";

	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}

	$username=$_SESSION['Username'];
	$email=$_SESSION['Username'];

	$qry="SELECT * FROM user WHERE Email='$username'";

	$rs=mysqli_query($conn,$qry);

	$row=mysqli_fetch_assoc($rs);

	$stateid=$row['State'];
    $cityid=$row['City'];
    $relid=$row['Religion'];
    $eduid=$row['Education'];
    $occid=$row['Occupation'];
    //echo $row['Image'];

?>

<!DOCTYPE html>

	<head>
		<?php
			require "header.php";
		?>
	</head>
	<body>
		
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
						<li>					
		                        <button  type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                            <i class="icon-bell"></i>
		                                <!-- <span class="count bg-danger">5</span> -->
		                        </button>
		                        <div class="dropdown-menu" aria-labelledby="notification" style="left: 750px;">		                   
		     	                    <?php

		     	                    	require "conn.php";

		     	                    	$qry="SELECT * FROM user WHERE Email='$email'";
		     	                    	$rs=mysqli_query($conn,$qry);
		     	                    	$row=mysqli_fetch_assoc($rs);

		     	                    	$qry1="SELECT * FROM Message WHERE Rid=".$row['Uid'];
		     	                    	$rs1=mysqli_query($conn,$qry1);

		     	                    	if(mysqli_num_rows($rs1))
		     	                    	{
		     	                    		while($row1=mysqli_fetch_assoc($rs1))
		     	                    		{
		     	                    			$qry2="SELECT * FROM user WHERE Uid=".$row1['Sid'];
		     	                    			$rs2=mysqli_query($conn,$qry2);
		     	                    			$row2=mysqli_fetch_assoc($rs2);
		     	                    ?>		
		     	                    			<span><?php echo $row2['First_Name'].":"; ?></span>
		     	                    			<span><?php echo $row1['Message']; ?></span>
		     	                    			<hr>
		     	                    <?php
		     	                    		}
		     	                    	}		     	                    		     	                
		     	                    ?>    
		                        </div>                     		    
							</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<!-- Modal Feedback -->
	<div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h2 class="modal-title text-center" id="exampleModalLabel">Feedback</h2>
	     		</div>
	      		<div class="modal-body">
		      	    <form id="feedbackform" method="post" action="changepassword.php">
		        		<span style="color:black; text-transform: capitalize;">Email</span>
		        		<input type="email" class="form-control" name="Email" value="<?php echo $email;?>" readonly><br>
		        		<span style="color:black; text-transform: capitalize;">Add Feedback</span>
		        		<textarea name="Feedback" class="form-control" rows="4"></textarea>
		        		<hr>
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		       			<button type="submit" class="btn btn-primary" name="submitfb" id="submitfb">Submit</button>
		        	</form>
	      		</div>
	    	</div>
	    </div>
	</div>

	<!-- Modal Complain -->
	<div class="modal fade" id="complain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h2 class="modal-title text-center" id="exampleModalLabel"> Add Complain</h2>
	     		</div>
	      		<div class="modal-body">
		      	    <form id="complainform" method="post" action="changepassword.php">
		        		<span style="color:black; text-transform: capitalize;">Email</span>
		        		<input type="email" class="form-control" name="Email" value="<?php echo $email;?>" readonly><br>
		        		<span style="color:black; text-transform: capitalize;">Add complain</span>
		        		<textarea name="Complain" class="form-control" rows="4"></textarea>
		        		<hr>
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		       			<button type="submit" class="btn btn-primary" name="submitcmp" id="submitcmp">Submit</button>
		        	</form>
	      		</div>
	    	</div>
	    </div>
	</div>

	<!-- Modal Change Password-->
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
				<div class="col-md-12">
					<center>
						<img src="<?php echo $row['Image'] ?>" class="img-thumbnail" style="border-radius: 50%; width:200px;margin-bottom: 3%;height:200px;">
					</center>
				</div>
				<div class="col-lg-12 col-md-6 mt-5 animate-box">
					<form action="editprofile.php" method="post">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="fname">First Name</label>
								<input type="text" class="form-control" value="<?php echo $row['First_Name']?>" readonly>
							</div>
							<div class="col-md-6">
								<label for="lname">Last Name</label>
								<input type="text" class="form-control" value="<?php echo $row['Last_Name']?>"readonly>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="email">Email</label>
								<input type="email" class="form-control" value="<?php echo $row['Email']?>"readonly>
							</div>
							<div class="col-md-6">
								<label for="tel">Phone no</label>
								<input type="text" class="form-control" value="<?php echo $row['Phone']?>"readonly>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<div>
									<label for="message">Gender</label>
								</div>
								<input type="text" class="form-control" 
										<?php
                                        	if($row["Gender"]=="Male")
                                        	{
												echo "value='Male'";
                                        	}
                                        	else
                                        	{
                                        		echo "value='Female'";
                                        	}
                                        ?> readonly>
							</div>
							<div class="col-md-6">
								<label for="subject">DOB</label>
								<input type="text" class="form-control" value="<?php echo $row['DOB']?>"readonly>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<?php

                                    $qry1="SELECT * FROM state WHERE Stid='$stateid'";
                                    $rs1=mysqli_query($conn,$qry1);
                                    $row1=mysqli_fetch_assoc($rs1);
                                ?>
								<label for="email">State</label>
								<input type="email" class="form-control" value="<?php echo $row1['Name']?>"readonly>
							</div>
							<div class="col-md-6">
								<?php

                                    $qry2="SELECT * FROM city WHERE Cityid='$cityid'";
                                    $rs2=mysqli_query($conn,$qry2);
                                    $row2=mysqli_fetch_assoc($rs2);
                                ?>
								<label for="subject">City</label>
								<input type="text" class="form-control" value="<?php echo $row2['Cityname']?>"readonly>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="message">Address</label>
								<textarea cols="30" rows="2" class="form-control" readonly><?php echo $row['Address']?></textarea>
							</div>
							<div class="col-md-6">
									<label for="subject">Postal Code</label>
								<input type="text" class="form-control" value="<?php echo $row['Postal_code']?>"readonly>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<?php

                                    $qry3="SELECT * FROM religion WHERE Rid='$relid'";
                                    $rs3=mysqli_query($conn,$qry3);
                                    $row3=mysqli_fetch_assoc($rs3);
                                ?>
								<label for="email">Religion</label>
								<input type="text" class="form-control" value="<?php echo $row3['Rname']?>"readonly>
							</div>
							<div class="col-md-6">
								<label for="subject">Cast</label>
								<input type="text" class="form-control" value="<?php echo $row['Cast']?>"readonly>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<?php
                                    $qry4="SELECT * FROM education WHERE Eid='$eduid'";
                                    $rs4=mysqli_query($conn,$qry4);
                                    $row4=mysqli_fetch_assoc($rs4);
                                ?>
								<label for="email">Education</label>
								<input type="text" class="form-control" value="<?php echo $row4['Ename']?>"readonly>
							</div>
							<div class="col-md-6">
								<?php
                                    $qry5="SELECT * FROM occupation WHERE Oid='$occid'";
                                    $rs5=mysqli_query($conn,$qry5);
                                    $row5=mysqli_fetch_assoc($rs5);
                                ?>
								<label for="subject">Occupation</label>
								<input type="text" class="form-control" value="<?php echo $row5['Oname']?>"readonly>
							</div>
						</div>

						<div class="form-group text-center">
							<input type="submit" value="Edit Profile" class="btn btn-primary">
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

