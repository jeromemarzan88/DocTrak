<?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
      $_SESSION['in'] ="start";
     header('Location:../../../../index.php');
}


function GenKey()
{
    global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
    require_once("../../../connection.php");
    $query=select_info_multiple_key("SELECT counter from generator WHERE GENERATOR_NAME = 'TEMPLATE' ");
    //echo $query[0]['COUNTER'];
    $countX=$query[0]['counter']+1;
    $pKey = $_SESSION['OFFICE']."-".$countX;
    
    insert_update_delete("UPDATE generator SET counter=".$countX." WHERE GENERATOR_NAME = 'TEMPLATE' ");
   
    return $pKey;
}