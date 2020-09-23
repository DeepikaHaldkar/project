<html>
<head>
<title>FEEDBACK</title>
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
			<li><a href="stulogin.php">Student</a></li>
			<li><a class="active" href="Feedback.php">Feedback</a></li>
			<li><a href="contact.php">Contact Us</a></li>

		</ul>
		     <div>
                <img src="img2.jpg" style="width:100%;height:50%">
            </div>
						<div>
							<h3 id="head1">Feedback Form</h3>
							<form class="container" action="index.html" method="post">
								<h4>Are you from inside the Madhyapradesh? or outside the Madhya Pradesh?</h4>
                                                                <label for="inmp">Inside:</label>
								<input id="inmp" type="radio" name="loc" value="inside"/>

								<label for="outmp">Outside:</label>
								<input id="outmp" type="radio" name="loc" value="outside"/>

								<h4>How was your experience?</h4>
								<select value="stars">
									  <option value="Great">3</option>
										 <option value="Okay">2</option>
										  <option value="Bad">1</option>
									</select>
									<h4>any other feedback</h4>
									<textarea name="mytext" placeholder="write something" rows="8" cols="80"></textarea></br>
									<input type="submit" name="" value="SUBMIT">
							</form>
						</div>
<div class="footer">
  <p>Email-id:tnpcell@gmail.com<br/>contact:9300313611</p>
</div>
</body>
</html>
