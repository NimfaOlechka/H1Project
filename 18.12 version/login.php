<?php
//connection with players database
include ('dbconnect.php')
?>

<!DOCTYPE html>
<html>
<head>
	<title>H1 Project</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<script src="SonScript.js"></script>
</head>
<body>
  <div class="header">
  	<h2> Login </h2>
  </div>

	 
  <form method="post" action="" class="input_form">

	  	<?php include('errors.php'); ?>

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