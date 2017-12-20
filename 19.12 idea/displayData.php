<?php
//making connection
$connect = mysqli_connect('localhost', 'root', '', 'mydb');

$sql="SELECT name,id FROM `users` ORDER BY id DESC LIMIT 5;";
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
	  echo "<td>".$row['id']."<br>"."</td>";
	  echo "</tr>";
	  
  }
  
  }
 
  ?>
  </table>

</body>