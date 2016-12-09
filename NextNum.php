<?php
session_start();
require("dbutil.php");

//select one (LIMIT 1) random row of datatable
//hans_24list is a data table containign a string with four numbers
$row = getData("SELECT numSet FROM `hans_24list` order by rand() LIMIT 1");
//implode  combines comma seperated string into one string
$_SESSION['numList'] =  implode(" ",$row);
//echo send four numbers to Final.js
echo $_SESSION['numList'];

?>
