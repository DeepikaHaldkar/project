
<html>
	<head>
		<title>Details</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
	   <script src="js/jquery.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	<h1><b>ONLINE TRAINING AND PLACEMENT CELL</b></h1>
	<!--------------------------------- navigation bar ----------------------------------------->
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a class="active" href="details.php">Enter Details</a></li>
    <li><a href="updatedetails.php">Update details</a></li>
    <li><a href="Drives.php">View Drives</a></li>
    <li><a href="stulogout.php">Logout</a></li>
  </ul>
  <div class="container">
<div class="row">
  <div class="col-6 ">
         <h4 id="a1">Personal Details</h4>
        <form action="dataaction.php" name="details" method="POST">
           <div class="form-group">
           <label>Full Name :</label>
           <input type="text" class="form-control" name="fullname" required />
           </div>
           <div class="form-group">
           <label>Father's Name :</label>
          <input type="text" class="form-control" name="fathersname" required />
          </div>
          <div class="form-group">
          <label>Mother's Name :</label>
          <input type="text" class="form-control" name="mothersname" required />
          </div>
          <div class="form-group">
          <label>Email :</label>
          <input type="email" name="email" class="form-control" required />
          </div>
          <div class="form-group">
          <label>Date of Birth</label>
          <input type="date" name="dob" required />
          </div>
          <div class="form-group">
          <label>Gender</label>
          <input type="radio" name="gender" required />M
          <input type="radio" name="gender" required />F
          </div>
          <div class="form-group">
          <label>Mobile No :</label>
          <input type="text" name="mob" class="form-control" required  />
          </div>
    </div>
  <div class="col-6 ">
      <h5 id="a1">Education Details</h5>
         <div class="form-group">
					 <label>Branch Name :</label>
					 <input type="text" name="branch" class="form-control" required  />
          </div>
          <div class="form-group">
          <label>Aggregate :</label></br>
          <input type="number" name="num" class="" required  />
          </div>
          <div class="form-group">
          <label>12 School Name :</label>
          <input type="text" name="hs" class="form-control" required  />
          </div>
          <div class="form-group">
          <label>12 Percentage :</label></br>
          <input type="number" name="hsmarks" class="" required  />
          </div>
          <div class="form-group">
           <label>10 School Name :</label>
           <input type="text" name="matrix" class="form-control" required  />
           </div>
           <div class="form-group">
            <label>10 Percentage :</label></br>
           <input type="number" name="matrixmarks" class="" required  />
           </div>
          <div class="form-group">
             <label>Passport size ProfilePicture:</label></br>
             <input type="file" name="profilepicture">
          </div>
   </div>
</div>
 <input type="submit" class="btn btn-success" name="submit" value="Register"/>
</form>
</div>
</body>
</html>
