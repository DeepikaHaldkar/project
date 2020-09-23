   <!DOCTYPE html>
    <?php
            include 'master/menu.php';
    ?>
   <html>
   <head>    
       <script src="js/loginregister.js"></script>
       <link rel="stylesheet" href="css/loginregister.css" type="text/css">
    </head>
    <body>
        <div id="login">
            <form name="login" method="post" action="login.php">
                <fieldset> <legend><h3>Login</h3></legend>
                     login id:<input type="text" name="uid" required ><br><br>
                Password:<input type="password" name="pass" required><br><br>
                <center><input type="submit" value="Login" style="height: 30px; width: 70px;">
                    <input type="reset" value="Clear" style="height: 30px; width: 70px;"></center></fieldset>
            </form>
        </div>
        <div id="registration">                
            <form name="register" method="post" action="register.php">
            <div id="userDetail">
                <fieldset><legend><h3>User Details</h3></legend>
                    <table style="width:100%">
                        <tr><td>Login Id:</td><td><input type="text" name="lid" required/></td></tr>
                        <tr><td>Password</td><td><input type="Password" name="pass" required/></td></tr>
                        <tr><td>Name:</td><td><input type="text" name="name" required/></td></tr>
                        <tr><td>Fathers Name:</td><td><input type="text" name="fname" required/></td></tr>
                        <tr><td>Email:</td><td><input type="email" name="email" required/></td></tr>
                        <tr><td>Mobile No. :</td><td><input type="text" name="mob" pattern="[0-9]{10}" required/></td></tr>
                        <tr><td>Address:</td><td><textarea name="addr" rows="5" cols="25" ></textarea></td></tr>
                        <tr><td>User Type:</td><td><input type="Radio" checked onload="alert('hello')" onclick="deletes()" id="uradio" value="User" name="category" >User
                                <input type="Radio" value="Consultant" onclick="apply(this)" id="cradio" name="category" >Consultant</td>
                        </tr>
                      
                        <tr><td>Qualification :</td><td><input type="text" name="quali" required></td></tr>
                    </table>
                </fieldset> 
            </div>
                <div id="del">
                <div id="consultantDetails" hidden>
                    <fieldset ><legend><h3>Consultant Details</h3></legend>
                        <table style="width:100%">
                        <tr><td>Work Experience</td><td><input type="text" name="we" required/>Year</td></tr>
                        <tr><td>Organization:</td><td><input type="text" name="org"></td></tr> 
                        <tr><td>graduate in: </td><td><input type="text" name="graduate"> 
                                year <input type="number" name="ugy"  ></td></tr>
                        <tr><td>Postgraduate in: </td><td><input type="text" name="postgraduate">
                                year <input type="number" name="pgy" ></td></tr>
                        <tr><td>Doctorate in: </td><td><input type="text" name="doc"></td></tr>
                        <tr><td>about</td><td><textarea rows="5" columns="25" name="about"></textarea></td></tr>
                                <tr><td>Select Category:</td><td>
                            <?php 
                            try 
                            {
                                $ds= new dataservice;
                                $query='select * from category;';
                                $res=$ds->fetch_query($query);
                                $str='<select multiple="multiple" name="subcat[]">';
                                while($row=  mysqli_fetch_array($res))
                                {
                                    if($row["ParentCategory"]!=0)
                                    {
                                       $str=$str.'<option value="'.$row["CategoryId"].'">'.$row["CategoryName"].'</option>';
                                    }
                                }
                                echo $str."<select>";
                            }
                            catch (Exception $ex) 
                            {
                                echo $ex->getMessage();
                            }
                            ?> Press <b><u>ctrl</u></b> to select multiple options.
                            </td></tr>
                    </table>
                </fieldset>
                </div></div><center>
                    <br><br>
                    <input type="submit" name="Register" value="Register" style="height: 30px; width: 70px;"/>
                    &nbsp;&nbsp;<input type="reset" value="Clear" style="height: 30px; width: 70px;">
                </center>
            </form>
        </div>
<?php     
include 'master/footer.html';
    