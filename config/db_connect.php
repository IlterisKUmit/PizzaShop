<?php 

	//MySQLi or PDO(PDO'ya kesin bak)
	
	//connect to database
	$conn = mysqli_connect('localhost', 'ilto', 'test1234', 'ilto_pizza');//4 parametre alır: host, username, pw, database adı
	
	//check connection
	if(!$conn){
		echo 'Connection error: ' . mysqli_connect_error();
	}

 ?>