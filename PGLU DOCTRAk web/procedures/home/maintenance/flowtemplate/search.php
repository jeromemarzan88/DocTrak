<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}
?>




<?php
    require_once("../../../connection.php");
  
    $query=select_info_multiple_key("select  distinct TEMPLATE_ID,TEMPLATE_NAME,TEMPLATE_DESCRIPTION,document_template.FK_OFFICE_NAME from document_template join template_list on document_template.TEMPLATE_ID = template_list.FK_TEMPLATE_ID join office on template_list.FK_OFFICE_NAME = office.OFFICE_NAME where TEMPLATE_ID LIKE '%".$_POST['search_string']."%' OR TEMPLATE_DESCRIPTION LIKE '%".$_POST['search_string']."%' ORDER BY TEMPLATE_ID");
   


if ($query){

$rowcolor="blue";

echo "<tr class='usercolortest'>
                                	<th>Template</th>
                                    <th>Description</th>
                                	</tr>";

foreach($query as $var) 
    {
    
    if($_SESSION['GROUP']=='POWER ADMIN')
    {
        
        if ($rowcolor == "blue") 
        {
            echo '<tr id="'.$var["TEMPLATE_NAME"].'" class="usercolor" onClick="clickSearch(\''.$var["TEMPLATE_ID"].'\',\''.$var["TEMPLATE_NAME"].'\',\''.$var["TEMPLATE_DESCRIPTION"].'\')">';
            $rowcolor="notblue";
        }
        else
            {
                echo '<tr id="'.$var["TEMPLATE_NAME"].'" class="usercolor1" onClick="clickSearch(\''.$var["TEMPLATE_ID"].'\',\''.$var["TEMPLATE_NAME"].'\',\''.$var["TEMPLATE_DESCRIPTION"].'\')">';
                $rowcolor="blue";
            }
        echo "<td style='width:80px;'>";
        echo $var['TEMPLATE_NAME'];
        ECHO "</td><td>";
        echo $var['TEMPLATE_DESCRIPTION'];
        echo "</td>";
        echo"</tr>";
    }
    else
    {
        if ($var["FK_OFFICE_NAME"]==$_SESSION['OFFICE'])
        {
             if ($rowcolor == "blue") 
        {
            echo '<tr id="'.$var["TEMPLATE_NAME"].'" class="usercolor" onClick="clickSearch(\''.$var["TEMPLATE_ID"].'\',\''.$var["TEMPLATE_NAME"].'\',\''.$var["TEMPLATE_DESCRIPTION"].'\')">';
            $rowcolor="notblue";
        }
            else
            {
                echo '<tr id="'.$var["TEMPLATE_NAME"].'" class="usercolor1" onClick="clickSearch(\''.$var["TEMPLATE_ID"].'\',\''.$var["TEMPLATE_NAME"].'\',\''.$var["TEMPLATE_DESCRIPTION"].'\')">';
                $rowcolor="blue";
            }
            echo "<td style='width:80px;'>";
            echo $var['TEMPLATE_NAME'];
            ECHO "</td><td>";
            echo $var['TEMPLATE_DESCRIPTION'];
            echo "</td>";
            echo"</tr>";
        }
        
    }
    
    
        // echo "test";
    }

//echo "<tr> <td>";
//echo "asdasd";
    //   echo "</tr> </td>";
        }
        else{
          echo "<span style='font:11px trebuchet ms;'>Nothing found.</span>";
        }



