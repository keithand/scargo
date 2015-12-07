<html>
<head>
	<meta charset="UTF-8">
	<title>Scargo Cafe</title>
	
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css">

	<script src="jquery-2.1.4.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#button').on("click", function(){
				$('ul.nav1, ul.nav2').toggle('slow');
			});
		});
	</script>
</head>
<body>
	<header>
		<nav>
			<a href="index.php"><h1 id="logo">Scargo Cafe</h1></a>
			<a id="button">Links</a>
			<ul class="nav1">
				<a href="menu.php"><li>Menu</li></a>
				<a href="about.php"><li>About</li></a>
			</ul>
			<ul class="nav2">
				<a href="contact.php"><li>Contact</li></a>
				<a href="reservations.php"><li>Reservations</li></a>
			</ul>
		</nav>
	</header>
	<aside id="home">
		<?php 
			require("dbconnect.php");

			$result = mysql_query("SELECT * FROM operations ORDER BY cat_sort");
			

			while($myrow = mysql_fetch_array($result)){
				if($myrow['name'] == 'weekend_hours'){
					echo "<h4 id='phone'>{$myrow['text']}</h4>";
				};
				if($myrow['name'] == 'weekday_hours'){
					echo "<h4 id='phone'>{$myrow['text']}</h4>";
				};
				if($myrow['name'] == 'phone'){
					echo "<h4 id='phone'>{$myrow['text']}</h4>";
				};
				if($myrow['name'] == 'address'){
					echo "<h4 id='address'>{$myrow['text']}</h4>";
				};
			};
		?>
	</aside>
</html>