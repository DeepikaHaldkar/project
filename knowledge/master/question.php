<?php
        include("classes/Question.php");
        $disp = new Question();
        $query="select * from questions";
        if(isset($_REQUEST["cid"]))
        {
            $cid=$_REQUEST["cid"];
            $query=$query." where CategoryId = ".$cid;
        }
        $query= $query." order by DateTime desc;";
        $str=$disp->display($query);
        echo $str;

      