<?php
session_start();
require ("dbutil.php");

// isset () check if 4 numbers are already generated and
// statement set 4 numbers if they are not set
if (!isset($_SESSION['numList']))
	{
	//$query select random row of database
	$row   =  getData("SELECT numSet FROM hans_24list order by rand() LIMIT 1");
  //implode() takes string with commas like :  "4,4,4,4" and makes it "4 4 4 4 "
	$_SESSION['numList'] = implode(" ", $row);
	}

echo $_SESSION['numList'];
?>
