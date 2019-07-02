<?php 
	
/*
	//ternary operation
	$score = 50;
	$val = $score > 20 ? 'High score' : 'Low score';
	echo $val;
*/
/*
	//superglobals
	// $_GET['name'], $_POST['name']

	echo $_SERVER['SERVER_NAME'] . '<br>';
	echo $_SERVER['REQUEST_METHOD'] . '<br>';
	echo $_SERVER['SCRIPT_FILENAME'] . '<br>';
	echo $_SERVER['PHP_SELF'] . '<br>';
*/

/*
	//sessions & cookies

	if(isset($_POST['submit'])){
		
		//cookie for gender
		setcookie('gender', $_POST['gender'], time() + 86400);//(cookie adı, cookienin nerden gelceği, expire time)


		session_start();
		$_SESSION['name'] = $_POST['name'];

		header('Location: index.php');

	}
*/
	//file system - part 1







?>

<!DOCTYPE html>
<html>
<head>
	<title>php devam</title>
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="text" name="name">
		<input type="submit" name="submit" value="submit">
		<select name="gender">
			<option value="male">male</option>
			<option value="female">female</option>
		</select>
	</form>

</body>
</html>