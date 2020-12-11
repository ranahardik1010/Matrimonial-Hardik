<?php

	require "conn.php";
	
	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}

	$email=$_SESSION['Username'];

	$qry="SELECT * FROM user WHERE Email='$email'";
	$rs=mysqli_query($conn,$qry);
	while($row=mysqli_fetch_assoc($rs))
		$rid =$row['Uid'];

	//echo $rid;
	
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

	

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_1.jpg);height: 100px;">
		<div class="overlay">
		</div>
	</header>

			 <?php
 			
                $qry="SELECT * FROM friend WHERE User =$rid OR Friend= $rid ";
                //echo $qry;
                $rs=mysqli_query($conn,$qry);
                                          
                if(mysqli_num_rows($rs)>0)
                {
                    while($row=mysqli_fetch_assoc($rs))
                    {
                    	if($row['Friend']==$rid)
                    	{
                    		 $qry1="SELECT * FROM user WHERE Uid=".$row['User'];
                    	}
                    	elseif($row['User']==$rid)
                    	{
                    		 $qry1="SELECT * FROM user WHERE Uid=".$row['Friend'];
                    	}
			           
				        $rs1=mysqli_query($conn,$qry1);

				        while($row1=mysqli_fetch_assoc($rs1))
		                {
            ?>                                         
                <div class="row">
					<div class="col-md-12">
                        <div class="text-center">   
                        	<div> 
                            	<img src="<?php echo $row1['Image'];?>" style="height: 80px;width: 80px;">
                        	</div>               
                        	<div>           
	                        	<div style="font-size: 20px;font: bold;">                        		
	                        		<span><?php echo $row1['First_Name']; ?></span>
	                        		<span><?php echo $row1['Last_Name']; ?></span>
	                        	</div>
	                        	<div>
				          			<a href="viewpartner.php?id=<?php echo $row1["Uid"]; ?>"><input type="button" class="btn btn-primary" name="" value="View Profile"></a>

				          			<a href="unfriend.php?id=<?php echo $row1["Uid"]; ?>"><input type="button" class="btn btn-primary" name="" value="Unfriend"></a>

									<button  type="button" class="btn btn-primary" id="notification" data-toggle="modal" data-target="#message">
		                            <i class="icon-message"></i>
		                                <!-- <span class="count bg-danger">5</span> -->
		                        	</button>

				                        <!-- Modal Message -->

				                        <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-body">
		      	    <form id="msgform" method="post" action="sendmessage.php">
		        		<input type="text" name="Id" value="<?php echo $row1['Uid'];?>"hidden>
		        		<span style="color:black; text-transform: capitalize;">Add Message</span>
		        		<textarea name="Message" class="form-control" rows="1"></textarea>
		        		<hr>
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		       			<button type="submit" class="btn btn-primary" name="submitmsg" id="submitmsg">Send</button>
		        	</form>
	      		</div>
	    	</div>
	    </div>
	</div>

	                        	</div> 	
	                        </div>
                        </div>    
                        <hr>  
                    </div>
                </div>   
              
            <?php
            			}
                    }
                }
            ?>

   	<div id="fh5co-gallery">
		<div class="container" id="user1">
			<div class="row row-bottom-padded-md" style="padding-top: 0px;">
				<div class="col-md-12" id="user1">
					<!--Image Gallery-->
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

