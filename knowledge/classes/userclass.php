<?php
/**
 * Description of user
 *
 * @author RAVI
 */
include_once("services/dataservice.php");
class userclass {
    var $ds,$query;
    function __construct()
    {
        $this->ds=new dataservice();
    }
    
    function login($un,$pw)
    {
        $this->query="select * from loginuser where LoginId='".$un."' and Password='".$pw."';";
        $res=$this->ds->fetch_query($this->query);
        if(($row=  mysqli_fetch_array($res)))
        {
            if($row["Status"]=="active")
            {
            session_start();
            $_SESSION["id"]=$row["LoginId"];
            $_SESSION["utype"]=$row["UserType"];
            if($row["UserType"]=="User"){        header("location:.\user.php");        }
            else if($row["UserType"]=="Consultant"){       header("location:.\consultant.php");          }
            else if($row["UserType"]=="Admin"){        header("location:.\admin.php");        }
            }
        else {echo '<script>alert("Your Acount is blocked by Administrator.");window.location="loginRegister.php";</script>';}
        }
        else{ echo '<script>alert("Invalid UserName or Password");window.location="loginRegister.php";</script>';  }
    }
    
    function logout()
    {
        session_start();
        session_destroy();
        header("location:.\index.php");
    }
    
    function registration()
    {
        $this->query="select * from loginuser where LoginId='".$_POST["lid"]."';";
        $res=$this->ds->fetch_query($this->query);
        if($row=mysqli_fetch_array($res))
        {
             echo '<script>alert("Id Alfready Exist Pleas select another id ")</script>';
             return FALSE;
        }
        else
        {
            $this->query="insert into loginuser values('".$_POST["lid"]."','".$_POST["pass"]."','".$_POST["name"]."','".$_POST["fname"]."','".$_POST["email"]."',".$_POST["mob"].",'".$_POST["addr"]."','".$_POST["category"]."','".$_POST["quali"]."','active');";
            $this->ds->insert_data($this->query);
            if($_POST["category"]=="Consultant")
            {
                 $this->query="insert into consultantdetails values('".$_POST["lid"]."',".$_POST["we"].",'".$_POST["org"]."','".$_POST["graduate"]."','".$_POST["postgraduate"]."','".$_POST["doc"]."',".$_POST["ugy"].",".$_POST["pgy"].",'".$_POST["about"]."',0);";
                 $this->ds->insert_data($this->query);
                 $subc=$_POST['subcat'];
                  if ($subc)
                    {
                        foreach ($subc as $t)
                        {
                            $this->query="insert into consultantcategory (consultantId, categoryId) values('".$_POST["lid"]."',".$t.");";
                            $this->ds->insert_data($this->query);
                        } 
                    }
            } 
            echo "<script>alert('Inserted Sucessfully');</script>";
        }
    }
    function updateprofile()
    {
        $this->query="update loginuser set Password='".$_POST["pass"]."', Email='".$_POST["email"]."', MobileNo=".$_POST["mob"]
            .", Address='".$_POST["addr"]."' where LoginId='".$_SESSION["id"]."'";
        $this->ds->update_data($this->query);
        if($_SESSION["utype"]=="Consultant")
        {
            $this->query="update consultantdetails set WorkingExperience=".$_POST["we"]." , Organization='".$_POST["org"]."',"
                    . " About='".$_POST["about"]."' where UserId='".$_SESSION["id"]."'";
            $this->ds->update_data($this->query);
        }
        echo '<script>alert("Profile Successfully Updated");window.location="userprofileupdate.php";</script>';
    }
    //put your code here
}
