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
$row = (int) $row;
//if user score is higher then score add user to table

if($_SESSION['score'] > $row){

$userCheck = "SELECT * FROM userscore WHERE user = '{$_SESSION['examplePage_name']}'";
$check = $db -> prepare($userCheck);
$check -> execute();
//$checkResult = $check -> fetch(PDO::FETCH_ASSOC);
if($check ->rowCount() > 0 ){
$checkResult = $check -> fetch(PDO::FETCH_ASSOC);
//$match = mysql_num_rows($checkResult);
}
else{

//for some reason this if statement isn't running
//add score to database
$query = "INSERT INTO `24s`.`userscore` (`user`, `score`) VALUES ('{$_SESSION['examplePage_name']}','{$_SESSION['score']}')";
$result = $db -> prepare($query);
$result -> execute();
}
}


//if user is already added replace user score with new score




echo $_SESSION['score'];


?>
