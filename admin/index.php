<?php
	require('pass.php');
	require("../dbconnect.php");
	require("header.html");
	$sql_menu = "SELECT * FROM `scargo cafe menu` ORDER BY cat_sort, name";
	$result_menu = mysql_query($sql_menu);

	echo "<section id='menu-list'><h2>Edit Menu</h2><h4 class='clear'><a href='add_dish.php'>Add Dish</a></h4> <ul id='column' class='leaders'>";

	while($myrow = mysql_fetch_array($result_menu)){
		$id = $myrow['id'];

		echo "<li class='item'>
		
		<span class='name'>{$myrow['name']}</span>
		<span class='category'>{$myrow['category']}</span>";

		$edit = "<a href='edit_dish.php?id=$id'>Edit</a>";
		$delete = "<a href='delete_dish.php?id=$id'>Delete</a>";

		
		echo "<p class='edit'>$edit | $delete</p></li>";
	};

	echo "</ul></section>";


?>