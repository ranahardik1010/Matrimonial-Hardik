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
				<!-- <div class="col-xs-2">
					<div id="fh5co-logo"><a href="index.php"><strong>Wedding.</strong></a></div>
				</div> -->
				<div class="col-xs-12 text-right menu-1">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="about.php">About Us</a></li>
						<li><a href="story.php">Story</a></li>
						<li><a href="contact.php">Contact US</a></li>
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
							<p style="color: white;font-size: 40px;"><b>About Us</b></p>

							<p class="animated fadeInLeftBig" style="text-align:left; color:black;color:black;font-size: 40px;">Best plateform for finding your life partner.</p>			
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

	<div id="fh5co-couple" class="fh5co-section-gray" style="padding-top: 100px;padding-bottom: 30px;">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Hello!</h2>
					<h3>November 28th, 2016 New York, USA</h3>
					<p>We invited you to celebrate our wedding</p>
				</div>
			</div>
			<div class="couple-wrap animate-box">
				<div class="couple-half">
					<div class="groom">
						<img src="images/man2.jpg" alt="groom" class="img-responsive">
					</div>
					<div class="desc-groom">
						<h3>Joefrey Mahusay</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
					</div>
				</div>
				<p class="heart text-center"><i class="icon-heart2"></i></p>
				<div class="couple-half">
					<div class="bride">
						<img src="images/women2.jpg" alt="groom" class="img-responsive">
					</div>
					<div class="desc-bride">
						<h3>Sheila Mahusay</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="fh5co-services" class="fh5co-section-gray" style="padding-top: 30px;">
		<div class="container">
			
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>We Offer Services</h2>
					<p>Pioneered by BharatMatrimony-Elite Matrimony is an exclusive matchmaking service for the rich and affluent. Elite Matrimony focuses on serving the privileged class who are unique in their taste and style.</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span >
							<!-- <i class="icon-couple"></i> -->
							<img src="images/couple.png" style="height: 80px;width: 80px;" >
						</span>
						<div class="feature-copy">
							<h3><b>Elite Matches</b></h3>
							<p>An Elite database of hand-picked rich and affluent profiles from around the world.</p>
						</div>
					</div>
					<hr>
					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<div style="float: left;margin-right: 30px;">
							<!-- <i class="icon-shield"></i> -->
							<img src="images/shield.png" style="height: 80px;width: 80px;" >
						</div>
						<div class="feature-copy">
							<h3><b>Total Confidentiality</b></h3>
							<p>Your privacy is our utmost priority! Your personal details will not be shared without your authorization.</p>
						</div>
					</div>

					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span>
							<img src="images/phone.jpg" style="border-radius: 50%; height: 100px;width: 100px;" >
						</span>

						<div class="feature-copy">
							<h3><b>Personalized Service</b></h3>
							<p>A dedicated Relationship Manager who will focus on finding you the perfect life partner based on your expectations.</p>
						</div>
					</div>

				</div>

				<div class="col-md-6 animate-box">
					<div class="fh5co-video fh5co-bg" style="background-image: url(images/img_bg_3.jpg); ">
						<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video2"></i></a>
						<div class="overlay"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
		$email=$_SESSION['Username'];
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
						<li ><a href="index.php">Home</a></li>
						<li class="active"><a href="about.php">About Us</a></li>
						<li><a href="story.php">Story</a></li>
						<li><a href="searchprofile.php">Search Profile</a></li>
						<li><a href="contact.php">Contact US</a></li>
											
						<li class="has-dropdown">
							<a>My profile</a>
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

	<!-- Modal Change password-->
	<div class="modal fade" id="changepw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h2 class="modal-title text-center" id="exampleModalLabel">Change Password</h2>
	      </div>
	      <div class="modal-body">
	      		
	        <form id="changepwform" method="post" action="changepassword.php">
	        	<span style="color:black; text-transform: capitalize;">Old Password</span>
	        	<input type="password" class="form-control" placeholder="Enter Old Password" name="Oldpassword"><br>
	        	<span style="color:black; text-transform: capitalize;">New Password</span>
	        	<input type="password" class="form-control" placeholder="Enter New Password" name="Password"><br>
	        	<span style="color:black; text-transform: capitalize;">Confirm Password</span>
	        	<input type="password" class="form-control" placeholder="Reenter Password" name="Cpassword">
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
							<p style="color: white;font-size: 40px;"><b>About Us</b></p>

							<p class="animated fadeInLeftBig" style="text-align:left; color:black;color:black;font-size: 40px;">Best plateform for finding your life partner.</p>			
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

	<div id="fh5co-couple" class="fh5co-section-gray" style="padding-top: 100px;padding-bottom: 30px;">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Hello!</h2>
					<h3>November 28th, 2016 New York, USA</h3>
					<p>We invited you to celebrate our wedding</p>
				</div>
			</div>
			<div class="couple-wrap animate-box">
				<div class="couple-half">
					<div class="groom">
						<img src="images/man2.jpg" alt="groom" class="img-responsive">
					</div>
					<div class="desc-groom">
						<h3>Joefrey Mahusay</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
					</div>
				</div>
				<p class="heart text-center"><i class="icon-heart2"></i></p>
				<div class="couple-half">
					<div class="bride">
						<img src="images/women2.jpg" alt="groom" class="img-responsive">
					</div>
					<div class="desc-bride">
						<h3>Sheila Mahusay</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="fh5co-services" class="fh5co-section-gray" style="padding-top: 30px;">
		<div class="container">
			
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>We Offer Services</h2>
					<p>Pioneered by BharatMatrimony-Elite Matrimony is an exclusive matchmaking service for the rich and affluent. Elite Matrimony focuses on serving the privileged class who are unique in their taste and style.</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span >
							<!-- <i class="icon-couple"></i> -->
							<img src="images/couple.png" style="height: 80px;width: 80px;" >
						</span>
						<div class="feature-copy">
							<h3><b>Elite Matches</b></h3>
							<p>An Elite database of hand-picked rich and affluent profiles from around the world.</p>
						</div>
					</div>
					<hr>
					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<div style="float: left;margin-right: 30px;">
							<!-- <i class="icon-shield"></i> -->
							<img src="images/shield.png" style="height: 80px;width: 80px;" >
						</div>
						<div class="feature-copy">
							<h3><b>Total Confidentiality</b></h3>
							<p>Your privacy is our utmost priority! Your personal details will not be shared without your authorization.</p>
						</div>
					</div>

					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span>
							<img src="images/phone.jpg" style="border-radius: 50%; height: 100px;width: 100px;" >
						</span>

						<div class="feature-copy">
							<h3><b>Personalized Service</b></h3>
							<p>A dedicated Relationship Manager who will focus on finding you the perfect life partner based on your expectations.</p>
						</div>
					</div>

				</div>

				<div class="col-md-6 animate-box">
					<div class="fh5co-video fh5co-bg" style="background-image: url(images/img_bg_3.jpg); ">
						<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video2"></i></a>
						<div class="overlay"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

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