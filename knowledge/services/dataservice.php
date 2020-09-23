<?php
class dataservice
{    private
       $db_connect;
    private
       $db_query;
   function __construct()
    {
        try
        {
         $this->db_connect=mysqli_connect('localhost','root','','knowledge');
         if(mysqli_connect_error()) 
         {throw new ErrorException("Hey Connection cannot be Made Verify the parameter specified by YOU! Database!",1);}
        }
        catch( exception $ex)
        {
            $this->db_exception($ex->getMessage()); 
        }
    }
    function changedate($dt)
    {
        $nDt="0000/00/00";
        if(strlen($dt)==0)
        $dt=$nDt;
        list($month, $day, $year) = split('[/.-]', $dt);
        $nDt=$year."-".$month."-".$day;
        return $nDt;
    }

    function find_table_name($q) 
    {
         $c=4;$tblName="";
         $i=strpos($q,'into');
         $i+=4;
         while(substr($q,$i,1)==' ')
         {
             $c++;
             $i++;
         }
          $i=strpos($q,'into');
          $i+=$c;
          while(substr($q,$i,1)!=' ')
          {
              $tblName.=substr($q,$i,1);
              $i++;
          }
          return $tblName;
    }

   /* function to display the message after an exception encountered
   -----------------------------------------------------------------*/
   function db_exception($dbError) 
   {
       echo $dbError;
   }
   /* function performs insertion in the database and returns primary key of that record
   -------------------------------------------------------------------------------------*/
   function getExtension($str) 
    {         
     $i = strrpos($str,".");
     if (!$i){return "";  }         
     $l = strlen($str) - $i;         
     $ext = substr($str,$i+1,$l);
    return $ext; 
    }

   function upload_Image($fileTBName,$fileLimitSize,$destFolderName,$uid=null) //this uploads images to the server
   {
    $msg="";
    $add="";
    $filename = stripslashes($_FILES[$fileTBName]['name']);     //get the extension of the file in a lower case format          
    $extension = $this->getExtension($filename);         
    $extension = strtolower($extension);
    if (($extension == "jpg") || ($extension == "jpeg") || ($extension == "png") || ($extension == "gif"))
    {
        if ($_FILES[$fileTBName]["size"] < $fileLimitSize)
        {
          $add="../".$destFolderName."/".substr($fileTBName,0,1) .$uid. $_FILES[$fileTBName]["name"];     
              if(!empty($_FILES[$fileTBName]['name']))
              {
				try
				{  
              move_uploaded_file($_FILES[$fileTBName]["tmp_name"], $add);
              return $add;
				}
				catch (exception $ex)
				{
					echo $ex->getMessage();	
				}
              }
			  else 
			  return $add;
        }
      else
      {
          $msg="Your uploaded file size is more than 250KB so please reduce the file size and then upload. Visit the FAQs page to know how to reduce the file size.<BR>";
		  echo $msg;
          return "unsuccess";
      }
    }   else
    {
         $msg="Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>".$msg;
         return "unsuccess";
    }
    }

   function insertdata_with_pkreturn($query)
    {
      try
          {
           $insert_result=mysqli_query($this->db_connect,$query);  
           if($insert_result!=1)
		   {
              throw new ErrorException("Insertion Can't be Completed! Please verify the query");
			}
           else
              {
			  $tblName=$this->find_table_name($query);
                $query_result=mysqli_query($this->db_connect,"select * from ".$tblName);
                while($row = mysqli_fetch_row($query_result))
                  {
                    $last_rec=$row[0] ;
				  }
               return($last_rec);
               } 
          }
          catch(exception $ex)
          {
              $this->db_exception($ex);
          }                                                              
          
    }   
     function insertdata_with_pkreturns($query)
    {
        $id ;
      try
          {
              $Insert_result=mysqli_query($this->db_connect,$query); 
              $id=mysqli_insert_id( $this->db_connect);  
              
              if($Insert_result != 1)
                throw new ErrorException("Insertion Can't be Completed! Please verify the query");
               else
               {        return($id);               } 
          }                                     
          catch(exception $ex)
          {
              $this->db_exception($ex);
          }                                                              
    }                   
                  
	function insert_data($query)
    {
          try
          {
		  $query_result=mysqli_query($this->db_connect,$query);  
          if($query_result!=1)
          {
		    throw new ErrorException("Insertion Can't be Completed! Please verify the query");
		   }
          else
		  {
		  	return($query_result);
		  }
          }                                     
          catch(exception $ex)
          {
            $this->db_exception($ex);
          }
    }       
	   
    function update_data($query)
    {
        $update_result=mysqli_query($this->db_connect,$query);
        if($update_result!=1)
         throw new ErrorException("Updation can't be completed!");
         else
         {
           mysqli_commit($this->db_connect);
            return($update_result);             
         }
    }
    function delete_data($query)
    {
       try
          {
          $query_result=mysqli_query($this->db_connect,$query);  
          if($query_result!=1)
            throw new ErrorException("Deletion Can't be Completed! Please verify the query");
          else{return($query_result);}
          }                                     
          catch(exception $ex)
          {
            $this->db_exception($ex);
          }
    }     
        
    function does_exist($query)
    {
      $query_result = mysqli_query($this->db_connect,$query);
      if($query_result->num_rows > 0) { return true;} 
      else{ return false; }
      
    }
    
    function fetch_query($query) 
    {
       //$query_result=mysqli_query($query,MYSQLI_ASSOC);
       $query_result=mysqli_query($this->db_connect,$query);
	   //$row = mysqli_fetch_array($query_result, MYSQLI_BOTH);
       return($query_result);
    }
	
	function fetch_row($query)  //for single row
    {
       $query_result=mysqli_query($this->db_connect,$query);
      //  echo $query;
	   $row = mysqli_fetch_array($query_result, MYSQLI_BOTH);
       return($row);
    }
	
	function fetch_Assoc($query)  //for multiple row
    {
       $query_result=mysqli_query($this->db_connect,$query);
      //  echo $query;
	   $row = mysqli_fetch_assoc($query_result);
       return($row);
    }
    
    function fetch_all($query)  //for multiple row
    {
       $query_result=mysqli_query($this->db_connect,$query);
      //  echo $query;
       $res = mysqli_fetch_all($query_result,MYSQLI_ASSOC);
       return($res);
    }
    
    function fetch_object($query)  //for multiple row
    {
       $query_result=mysqli_query($this->db_connect,$query);
      //  echo $query;
      
       $obj = mysqli_fetch_object($query_result);
       return($obj);
    }
   
   function returnPK($query)
   {   
   		$tblName=find_table_name($query);
        //$this->db_query="select * from companyname";
        $query_result=mysqli_query($this->db_connect,"select * from ".$tblName);
        while($row = $query_result->fetch_row())
        {
          $last_rec=$row[0] ;
        }
        //print("Last Inserted Id=".$last_rec);
		return $last_rec;
        
   }
   
   function display_record_tableFormat($query)
     {   try
         {
             $query_result=mysqli_query($this->db_connect,$query,MYSQLI_ASSOC);
             if(mysqli_connect_error())
             {throw new ErrorException("Please Check the query!");}
             else
             {  $row = $query_result->fetch_row();
                print("<table>");
                 while($row = $query_result->fetch_row())
                 {$c=0;
                  print("<tr>");
                  while($c<count($row))
                   { print("<td>".$row[$c]."</td>");
                     $c++;}            
                    print("</tr>"); }           
                   print("</table>"); }
         }
         catch(Exception $ex)
         {
            $this->db_exception($ex); 
         }      }
	
	function begin()
	{
		mysqli_autocommit($this->db_connect, FALSE);

	//@mysql_query("BEGIN");
	}
	
	function commit()
	{
	//@mysql_query("COMMIT");
	mysqli_commit($this->db_connect);
	}
	
	function rollback()
	{
	//@mysql_query("ROLLBACK");
	mysqli_rollback($this->db_connect);
	}
		
   function __destruct()
    {
      mysqli_close($this->db_connect);
    }
	

 };
 
//$dt=new dataservice();
//$dt->insert_data("insert into emp(empName) values('Rathor')");
//echo "Inerted successfully!";
 //$dt->delete_data("delete from companyname where cnId=196");
 //$dt->does_exist("select * from companyname where cnName='Siyaram'");
 //$dt->get_data("select * from finalcompanyvehiclelist");
 //$pk=$dt->insertdata_with_pkreturn("insert into companyname(cnName) values('Sarika Singh Rathor')");
 //print($pk);
 //$dt->update_data("update companyname set cnname='Sumit Singh Somvanshi' where cnName='Sumit Narayan'");
 
 