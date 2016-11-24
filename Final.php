<?php

require("config.php");
session_start();
  //database exception handaling
  try {
    //connect to database  based on config.php parameters and create new PDO object
      $db = new
    PDO("mysql:dbname={$GLOBALS["database"]};host={$GLOBALS["hostname"]}",
      $GLOBALS["username"], $GLOBALS["password"]);

    //allows PDO to throw exception and allow error reporting
        $db->setAttribute(PDO::ATTR_ERRMODE,
                   PDO::ERRMODE_EXCEPTION);


    }
    //server connection error  exception handaling
    catch (PDOException $ex)
    {
            print ("Sorry, a database error occurred.");
            print ("(Error details: $ex->getMessage() ");
    }




    //$query retrives random row from database
    //$query="SELECT * FROM hgundlach_test";
    //$result = $db -> prepare($query);
    //$result -> execute();
//SELECT numSet FROM `24list` WHERE numSet= "6,6,6,6" LIMIT 1
    $query = "SELECT numSet FROM `24list` order by rand() LIMIT 1";
    $result = $db -> prepare($query);
    $result -> execute();
    //$result = mysql_query("SELECT numSet FROM `24list` WHERE numSet= "6,6,6,6" LIMIT 1");
 //$row = mysql_fetch_assoc($result);
  $row = $result->fetch(PDO::FETCH_ASSOC);
    //echo $tub;


//do I really need this parameters
$q = $_REQUEST["q"];

$hint = "blob ";
//please change session variable
//value is changing just not visible
//$_SESSION['score'] =  $_SESSION['score']+1;

echo implode(" ",$row);
//echo $_SESSION['score'];


//change score if answer is succesful and add to database if it is




?>
