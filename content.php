<?php
// Start my session at the very beginning of the page
// I only need to do this because I may be using the $_SESSION variable
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	if (isset($_POST['contentType']))
	{
		if ($_POST['contentType'] === 'story')
		{
			// Hey neat, look at how easily I can access the person's name via session variable!
			echo "Hello " . $_SESSION['examplePage_name'] . "... here's a story for you: once upon a time, the end.";
		}
		elseif ($_POST['contentType'] === 'math')
		{
			echo "Hello " . $_SESSION['examplePage_name'] . "... here's a math problem for you: 1+1=2.";
		}
		else
		{
			echo "Excuse you, that's not how you were supposed to interact with this page and you know it.";
		}
	}
}
else
{
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Example Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<p>Oops! You shouldn't be viewing this page via GET request. Start from <a href="enterName.php">the enterName page</a> instead.</p>
</body>
</html>
<?php
}
?>
