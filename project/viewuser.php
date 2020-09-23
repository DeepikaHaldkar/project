<?php
$con = mysqli_connect("localhost","root","","tnp");
if ($con===false)
   {
    die ("ERROR:Failed to connect to MySQL: " . mysqli_connect_error());
   }
   $sql="Select *from users";
   if($result = mysqli_query($con,$sql))
    {      if (mysqli_num_rows($result)>0)
             {
                 echo "<table>";
                 echo "<tr>";
                 echo "<th>Id</th>";
                 echo  "<th>User Name</th>";
                  echo "<th>Email Id</th>";
                  echo  "<th>Trn Date</th>";
                  echo "</tr>";
              while($row = mysqli_fetch_array($result))
               {
                echo "<tr>";
                 echo "<td>".$row["id"]."</td>";
                 echo "<td>".$row["username"]."</td>";
                 echo "<td>".$row["email"]."</td>";
                 echo "<td>".$row["trn_date"]."</td>";
                echo "</tr>";
                echo "</table>";
                 mysqli_free_result($result);
               }
             }
             else
            {
            echo "no records matching this query";
            }
      }
     else
     {
         echo "ERROR:colud not able to exectute
          $sql.".mysqli_error($con);
     }

   mysqli_close($con);
   ?>
