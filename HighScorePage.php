<html>









<p>
   High Score Users
</p>



<?php

require("config.php");
require("dbutil.php");





  $query="SELECT * FROM `userscore`";
  $result = $db -> prepare($query);
  $result -> execute();


    //loops through each "row" of database fetched via fetx
  while ($row = $result->fetch(PDO::FETCH_ASSOC))
  {
    //$lastdet is the determinant of a past matrix submitted to the  database
    //$lasttrace is the trace of a past matrix submitted to the database
  echo "<br>";
  $lastdet = $row['user'];
  $lasttrace = $row['score'];
  echo "$lastdet         $lasttrace";
  }




?>




<a href= "FinalView.php">Get Back to Playing</a>










</html>
