<!DOCTYPE HTML>


<html>
<?php
//start session and set the score of the user to 0 at the begining
session_start();
$_SESSION['score'] =  0 ;

?>

<head>
	<title>Example Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- added font family for 24 logo -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" type="text/css" href="Final.css">

</head>

<body>


<div class = "text-center">
	<div class = "jumbotron">
	<h1 class ="Main24">24</h1>
	</div>

<form action="FinalView.php" method="POST">
	<h2>Input name and press send to play 24</h2>

		<h2>Name:</h2>
		<input type="text" name="name" required />

	<input type="submit" class = "btn btn-primary btn-lg"/>
</form>
</div>
</body>
</html>
