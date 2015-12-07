<?php

	require('pass.php');		
	require('../dbconnect.php');
	require('header.html');
	$id = $_GET['id'];

	echo "<section id='edit-dish'><h2>Delete Dish</h2>";

	if(isset( $_GET['confirm']) and $_GET['confirm'] == 'yes'){		
		$sql = "DELETE FROM `scargo cafe menu` WHERE id='$id' LIMIT 1";
		$result = mysql_query($sql);

		if($result){
?>
		<div>
			<p>Item deleted successfully</p>
			<p><a href='index.php'>Back</a></p>
		</div>
<?php
		} else {
?>
		<div>
			 <p>You were not able to delete this item.</p>
			 <h4 class='clear'><a href='index.php'>Back</a></h4>
			 <p>Error:<?php echo mysql_error();?> </p>
		</div>
<?php
			}
		} else {
?>
		<div>
			<p>Do you want to delete this item?
			<a href='<?php echo $_SERVER['PHP_SELF'] . "?id=$id&confirm=yes"; ?>'>Yes</a>
			<a href='index.php'>No</a>
		</div>
<?php
		};

		echo "</section>"
?>