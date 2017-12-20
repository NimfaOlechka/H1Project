<?php
session_start();
// php code to Insert data into mysql database from input text
if(isset($_GET['w1']))
{
    // get values form input text and number

    $score = $_GET['w1'];
    
    // connect to mysql database using mysqli
    include_once 'dbconn.php';
      
    // mysql query to insert data

    $query = "INSERT INTO `scores`(`score`) VALUES ('$score') WHERE user_id=$_SESSION['username']";
        $result = mysqli_query($connect,$query);
    
    // check if mysql query successful

    if ($result) {
        echo 'Data Inserted';
    } else {
        echo 'Data Not Inserted';
    }
    
    //mysqli_free_result($result);
    mysqli_close($connect);
}

?>