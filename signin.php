<?php
 session_start();
 //connect db
 include_once 'dbconn.php';
 
 if (isset($_POST['login'])){
 
 //setting variables
 $username = $_POST['uname'];
 $password =$_POST['psw'];
 
//selection of appropriate row frm table 
$sql="SELECT * FROM `players` WHERE `name`= '$username' AND `password`='$password';";
$records=mysqli_query($connect,$sql);
$recordsCheck = mysqli_num_rows($records);
 
 //if selection succeed - assign session variables
 if ($recordsCheck > 0)
	{
	 while ($row=mysqli_fetch_assoc($records))
		{
			$_SESSION['user_id']=$row['id'];
			$_SESSION['username']=$row['name'];
			$_SESSION['success'] = "You are at home now my Precious";
		}
	}
header('location:index.php');
 }
?>