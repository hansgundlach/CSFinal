<?php
session_start();
require("dbutil.php");

//select one (LIMIT 1) random row of datatable
//hans_24list is a data table containign a string with four numbers
//$row = getData("SELECT numSet FROM `hans_24list` order by rand() LIMIT 1");
//implode  combines comma seperated string into one string
//$_SESSION['numList'] =  implode(" ",$row);

//randomized verison of game with no 24 database
$min = 1;
$max = 9;

$val1 =   rand( (int) $min , (int) $max );
$val2 =   rand( (int) $min , (int) $max );
$val3 =   rand( (int) $min , (int) $max );
$val4 =   rand( (int) $min , (int) $max );

$final_set  = " " . strval($val1) . " " . strval($val2) . " " . strval($val3) . " " . strval($val4) . " ";
//var_dump($final_set); bug fixing
$_SESSION['numList'] = $final_set;
//echo send four numbers to Final.js
echo $_SESSION['numList'];

?>
