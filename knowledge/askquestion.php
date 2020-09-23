<!DOCTYPE html>
<?php
 //   include './services/dataservice.php';
    include 'master/userMenu.php';
    include 'classes/Question.php';
    $que=new Question();
//    session_start();
     if(isset($_POST["submit"])&& $_POST["submit"]=="Post")
    {    $que->post();    }
    else
    {
?>
<form method="post" action="askquestion.php"><center>
        <table style="padding: 10px; text-align: center; ">
            <caption><H2>ASK QUESTION HERE</H2></caption>
            <tr><td><b>Select Category :</b></td>
                <td>  <?php  $que->askdesign(); ?></td></tr>
            <tr><td colspan="2"><textarea rows="10" cols="60" name="que"></textarea></td></tr>
            <tr><td><input type="submit" value="Post" name="submit"></td>
                <td><input type="reset" value="clear"></td></tr>
        </table></center></form>
    </body>
</html>
 <?php } include 'master/footer.html';