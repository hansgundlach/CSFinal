<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- added font family for 24 logo -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" type="text/css" href="Final.css">
</head>


 <div class= "text-center">
<div class ="jumbotron">
  <p>
   <h1>High Score Users</h1>
</p>
</div>
<br>
<table class = "table text-center">

<?php

require("config.php");
require("dbutil.php");
//$query selects top ten user by score
  $query="SELECT * FROM `userscore` order by score DESC LIMIT 10";
  $result = $db -> prepare($query);
  $result -> execute();

//while loops goes through every row in high score user database
//and displays table rows produced by $query
  while ($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "<tr>";
  $user = $row['user'];
  $score = $row['score'];
  echo "<td class = 'text-center'> $user </td>";
  echo "<td class = 'text-center'>  $score </td>";
  echo "</tr>\n";
  }

?>

</table>
<br>

<h1><a href= "FinalView.php">Go Back to Playing</a></h1>




</div>

</html>
