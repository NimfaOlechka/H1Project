<?php

// show top 5 players
if (isset($_POST['top5']))
{
    
  $connect = mysqli_connect('localhost', 'root', '', 'mydb');
  if($connect === false)
  {
    die ("No connection").mysqli_connect_error();
  }

// select all from my database
  $query1 = "SELECT name, id FROM `users` ORDER BY id ASC LIMIT 5 ";
  $result = mysqli_query($connect,$query1);

//push it to array
  $json_array= array();
  while($row = mysqli_fetch_assoc($result))
  {
    $json_array[] = $row;

  }

//echo $result;
//encode into json format
  $json = json_encode($json_array);

  

//printing result of encoded file on the screen 
    #  echo $json;

echo $json[0]['name'];
//saving into backup file
  file_put_contents("mytop5.txt", $json);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>TOP 5</title>
</head>
<body>

  <div class="header">

    <h2> TOP 5 PLAYeRS </h2>

  </div>

   
  <form method="post" action="top5.php" class="input_form">

  <div class="input">

      <button type="submit" class="btn" name="top5">Top 5 Players</button>

      

  </div>

    
  </form>

</body>
</html>
