<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}




   require_once("../../../connection.php");
   date_default_timezone_set($_SESSION['Timezone']);


 if ($_POST['document_hidden']=="save") {
       if ($_POST['primarykey'] == "") {
           global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
           $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
           if (mysqli_connect_error()) {
               echo "Failed to connect to MySQL: " . mysqli_connect_error();

           }
           mysqli_autocommit($con,FALSE);
           $flag=true;
           // CHECK IF INPUTFILE IS EMPTY START
           if (empty($_FILES['pdffile']['name'])){
               $query="INSERT INTO documentlist(DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILE,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,FK_SECURITY_USERNAME,TRANSDATE,FK_OFFICE_NAME_DOCUMENTLIST) VALUES ('".$_POST['barcode']."','".$_POST['title']."','".$_POST['description']."','".$_POST['pdffile']."','".$_POST['template']."','".$_POST['type']."','".$_SESSION['usr']."','".date("Y-m-d H:i:s")."','".$_SESSION['OFFICE']."')";

           }
           else {
               $UploadFilename=$_POST['barcode']."$".$_FILES['pdffile']['name'];
               $query="INSERT INTO documentlist(DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILE,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,FK_SECURITY_USERNAME,DOCUMENT_FILENAME,TRANSDATE,FK_OFFICE_NAME_DOCUMENTLIST) VALUES ('".$_POST['barcode']."','".$_POST['title']."','".$_POST['description']."','".$_POST['pdffile']."','".$_POST['template']."','".$_POST['type']."','".$_SESSION['usr']."','".$UploadFilename."','".date("Y-m-d H:i:s")."','".$_SESSION['OFFICE']."')";

           }
           // CHECK IF INPUT FILE IS EMPTY END

           $RESULT=mysqli_query($con,$query);
           if (!$RESULT) {
               $flag=false;
               echo mysqli_error($con);
               echo "<br>";
           }
           $query="SELECT  fk_office_name,SORT FROM template_list WHERE fk_template_id= '".$_POST['template']."' order by sort asc";
           $RESULT=mysqli_query($con,$query);

           while ($row = mysqli_fetch_array($RESULT)) {
               $query="INSERT INTO documentlist_tracker(OFFICE_NAME,SORTORDER,fk_documentlist_id) VALUES ('".$row['fk_office_name']."','".$row['SORT']."','".$_POST['barcode']."')";

               $outcome=mysqli_query($con,$query);

               if (!$outcome) {
                   $flag=false;
                   echo mysqli_error($con);
                   echo "<br>";
               }
           }


          /* foreach ($recset as $value) {

           }*/
           $_FILES['pdffile']['name']=$UploadFilename;
           //echo $_FILES['pdffile']['name'];
           if ($flag) {

               $_SESSION['operation']="save";
               $_SESSION['message']="Save Successful";


                    //UPLOAD PDF FILE START
                   $targetfolder="D:/OneDrive/Projects/DocTrak/document/";
                   $targetfolder = $targetfolder . basename( $_FILES['pdffile']['name']);
                   $file_type=$_FILES['pdffile']['type'];

                    if ($file_type=="application/pdf") {
                        if(move_uploaded_file($_FILES['pdffile']['tmp_name'], $targetfolder)) {
                            echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

                        }

                     }
               mysqli_commit($con);

               echo "commit";
               //UPLOAD PDF FILE END

           }
           else {
               mysqli_rollback($con);
               $_SESSION['operation']="error";
               $_SESSION['message']="Error";
               echo "rollback";
           }
           mysqli_free_result($RESULT);
           mysqli_close($con);


       }
       else {
           //echo "UPDATE DOCUMENT SET DOCUMENT_ID='".$_POST['barcode']."',DOCUMENT_TITLE='".$_POST['title']."',DOCUMENT_DESCRIPTION='".$_POST['description']."',DOCUMENT_FILE='".$_POST['file']."',FK_TEMPLATE_ID='".$_POST['template']."',FK_DOCUMENTTYPE_ID='".$_POST['type']."' WHERE DOCUMENT_ID = '".$_POST['primarykey']."' ";
           $query=insert_update_delete("UPDATE documentlist SET DOCUMENT_ID='".$_POST['barcode']."',DOCUMENT_TITLE='".$_POST['title']."',DOCUMENT_DESCRIPTION='".$_POST['description']."',DOCUMENT_FILE='".$_POST['pdffile']."',FK_TEMPLATE_ID='".$_POST['template']."',FK_DOCUMENTTYPE_ID='".$_POST['type']."' WHERE DOCUMENT_ID = '".$_POST['primarykey']."' ");

           $_SESSION['operation']="update";
           $_SESSION['message']="Update Successful";
       }
   }

   elseif ($_POST['document_hidden']=="delete") {

          $query=select_info_multiple_key("select * from documentlist where document_id='".($_POST['barcode'])."' and complete=1");
          if ($query)
          {
              $_SESSION['operation']="complete";
          }
          else
          {
              $query=insert_update_delete("DELETE FROM documentlist WHERE DOCUMENT_ID ='".($_POST['barcode'])."' ");
               $_SESSION['operation']="delete";
               $_SESSION['message']="Delete Successful";
          }
          

         
   }

elseif ($_POST['document_hidden']=="scrap")
	{
		$query=insert_update_delete("UPDATE documentlist SET SCRAP=1 WHERE DOCUMENT_ID ='".($_POST['barcode'])."'");
		//$query=insert_update_delete("DELETE FROM DOCUMENTLIST WHERE DOCUMENT_ID ='".($_POST['barcode'])."' ");
		echo "UPDATE documentlist SET SCRAP=1 WHERE DOCUMENT_ID ='".($_POST['barcode'])."'";
		$_SESSION['operation']="scrap";
		$_SESSION['message']="Scrapped Successful";
	}

   header('Location:../newdoc.php');

 ?>

