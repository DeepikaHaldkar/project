<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'master/userMenu.php';
        include 'master/categoryList.php';
        include("classes/Question.php");
        $disp = new Question();
        $query="select * from questions where UserId='".$_SESSION["id"]."'";
        if(isset($_REQUEST["cid"]))
        {
            $cid=$_REQUEST["cid"];
            $query=$query." and CategoryId = ".$cid;
        }
        $query= $query." order by DateTime desc;";
        $str=$disp->display($query);
        echo $str;
        include 'master/footer.html';
        ?>
    </body>
</html>
