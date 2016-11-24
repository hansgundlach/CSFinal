<?php
require("config.php");
session_start();


//change session score
$_SESSION['score'] =  $_SESSION['score'] +1 ;


//test if database is full


echo $_SESSION['score'];


?>
