<?php
session_start();
require("dbutil.php");

//increment session score
$_SESSION['score'] = $_SESSION['score'] + 1;

//set session score and  username  to $pageScore and $pageUser for ease of use in
//rest of program
$pageScore = $_SESSION['score'];
$pageUser  = $_SESSION['userName'];

//$query retrieve the 1oth highest score and limits response size to 1 row
$query  = "SELECT score FROM `hans_users` order by score LIMIT 1 OFFSET 10";
$result = $db->prepare($query);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
//$row is int value of the 10th highest user's score
$row = (int) $row;

//if user score based on session variable ($pageScore) is higher than
//10th higest scoring user in table ($row) then add user to higscore table
if ($pageScore > $row) {
    //$usercheck looks in the database hans_users to see if $pageUser is present
    $userCheck = "SELECT * FROM hans_users WHERE user = '$pageUser'";
    $check     = $db->prepare($userCheck);
    $check->execute();

    //check if user is already in database
    if ($check->rowCount() > 0) {
        $checkResult = $check->fetch(PDO::FETCH_ASSOC);
        //change user entry if user score if user is already in highscore

        // sameUserScore retrieve score of user with same username
        $sameUserquery  = "SELECT score FROM hans_users WHERE user = '$pageUser'";
        $sameUserresult = $db->prepare($sameUserquery);
        $sameUserresult->execute();
        $sameUserScore = $sameUserresult->fetch(PDO::FETCH_ASSOC);
        $UserScore     = (int) $sameUserScore;

        //if statement only update user score if new score is higher than old one
        if ($pageScore > $UserScore) {
            $update = " UPDATE hans_users SET score ='$pageScore' WHERE user = '$pageUser'";
            $update = $db->prepare($update);
            $update->execute();
        }

    } else {
        //$query deletes user at bottom of database
        //used to keep database to reasonanble size
        $query  = "DELETE FROM hans_users ORDER BY score LIMIT 1";
        $result = $db->prepare($query);
        $result->execute();

        //$query insert new  username and score into database if user is not already there
        $newUSE = "INSERT INTO `hans_users` (`user`, `score`) VALUES ('$pageUser','$pageScore')";
        $result = $db->prepare($newUSE);
        $result->execute();


    }
}

echo $pageScore;


?>
