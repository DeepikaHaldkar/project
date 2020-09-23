<html>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width,initial-sacle=1">
 <head>
		<title>STUDENT LOGIN</title>
		     <link rel="stylesheet" href="css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="style.css" />

 </head>
	<body>
			 <script src="js/jquery.js"></script>
			 <script src="js/bootstrap.min.js"></script>
	 <h1><b>ONLINE TRAINING AND PLACEMENT CELL</b></h1>
	 <!--------------------------------- navigation bar ----------------------------------------->
		<ul>
			 <li><a href="home.php">Home</a></li>
			 <li><a href="about.php">About Us</a></li>
			 <li><a href="adminlogin.php">Admin</a></li>
			 <li><a class="active" href="stulogin.php">Student</a></li>
			 <li><a href="Feedback.php">Feedback</a></li>
			 <li><a href="contact.php">Contact Us</a></li>
	 </ul>
	 <div>
			 <img src="img2.jpg" style="width:100%;height:50%">
	 </div>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<div class="container d1">
	  <div class="form">
      <h4 id="head1">Log In</h4>
       <form action="" method="post" name="login">
				 <div class="form-group">
           <label>Username</label>
           <input type="text" name="username" placeholder="Username" required />
				 </div>
				 <div class="form-group">
           <label>Password</label>
           <input type="password" name="password" placeholder="Password" required />
				 </div>
           <input name="submit" class="btn btn-success" type="submit" value="Login" />
      </form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
</div>
<?php } ?>
<div class="footer">
  <p>Email-id:tnpcell@gmail.com<br/>contact:9300313611</p>
</div>
</body>
</html>
