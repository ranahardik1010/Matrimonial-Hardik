<?php
	require "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
        <link rel="stylesheet" href="newlogin/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="newlogin/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="newlogin/assets/css/form-elements.css">
        <link rel="stylesheet" href="newlogin/assets/css/style.css">
        <link rel="stylesheet" href="newlogin/assets/css/media-queries.css">

        <!-- Javascript -->
        <script src="newlogin/assets/js/jquery-1.11.1.min.js"></script>
        <script src="newlogin/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="newlogin/assets/js/jquery.backstretch.min.js"></script>
        <script src="newlogin/assets/js/scripts.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script src="newlogin/assets/js/placeholder.js"></script>
           
        <script type="text/javascript">
        	$(document).ready(function(){
        		$("select#statename").change(function(){
        			var select_id=$("#statename option:selected").val();
        			var qstr='id='+select_id;

        			$.ajax({
        				type: "POST",
        				url: "city.php",
        				data: qstr,
        				dataType: "html",
        				success:function(response){
        					$("#cityname").html(response);
        				}
        			});
        		});
        	});
        </script>

    </head>

    <body>

    	<?php
    		if(isset($_GET['msg']))
    		{
    			echo "<script>";
    			echo 'swal("","User Name Is Already Taken","info")';
    			echo "</script>";
    		}

    		if(isset($_GET['equal']))
    		{
    			echo "<script>";
    			echo 'swal("","Password and Confirm Password must be same","info")';
    			echo "</script>";
    		}
    	?>
    	
		<!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Registration</h3>	             
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                    
	                    <form role="form" action="regprocess.php" method="post" class="form-inline">
	                    	
	                    	<fieldset>
	                    		
		            			<h4>Introduction</h4>
		            			<div class="form-group">
					                <label for="first-name">First Name:</label><br>
					                <input type="text" name="Fname" class="first-name form-control" id="firstname" required>
				                </div>
				                <div class="form-group">
				                    <label for="last-name">Last Name:</label><br>
				                    <input type="text" name="Lname" class="last-name form-control" id="last-name" required>
				                </div>
					            <div class="form-group">
					                <label for="mobile-phone">Mobile Phone:</label><br>
					                <input type="text" name="Phone" class="mobile-phone form-control" id="mobile-phone" required>
					            </div>
					            <div class="form-group">
					                <label for="email">Email:</label><br>
					                <input type="text" name="Email" class="email form-control" id="email" required>
				                </div>
				                <br>
				                <div class="form-group">
					                <label for="birth-date">DOB (YYYY/MM/DD):</label><br>
					                <input type="date" name="DOB" class="birth-date form-control" id="birth-date" min='1975-11-01' max='2000-12-31' required="required">
					            </div>					           		               
					            <div style="width: 380px;" class="radio-buttons-1">
				              		<p >Gender:</p>
						            <label class="radio-inline">
						            	<input type="radio" name="Gender" value="Male"> Male
						            </label>
						            <label class="radio-inline">
						                <input type="radio" name="Gender" value="Female"> Female
						            </label>					                
								</div>
					                
		            			<br>
		            			<button type="button" class="btn btn-next" >Next <i class="fa fa-angle-right"></i></button>
		            			<br>
		            			<br>	
	            				<span>Already Have an account<a href="login.php" style="color: blue;"><b> sign in</b></a></span>
	            			</fieldset>
	            			
	            			<fieldset>
	            				<h4>Address Information </h4>
	            				<div class="selects-2">
									<p>State:</p>
					                <select class="form-control" name="State" id="statename">
					                	<?php
					                		$isactive=1;
					                		$res=$conn->query("call selectstate(".$isactive.")");
					                		//$rs=mysqli_query($conn,$qry);

					                		if(mysqli_num_rows($res)>0)
					                		{
					                			echo "<option value=0 selected disabled>------Select State------</option>";
					                			while($row=$res->fetch_assoc())
					                			{

					                	?>
					                			<option value="<?php echo $row['Stid']?>"><?php echo $row['Name']?></option>
					                	<?php
					                			}
					                		}
					                	?>					               
					                </select>
								</div>
								<div class="selects-2">
									<p>City:</p>
					                <select class="form-control" name="City" id="cityname">	
					                	<option value="0" selected disabled>------Select City------</option>
					                </select>
								</div>
	            				<div class="form-group">
				                    <label for="address">Address:</label><br>
				                    <input type="text" name="Address" class="address form-control" id="address">
				                </div>
				                 <div class="form-group">
				                    <label for="address-postal-code">Postal Code:</label><br>
				                    <input type="text" name="Postal" class="address-postal-code form-control" id="address-postal-code">
				                </div>				                				           
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset>
	            				<h4>Address Information</h4>
	            				<div class="selects-1">
									<p>Religion:</p>
					                <select class="form-control" name="Religion" id="Religion">					<?php
					                		require "conn.php";
					                		$qry1="SELECT * FROM religion where isactive=1";
					                		$rs1=mysqli_query($conn,$qry1);

					                		if(mysqli_num_rows($rs1)>0)
					                		{
					                			echo "<option value=0 selected disabled>------Select Religion------</option>";
					                			while($row1=mysqli_fetch_assoc($rs1))
					                			{

					                	?>
					                			<option value="<?php echo $row1['Rid']?>"><?php echo $row1['Rname']?></option>
					                	<?php
					                			}
					                		}
					                	?>					               					              
					                </select>
								</div>
				                <div class="form-group">
				                    <label for="cast">Cast:</label><br>
				                    <input type="text" name="Cast" class="form-control" id="cast">
				                </div>				                
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
					                			<option value="<?php echo $row2['Eid']?>"><?php echo $row2['Ename']?></option>
					                	<?php
					                			}
					                		}
					                	?>								             
					                </select>
								</div>
								<div class="selects-2">
									<p>Occupation:</p>
					                <select class="form-control" name="Occupation" id="Occupation">
					                	<?php
					                		$qry3="SELECT * FROM occupation where isactive=1";
					                		$rs3=mysqli_query($conn,$qry3);

					                		if(mysqli_num_rows($rs3)>0)
					                		{
					                			echo "<option value=0 selected disabled>------Select Occupation------</option>";
					                			while($row3=mysqli_fetch_assoc($rs3))
					                			{
					                	?>
					                			<option value="<?php echo $row3['Oid']?>"><?php echo $row3['Oname']?></option>
					                	<?php
					                			}
					                		}
					                	?>					               					              
					                </select>
								</div>			             
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	    				            			
	            			<fieldset>
	            				<h4>Other Form Elements</h4>
				                <div class="form-group">
				                    <label for="password">Password:</label><br>
				                    <input type="password" name="Password" class="form-control" id="address-postal-code" style= "width: 400px; margin-left: 5px; margin-right: 5px;">
				                </div>	
				                 <div class="form-group">
				                    <label for="cpassword">Confirm Password:</label><br>
				                    <input type="password" name="Cpassword" class="form-control" id="address-postal-code" style= "width: 400px; margin-left: 5px; margin-right: 5px;">
				                </div>		
	            				<div class="selects-1">
									<p>Security Question:</p>
					                <select class="form-control" name="Question" id="Question">
					                	<?php
					                		$qry4="SELECT * FROM security_que where isactive=1";
					                		$rs4=mysqli_query($conn,$qry4);

					                		if(mysqli_num_rows($rs4)>0)
					                		{
					                			echo "<option value=0 selected disabled>------Select Security Question------</option>";
					                			while($row4=mysqli_fetch_assoc($rs4))
					                			{
					                	?>
					                			<option value="<?php echo $row4['Sqid']?>"><?php echo $row4['Sqname']?></option>
					                	<?php
					                			}
					                		}
					                	?>					               					              
					                </select>
								</div>
								<div class="form-group">
				                    <label for="answer">Answer:</label><br>
				                    <input type="text" name="Answer" class="form-control" style= "width: 400px; margin-left: 5px; margin-right: 5px;">
				                </div>	
	            				<br>

	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="submit" name="submit" class="btn">Submit</button>
	            			</fieldset>	                    	
	                    </form>	              
	                </div>
	            </div>
			</div>
		</div>

		<div>
			<img src="images/img2.jpg" style="position: absolute; width: 100%; height: 669px; max-height: none; max-width: none; z-index: -999999;top: 0px; opacity: 50%">
		</div>

    </body>

</html>
