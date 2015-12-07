<?php 

	require('pass.php');
	require('header.html');
	echo "<section id='edit-dish'>";
	if(isset($_POST['submit'])){
			require('../dbconnect.php');

		function escape_data($data){
			if(ini_get('magic_quotes_grc')){
				$data = stripslashes($data);
			}
			if (!is_numeric($data)){
				$data = mysql_real_escape_string($data);
			}

			return $data;
		};

		$name=escape_data($_POST['name']);
		$price=escape_data($_POST['price']);
		$desc=escape_data($_POST['desc']);
		$category=escape_data($_POST['category']);

		$sql = "INSERT INTO `scargo cafe menu` (`id`, `name`, `price`, `desc`, `category`) 
		VALUES (NULL, '$name', '$price', '$desc', '$category');";

		$result = mysql_query($sql);

		echo "<div class='notifications'><p>You have added <b>" . $name . "</b> to <b>" . $category . "</b> on your menu.</div>";

	} else {

	?>
		<h2 style='text-align:center'>Add Dish</h2>
		<h4 class='clear'><a href='index.php'>Back</a></h4>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<p>Name<input type="text" name="name" /></p>
			<p><span style='display:block'>Price</span><input type="text" name="price" class='clear' /></p>
			<p>Description<textarea name="desc"></textarea></p>
			<p><span style='display:block'>Category</span><select name="category">
				<option value="Appetizers">Appetizers</option>
				<option value="Salads">Salads</option>
				<option value="Entrees">Entrees</option>
				<option value="Sides">Sides</option>
				<option value="Desserts">Desserts</option>
			</select></p>
			<p><input type="submit" name="submit" value="submit" /></p>
		</form>

	<?php 
		};
	echo "</section>"
	?>