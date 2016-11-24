<!DOCTYPE HTML>


<html>
<?php
// Start my session at the very beginning of the page
// I only need to do this because I may be using the $_SESSION variable
session_start();
$_SESSION['score'] =  0 ;

?>
<head>
	<title>Example Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="FinalView.php" method="POST">
	<h2>Input your name to begin your adventure through session variables and AJAX calls:</h2>
	<div id="name-input">
		<label>Name:</label>
		<input type="text" name="name" required />
	</div>
	<input type="submit" />
</form>
</body>
</html>
