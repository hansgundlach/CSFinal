<?php
session_start();
require ("dbutil.php");

// isset () check if 4 numbers are already generated and

/*if (!isset($_SESSION['numList']))
	{
  // set 4 numbers if they are not set

	//getData query select  1 (LIMIT 1) random row of datatable
	//hans_24list is a datatable containign a string with four numbers
	$row   =  getData("SELECT numSet FROM hans_24list order by rand() LIMIT 1");
  //implode() takes string with commas like :  "4,4,4,4" and makes it "4 4 4 4 "
	$_SESSION['numList'] = implode(" ", $row);
}*/


$min = 1;
$max = 9;

$val1 =   rand( (int) $min , (int) $max );
$val2 =   rand( (int) $min , (int) $max );
$val3 =   rand( (int) $min , (int) $max );
$val4 =   rand( (int) $min , (int) $max );

$final_set  = " " . strval($val1) . " " . strval($val2) . " " . strval($val3) . " " . strval($val4) . " ";
//var_dump($final_set); bug fixing
$_SESSION['numList'] = $final_set;
//echo send four numbers to Final.js
echo $_SESSION['numList'];
?>
