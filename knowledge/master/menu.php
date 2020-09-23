<!DOCTYPE html>

<?php
    include './services/dataservice.php';
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
    //    $(document).ready( function() {$("#mlogin").click(function() {$("#container").load("loginRegister.php"); });});
        </script>
    </head>
<body>
<div id="top">
<div id="menu">
    <nav>
	<ul>
    	<li><a href="index.php">Home</a></li>
    	<li><a href="contact.php">Contact</a></li>
    	<li><a href="about.php">About</a></li>
        <li style="float: right;"><a id="mlogin" href="loginRegister.php">Login/Register</a></li>
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
