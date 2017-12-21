<?php
session_start();
//making connection
include_once 'dbconn.php';

$sql="SELECT * FROM `players` ORDER BY score DESC LIMIT 5;";
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
   name
   </th>
   <th> 
  score
   </th>
  <?php
  if ($recordsCheck > 0)
  {
		while($row = mysqli_fetch_assoc($records)){
		echo "<tr>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['score']."<br>"."</td>";
					echo "</tr>";
	  	 $_SESSION['id'] = $row['id'];
	}
  }
   ?>
   </table>
  <p>Welcome ur ID is <strong><?php echo $_SESSION['id']; ?></strong></p>
  </body>