<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}





function InsertHistory($document_id,$officename,$document_process,$comment,$user)
{
    
   global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $conString=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    
    $sqlquery="insert into documentlist_history(fk_documentlist_id,fk_officename,document_process,transdate,document_comment,document_details) values ('$document_id','$officename','$document_process','".date("Y-m-d H:i:s")."','$comment','$user')";
//    
 
    $RESULT=mysqli_query($conString,$sqlquery);

    if (!$RESULT) 
    {
        echo mysqli_error($conString)."<br>";
        mysqli_close($conString);
        return false;
        
  
    }
    mysqli_close($conString);
    return true;
        
     
}