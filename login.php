<?php include('signin.php') ?>

<!DOCTYPE html>
<html>

<head>
  <title>Login system </title>
  <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

  <div class="header">
  	<h2> Login </h2>
  </div>
	 
  <form method="POST" action="signin.php" class="input_form">
  	<!--?php include('errors.php'); ?-->
	<div class="input">
  		<label><b>Username</b></label>
  		<input type="text" name="uname" >
  	</div>

  	<div class="input">
  		<label><b>Password</b></label>
  		<input type="password" name="psw">
  	</div>

  	<div class="input">
  		<button type="submit" class="btn" name="login">Login</button>
  	</div>
 	
  </form>
</body>

</html>