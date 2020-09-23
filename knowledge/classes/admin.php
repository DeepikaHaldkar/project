<?php
/**
 * Description of admin
 *
 * @author RAVI
 */
class admin {
    var $ds,$query;
    function __construct()
    {
        $this->ds=new dataservice;
    }
    function blockUser()
    {
        $this->query="update loginuser set Status='block' where LoginId='".$_REQUEST["uid"]."'";
        $this->ds->update_data($this->query);
        header("location:userlist.php");
    }
    function unblockUser()
    {
        $this->query="update loginuser set Status='active' where LoginId='".$_REQUEST["uid"]."'";
        $this->ds->update_data($this->query);
        header("location:userlist.php");
    }
}
