<?php 
    session_start();
    include('includes/config.php');
    //$role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="jobseeker"){
      header('Location: index.php?err=2');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard</title>

    <!-- Bootstrap -->
    <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="  ">Blueyard User Dashboard</a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $_SESSION['sess_username'];?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container homepage">
      <div class="row">
         <div class="col-md-3"></div>
            <div class="col-md-6 welcome-page">

              <h2><?php 
                //$query = mysql_query("select * from users where username=username") or die(mysql_error());
                //$query = mysql_query("SELECT first_name, last_name, email,  FROM users WHERE username = $_SESSION['sess_username']") or die(mysql_error());

                  // while ($row = mysql_fetch_array($query)) {
                  //   echo $_SESSION['sess_username'];            
                    
                  // }
                  echo $_SESSION['sess_userrole'];
              ?> &nbspGood things awaits you !!!</h2></p>
              
            </div>
          <div class="col-md-3"></div>
        </div>
    </div>    

    <h3>File Upload:</h3>
    Select a file to upload: <br />
    <form action="uploader.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" size="50" />
    <br />
    <input type="submit" value="Upload File" />
    </form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js1/bootstrap.min.js"></script>
    </body>
</html>
