<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- added font family for 24 logo -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" type="text/css" href="Final.css">
</head>


 <div class= "text-center">
<p>
   <h1>High Score Users</h1>
</p>

<br>
<table class = "table text-center">

<?php

require("config.php");
require("dbutil.php");





  $query="SELECT * FROM `userscore` order by score DESC ";
  $result = $db -> prepare($query);
  $result -> execute();


    //loops through each "row" of database fetched via fetx



//  echo "<table class= 'center'>";

  while ($row = $result->fetch(PDO::FETCH_ASSOC))
  {
    //$lastdet is the determinant of a past matrix submitted to the  database
    //$lasttrace is the trace of a past matrix submitted to the database
  echo "<tr>";
  //echo "<br>";
  $lastdet = $row['user'];
  $lasttrace = $row['score'];
  //echo "$lastdet         $lasttrace";
  echo "<td class = 'text-center'> $lastdet </td>";
  echo "<td class = 'text-center'>  $lasttrace </td>";
  echo "</tr>\n";
  }

//echo "</table>";


?>

</table>
<br>

<h1><a href= "FinalView.php">Get Back to Playing</a></h1>
</div>









</html>
