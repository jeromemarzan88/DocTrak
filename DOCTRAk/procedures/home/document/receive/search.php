<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
{
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}

    require_once("../../../connection.php");

    $query=select_info_multiple_key("select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%') AND scrap=0  ORDER BY transdate desc");

    

      if ($query) {

    $rowcolor="blue";
	echo "<tr class='usercolortest'>
            <th class='sizeBARCODE'>BARCODE</th>
            <th class='sizeTITLE'>TITLE</th>
            <th>DATE</th>
        </tr>";

      include_once("../common/SearchFilter.php");
      require_once("../common/encrypt.php");

 foreach($query as $var) {
    if (SortOrder($var["DOCUMENT_ID"],'receive'))
    {

        $encrypt_trackerid=base64_encode(encryptText($_SESSION['keytracker']));
        $encrypt_documentid=base64_encode(encryptText($var["DOCUMENT_ID"]));
        $document_id=$var["DOCUMENT_ID"];
        $document_title=$var["DOCUMENT_TITLE"];
        $document_type=$var["FK_DOCUMENTTYPE_ID"];
        $template=$var["FK_TEMPLATE_ID"];
            
         if ($rowcolor=="blue")
         {
             echo '<tr id="'.$encrypt_documentid.'" class="usercolor" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$encrypt_trackerid.'\',\''.$encrypt_documentid.'\')">';
            // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
             $rowcolor="notblue";
         }
         else
         {
             echo '<tr id="'.$encrypt_documentid.'" class="usercolor1" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$encrypt_trackerid.'\',\''.$encrypt_documentid.'\')">';
            // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
             $rowcolor="blue";
         }
         // print "<tr class=\"d".($i & 1)."\">";
       //  echo "<a onClick=clickSearch(".$var["SECURITY_USERNAME"].")>".$var["SECURITY_USERNAME"]."</a>";



        echo "<td>";
        echo $var["DOCUMENT_ID"];
         //echo $_SESSION['keytracker'];
         echo "</td><td>";
         echo $var["DOCUMENT_TITLE"];
         echo "</td><td>";
         echo $var["transdate"];

         echo "</td>";
         echo"</tr>";



     }
 }



        }

    else {
        echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";

    }


?>