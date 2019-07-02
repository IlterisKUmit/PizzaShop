<?php 
	
	include('config/db_connect.php');

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
		
		$sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			//success
			header('Location: index.php');
		}else{
			//failure
			echo 'Query Hatası: ' . mysqli_error($conn);
		}

	}

	//check GET req id param.
	if(isset($_GET['id'])){

		$id = mysqli_real_escape_string($conn, $_GET['id']);

		//make sql
		$sql = "SELECT * FROM pizzas WHERE id = $id";

		//get the query results
		$result = mysqli_query($conn, $sql);

		//fetch result to array format
		$pizza = mysqli_fetch_assoc($result);

		//free the $result
		mysqli_free_result($result);

		mysqli_close($conn);
	}

 ?>

 <!DOCTYPE html>
 <html>
 <?php include('templates/header.php') ?>

	<div class="container center">
		<?php if($pizza): ?>	

			<h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
			<p class="grey-text">Oluşturan: <?php echo htmlspecialchars($pizza['email']); ?></p>
			<h5 >Pizza İçeriği: </h5>
			<p class="grey-text"><?php echo htmlspecialchars($pizza['ingredients']) ?></p>
			<p class="grey-text">Oluşturulma zamanı: <?php echo date($pizza['created_at']) ?></p>

			<!-- Deleting a Pizza-->

			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>

		<?php else: ?>

			<h1 style="color:red">Yok Öyle Bi Pizza Bilader.</h1>

		<?php endif; ?>

	</div>

 <?php include('templates/footer.php') ?>
 </html>