<?php 
	
	include('config/db_connect.php'); //en başa '/' koyma

	//write query for all pizzas ordered by 'created_at'
	$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

	//make query and get result
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);//$resulttaki queryi boşaltır.

	//close connection
	mysqli_close($conn);

/*
	$listedItems = explode(',' , $pizzas[0]['ingredients']); //örnek olarak listelenmiş içerikleri virgüller arası böler.

	foreach($listedItems as $item){
		echo $item . '<br>';
	}
*/

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php') ?>

<h4 class="center grey-text">Pizzalar!</h4>

<div class="container">
	<div class="row">
		
		<?php if(!count($pizzas)==0): ?>

			<?php foreach($pizzas as $pizza): ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<img src="img/pizza.svg" class="pizza">
						<div class="card-content center">
							<h6 class='h6 iltobold' ><?php echo htmlspecialchars($pizza['title']); ?></h6>
							<ul><?php foreach(explode(',' , $pizza['ingredients']) as $commalessIngredient): ?>

								  		<li><?php echo htmlspecialchars($commalessIngredient) ?></li>

								  <?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href='details.php?id=<?php echo $pizza['id'] ?>'>Daha fazla bilgi</a>
						</div>
					</div>
				</div>
			
			<?php endforeach; ?>

		<?php else: ?>
				<h3 class="center"style="color:#ff3300">Kayıtlı bir pizza yok.</h3>
				<h4 class="center"style="color:#ff3300">Hadi bir pizza kaydet! uwu.</h4>
		<?php endif; ?>

	</div>	
</div>

<?php include('templates/footer.php') ?>

</html>

