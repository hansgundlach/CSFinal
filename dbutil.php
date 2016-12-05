<?php

require("config.php");

  try {
    //connect to database  based on config.php parameters and create new PDO object
      $db = new
    PDO("mysql:dbname={$GLOBALS["database"]};host={$GLOBALS["hostname"]}",
      $GLOBALS["username"], $GLOBALS["password"]);

    //allows PDO to throw exception and allow error reporting
        $db->setAttribute(PDO::ATTR_ERRMODE,
                   PDO::ERRMODE_EXCEPTION);


    }
    //server connection error  exception handling
    catch (PDOException $ex)
    {
            print ("Sorry, a database error occurred.");
            print ("(Error details: $ex->getMessage() ");
    }

?>
