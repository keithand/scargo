<?php 
		
		require('pass.php');
		require('../dbconnect.php');
		require('header.html');


	function escape_data($data){
		if(ini_get('magic_quotes_grc')){
			$data = stripslashes($data);
		}
		if (!is_numeric($data)){
			$data = mysql_real_escape_string($data);
		}

		return $data;
	};

	$id = $_GET['id'];
	$cat_array = array('Appetizers', 'Salads', 'Sandwiches', 'Entrees', 'Sides', 'Desserts');
	echo "<section id='edit-dish'><h2>Edit Dish</h2>";

if($_GET['confirm'] == 'yes'){
	$name = escape_data($_POST['name']);
	$price = escape_data($_POST['price']);
	$desc = escape_data($_POST['desc']);
	$category = escape_data($_POST['category']);

	$sql = "UPDATE `scargo cafe menu` SET name='$name', `desc`='$desc', category='$category', price='$price' WHERE id='$id' LIMIT 1";

	$result = mysql_query($sql);

	if($result){
?>
	<div class="notification">
		<p>Item successfully updated</p>
	</div>
<?php	
	
	} else {
?>
	<div class="notification">
		<p>Unable to update item</p>
		<p>Error: <?php echo mysql_error(); ?></p>
	</div>

<?php	
	}

} else {

	$sql = "SELECT * FROM `scargo cafe menu` WHERE id='$id' LIMIT 1";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);

	$name= $myrow['name'];
	$price= $myrow['price'];
	$desc= $myrow['desc'];
	$category= $myrow['category'];



};

	?>
<h4 class='clear'><a href='index.php'>Back</a></h4>
<form action='<?php echo $_SERVER['PHP_SELF'] . "?id=$id&confirm=yes"?>' method="post">

	<p>
		<input name='name' type='text' id='name' value='<?php echo $name; ?>' />
	</p>

	<p>
		<input name='price' type='text' id='price' value='<?php echo $price; ?>' />
	</p>
	
	<p>
		<textarea name='desc' id='desc'><?php echo $desc; ?></textarea>
	</p>

	<p>
		<select id='category' name='category'>

<?php	
	foreach($cat_array as $cat_name){
		if($cat_name == $category){
			echo "<option value='cat_name' selected='selected'>$cat_name</option>";
		} else {
			echo "<option value='$cat_name'>$cat_name</option>";
		}
	};
?>	
		</select>
	</p>
	<p>
		<input type='submit' name='submit' id='submit' value='submit'/>
	</p>
</form>

<?php echo "</section>" ?>
