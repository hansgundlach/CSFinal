<?php
require("config.php");
require("dbutil.php");
session_start();

//select one (LIMIT 1) random row of database
//each row contains a string of four numbers
$query = "SELECT numSet FROM `24list` order by rand() LIMIT 1";
$result = $db -> prepare($query);
$result -> execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
$_SESSION['numList'] =  implode(" ",$row);
//echo send four numbers to Final.js
echo $_SESSION['numList'];
// implode(" ",$row);
?>
