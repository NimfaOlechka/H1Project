<?php

session_start();

// connect to database

$db = mysqli_connect('localhost', 'root', '', 'mydb');

// LOGIN USER
// variable declaration
$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

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

?>