<!DOCTYPE html>

<?php
    include './services/dataservice.php';
    if(!isset($_SESSION))
    {    session_start();   };
    if(!isset($_SESSION["id"])&& $_SESSION["type"]!="Admin")
    {        header("location:index.php");    }
?>
<html>
    <head>
        <title>Knowledge Share</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" href="css/common.css" type="text/css">
        <script src="js/jquery-1.11.1.js" type="text/javascript" ></script>
    <script>
    </script>
            
</head>
<body>
<div id="top">
<div id="menu">
    <nav>
	<ul>
    	<li><a href="admin.php">Home</a></li>
    	<li><a href="#">Contact</a></li>
    	<li><a href="#">About</a></li>
    	<li><a href="userlist.php" id="ulist">User List</a></li>
        <li style="float: right;"><a href=""> <?php echo $_SESSION["id"]; ?></a>
            <ul>
                <li><a href="userprofileupdate.php">Profile</a></li>
                <li><a href=".\logout.php">Logout</a></li>
            </ul>
        </li>
   </ul>
</nav>
</div>
</div>
        <div id="holder">
        <div id="logo">
            <img src="images/Knowledge.jpg">
                <img src="images/ks1.png" style="width:730px">
        </div>
        <div id="container">