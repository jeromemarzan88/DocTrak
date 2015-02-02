<?php
    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start();
    }
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
    {
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
    }

    require_once("../../../connection.php");
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
    if (mysqli_connect_error()) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die;
    }
  
    if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
    {
        if ($_POST['searchCheck']=='true')
        {
            $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username WHERE (document_id LIKE '%".$_POST['search_string']."%' OR document_title LIKE '%".$_POST['search_string']."%' OR security_name LIKE '%".$_POST['search_string']."%')AND scrap=0 ORDER BY transdate desc";
          
        }
        else
        {
            $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username WHERE (document_id LIKE '%".$_POST['search_string']."%' OR document_title LIKE '%".$_POST['search_string']."%' OR security_name LIKE '%".$_POST['search_string']."%')AND scrap=0 and complete=0   ORDER BY transdate desc";
           
            
        }
       
            
    }
    else
    {
        if ($_POST['searchCheck']=='true')
        {
            $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username WHERE (document_id LIKE '%".$_POST['search_string']."%' OR document_title LIKE '%".$_POST['search_string']."%' OR security_name LIKE '%".$_POST['search_string']."%')AND scrap=0 and  (fk_office_name_documentlist ='".$_SESSION['OFFICE']."') ORDER BY transdate desc";
        }
        else
        {
            $query="select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name from documentlist join security_user on documentlist.fk_security_username = security_user.security_username WHERE (document_id LIKE '%".$_POST['search_string']."%' OR document_title LIKE '%".$_POST['search_string']."%' OR security_name LIKE '%".$_POST['search_string']."%')AND scrap=0 and complete=0 and (fk_office_name_documentlist ='".$_SESSION['OFFICE']."') ORDER BY transdate desc";
        }
            
        
    }
//    echo $query;
//    die;
      
    $RESULT=mysqli_query($con,$query);
    include_once("../common/SearchFilter.php");
    $rowcolor="blue";
    echo "<tr class='usercolortest'>
        <th>Barcode</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Date</th>
    </tr>";
 
    while($var=mysqli_fetch_array($RESULT))
    {
        if (SortOrder($var["document_id"],'rollback')) {
            if ($rowcolor=="blue")
            {
                echo '<tr id="'.$var["document_id"].'" class="usercolor" onClick="retrieveDocumentTracker(\''.$var["document_id"].'\')">';
            // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
            $rowcolor="notblue";
            }
            else
            {
                echo '<tr id="'.$var["document_id"].'" class="usercolor1" onClick="retrieveDocumentTracker(\''.$var["document_id"].'\')">';
            // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
             $rowcolor="blue";
            }
      
    
        echo "<td style='width:80px;'>";
        echo $var["document_id"];
       //echo $_SESSION['keytracker'];
        echo "</td><td>";
        echo $var["document_title"];
        echo "</td><td>";
        echo $var["security_name"];
        echo "</td><td>";
        echo $var["transdate"];
        echo "</td>";
        echo"</tr>";
    }}
   
    mysqli_free_result($RESULT);
    mysqli_close($con);