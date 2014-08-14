<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}
?>



<?php

function fetchDate() {
    session_start();
    require_once("../../../connection.php");
    $query=select_info_multiple_key("SELECT COUNTER from GENERATOR WHERE GENERATOR_NAME = 'BARCODE' ");
    echo $query[0]['COUNTER'];
}

function fetchOffice() {
    session_start();
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    require_once("../../../connection.php");
    $query=select_info_multiple_key("SELECT FK_OFFICE_NAME from security_user WHERE SECURITY_USERNAME = '".$_SESSION['usr']."' ");
    $value= substr($query[0]['FK_OFFICE_NAME'],0,3);
    return $value;
}

function fetchCounter() {
    session_start();
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    require_once("../../../connection.php");
    $query=select_info_multiple_key("SELECT COUNTER from GENERATOR WHERE GENERATOR_NAME = 'BARCODE' ");
    $gen= $query[0]['COUNTER'];

    if (dateRotate(date('Ymd'))) {
        $gen=$gen+1;
    }
    else {
        $gen=1;
    }

    insert_update_delete("UPDATE GENERATOR SET COUNTER='.$gen.' WHERE GENERATOR_NAME = 'BARCODE'");
    return $gen;
}

function dateRotate($daynow) {
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    require_once("../../../connection.php");
    $query=select_info_multiple_key("SELECT TRANSDATE from GENERATOR WHERE GENERATOR_NAME = 'BARCODE' ");
    //echo $query[0]['TRANSDATE'];
    if (strtotime($query[0]['TRANSDATE']) < strtotime($daynow)) {
        return false;
    }
    elseif (strtotime($query[0]['TRANSDATE']) == strtotime($daynow)) {
        return true;
    }

}


//session_start();
session_start();
    $now = new DateTime();
    $year = $now->format("y");
    $month = $now->format("m");
    $day= $now->format("d");

    //$val = 5;
    //$val=fetchCounter();
   // echo $val;
   // echo date('Ymd'). "<br>";
   echo fetchOffice(). "-" .$year.$month.$day. "-" .fetchCounter();
  //  echo "<br>";
  //   returnstring();
  //  }


?>