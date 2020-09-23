
<html>
<head>
<meta charset="utf-8">
<title>Student Registration</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username);
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='stulogin.php'>Login</a></div>";
        }
    }else{
?>

<h1><b>ONLINE TRAINING AND PLACEMENT SYSTEM</b></h1>
	<!--------------------------------- navigation bar ----------------------------------------->

	<ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="adminlogin.php">Admin</a></li>
    <li><a href="stulogin.php">Student</a></li>
    <li><a href="Feedback.php">Feedback</a></li>
    <li><a href="contact.php">Contact Us</a></li>
		</ul>

            <div>
                <img src="img2.jpg" style="width:100%;height:50%">
            </div>
  <div class="container d2">
  <div class="admin-form">
   <h4 class="text-center" id="a1">STUDENT REGISTRATION</h4>
     <form class="text-center" name="registration" action="" method="post">
        <div class="form-group">
          <label>User name</label>
          <input type="text" name="username" placeholder="Username" required />
        </div>
        <div class="form-group">
          <label>email</label>
          <input type="email" name="email" placeholder="Email" required />
         </div>
        <div class="form-group">
         <label>Password</label>
         <input type="password" name="password" placeholder="Password" required />
         </div>
       <input type="submit" name="submit" value="Register" />
    </form>
</div>
</div>
<?php } ?>
<div class="footer">
  <p>Email-id:tnpcell@gmail.com<br/>contact:9300313611</p>
</div>
</body>
</html>
