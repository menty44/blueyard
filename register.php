<?php
// Establishing connection with server..
 $connection = mysql_connect("localhost", "root", "root");

// Selecting Database 
 $db = mysql_select_db("jobfinds", $connection);

//Fetching Values from URL  
$first_name=$_POST['fname1'];
$last_name=$_POST['fname1'];
$email=$_POST['email1'];
$role=$_POST['role1'];
$username=$_POST['uname1'];
$role=$_POST['role1'];
$password=($_POST['password1']);
$created=date("Y/m/d G.i:s", time());
//$password= sha1($_POST['password1']);  // Password Encryption, If you like you can also leave sha1

// check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
    echo "Invalid Email.......";
 }
else
 {
	$result = mysql_query("SELECT * FROM users WHERE email='$email'");
        $data = mysql_num_rows($result);
	        
	if(($data)==0)
      {
		//Insert query 
	   $query = mysql_query("insert into users(first_name, last_name, email, username, password, role, created) values ('$first_name', '$last_name', '$email', '$username', '$password' , '$role', '$created' )");
		if($query)
		   {
			  echo "You have Successfully Registered.....\n";

			  	   //freds hack to test send email after a successful registration
				   $to = $email;
				   $subject = "BlueYard Jobfinds Registration";
				   $message = "Thank you for choosing us to serve you better.\n" + "Your Username is :" + $username +
				   				"and your password is : " +$password+ ". Please keep your credentials safe\n" + 
				   				"Regards, BlueYard Team" ;
				   $header = "From:info@ariftechnologies.com \r\n";
				   $retval = mail ($to,$subject,$message,$header);
				   if( $retval == true )  
				   {
				      echo "Message sent successfully...\n Please Check your Email.";
				   }
				   else
				   {
				      echo "Message could not be sent...";
				   }
				
		   }
		else
		   {
			  echo "Error....!!";   
		   }
	} 
	else
	{
		echo "This email is already registered, Please try another email...";
	}  
 }
 
//connection closed
mysql_close ($connection);
?>