<?php

$servername = "localhost";
$username = "root";
$password = "";


// Create connection

$conn = new mysqli($servername, $username, $password, "mydb");


// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

if (isset($_POST['login']))
 {

  $username = mysqli_real_escape_string($db, $_POST['uname']);
  $password = mysqli_real_escape_string($db, $_POST['psw']);

  if (empty($username))
   {
      array_push($errors, "Username is required");
   }

  if (empty($password)) 
  {
    array_push($errors, "Password is required");
  }


  if (count($errors) == 0) 
  {

   // $password = md5($password); // password cryptering
  
    $query = "SELECT * FROM `players`WHERE `name`= '$username' AND `password`='$password'";
    
    
    $results = mysqli_query($db, $query);
    
    if (mysqli_num_rows($results) == 1) 
    {
    // if loggin succesful then show users score
	  $query = "SELECT Score FROM `players`WHERE `name`= '$username' AND `password`='$password'";
	  $score = mysqli_query($db, $query);
      
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are logged in";
      $_SESSION['score'] = $score;

      header('location: index.php');
    } else
    {
      array_push($errors, "Wrong username/password combination");
    }

  }

}


// TOP 5 players

if (isset($_POST['top']))
{
    
  $connect = mysqli_connect('localhost', 'root', '', 'mydb');
  if($connect === false)
  {
    die ("No connection").mysqli_connect_error();
  }

// select all from my database
  $query1 = "SELECT name, score FROM `players` ORDER BY score DESC LIMIT 5";
  $result = mysqli_query($connect,$query1);

//push it to array
  $json_array= array();
  while($row = mysqli_fetch_assoc($result))
  {
    $json_array[] = $row;
  }

//encode into json format
  $json = json_encode($json_array);

//printing result of encoded file on the screen 
echo $json;

//saving into backup file
  file_put_contents("myDBBackUp.txt", $json);
}

?> 