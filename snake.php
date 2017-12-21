<?php
session_start();

// php code to Insert data into mysql database from input text
if(isset($_GET['w1']))
{
    // get values form input text and number

    $score = $_GET['w1'];
    $name = $_SESSION['username'];
    // connect to mysql database using mysqli
    include_once 'dbconn.php';
      
    // mysql query to insert data
   	//$query="UPDATE `players` SET `score`= '$score' WHERE `name`= '$name';";
    //$result = mysqli_query($connect,$query);
    
	
	// Take existed score from table
    $sql = "SELECT `score` FROM `players` WHERE `name`= '$name';";
    $test = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($test);
    $var = $row['score'];

    // Take current score with score in database
    if ($_GET['w1'] > $var) {
    
        // mysql query to update data
        $query="UPDATE `players` SET `score`= '$score' WHERE `name`= '$name';";
		
    } else {
        header('location:index.php');
    }

    $result = mysqli_query($connect,$query);
	header('location:index.php');
	    
    
    //mysqli_free_result($result);
    mysqli_close($connect);
	
	
}

?>