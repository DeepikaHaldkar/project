<?php

try 
{
    $ds= new dataservice;
    $query='select * from category;';
    $res=$ds->fetch_query($query);
    $str='<div id=category><p>Select Category</p><ul><li><ul>';
    while($row=  mysqli_fetch_array($res))
    {
        if($row["ParentCategory"]==0)
        {
           $str=$str.'</ul></li><li><a href="#">'.$row["CategoryName"].'</a></li><li><ul>';
        }
        else if($row["ParentCategory"]>0)
        {
            if(isset($_SESSION["id"]))
            {
                if($_SESSION["utype"]="Admin")
                    {$str=$str.'<li><a href="admin.php?cid='.$row["CategoryId"].'">'.$row["CategoryName"].'</a></li>';}
                else
                    {$str=$str.'<li><a href="user.php?cid='.$row["CategoryId"].'">'.$row["CategoryName"].'</a></li>';}
                }
            else
            {$str=$str.'<li><a href="index.php?cid='.$row["CategoryId"].'">'.$row["CategoryName"].'</a></li>';}
        }
    }
    echo $str."</ul></li></ul></div>";
}
catch (Exception $ex) 
{
    echo $ex->getMessage();
}


/*

try 
{
    $con=  mysqli_connect("localhost", "root","","Knowledge");
    $query='select * from category;';
    $res=mysqli_query($con,$query);
    $str='<div id=category><p>Select Category</p><ul><li><ul>';
    while($cat=  mysqli_fetch_array($res))
    {
        if($cat["ParentCategory"]==0)
        {
           $str=$str.'</ul></li><li><a href="#">'.$cat["CategoryName"].'</a></li><li><ul>';
        }
        else if($cat["ParentCategory"]>0)
        {
            $str=$str.'<li><a href="#">'.$cat["CategoryName"].'</a></li>';
        }
    }
    echo $str."</ul></li></ul><div>";
}
catch (Exception $ex) 
{
    echo $ex->getMessage();
}
*/

