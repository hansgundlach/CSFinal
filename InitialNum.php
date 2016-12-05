<?php

require("config.php");
require("dbutil.php");
session_start();

//check if 4 numbers are already generated and
//set 4 numbers if they are not
if(!isset($_SESSION['numList'])){
//select random row of database
    $query = "SELECT numSet FROM `24list` order by rand() LIMIT 1";
    $result = $db -> prepare($query);
    $result -> execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $_SESSION['numList'] =  implode(" ",$row);
}


echo  $_SESSION['numList'];

?>
