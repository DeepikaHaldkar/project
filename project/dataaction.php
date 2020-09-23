<?php
  $con = mysqli_connect('localhost' , 'root');
  if ($con)
    {
    echo "connection successful";
    }
  else
    {
    echo "no connection";
    }
    $db =mysqli_select_db($con,'tnp');
    if(isset($_POST['submit']))
      {
       $fullname = $_POST['fullname'];
       $fathersname = $_POST['fathersname'];
       $mothersname = $_POST['mothersname'];
       $email = $_POST['email'];
       $dob = $_POST['dob'];
       $gender = $_POST['gender'];
       $mob = $_POST['mob'];
       $branch = $_POST['branch'];
       $num = $_POST['num'];
       $hs = $_POST['hs'];
       $hsmarks = $_POST['hsmarks'];
       $matrix = $_POST['matrix'];
       $matrixmarks = $_POST['matrixmarks'];
       $profilepicture = $_POST['profilepicture'];

    $query=" INSERT INTO `details`(fullname , fathersname , mothersname, email , dob, gender,mob,branch,
    num , hs , hsmarks, matrix , matrixmarks , profilepicture) VALUES ($fullname , $fathersname , $mothersname, $email , $dob, $gender,$mob,$branch,
    $num , $hs , $hsmarks, $matrix , $matrixmarks , $profilepicture)";
       $result = mysqli_query($con,$query);
       }
?>
