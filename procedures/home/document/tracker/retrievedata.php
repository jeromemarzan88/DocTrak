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
    $query=select_info_multiple_key("select document_id,document_title,fk_template_id,fk_documenttype_id,transdate,security_name, sortorder,office_name,received_by,received_date,received_comment,released_by,released_date,released_comment,fk_office_name from documentlist join documentlist_tracker on documentlist.document_id = documentlist_tracker.fk_documentlist_id join security_user on documentlist.fk_security_username = security_user.security_username where document_id = '".$_POST['documentTracker']."' ");

    echo "<div id='details'>";
    echo "Barcode: ".$query[0]['document_id'];
    echo "<p>";
    echo "Title: ".$query[0]['document_title'];
echo "<p>";
    echo "Template: ".$query[0]['fk_template_id'];
echo "<p>";
    echo "Type: ".$query[0]['fk_documenttype_id'];
echo "<p>";
    echo "Input Date: ".$query[0]['transdate'];
echo "<p>";
    echo "Owner: ".$query[0]['security_name'];
echo "<p>";
    echo "Office: ".$query[0]['fk_office_name'];
    echo "</div>";

    echo "<table>";
    echo "<tr class='bgcolor'>";
    echo "<th>No</th>";
    echo "<th>Office</th>";
    echo "<th>Received By</th>";
    echo "<th>Received Date</th>";
    echo "<th>Received Comment</th>";
    echo "<th>Released By</th>";
    echo "<th>Released Date</th>";
    echo "<th>Released Comment</th>";
    echo "</tr>";
    echo "</table>";
    if ($query) {
    foreach($query as $var) {

        if ($rowcolor=="blue")
        {
            echo '<tr id="'.$var["sortorder"].'" class="usercolor">';
            // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
            $rowcolor="notblue";
        }
        else
        {
            echo '<tr id="'.$var["sortorder"].'" class="usercolor1">';
            // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
            $rowcolor="blue";
        }
    echo "<td>" .$var['sortorder']. "</td>";
        echo "<td>" .$var['office_name']. "</td>";
        echo "<td>" .$var['received_by']. "</td>";
        echo "<td>" .$var['received_date']. "</td>";
        echo "<td>" .$var['received_comment']. "</td>";
        echo "<td>" .$var['released_by']. "</td>";
        echo "<td>" .$var['released_date']. "</td>";
        echo "<td>" .$var['released_comment']. "</td>";
    echo "</tr>";
    }}



?>


