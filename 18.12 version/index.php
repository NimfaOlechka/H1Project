
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

	<link rel="stylesheet" type="text/css" href="mystyle.css">

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
            //echo $_SESSION['info'];

          	unset($_SESSION['success']);
            //unset($_SESSION['info']);

          ?>

      	</h3>

      </div>

  	<?php endif ?>



    <!-- logging in user information -->

    <?php  if (isset($_SESSION['username'])) : ?>

    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <!--p><?php //echo $_SESSION['info']; ?></p-->

    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>

    <?php endif ?>

    <form class="output" method="_GET">
    <!--video clip-->
      <div class='video'>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/qTSDL94_Y7M" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen>
        </iframe>

      </div>
    
<!--displaying information from other table-->
      <div class='info'>
        <table class='table'>
          <tr>
            <th>Score</th>
          </tr>
          <? php 
          if (mysqli_num_rows($_SESSION['score'])>0)
            { while($row = mysqli_fetch_array($_SESSION['score'])
              {
          ?>
          <tr>
            <td><?php echo $row['score']; ?></td>
          </tr>
          <? php
            }
          }
          ?>
          
        </table>
      </div>

    </form>

</div>

		

</body>

</html>