<?php
	
	require "conn.php";
	require "header.php";

	/*session_start();
	$email1=$_SESSION['Username'];*/
	//echo $email1;

	function profile($row,$rid,$eid,$aid)
	{
?>
	<div class="col-md-4 mt-4 pb-4 wow fadeInUp">
        <div class="card border border-light shadow-v3 mt-4 animate-box" style=" border: 2px solid lightgray;margin-bottom: 15px;border-radius: 5px;">
          		<div>
          			<center>
          				<img class="card-img-top" src="<?php echo $row['Image']?>" alt="" style="width: 300px;height: 200px;margin: 10px 0; border-radius: 5px;">
          			</center>
          		</div>
          		<div class="card-body" style=" line-height: 10px; max-height: 180px; overflow:hidden;margin-left: 20px;">
           			<h4 class="mb-3" style="text-transform: capitalize;">Name : <?php echo $row['First_Name']." "; echo $row['Last_Name']; ?></h4>
            		<h4 class="mb-3" style="text-transform: capitalize;">Religion : 
            			<?php
            				require "conn.php";
            				$relid=$row['Religion'];

            				$qry2="SELECT * FROM religion WHERE Rid=$relid";
            				$rs2=mysqli_query($conn,$qry2);
            				$row2=mysqli_fetch_assoc($rs2);
            					echo $row2['Rname'];
            			?>	
            		</h4>
            		<h4 class="mb-3" style="text-transform: capitalize;">Education : 
            			<?php 
            				require "conn.php";
            				$eduid=$row['Education'];
            				
            				$qry3="SELECT * FROM education WHERE Eid=$eduid";
            				$rs3=mysqli_query($conn,$qry3);
            				$row3=mysqli_fetch_assoc($rs3);
            					echo $row3['Ename'];
            			?>	
            		</h4>
            		<h4 class="mb-3" style="text-transform: capitalize;">Age : 
            			<?php 
            				$today1 = date("Y-m-d");
							$diff1 = date_diff(date_create($row['DOB']), date_create($today1));

							$age=$diff1->format('%y');
            				echo $age;
            			?>	
            		</h4>
          		</div>
          		<div>
          			<center>
          				<?php
          					require "conn.php";

	          				session_start();
							$email=$_SESSION['Username'];

							//echo $email;

							$qryu="SELECT * FROM user WHERE Email='$email'";
							//echo $qryu;
							$rsu=mysqli_query($conn,$qryu);
							$rowu=mysqli_fetch_assoc($rsu);
							
							$u_id=$rowu['Uid'];
          					$fid=$row['Uid'];

          					$qrybtn="SELECT * FROM friend WHERE User=$u_id AND Friend=$fid OR User=$fid AND Friend=$u_id" ;
          					$rsbtn=mysqli_query($conn,$qrybtn);

          					$cnt=mysqli_num_rows($rsbtn);
          					if($cnt==1)
          					{
          				?>
          					<a href="viewpartner.php?id=<?php echo $row["Uid"]; ?>"><input type="button" class="btn btn-primary" value="View Profile"></a>
          				<?php
          					}
          					else
          					{
          				?>
          					<a href="sendrequest.php?id=<?php echo $row["Uid"];?>&&rid=<?php echo $rid;?>&&eid=<?php echo $eid;?>&&aid=<?php echo $aid;?>"><input type="button" class="btn btn-primary" value="Send Request"></a>
          				<?php
          					}
          				?>
          			</center>
          		</div>
       	</div>
   	</div>
<?php
	}
?> 

<?php
	
	require "conn.php";
	require "header.php";

	session_start();
	$email=$_SESSION['Username'];
	//echo $email;

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
	
	$rid=$_POST['id1'];
	$eid=$_POST['id2'];
	$aid=$_POST['id3'];

	if($aid!=0)
	{
		$age=explode("-",$aid);
	}

	$s=$_POST['s'];
	
	if($s==="R")
	{
		$qry="SELECT * FROM user WHERE Religion='$rid' AND Gender='$gen' AND isactive=1";
	}
	elseif($s==="E") 
	{
		$qry="SELECT * FROM user WHERE Education='$eid' AND Gender='$gen' AND isactive=1";	
	}
	elseif($s==="A") 
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
	elseif($s==="RE")
	{
		$qry="SELECT * FROM user WHERE Religion='$rid' AND Education='$eid' AND Gender='$gen' AND isactive=1";
	}
	elseif($s==="RA")
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
	elseif($s==="EA")	
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
?>
