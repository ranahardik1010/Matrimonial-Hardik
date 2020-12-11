<?php

	session_start();

	if(!isset($_SESSION['Username']))
	{
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
				<div class="row" style="margin-top: -20px;">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.php"><strong>Wedding.</strong></a></div>
					</div>
					<div>
						<ul class=" navbar-right">
							<li><a href="reg.php"><span class=" btn btn-primary">Sign Up</span> </a></li>
							<li><a href="login.php"><span class=" btn btn-primary"> Login</span></a></li>
						</ul>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 text-right menu-1">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="story.php">Story</a></li>
							<li class="active"><a href="contact.php">Contact US</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>


	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img4.jpg);">
		<div class="overlay"></div>
		<div class="fh5co-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Contact Us</h1>
						</div>
					</div>
					<div class="arrow">
			            <span></span>
			            <span></span>
			            <span></span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="fh5co-section fh5co-section-gray" style="padding-bottom: 30px;">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-push-6 animate-box">
					<h3>Get In Touch</h3>
					<form id="contactinqform" method="post">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="fname">First Name</label>
								<input type="text" id="fname" name="Fname" class="form-control" placeholder="Your firstname">
							</div>
							<div class="col-md-6">
								<label for="lname">Last Name</label>
								<input type="text" id="lname" name="Lname" class="form-control" placeholder="Your lastname">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="email" id="email" name="Email" class="form-control" placeholder="Your email address">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="subject">Subject</label>
								<input type="text" id="subject" name="Subject" class="form-control" placeholder="Your subject of this message">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Message</label>
								<textarea name="Message" id="message" cols="30" rows="3" class="form-control" placeholder="Write us something"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" id="contactinq" value="Send Message" class="btn btn-primary">
						</div>

					</form>		
				</div>
				<div class="col-md-5 col-md-pull-5 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>Contact Information</h3>
						<ul>
							<li class="address">705, Silicon Tower Off C.G. <br>Law Garden, Ahmedabad</li>
							<li class="phone"><a href="tel://8511034838">+91 8511034838</a></li>
							<li class="email"><a href="mailto:wedding@gmail.com">wedding@gmail.com</a></li>
						</ul>
					</div>
				</div>
			</div>			
		</div>
	</div>

	<!-- <div id="map" class="fh5co-map position-relative">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d917.7157313799818!2d72.66414619358146!3d23.065486457079388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e8729a33a109b%3A0xeacd2d2781529fd3!2zMjPCsDAzJzU2LjEiTiA3MsKwMzknNTIuOSJF!5e0!3m2!1sen!2sin!4v1555750281600!5m2!1sen!2sin" class="col-lg-12" frameborder="0" alternative="Please, Turn On The Network Connection" height="500" style="border:0" allowfullscreen></iframe>
		
	</div> -->
		<!-- END map -->

	<?php
		require "footer.php";
	?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	</body>
</html>

<?php
	}
	else
	{
		require "conn.php";

		$email=$_SESSION['Username'];

		$qry="SELECT * FROM user Where Email='$email'";
		$rs=mysqli_query($conn,$qry);
		$row=mysqli_fetch_assoc($rs);
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
						<li class="active"><a href="contact.php">Contact US</a></li>
						<li class="has-dropdown">
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

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img4.jpg);">
		<div class="overlay"></div>
		<div class="fh5co-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Contact Us</h1>
						</div>
					</div>
					<div class="arrow">
			            <span></span>
			            <span></span>
			            <span></span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="fh5co-section fh5co-section-gray" style="padding-bottom: 30px;">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-push-6 animate-box">
					<h3>Get In Touch</h3>
					<form  method="post" id="contactinqform">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="fname">First Name</label>
								<input type="text" id="fname" name="Fname" class="form-control" value="<?php
								echo $row['First_Name'];?>" readonly>
							</div>
							<div class="col-md-6">
								<label for="lname">Last Name</label>
								<input type="text" id="lname" name="Lname" class="form-control" value="<?php
								echo $row['Last_Name'];?>" readonly>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="email" id="email" name="Email" class="form-control" value="<?php
								echo $row['Email'];?>" readonly>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="subject">Subject</label>
								<input type="text" id="subject" name="Subject" class="form-control" placeholder="Your subject of this message" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Message</label>
								<textarea name="Message" id="message" cols="30" rows="3" class="form-control" placeholder="Write us something" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" id="contactinq" class="btn btn-primary">
						</div>

					</form>		
				</div>
				<div class="col-md-5 col-md-pull-5 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>Contact Information</h3>
						<ul>
							<li class="address">705, Silicon Tower Off C.G. <br>Law Garden, Ahmedabad</li>
							<li class="phone"><a href="tel://8511034838">+91 8511034838</a></li>
							<li class="email"><a href="mailto:wedding@gmail.com">wedding@gmail.com</a></li>
						</ul>
					</div>

				</div>
			</div>
			
		</div>
	</div>

	<!-- <div id="map" class="fh5co-map"></div> -->
		<!-- END map -->

	<?php
		require "footer.php";
	?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	</body>
</html>
<?php
	}
?>
