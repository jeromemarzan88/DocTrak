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
    $query=select_info_multiple_key("select OFFICE_NAME,OFFICE_DESCRIPTION from OFFICE WHERE OFFICE_NAME LIKE '%".$_POST['search_string']."%' OR OFFICE_DESCRIPTION LIKE '%".$_POST['search_string']."%' ORDER BY OFFICE_NAME");
    echo $_POST['search_string'];
	echo "<table>";
    echo "<tr class='bgcolor'>";
    echo "<th>Office</th>";
    echo "<th>Description</th>";
    echo "</tr>";
	echo "</table>";
$rowcolor="blue";
foreach($query as $var) {
        if ($rowcolor=="blue") {
            echo '<tr id="search_blue" class="usercolor" onClick="clickSearch(\''.$var["OFFICE_NAME"].'\',\''.$var["OFFICE_DESCRIPTION"].'\')">';
            echo "<td style='width:80px;'>";
            $rowcolor="notblue";
        }
    else
    {
        echo '<tr id="search_notblue" class="usercolor1" onClick="clickSearch(\''.$var["OFFICE_NAME"].'\',\''.$var["OFFICE_DESCRIPTION"].'\')">';

        echo "<td style='width:80px;'>";
        $rowcolor="blue";
    }

        // print "<tr class=\"d".($i & 1)."\">";
        echo $var['OFFICE_NAME'];
        ECHO "</td><td>";

        echo $var['OFFICE_DESCRIPTION'];
        echo "</td>";
        echo"</tr>";

        // echo "test";
}
?>