yu<html>


<?php
// Start my session at the very beginning of the page
// I only need to do this because I may be using the $_SESSION variable
session_start();
?>

<head>
<link rel= "stylesheet" type = "text/css" href= "Final.css">
<!-- latest version of jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- added font family for 24 logo -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">

</head>






<div class = "text-center">
<div class = "jumbotron">
<h1 id ="Main24">24</h1>
</div>
<p>
  <h2>
   Your Four Numbers Are : <span id= "Numbers"> </span>
   Your name is : <span id= "Name"></span>
 </h2>
</p>

<!--<form action= "evaluate.php">-->
<nav>


<ul>

<li>

<input type= "text" id="24Expres" ></li>
<li>
<button type = "button" id= "check" class = "btn btn-primary btn-lg"> Check Answer </button></li>
</ul>
</nav>
<p>
   Result : <span id = "Result"> </span>
</p>
<br>

<button type = "next" id= "next" class = "btn btn-primary btn-lg"> Another 24</button>
<br>
<br>

<div class= "well well-lg">
<p>
Try to make  24 using the four numbers above and the operations + , - , * ,and ().
This means no exponentials or  factorials!
<br>
For Example : 2*6 + 2*6 Works
<br>
3*(2^3)*1 Doesn't work
</p>

</div>

</div>

















<?php
















if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	if (isset($_POST['name']))
	{
		// Now the session variable "name" is set.
		// This means that any other PHP pages on this site
		// will have access to this variable until the user
		// closes the browser
		$_SESSION['examplePage_name'] = $_POST['name'];
    //I'm setting another php variable


	}
?>
	<p id="intro"> Hello, <?= $_SESSION['examplePage_name'] ?>! Your name has been saved to a session variable, which will be convenient later. Now, Let's have some fun with AJAX. I'm going to generate the text below by accessing data from another PHP page entirely, but without reloading the page! Go ahead, click a button.</p>
	<!-- Below, we use the onclick event to run a Javascript function (defined above) when you click on a button! This is similar to AppLab's onEvent functionality.. -->
    You score
  <p id = "score"> Your score is <?= $_SESSION['score'] ?> </p>

  </p>
<?php
}
else
{
?>
	<p>Oops! You shouldn't be viewing this page via GET request. Start from <a href="enterName.php">the enterName page</a> instead.</p>
  <p id="intro"> Hello, <?= $_SESSION['examplePage_name'] ?>! Your name has been saved to a session variable, which will be convenient later. Now, Let's have some fun with AJAX. I'm going to generate the text below by accessing data from another PHP page entirely, but without reloading the page! Go ahead, click a button.</p>
  <!-- Below, we use the onclick event to run a Javascript function (defined above) when you click on a button! This is similar to AppLab's onEvent functionality.. -->
    You score
  <p id = "score"> Your score is <?= $_SESSION['score'] ?> </p>






<?php
}
?>

<a href= "HighScorePage.php">High Score Page</a>

<script src= "Final.js" type = "text/javascript"></script>
</html>
