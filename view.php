<?php
// Start my session at the very beginning of the page
// I only need to do this because I may be using the $_SESSION variable
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Example Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
	// Hey look! Inside the "script" tag, we can write JavaScript!
	window.onload = function()
	{
		// window.onload is a special function which runs when all the HTML on the page has been fully loaded.
		// At that point, let's programatically fill in one of our divs.
		// This method does NOT use AJAX, this is just Javascript.
		document.getElementById("updated-with-js").innerHTML = "This div's content was generated with Javascript!";
	}

	getContent = function(contentType)
	{
		// OK, AJAX time. This function is called when you click on one of the buttons.
		// Set up an object for our AJAX request
		var xhttp = new XMLHttpRequest();
		// Set up the callback function for when we run our request
		xhttp.onreadystatechange = function() {
			// Check that the PHP call is actually done
			if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
				// Actually update my document
				document.getElementById("updated-with-ajax").innerHTML = this.responseText;
			}
		};
		// Figure out where you're getting content from
		xhttp.open("POST", "content.php", true);
		// When you're doing an AJAX POST, you need to tell it the content type
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// OK, actually send the request! After this completes, it will hit the callback function
		// we defined above.
		xhttp.send("contentType=" + contentType);
	}
	</script>
</head>
<body>
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
	}
?>
	<p id="intro"> Hello, <?= $_SESSION['examplePage_name'] ?>! Your name has been saved to a session variable, which will be convenient later. Now, Let's have some fun with AJAX. I'm going to generate the text below by accessing data from another PHP page entirely, but without reloading the page! Go ahead, click a button.</p>
	<!-- Below, we use the onclick event to run a Javascript function (defined above) when you click on a button! This is similar to AppLab's onEvent functionality.. -->
	<button onclick="getContent('story');">Tell me a story.</button>
	<button onclick="getContent('math');">Tell me a math problem.</button>
	<div id="updated-with-ajax" class="updated">This div's content will be updated using AJAX.</div>
	<div id="updated-with-js" class="updated"></div>
<?php
}
else
{
?>
	<p>Oops! You shouldn't be viewing this page via GET request. Start from <a href="enterName.php">the enterName page</a> instead.</p>
<?php
}
?>
</body>
</html>
