<?php

require("config.php");
require("dbutil.php");
session_start();

//select randm row of database
    $query = "SELECT numSet FROM `24list` order by rand() LIMIT 1";
    $result = $db -> prepare($query);
    $result -> execute();
    //$result = mysql_query("SELECT numSet FROM `24list` WHERE numSet= "6,6,6,6" LIMIT 1");
 //$row = mysql_fetch_assoc($result);
  $row = $result->fetch(PDO::FETCH_ASSOC);
    //echo $tub;


//do I really need this parameters
$q = $_REQUEST["q"];

$hint = "blob ";
//please change session variable
//value is changing just not visible
//$_SESSION['score'] =  $_SESSION['score']+1;

echo implode(" ",$row);

?>
