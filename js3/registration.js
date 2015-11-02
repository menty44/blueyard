$(document).ready(function(){

$("#register").click(function(){

	var first_name = $("#first_name").val();
	var last_name = $("#last_name").val();
	var email = $("#email").val();
	var username = $("#username").val();
	var role = $("#role").val();
	var password = $("#password").val();
	var cpassword = $("#cpassword").val();
	
	if( first_name =='' || last_name =='' || email =='' || username =='' || role =='' || password =='' || cpassword =='')
		{
		  alert("Please fill all required fields...!!!");
		  alert("Incase of any difficulties please contact the admin at info@ariftechnologies.com");
		}

	else if (!(username).match(username))
		{
			alert("username already exists..!!!");
		}

	else if((password.length)<8)
		{
			alert("Password should be atleast 8 character in length...!!!");
		}
		
	else if(!(password).match(cpassword))
		{
			alert("Your passwords don't match. Try again?");
		} 
	
	else 
	   {
	     $.post("register.php",{ fname1: first_name, lname1: last_name, email1: email, uname1: username, role1: role, password1:password},
		  function(data) {
		   if(data=='You have Successfully Registered.....')
		   {
			$("form")[0].reset();
		   }
		   alert(data);
		});
	   }
	
	});

});
