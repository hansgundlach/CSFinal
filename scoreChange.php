<?php
require("config.php");
require("dbutil.php");
session_start();


//change session score
$_SESSION['score'] =  $_SESSION['score'] +1 ;


//retrieve the 1oth highest score and compare
$query = "SELECT score FROM `userscore` order by score LIMIT 1 OFFSET 3";
//SELECT score FROM `userscore` order by score LIMIT 1 OFFSET 3
$result = $db -> prepare($query);
$result -> execute();
//$result = mysql_query("SELECT numSet FROM `24list` WHERE numSet= "6,6,6,6" LIMIT 1");
//$row = mysql_fetch_assoc($result);
$row = $result->fetch(PDO::FETCH_ASSOC);
if($_SESSION['score'] > $row){
//for some reason this if statement isn't running
//add score to database
$query = "INSERT INTO `24s`.`userscore` (`user`, `score`) VALUES ('{$_SESSION['examplePage_name']}','{$_SESSION['score']}')";
$result = $db -> prepare($query);
$result -> execute();

}






echo $_SESSION['score'];


?>
