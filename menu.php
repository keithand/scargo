<html>
<head>
	<meta charset="UTF-8">
	<title>MENU</title>
	
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
	<div id="background"></div>
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

	<section id="content">
		<ul id="menu-list">
			<li class="menu-category"><a href="<?php echo $_SERVER['PHP_SELF'] . "?category=Appetizers"; ?>">Appetizers</a></li>
			<li class="menu-category"><a href="<?php echo $_SERVER['PHP_SELF'] . "?category=Salads"; ?>">Salads</a></li>
			<li class="menu-category"><a href="<?php echo $_SERVER['PHP_SELF'] . "?category=Sandwiches"; ?>">Sandwiches</a></li>
			<li class="menu-category"><a href="<?php echo $_SERVER['PHP_SELF'] . "?category=Entrees"; ?>">Entrees</a></li>
			<li class="menu-category"><a href="<?php echo $_SERVER['PHP_SELF'] . "?category=Sides"; ?>">Sides</a></li>
			<li class="menu-category"><a href="<?php echo $_SERVER['PHP_SELF'] . "?category=Desserts"; ?>">Desserts</a></li>
			<li class="menu-category"><a href="<?php echo $_SERVER['PHP_SELF']; ?>">All</a></li>
		</ul>

		<?php	
				require("dbconnect.php");

			if(isset($_GET['category'])){
			$result = mysql_query("SELECT * FROM `scargo cafe menu`
			WHERE category='{$_GET['category']}'");
			// USE LATER TO CATEGORIZE MENU ITEMS
			// WHERE category='{$_GET['category']}'
			} else {
				$result = mysql_query("SELECT * FROM `scargo cafe menu` ORDER BY cat_sort, name");
			}

			$current_cat = "";

			echo "<ul id='column' class='leaders'>";

			if($result === FALSE) { 
			    die(mysql_error()); // TODO: better error handling
			}

			while($myrow = mysql_fetch_array($result) ){
				
				if( $myrow['category'] != $current_cat){
					echo "<h3 id='{$myrow['category']}'>{$myrow['category']}</h3>";
					$current_cat = $myrow['category'];
				}

				echo "
					<li class='item'>
					<span class='name'>{$myrow['name']}</span>
					<span class='price'>{$myrow['price']}</span>
					<br />
					<span class='description'>{$myrow['desc']}</span>

					</li>\n";
			}
		 
		 	echo "</ul>\n </section>";

	 ?>
</body>
</html>