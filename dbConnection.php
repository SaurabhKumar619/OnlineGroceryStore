<?php

	$servername = "localhost";
	$username = "potiro";
	$password = "pcXZb(kL";
	$dbname = "poti";

	$connect = mysqli_connect($servername, $username, $password, $dbname);

	if(!$connect)
		die("Could not connect to the Server");


	
?>