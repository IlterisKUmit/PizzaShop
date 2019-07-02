<?php 
	
	include('config/db_connect.php');

	$title = $email = $ingredient = '';

	$errors = array('email' => '', 'title' => '', 'ingredients' => '' );

	if(isset($_POST['submit'])){
		
		//email kontrolü
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required. <br \>';
		}
		else {
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'EMAIL IS NOT VALID! <br \>';
			}
		}
		
		//title kontrolü
		if(empty($_POST['title'])){
			$errors['title'] = 'A title is required. <br \>';
		}
		else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Title must be a valid title with letters and stuff not numbers or special chars. <br \>';
			}
		}

		//ingredients kontrolü
		if(empty($_POST['ingredients'])){
			$errors['ingredients'] = 'At least one ingredient is required. <br \>';
		}
		else{
			$ingredient = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredient)){
				$errors['ingredients'] = 'Ingredients must be only words with comma seperated.(No special chars.) <br \>';
			}
		}
		//END OF POST CHECK
	
		if(array_filter($errors)){
			//echo 'errors in form';
		}else{

			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

			// create sql
			$sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title', '$email', '$ingredients')";

			//save to db and check
			if(mysqli_query($conn, $sql)){
				//echo 'form is valid';
				header('Location: index.php');
			}else{
				echo 'query error: ' . mysqli_error($conn);
			}

		}

	}

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php') ?>

<section class="container grey-text">
	<h4 class="center">Add a Pizza</h4>
		<!--actionun içine add.php yerine echo $_SERVER['PHP_SELF'] da yazabiliriz-->
		<form class="white" action="add.php" method="POST"><!--GET methodu sayfadaki bilgiyi URLye aktarır-->
			<label>Your Email: </label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			
			<label>Pizza Title: </label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
			<div class="red-text"><?php echo $errors['title']; ?></div>
			
			<label>Ingredients (comma seperated): </label>
			<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredient) ?>">
			<div class="red-text"><?php echo $errors['ingredients']; ?></div>
			
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>

		</form>
</section>

<?php include('templates/footer.php') ?>

</html>