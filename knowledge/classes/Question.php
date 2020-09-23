<?php

/**
 * Description of Question
 * @author RAVI
 */
//include '.\services/dataservice.php';
class Question {
    var $ds,$query;
    function __construct()
    {       
        $this->ds=new dataservice;
    }
    
/*=========================FUNCTION TO ASK NEW QUESTIONS HTML DESIGN========================*/
    function askdesign()
    {
        try 
        {
          //  $ds= new dataservice;
          $this->query='select * from category;';
            $res=$this->ds->fetch_query($this->query);
            $str='<select name="subcat"> <option value="-1">Select</option>';
            while($cat=  mysqli_fetch_array($res))
            {
                if($cat["ParentCategory"]!=0)
                {
                   $str=$str.'<option value="'.$cat["CategoryId"].'">'.$cat["CategoryName"].'</option>';
                }
            }
            echo $str."<select>";
        }
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
    }
    
    /*=========================FUNCTION TO POST NEW QUESTION========================*/
    function post()
    {
       
        $this->query="insert into questions (Question,UserId,DateTime,CategoryId) values('".$_POST["que"]."'"
                . ",'".$_SESSION["id"]."','".date("Y-m-d h:i:s")."',".$_POST["subcat"].");";
       $this->ds->insert_data($this->query);
        echo '<script>alert("Sussessful insertion");window.location="user.php";</script>';
        
    }
    
    /*=========================FUNCTION TO POST NEW answer========================*/
    function postAnswer()
    {
       
        $this->query="insert into answer (QuestionId,Answer,ConsultantId,DateTime,Rating) values(".$_REQUEST["qid"]
                . ",'".$_POST["ans"]."','".$_SESSION["id"]."','".date("Y-m-d h:i:s")."',0);";
       if($this->ds->insert_data($this->query)){
    //   echo '<script>alert("'.$this->query.'");</script>';
        $this->query="update questions set TotalAnswer=TotalAnswer +1 where QuestionId=".$_REQUEST["qid"];
        $this->ds->update_data($this->query);
        echo '<script>alert("Sussessful insertion");window.location="QuestionDetails.php?qid='.$_REQUEST["qid"].'";</script>';}
        else{
            echo '<script>alert("Some Error during Insertion");window.location="QuestionDetails.php?qid='.$_REQUEST["qid"].'";</script>';
        }
        
    }  
    
    /*=========================FUNCTION TO DISPLAY QUESTION LIST========================*/
    public function display($que)
    {
        $this->query=$que;
        $res=$this->ds->fetch_query($this->query);
     //   $res=mysqli_query($this->con,$this->query);
        $str='<div id="questionList"><p>Questions List</p><center><table style="text-align:center;"> ';
        while($row=  mysqli_fetch_array($res))
        {
            $str=$str.'<tr>'
                    . '<td rowspan=0 style="width :50px;"><h1>'.$row["TotalAnswer"].'</h1></td>'
                    . '<td rowspan=2 style="width:500px;">'
                    . '<h2><a href="QuestionDetails.php?qid='.$row["QuestionId"].'">'. $row["Question"].'</a></h2></td>'
                    . '<td>By :<a href="viewuser.php?uid='.$row["UserId"].'">'.$row["UserId"].'</a></td></tr>'
                    . '<tr>'
                    . '<td style="width:50px"><b>Answers</b></td>'
                    . '<td style="padding:2px;">'.$row["DateTime"].'</td></tr>'
            .'<tr ><td colspan=3><hr></td></tr>';
        }
        
        return $str.'</table></center></div>';
    }
}
