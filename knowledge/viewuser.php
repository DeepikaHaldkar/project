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
        if(isset($_SESSION["id"]) && $_SESSION["utype"]=="Admin"){include 'master/adminMenu.php';}        
        else if (isset($_SESSION["id"])){include 'master/userMenu.php';}
        else {include 'master/menu.php';}
        if(isset($_REQUEST["uid"])) 
        {
            $ds=new dataservice;
            $query="select * from loginuser where LoginId='".$_REQUEST["uid"]."';";
            $res=$ds->fetch_query($query);
            $row=  mysqli_fetch_array($res);
        ?>
        <center><form method="post" action="userprofileupdate.php">
        <div id="userDetail">
            <fieldset><legend><h3>User Details</h3></legend>
                <table>
                    <tr><td>Name:</td><td><?php echo $row["Name"]?></td></tr>
                    <tr><td>Fathers Name:</td><td><?php echo $row["FathersName"]?></td></tr>
                    <tr><td>Email:</td><td><?php echo $row["Email"]?></td></tr>
                    <tr><td>Mobile No. :</td><td><?php echo $row["MobileNo"]?></td></tr>
                    <tr><td>Address:</td><td><?php echo $row["Address"]?></td></tr>
                    <tr><td>Qualification :</td><td><?php echo $row["Qualification"]?></td></tr>
                    
                </table>
            </fieldset> 
            
            <?php
                if($row["UserType"]=='Consultant')
                {
                    $query="select * from consultantdetails where UserId='".$_REQUEST["uid"]."';";
                    $res1=$ds->fetch_query($query);
                    $row1=  mysqli_fetch_array($res1);
            ?>
            <br>
            <div id="consultantDetails">
                    <fieldset ><legend><h3>Additional Details</h3></legend>
                        <table style="width:100%">
                        <tr><td>Work Experience</td><td><?php echo $row1["WorkingExperience"];?>Years</td></tr>
                        <tr><td>graduate in: </td><td><?php echo $row1["GraduateIn"];?></td></tr>
                        <tr><td>Postgraduate in: </td><td><?php echo $row1["PostgraduateIn"];?></td></tr>
                        <tr><td>Doctorate in: </td><td><?php echo $row1["DoctrateIn"];?></td></tr>
                        <tr><td>About</td><td><?php echo $row1["About"];?></td></tr>
                                <tr><td>Categories:</td><td>
                            <?php 
                            $query="select c.CategoryName from category c, consultantcategory cc where c.CategoryId="
                                    . "cc.CategoryId and cc.ConsultantId='".$_REQUEST["uid"]."'";
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
         <?php }
        }
        else 
        {
            echo '<br><br><center><h3>|| YOU HAD NOT SELECTED ANY USER  ||</h3></center>';
        }
        include 'master/footer.html';
