<?php
//making connection
include_once 'dbconn.php';

$sql="SELECT scores.score, users.name FROM scores INNER JOIN users ON scores.user_id=users.id ORDER BY scores.score DESC LIMIT 5;";
$records=mysqli_query($connect,$sql);
$recordsCheck = mysqli_num_rows($records);

?>
<!DOCTYPE html>
<html>
<head>
  <title>TOP 5</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="header">
    <h2> TOP 5 PLAYERS </h2>
  </div>
   <table style="width:30%" >
   <th> 
   Name
   </th>
   <th> 
  Score
   </th>
  <?php
  if ($recordsCheck > 0){
	 while($row = mysqli_fetch_assoc($records)){
	  echo "<tr>";
	  echo "<td>".$row['name']."</td>";
	  echo "<td>".$row['score']."<br>"."</td>";
	  echo "</tr>";
	  
  }
  
  }
 
  ?>
  </table>

</body>