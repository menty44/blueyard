<?php
	include('includes/config.php');

	if ( isset($_POST['register']) ) {

		function validate_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		//Fetching Values from URL
		$error_message = '';
		$error = array();

		//check whether fname is not mysql safe
		if (!empty($_POST['dfname'])) { 
			$fname = validate_input($_POST['dfname']);
		} else {
			array_push($error, "fname empty");
		}

		//test whether lname is not mysql safe
		if (!empty($_POST['dlname'])) { 
			$lname = validate_input($_POST['dlname']);
		} else {
			array_push($error, "lname empty");
		} 

		//test whether email doesn't match the pattern and isn't sql safe
		if (!empty($_POST['demail'])) { 
			$email = validate_input($_POST['demail']);
		} else {
			array_push($error, "email empty");
		} 

		//test whether username is not sql safe
		if (!empty($_POST['duname'])) { 
			$uname = validate_input($_POST['duname']);
		} else {
			array_push($error, "uname empty");
		} 

		//test whether the passwords match
		if (!empty($_POST['password']) && !empty($_POST['cpassword']) && ($_POST['password'] === $_POST['cpassword'])) {
			$password = validate_input($_POST['password']);
		} else {
			array_push($error, "password empty");
		} 

		$role = validate_input($_POST['jobseeker']);


		if ( empty($error) ) {

			//send data to the server

		} else {
			$error_message = "Fill in the required fields !!!";
		}


 	}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register | Blueyard</title>
    <meta name="robots" content="noindex, nofollow">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- include css file here-->
   <link rel="stylesheet" href="css3/style.css"/>
   
	<!-- include JavaScript file here-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js3/registration.js"></script>
	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		#processing {
	    margin-top: 2em;
	    display: none;
		}
		progress {
		    width: 100%;
		}
	</script>
  
  </head>	
  <body>
	<div class="container">
		<div class="main">
	      <form class="form"  method="post" action="">
			<h2>Register In Order to Login</h2><hr/>
			<?php 
				if (!empty($error_message)) {
					echo $error_message."<br>";
				} 
			?> 
			<label for="fname">First Name :</label>
			<input type="text" name="dfname" id="fname">

			<label for="lname">Last Name :</label>
			<input type="text" name="dlname" id="lname">
			
			<label for="email">Email :</label>
			<input type="text" name="demail" id="email">

			<label for="uname">User Name :</label>
			<input type="text" name="duname" id="uname">	

			<select name="jobseeker">
			  <option value="jobseeker">Job Seeker</option>
			  <option value="employer" >Employer</option>			  
			</select></p>

			</p>
			<select id="single">
			  <option>Single</option>
			  <option>Single2</option>
			</select>

			<script>
			function displayVals() {
			  var singleValues = $( "#single" ).val();
			  var multipleValues = $( "#multiple" ).val() || [];
			  $( "p" ).html( "<b>Single:</b> " + singleValues +
			    " <b>Multiple:</b> " + multipleValues.join( ", " ) );
			}
			 
			$( "select" ).change( displayVals );
			displayVals();
			</script>
			
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
			
			<label for="cpassword">Confirm Password :</label>
			<input type="password" name="cpassword" id="cpassword">
			
			<input type="submit" name="register" id="register" value="Register">

			
		  </form>	
		</div>

   </div>

  </body>
</html>