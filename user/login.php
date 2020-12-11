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

        
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        
         <style type="text/css" relation="stylesheet">
        	.imgcontainer {
			  text-align: center;
			  margin: 24px 0 24px 0;
			}

			img.avatar {
			  width: 40%;
			  border-radius: 50%;
			}
        </style>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="newlogin/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="newlogin/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="newlogin/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="newlogin/assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
    	<?php
    		if(isset($_GET['msg']))
    		{
    			echo "<script>";
    			echo 'swal("Oops","Invalid Password","error")';
    			echo "</script>";
    		}

    		if(isset($_GET['msg1']))
    		{
    			echo "<script>";
    			echo 'swal("Oops","Invalid Username","error")';
    			echo "</script>";
    		}
    	?>
		<!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Log In</h3>	             
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                    <form role="form" action="loginprocess.php" method="post" class="form-inline">
	                    	<fieldset>	

	                    		<div class="imgcontainer form-group">
   									<img src="images/avtar.png" alt="Avatar" class="avatar">
 								 </div>         
 								 <br>        
		            			<div class="form-group">
					                <label for="first-name">Username:</label><br>
					                <input type="text" name="username" class="first-name form-control" id="first-name" value="<?php echo $_COOKIE['user']?>" required>
				                </div>
				                <br>
				                <div class="form-group">
				                    <label for="first-name">Password:</label><br>
				                    <input type="password" name="password" class="first-name form-control" id="first-name" value="<?php echo $_COOKIE['pass']?>" required>
				                </div>
                                <div>
                                    <input type="checkbox" name="Remember">
                                    <label> Remember me</label>
                                </div>
				                <br>		            				            			
	            				<button type="submit" name="submit" class="btn">Login</button>
	            				<br>	
	            				<br>
	            				<span>Forgot <a href="forgotpass.php" style="color: blue;"> <b>password?</b></a></span>
                                <br>
                                <span>If not registered ? <a href="reg.php" style="color: blue;"> <b>Sign Up</b></a></span>
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
