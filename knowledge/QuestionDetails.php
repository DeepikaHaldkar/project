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
        <link rel="stylesheet" href="css/questionsdetails.css" type="text/css">
    </head>
    <body>
    <?php
    session_start();
    if(isset($_SESSION["id"]) && $_SESSION["utype"]=="Admin"){include 'master/adminMenu.php';}        
    else if (isset($_SESSION["id"])){include 'master/userMenu.php';}
    else {include 'master/menu.php';}
    include 'master/categoryList.php';
    if(isset($_REQUEST["qid"])){$qid=$_REQUEST["qid"];}
    include 'classes/Question.php';
    $que=new Question();
    if(isset($_POST["submit"])&& $_POST["submit"]=="Post")
    {            $que->postAnswer();            }
    else
    {
        if(isset($_REQUEST["qid"])) 
        {
           $ds=new dataservice();
            $query="select * from questions where QuestionId=".$_REQUEST["qid"].";";
            $res=$ds->fetch_query($query);
            $row=  mysqli_fetch_array($res);
            $str='<div id="quedetail"><div id="postedby"><a href="viewuser.php?uid='.$row["UserId"].'">'.$row["UserId"].'</a></div>'
                    . '<div id="que"><h2>'.$row["Question"].'</h2>'
                    . '<p style="float: right">Postd at:<b> '.$row["DateTime"].'</b></p></div><hr>';
            if(isset($_SESSION["id"]))
            {
                $query="select * from consultantcategory where CategoryId=".$row["CategoryId"].";";
                $flag=0;
                $res1=$ds->fetch_query($query);
                while($row1=  mysqli_fetch_array($res1))
                {
                    if($row1["ConsultantId"]==$_SESSION["id"]){$flag=1;}
                }
                if(($_SESSION["id"]==$row["UserId"] || $flag==1))
                {
                    $str=$str.'<div id="postans"><form method="post" action="QuestionDetails.php?qid='.$qid.'">'
                        . '<table id="answer"><tr><td><h3>Post your Answer</h3></td><td><textarea name="ans" rows="5" cols="75"></textarea></td>'
                        . '<td><input type="submit" name="submit" value="Post"><br><br><input type="reset" value="Reset"></td>'
                        . '</tr></table></form></div><hr>';
                }
            }
            else
            {
                 $str=$str.'<b>To Participate in question answer <a href="loginRegister.php">Login</a> here.</b><br><br>';
            }
            if($row["TotalAnswer"]!=0)
            {
                $str=$str."<center><h2><u>Answers</u></h2></center><hr>";
                $query="select * from answer where QuestionId=".$_REQUEST["qid"].";";
                $res2=$ds->fetch_query($query);
                while($row2=  mysqli_fetch_array($res2))
                {
                    $str=$str.'<div id="answers"><div id="postedby"><a href="viewuser.php?uid='.$row2["ConsultantId"].'">'.$row2["ConsultantId"].'</a></div>'
                    . '<div id="que"><h3>'.$row2["Answer"].'</h3><p style="float: right">Postd at : <b>'.$row2["DateTime"].'</b></p></div><hr>';
                }
            }
            echo $str."</div>";
        }
        else 
        {
            echo"<center><br><br><b>U DON'T SELSECTED ANY QUESTIONS </b></center>";
        }
    }
    include 'master/footer.html';

