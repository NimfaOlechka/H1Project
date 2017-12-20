<?php

session_start();

// variable declaration

$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

// connect to database

$db = mysqli_connect('localhost', 'root', '', 'mydb');


// LOGIN USER

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

    //$password = md5($password); // password cryptering
  
    $query = "SELECT * FROM `users`WHERE `name`= '$username' AND `password`='$password'";
    $results = mysqli_query($db, $query);
    

    if (mysqli_num_rows($results) == 1) 
    { 
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are at home now my child";
     
      header('location: index.php');
       
    } else
    {
      array_push($errors, "Wrong username/password combination");
    }

  }

}

// show top 5 players
if (isset($_POST['top5']))
{
    
  $connect = mysqli_connect('localhost', 'root', '', 'mydb');
  if($connect === false)
  {
    die ("No connection").mysqli_connect_error();
  }

// select all from my database
  $query1 = "SELECT * FROM `users` ORDER BY id DESC LIMIT 5 ";
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
  file_put_contents("mytop5.txt", $json);
}


?>