<?php
session_start();
require("dbutil.php");

//increment user score
$_SESSION['score'] = $_SESSION['score'] + 1;

//set session score and  username  to $pageScore and $pageUser for ease of use in
//rest of program
$pageScore = $_SESSION['score'];
$pageUser  = $_SESSION['userName'];

// hans_users is a data table of high scoring users with two columns name and score
//getData() retrieves the 1oth highest score and limits response size to 1 row
$row = getData("SELECT score FROM `hans_users` order by score LIMIT 1 OFFSET 10");
//$row is int value of the 10th highest user's score
$row = (int) $row;

//if user score based on session variable ($pageScore) is higher than
//10th higest scoring user in table ($row) then add user to higscore table
if ($pageScore > $row) {
    //modData() query  looks in  hans_users data table to see if $pageUser is present
     $check = modData("SELECT * FROM hans_users WHERE user = '$pageUser'");


    //check if user is already in data table hans_users
    if ($check->rowCount() > 0) {
        //then change user score if user is already in highscore

        // sameUserScore retrieve score of user with same username and saves
        // the result in a vaiable of the same name
        $sameUserScore = getData("SELECT score FROM hans_users WHERE user = '$pageUser'");
        $sameUserScore     = (int) $sameUserScore;

        //if statement only updates user score if new score is higher than old one
        if ($pageScore > $sameUserScore) {
          //$update changes score for current pageUSer if pageUser is already in the high score table
            modData("UPDATE hans_users SET score ='$pageScore' WHERE user = '$pageUser'");
        }

    } else {
        //modData() query below deletes user at bottom of datatable
        //used to keep datatable to reasonanble size
        modData("DELETE FROM hans_users ORDER BY score LIMIT 1");

        //modData query below  inserts new  username and score into datatable if user is not already there
        modData("INSERT INTO `hans_users` (`user`, `score`) VALUES ('$pageUser','$pageScore')");

    }
}

echo $pageScore;


?>
