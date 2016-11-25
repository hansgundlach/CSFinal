<?php
require("config.php");
require("dbutil.php");
session_start();


//increment session score
$_SESSION['score'] =  $_SESSION['score'] +1;


//set session score and  username  to $pageScore and $pageUser fot ease of use in
//rest of program
$pageScore = $_SESSION['score'];
$pageUser = $_SESSION['userName'];

//retrieve the 1oth highest score and compare
$query = "SELECT score FROM `userscore` order by score LIMIT 1 OFFSET 10";
$result = $db -> prepare($query);
$result -> execute();


$row = $result->fetch(PDO::FETCH_ASSOC);
$row = (int) $row;

//if user score based on session variable is higher than
//10th higest scoring user on table then add user to higscore table
if($pageScore > $row){

$userCheck = "SELECT * FROM userscore WHERE user = '$pageUser'";
$check = $db -> prepare($userCheck);
$check -> execute();
//$checkResult = $check -> fetch(PDO::FETCH_ASSOC);
if($check ->rowCount() > 0){
$checkResult = $check -> fetch(PDO::FETCH_ASSOC);
//change user entry if user score if user is already in highscore
$update = " UPDATE userscore SET score ='$pageScore' WHERE user = '$pageUser'";
$update =  $db ->prepare($update);
$update -> execute();
}
else{
//insert new  username and score into database if user is not already there
$query = "INSERT INTO `24s`.`userscore` (`user`, `score`) VALUES ('$pageUser','$pageScore')";
$result = $db -> prepare($query);
$result -> execute();
}
}

echo $pageScore;


?>
