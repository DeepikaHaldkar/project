<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/userprofileupdate.css">
        <title></title>
    </head>
    <body>
 <?php
    session_start();
    if(isset($_SESSION["id"]) && $_SESSION["utype"]=="Admin"){include_once 'master/adminMenu.php';}        
    else if (isset($_SESSION["id"])){include_once 'master/userMenu.php';}
    if(isset($_POST["submit"])&& $_POST["submit"]=="Update")
    {
        include './classes/userclass.php';
        $uc=new userclass();
        $uc->updateprofile();           
    }
    else 
    {
        $ds=new dataservice;
        $query="select * from loginuser where LoginId='".$_SESSION["id"]."';";
        $res=$ds->fetch_query($query);
        $row=  mysqli_fetch_array($res);
?>
        <h2><p>UPDATE PROFILE</p></h2>
        <center><form method="post" action="userprofileupdate.php">
        <div id="userDetail">
            <fieldset><legend><h3>User Details</h3></legend>
                <table>
                    <tr><td>Login Id:</td><td><?php echo $_SESSION['id'];?></td></tr>
                    <tr><td>Password</td><td><input type="Password" name="pass" value="<?php echo $row["Password"]?>" required/></td></tr>
                    <tr><td>Name:</td><td><?php echo $row["Name"]?></td></tr>
                    <tr><td>Fathers Name:</td><td><?php echo $row["FathersName"]?></td></tr>
                    <tr><td>Email:</td><td><input type="email" name="email" value="<?php echo $row["Email"]?>"/></td></tr>
                    <tr><td>Mobile No. :</td><td><input type="text" name="mob" pattern="[0-9]{10}" value="<?php echo $row["MobileNo"]?>" required/></td></tr>
                    <tr><td>Address:</td><td><textarea name="addr" rows="5" cols="25" required><?php echo $row["Address"]?></textarea></td></tr>
                    <tr><td>User Type:</td><td><b><?php echo $row["UserType"]?></b></td>
                    </tr>
                    <tr><td>Qualification :</td><td><?php echo $row["Qualification"]?></td></tr>
                    
                </table>
            </fieldset> 
            
            <?php
                if($_SESSION["utype"]=='Consultant')
                {
                    $query="select * from consultantdetails where UserId='".$_SESSION["id"]."';";
                    $res1=$ds->fetch_query($query);
                    $row1=  mysqli_fetch_array($res1);
            ?>
            <br>
            <div id="consultantDetails">
                    <fieldset ><legend><h3>Consultant Details</h3></legend>
                        <table style="width:100%">
                        <tr><td>Work Experience</td><td><input type="text" name="we" value="<?php echo $row1["WorkingExperience"];?>" required/>Years</td></tr>
                        <tr><td>Organization:</td><td><input type="text" name="org" value="<?php echo $row1["Organization"];?>" ></td></tr> 
                        <tr><td>graduate in: </td><td><?php echo $row1["GraduateIn"];?></td></tr>
                        <tr><td>Postgraduate in: </td><td><?php echo $row1["PostgraduateIn"];?></td></tr>
                        <tr><td>Doctorate in: </td><td><?php echo $row1["DoctrateIn"];?></td></tr>
                        <tr><td>About</td><td><textarea rows="5" columns="25" name="about"><?php echo $row1["About"];?></textarea></td></tr>
                                <tr><td>Categories:</td><td>
                            <?php 
                            $query="select c.CategoryName from category c, consultantcategory cc where c.CategoryId="
                                    . "cc.CategoryId and cc.ConsultantId='".$_SESSION["id"]."'";
                                $res=$ds->fetch_query($query);
                                while($row=  mysqli_fetch_array($res))
                                {
                                   echo $row["CategoryName"]."<br>";
                                }
                            ?>
                            </td></tr>
                    </table>
                </fieldset>
                </div>
                <?php }  ?>
            
                <br><input type="submit" name="submit" value="Update">
            
        </div>
        </form></center>
<?php
 }
        include 'master/footer.html';