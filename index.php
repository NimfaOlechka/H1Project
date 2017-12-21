
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

		<!--Snake game-->
		
			<script>
				function myScroll() 
				{
					window.onscroll = function () { window.scrollTo(0, 0); };
				}
			</script>
			
				<div class="center">
					<canvas id="canvas" width="560" height="250" style="border:1px solid #000000;"></canvas>
						<br>
					<button id="btn" onclick="myScroll()"> START </button>
				</div>
			
			 
			 <script src="snake.js"></script>
			 <script src="app.js"></script>
			
			
		<!--displaying top 5 players from db-->
		<div class="header">
				<h2> TOP 5 PLAYERS </h2>
		</div>
			<form>
				<table style="width:40%" >
					<th> 
						Name
					</th>
					<th> 
						Score
					</th>
				<?php
				 include_once 'dbconn.php';
					$sql="SELECT name, score FROM `players` ORDER BY score DESC LIMIT 5;";
					$records=mysqli_query($connect,$sql);
					$recordsCheck = mysqli_num_rows($records);
				
					if ($recordsCheck > 0)
						{
							while($row = mysqli_fetch_assoc($records)){
							echo "<tr>";
							echo "<td>".$row['name']."</td>";
							echo "<td>".$row['score']."<br>"."</td>";
							echo "</tr>";
						}
			  
					}
			 
				?>
			  </table>
			</form>
	</div>
</body>

</html>