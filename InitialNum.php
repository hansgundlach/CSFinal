<?php
session_start();
require ("dbutil.php");

// isset () check if 4 numbers are already generated and

if (!isset($_SESSION['numList']))
	{
  // set 4 numbers if they are not set

	//getData query select  1 (LIMIT 1) random row of datatable
	//hans_24list is a datatable containign a string with four numbers
	$row   =  getData("SELECT numSet FROM hans_24list order by rand() LIMIT 1");
  //implode() takes string with commas like :  "4,4,4,4" and makes it "4 4 4 4 "
	$_SESSION['numList'] = implode(" ", $row);
	}

echo $_SESSION['numList'];
?>
