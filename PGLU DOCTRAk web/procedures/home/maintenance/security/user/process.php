<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../../index.php');
}
?>



<?php
   require_once("../../../../connection.php");
   session_start();
   if ($_POST['security_user']=="save") {
       if ($_POST['primarykey'] == "") {
        $query=insert_update_delete("INSERT INTO SECURITY_USER(SECURITY_USERNAME,SECURITY_NAME,FK_SECURITY_GROUPNAME,SECURITY_PASSWORD,FK_OFFICE_NAME) VALUES ('".$_POST['username']."','".$_POST['name']."','".$_POST['group']."','".md5($_POST['password'])."','".$_POST['office']."')");
        $_SESSION['operation']="save";
         $_SESSION['message']="Save Successfully";
       }
       else {
           $query=insert_update_delete("UPDATE SECURITY_USER SET SECURITY_USERNAME='".$_POST['username']."',SECURITY_NAME='".$_POST['name']."',FK_SECURITY_GROUPNAME='".$_POST['group']."',FK_OFFICE_NAME='".$_POST['office']."',SECURITY_PASSWORD='".md5($_POST['password'])."' WHERE SECURITY_USERNAME = '".$_POST['primarykey']."' ");
           $_SESSION['operation']="update";
       }
   }

   elseif ($_POST['security_user']=="delete") {
          $query=insert_update_delete("DELETE FROM SECURITY_USER WHERE SECURITY_USERNAME ='".($_POST['username'])."' ");
          $_SESSION['operation']="delete";
           $_SESSION['message']="Delete Successfully";
   }
    header('Location:../../../../../users.php');

 ?>