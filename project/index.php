<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<html>
	<head>
		<title>STUDENT HOME</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
	   <script src="js/jquery.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	<h1><b>ONLINE TRAINING AND PLACEMENT CELL</b></h1>
	<!--------------------------------- navigation bar ----------------------------------------->
<ul>
    <li><a class="active" href="index.php">Home</a></li>
    <li><a href="details.php">Enter Details</a></li>
    <li><a href="updatedetails.php">Update details</a></li>
    <li><a href="Drives.php">View Drives</a></li>
    <li><a href="stulogout.php">Logout</a></li>
  </ul>
  <div class="container">
     <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
     <p></p>
  </div>
  <div>
      <img src="img1.jpg" style="width:100%;height:50%">
 </div>
<div class="container d3">
  <p align="justify">Welcome student in our traning and placement portal.In this you have to fill all your personal
		 details.So according to your details admin can shorlist candidates for the company. The student can see the drive uploaded
		 by the admin.If the student is interested for drive student can send the request to the drive and if
     admin accepts the request student can attend the drive.</p>
</div>

<div class="footer">
  <p>Email-id:tnpcell@gmail.com<br/>contact:9300313611</p>
</div>
</body>
</html>
