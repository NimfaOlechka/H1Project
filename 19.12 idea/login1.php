<?php 
session_start();



$db = mysql_connect('localhost', 'root', '', 'mydb');

$query =mysql_query("SELECT * FROM `users`WHERE `name`= '$username' AND `password`='$password'");

if (mysql_num_rows($query)){
	while ($row = mysql_fetch_array($query)) 
	{
		foreach ($row as $key => $value) 
		{
			echo $key."<br>";
		}

	}
} else { echo("Nothing");}

?>