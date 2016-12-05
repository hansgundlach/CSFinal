<?php

require("config.php");





function opendb(){
  try {
    //connect to database  based on config.php parameters and create new PDO object
      $db = new
    PDO("mysql:dbname={$GLOBALS["database"]};host={$GLOBALS["hostname"]}",
      $GLOBALS["username"], $GLOBALS["password"]);

    //allows PDO to throw exception and allow error reporting
        $db->setAttribute(PDO::ATTR_ERRMODE,
                   PDO::ERRMODE_EXCEPTION);



return $db;

    }
    //server connection error  exception handling
    catch (PDOException $ex)
    {
            print ("Sorry, a database error occurred.");
            print ("(Error details: $ex->getMessage() ");
    }
    return null;
}

    //modData takes a SQL query as inputt modifies data in my database
    //and returns nothing

    //getData takes a SQL query and returns a string fetched from database
    function getData($query) {
        $db = opendb();
        $result = $db->prepare($query);
        $result->execute();
        $returned = $result->fetch(PDO::FETCH_ASSOC);
        return $returned;
      }

      function modData($query) {
        $db = opendb();
        $result = $db->prepare($query);
        $result->execute();
  }
?>
