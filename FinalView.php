<?php
   session_start();
   ?>
<html>
   <head>
      <link rel= "stylesheet" type = "text/css" href= "Final.css">
      <!-- latest version of jquery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- added font family for 24 logo -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
      <!-- connect to js file with jquery/ajax request to interact with user input -->
      <script src= "Final.js" type = "text/javascript"></script>
   </head>
   <?php
      require("dbutil.php");
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

          //if statement checks if the users's name is already set
          if (isset($_POST['name'])) {
              //htmlspecialchars deals with  any character the user may have entered that
              //could mess with the html
              //session variable userName contains name user enterered on UserName.php
              $cleanVar             = htmlspecialchars($_POST['name']);
              $_SESSION['userName'] = $cleanVar;

          }
       else {
          //else statement for when users gets to FinalView.php without going to  UserName.php
          //error_reporting(0) stops dispaying errors on page so
          //I can make custom report
          error_reporting(0);
          echo "<h2>You are not Supposed to be on this page. Go to the <a href = 'UserName.php'> username page </a> <h2>";
      }
    }
      ?>
   <div class = "jumbotron container-fluid ">
      <h2> Hello, <?= $_SESSION['userName'] ?></h2>
      <h2 id = "score">You're score is  <?= $_SESSION['score'] ?> </h2>
      <div class="text-center">
         <h1 class ="Main24">24</h1>
      </div>
   </div>
   <div class = "text-center">
      <p>
      <h2>
         Your Four Numbers Are : <span id= "Numbers"> <?= $_SESSION['numList'] ?> </span>
      </h2>
      </p>
      <input type= "text" id="24Expres" >
      <button type = "button" id= "checkAnswer" class = "btn btn-primary btn-lg"> Check Answer </button>
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
            For Example : 2*6 + 2*6 Works and 3*(2^3)*1 Doesn't work
            <br>
            Check out the <a href= "HighScorePage.php">High Score Page</a>
         </p>
      </div>
   </div>
   <script src= "Final.js" type = "text/javascript"></script>
</html>
