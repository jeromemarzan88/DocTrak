<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}
?>




<?php
    require_once("../../../connection.php");
    session_start();
    $query=select_info_multiple_key("select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from DOCUMENTLIST WHERE DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%' ORDER BY DOCUMENT_ID");

    echo "<table>";
	echo "<tr class='bgcolor'>";
   	echo "<th>Barcode</th>";
	echo "<th>Title</th>";
    echo "<th>Date</th>";
	echo "</tr>";
	echo "</table>";
$rowcolor="blue";
  if ($query) {
 foreach($query as $var) {

     if ($rowcolor=="blue")
     {
         echo '<tr id="'.$var["DOCUMENT_ID"].'" class="usercolor" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$var["DOCUMENT_FILENAME"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\')">';
        // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
         $rowcolor="notblue";
     }
     else
     {
         echo '<tr id="'.$var["DOCUMENT_ID"].'" class="usercolor1" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$var["DOCUMENT_FILENAME"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\')">';
        // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
         $rowcolor="blue";
     }
     // print "<tr class=\"d".($i & 1)."\">";
   //  echo "<a onClick=clickSearch(".$var["SECURITY_USERNAME"].")>".$var["SECURITY_USERNAME"]."</a>";
    
	
	
	echo "<td style='width:80px;'>";
	 echo $var["DOCUMENT_ID"];
	 echo "</td><td>";
     echo $var["DOCUMENT_TITLE"];
     echo "</td><td>";
     echo $var["transdate"];

     echo "</td>";
     echo"</tr>";




  //   echo"
  //   <tr>
  //     <td><input type='image' value='".$var["SECURITY_USERNAME"]."' onclick='searchuser(this.value);' /></td>
  //     <td>".$var["SECURITY_NAME"]."</td>
  //   </tr>
  //   ";

        }
  }
    else {
        echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";

    }
//echo "<tr> <td>";
//echo "asdasd";
    //   echo "</tr> </td>";


?>