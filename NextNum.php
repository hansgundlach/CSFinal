<?php
session_start();
require("config.php");
require("dbutil.php");

//select one (LIMIT 1) random row of database
//each row contains a string of four numbers
$query = "SELECT numSet FROM `hans_24list` order by rand() LIMIT 1";
$row = getData($query);
//implode  combines comma seperated string into one string
$_SESSION['numList'] =  implode(" ",$row);
//echo send four numbers to Final.js
echo $_SESSION['numList'];

?>
