
<?php 

  session_start(); 



  if (!isset($_SESSION['username'])) {

  	$_SESSION['msg'] = "You must log in first";

  	header('location: login.php');

  }

  if (isset($_GET['logout'])) {

  	session_destroy();

  	unset($_SESSION['username']);

  	header("location: login.php");

  }

?>

<!DOCTYPE html>

<html>

<head>

	<title>Home</title>

	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>

<div class="content">

  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logging in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>

	<!--video clip-->
      <div class='video'>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/qTSDL94_Y7M" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen>
        </iframe>
      </div>
	  
	  <!--displaying top 5 players from db-->
    <form class="top5" method="_GET">
    
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
		 include_once 'server.php';
			$sql="SELECT name,id FROM `users` ORDER BY id DESC LIMIT 5;";
			$records=mysqli_query($db,$sql);
			$recordsCheck = mysqli_num_rows($records);
		
			if ($recordsCheck > 0)
				{
					while($row = mysqli_fetch_assoc($records)){
					echo "<tr>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['id']."<br>"."</td>";
					echo "</tr>";
		  		}
	  
			}
	 
	  ?>
	  </table>

    </form>

</div>

		

</body>

</html>