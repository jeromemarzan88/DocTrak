<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
}
?>



<?php
   require_once("../../connection.php");
   session_start();
   if ($_POST['group_mode']=="save") {
       if ($_POST['primarykey'] == "") {
        $query=insert_update_delete("INSERT INTO SECURITY_GROUP(SECURITY_GROUPNAME,SECURITY_NAME) VALUES ('".$_POST['group']."','".$_POST['description']."')");
        $_SESSION['operation']="save";
       //  $_SESSION['message']="Save Successfully";
       }
       else {
          // $query=insert_update_delete("INSERT INTO SECURITY_GROUP(SECURITY_GROUPNAME,SECURITY_NAME) VALUES ('".$_POST['group']."','".$_POST['description']."')");
          //echo "UPDATE SECURITY_GROUP SET SECURITY_GROUP='".$_POST['group']."',SECURITY_NAME='".$_POST['description']."' WHERE SECURITY_GROUP = '".$_POST['primarykey']."' ";
           $query=insert_update_delete("UPDATE SECURITY_GROUP SET SECURITY_GROUPNAME='".$_POST['group']."',SECURITY_NAME='".$_POST['description']."' WHERE SECURITY_GROUPNAME = '".$_POST['primarykey']."' ");
           $_SESSION['operation']="update";
       }
   }

   elseif ($_POST['group_mode']=="delete") {
          $query=insert_update_delete("DELETE FROM SECURITY_GROUP WHERE SECURITY_GROUPNAME ='".$_POST['group']."' ");
          $_SESSION['operation']="delete";
         //  $_SESSION['message']="Delete Successfully";
   }
    header('Location:../../../group.php');

 ?>