<?php
	
	require "conn.php";
	session_start();

	if(!isset($_SESSION['Username']))
	{
		header("location:login.php");
		exit();
	}

	$email=$_SESSION['Username'];
	$qrygen="SELECT * FROM user WHERE Email='$email'";
	$rsgen=mysqli_query($conn,$qrygen);
	$rowgen=mysqli_fetch_assoc($rsgen);
	{
		if($rowgen['Gender']=='Male')
		{
			$gen="Female";
		}
		else
		{
			$gen="Male";
		}
	}

	$relid=$_GET['rid'];
	$qryrel="SELECT * FROM religion Where Rid='$relid'";
	$rsrel=mysqli_query($conn,$qryrel);
	$rowrel=mysqli_fetch_assoc($rsrel);
	$relname=$rowrel['Rname'];

	$eduid=$_GET['eid'];
	$qryedu="SELECT * FROM education Where Eid='$eduid'";
	$rsedu=mysqli_query($conn,$qryedu);
	$rowedu=mysqli_fetch_assoc($rsedu);
	$eduname=$rowedu['Ename'];

	$ageid=$_GET['aid'];
	
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
						<li  class="active"><a href="searchprofile.php">Search Profile</a></li>
						<li><a href="contact.php">Contact US</a></li>
											
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

	<div class="row">
		<form id="viewprofile">
			<div class="col-lg-4 col-md-6 mt-5 fh5co-section-gray">
			 	<div class="selects-1">
					<p>Religion:</p>
					    <select class="form-control" name="Religion" id="Religion">					
					    	<?php
					            $qry1="SELECT * FROM religion where isactive=1";
					            $rs1=mysqli_query($conn,$qry1);

					            if(mysqli_num_rows($rs1)>0)
					            {
					                echo "<option value=0 selected disabled>------Select Religion------</option>";
					                while($row1=mysqli_fetch_assoc($rs1))
					                {
					        ?>
					                	<option value="<?php echo $row1['Rid']?>"
						                	<?php
						                		if($relname==$row1['Rname'])
						               			{
						               				echo "selected";
						               			}
						               		?>
					                	><?php echo $row1['Rname']?></option>
					        <?php
					                }
					            }
					        ?>					               					              
					    </select>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mt-5 fh5co-section-gray">
			 	<div class="selects-1">
					<p>Education:</p>
					<select class="form-control" name="Education" id="Education">
					    <?php
					        $qry2="SELECT * FROM education where isactive=1";
					        $rs2=mysqli_query($conn,$qry2);

					        if(mysqli_num_rows($rs2)>0)
					        {
					            echo "<option value=0 selected disabled>------Select Education------</option>";
					            while($row2=mysqli_fetch_assoc($rs2))
					            {
					    ?>
					                <option value="<?php echo $row2['Eid']?>"
						                <?php
						          			if($eduname==$row2['Ename'])
						           			{
						                		echo "selected";
						                	}
						           		?>
					           		><?php echo $row2['Ename']?></option>
					    <?php
					            }
					        }
					    ?>								             
				    </select>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mt-5 fh5co-section-gray">
			 	<div class="selects-1">
					<p>Age:</p>
					<select class="form-control" name="Age" id="Age">
					    <option value="0" selected disabled>------Select Age------</option>
					    <option value="19-25" 
						    <?php
						    	if($ageid=='19-25')
						    	{
						    		echo "selected";
						    	}
						    ?>
					    >19-25</option>
					    <option value="26-30"
					    	<?php
						    	if($ageid=='26-30')
						    	{
						    		echo "selected";
						    	}
						    ?>
						>26-30</option>
					    <option value="31-35"
					    	<?php
						    	if($ageid=='31-35')
						    	{
						    		echo "selected";
						    	}
						    ?>
						>31-35</option>
					    <option value="36-40"
					    	<?php
						    	if($ageid=='36-40')
						    	{
						    		echo "selected";
						    	}
						    ?>
						>36-40</option>
					    <option value="41-45" 
					    	<?php
						    	if($ageid=='41-45')
						    	{
						    		echo "selected";
						    	}
						    ?>
						>41-45</option>
					</select>
				</div>
			</div>
		</form>
	</div>
<!-- <?php
	//if()
	{

	}
?> -->
	<div id="fh5co-gallery" class="fh5co-section-gray">
		<div class="container" id="user1">
			<div class="row row-bottom-padded-md" style="padding-top: 0px;">
				<div class="col-md-12" id="user1">
					<!--Image Gallery-->
				</div>
			</div>
		</div>
	</div>

	<?php

		require "searchprofilepro.php";
		require "conn.php";

		$rid=$_GET['rid'];
		$eid=$_GET['eid'];
		$aid=$_GET['aid'];
		$ok=$_GET['ok'];

		if($aid!=0)
		{
			$age=explode("-",$aid);
		}

		if($ok=="true")
		{
			if($eid==0 && $aid==0 && $rid!=0)
			{
				$qry="SELECT * FROM user where Religion=$rid AND Gender='$gen' AND isactive=1";	
			}
			elseif($rid==0 && $aid==0 && $eid!=0)
			{
				$qry="SELECT * FROM user where Education=$eid AND Gender='$gen' AND isactive=1";	
			}
			elseif($rid==0 && $eid==0 && $aid!=0)
			{
				$qry1="SELECT * FROM user WHERE Gender='$gen' AND isactive=1";
				$rs1=mysqli_query($conn,$qry1);

				if(mysqli_num_rows($rs1)>0)
				{
					while($row1=mysqli_fetch_assoc($rs1))
					{
						$today = date("Y-m-d");
						$diff = date_diff(date_create($row1['DOB']), date_create($today));

						$a=$diff->format('%y');

						if($a >= $age[0] && $a <= $age[1])
						{
							profile($row1,$rid,$eid,$aid);
						}	
					}
				}
			}
			elseif($aid==0 && $rid!=0 && $eid!=0)
			{
				$qry="SELECT * FROM user WHERE Religion='$rid' AND Education='$eid' AND Gender='$gen' AND isactive=1";
			}
			elseif($eid==0 && $rid!=0 && $aid!=0)
			{
				$qry1="SELECT * FROM user WHERE Religion='$rid' AND Gender='$gen' AND isactive=1";
				$rs1=mysqli_query($conn,$qry1);

				if(mysqli_num_rows($rs1)>0)
				{
					while($row1=mysqli_fetch_assoc($rs1))
					{
						$today = date("Y-m-d");
						$diff = date_diff(date_create($row1['DOB']), date_create($today));

						$a=$diff->format('%y');

						if($a >= $age[0] && $a <= $age[1])
						{
							profile($row1,$rid,$eid,$aid);
						}
					}
				}
			}
			elseif($rid==0 && $eid!=0 && $aid!=0)
			{
				$qry1="SELECT * FROM user WHERE Education='$eid' AND Gender='$gen' AND isactive=1";
				$rs1=mysqli_query($conn,$qry1);

				if(mysqli_num_rows($rs1)>0)
				{
					while($row1=mysqli_fetch_assoc($rs1))
					{
						$today = date("Y-m-d");
						$diff = date_diff(date_create($row1['DOB']), date_create($today));

						$a=$diff->format('%y');

						if($a >= $age[0] && $a <= $age[1])
						{
							profile($row1,$rid,$eid,$aid);
						}
					}
				}
			}
			else
			{
				$qry1="SELECT * FROM user WHERE Religion='$rid' AND Education='$eid' AND Gender='$gen' AND isactive=1";
				$rs1=mysqli_query($conn,$qry1);

				if(mysqli_num_rows($rs1)>0)
				{
					while($row1=mysqli_fetch_assoc($rs1))
					{
						$today = date("Y-m-d");
						$diff = date_diff(date_create($row1['DOB']), date_create($today));

						$a=$diff->format('%y');

						if($a >= $age[0] && $a <= $age[1])
						{
							profile($row1,$rid,$eid,$aid);
						}
					}
				}
			}
			$rs=mysqli_query($conn,$qry);

			if(mysqli_num_rows($rs)>0)
			{
				while($row=mysqli_fetch_assoc($rs))
				{
					profile($row,$rid,$eid,$aid);
				}
			}
		}
	?>

	<?php
		require "footer.php";
	?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	</body>
</html>

