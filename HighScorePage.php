<html>

<head>
  <!-- bootstrap css library import -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- added Lobster font  for 24 logo -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  <link rel="stylesheet" type="text/css" href="Final.css">
</head>


 <div class= "text-center">
<div class ="jumbotron">
  <p>
   <h1>Top Ten Users</h1>
</p>
</div>
<br>
<table class = "table text-center">

<?php
require("dbutil.php");
//$query selects top ten ( LIMIT 10) user by score
// hans_users is a data table of high scoring users with two columns name and score
//LIMIT 10 to only show top ten highest scoring users
$result = modData("SELECT * FROM hans_users order by score DESC LIMIT 10");
//while loops goes through every row ($row) in high score user datatable
while ($row = $result -> fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    //$user ,$score are the username and userscore respectivly from datatable of high scorers
    $user  = $row['user'];
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
