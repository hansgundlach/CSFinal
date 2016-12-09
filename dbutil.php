
<?php

require("config.php");

//method opens up database and returns data base variable if sucessful
//otherwise method returns null
function opendb()
{
    try {
        //connect to database  based on config.php parameters and create new PDO object
        $db = new
        PDO("mysql:dbname={$GLOBALS["database"]};host={$GLOBALS["hostname"]}",
        $GLOBALS["username"], $GLOBALS["password"]);

        //allows PDO to throw exception and allow error reporting
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;

    }
    //server connection error  exception handling
    catch (PDOException $ex) {
        print("Sorry, a database error occurred.");
        print("(Error details: $ex->getMessage() ");
    }
    //return null if server is not found
    return null;

}


//getData takes a SQL query as a string and returns a string fetched from database
//using inputed SQL query
function getData($query)
{
    $db     = opendb();
    //prepare query using PDO to prevent SQL injections
    //$result is result rreturned by query to database
    $result = $db->prepare($query);
    $result->execute();
    $result = $result->fetch(PDO::FETCH_ASSOC);
    return $result;
}


//modData takes a SQL query as input modifies data in my database
//and returns the result of the query
function modData($query)
{
    $db     = opendb();
    $result = $db->prepare($query);
    $result->execute();
    return $result;
}
?>
