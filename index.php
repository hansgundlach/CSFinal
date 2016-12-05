<?php
   session_start();
   //start session and set the score of the user to 0
   $_SESSION['score'] = 0;

   ?>
<!DOCTYPE HTML>
<html>
   <head>
      <title>Example Page</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- added font family  Lobster for 24 logo -->
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
            <input type="submit" id= "start" class = "btn btn-primary btn-lg"/>
         </form>
         <br>
         <br>
         <div class= "well well-lg">
            <p>
               24 is a number game where you try to make 24 using four numbers and the operations + , - , * ,and ().
               This means no exponentials or  factorials!
               <br>
               For Example : 2*6 + 2*6 Works and 3*(2^3)*1 Doesn't work
               <br>
            </p>
         </div>


      </div>
   </body>
</html>
