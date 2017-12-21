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
   	$query="UPDATE `players` SET `score`= '$score' WHERE `name`= '$name';";
    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful

    if ($result) {
        echo 'Data Inserted';
		
    } else {
        echo 'Data Not Inserted';
    }
    
    //mysqli_free_result($result);
    mysqli_close($connect);
	header('location:index.php');
}

?>