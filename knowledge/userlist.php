<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/userlist.css" type="text/css">
    </head>
    <body>
        <?php
        include_once 'master/adminMenu.php';
        include './classes/admin.php';
        $ad = new admin();
        if(isset($_REQUEST["s"])&&$_REQUEST["s"]=="b")
        {
            $ad->blockUser();
        }
        if(isset($_REQUEST["uid"])&&$_REQUEST["s"]=="a")
        {
            $ad->unblockUser();
        }
        else 
        {
            $ds=new dataservice();
            $query="select * from loginuser;";
            $res=  $ds->fetch_query($query);
            $str1='<div id="userlist"><p>User List</p><table>'
                    . '<tr><th>Name</th><th>Email</th><th>Mobile</th><th>Status</th></tr>';
            $str2='<div id="consultantlist"><p>Consultant List</p><table>'
                    . '<tr><th>Name</th><th>Email</th><th>Mobile</th><th>Status</th></tr>';
            while($row=mysqli_fetch_array($res))
            {
                $str='<tr><td><a href="viewuser.php?uid='.$row["LoginId"].'">'.$row["Name"].'</a></td><td>'.$row["Email"].'</td>'
                        .'<td>'.$row["MobileNo"].'</td>';
                if($row["Status"]=="block")
                    {$str=$str.'<td><a href="userlist.php?uid='.$row["LoginId"].'&s=a">Unblock</a></td></tr>';}
                else if($row["Status"]=="active")
                    {$str=$str.'<td><a href="userlist.php?uid='.$row["LoginId"].'&s=b">Block</a></td></tr>';}
                
                if($row["UserType"]=="User")
                {        $str1=$str1.$str;          }
                else if($row["UserType"]=="Consultant")
                {        $str2=$str2.$str;          } 
            }
            $str1=$str1.'</table></div>';
            $str2=$str2.'</table></div>';
            echo $str1.$str2;    
        }
        include 'master/footer.html';
