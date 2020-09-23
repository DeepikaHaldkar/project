<?php

session_start();
$con=mysqli_connect('localhost','root');

if ($con)
 {
  echo "connection successful";
 }
 else
  {
   echo "no connection";
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADMIN LOGIN</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
   <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <h1><b>ONLINE TRAINING AND PLACEMENT CELL</b></h1>
   <!--------------------------------- navigation bar ----------------------------------------->

    <ul>
  			<li><a href="home.php">Home</a></li>
  			<li><a href="about.php">About Us</a></li>
  			<li><a class="active" href="adminlogin.php">Admin</a></li>
  			<li><a href="stulogin.php">Student</a></li>
  			<li><a href="Feedback.php">Feedback</a></li>
  			<li><a href="contact.php">Contact Us</a></li>

  		</ul>

              <div>
                  <img src="img2.jpg" style="width:100%;height:50%">
              </div>
    <div class="container d1">
    <div class="admin-form">
         <h4 id="a1" class="text-center">ADMIN LOGIN</h4>
         <form class="text-center" action="logincheck.php" method="POST">
            <div class="form-group">
            <label>User name</label>
            <input type="text" name="user" value="" autocomplete="off" >
            </div>
             <div class="form-group">
             <label>Password</label>
             <input type="password" name="pass" value="" autocomplete="off" >
             </div>
             <input type="submit"class="btn btn-success"  name="submit" value="Login" >
         </form>
       </div>
</div>
<div class="footer">
  <p>Email-id:tnpcell@gmail.com<br/>contact:9300313611</p>
</div>
  </body>
</html>
