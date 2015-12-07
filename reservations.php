<html>
<head>
	<meta charset="UTF-8">
	<title>Contact Us</title>
	
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css">

	<script src="jquery-2.1.4.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#button').on("click", function{
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
	<aside id='contact-area'>
		<?php 
			require("dbconnect.php");

			$result = mysql_query("SELECT * FROM reservation ORDER BY cat_order");
			
			echo "<form action='received-reservation.php' method='post'> 
			<fieldset>";

			while($myrow = mysql_fetch_array($result)){
				if($myrow['name'] == 'title'){
					echo "<h3>{$myrow['text']}</h3>";
				};
				if($myrow['name'] == 'date'){
					echo "<p>{$myrow['text']}</p>
					<select name='day'>
						<option value='monday'>Monday</option>
						<option value='tuesday'>Tuesday</option>
						<option value='wednesday'>Wednesday</option>
						<option value='thursday'>Thursday</option>
						<option value='friday'>Friday</option>
						<option value='saturday'>Saturday</option>
						<option value='sunday'>Sunday</option>
					</select>
					<select name='month'>
						<option value='jan'>January</option>
						<option value='feb'>Februry</option>
						<option value='march'>March</option>
						<option value='april'>April</option>
						<option value='may'>May</option>
						<option value='june'>June</option>
						<option value='july'>July</option>
						<option value='aug'>August</option>
						<option value='sept'>September</option>
						<option value='oct'>October</option>
						<option value='nov'>November</option>
						<option value='dec'>December</option>
					</select>
					<select name='number'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
						<option value='6'>6</option>
						<option value='7'>7</option>
						<option value='8'>8</option>
						<option value='9'>9</option>
						<option value='10'>10</option>
						<option value='11'>11</option>
						<option value='12'>12</option>
						<option value='13'>13</option>
						<option value='14'>14</option>
						<option value='15'>15</option>
						<option value='16'>16</option>
						<option value='17'>17</option>
						<option value='18'>18</option>
						<option value='19'>19</option>
						<option value='20'>20</option>
						<option value='21'>20</option>
						<option value='22'>22</option>
						<option value='23'>23</option>
						<option value='24'>24</option>
						<option value='25'>25</option>
						<option value='26'>26</option>
						<option value='27'>27</option>
						<option value='28'>28</option>
						<option value='29'>29</option>
						<option value='30'>30</option>
						<option value='31'>31</option>
					</select>
					";
				};
				if($myrow['name'] == 'time'){
					echo "<p>{$myrow['text']}</p>
					<select name='time'>
						<option value='10'>10:00 AM</option>
						<option value='1030'>10:30 AM</option>
						<option value='11'>11:00 AM</option>
						<option value='1130'>11:30 AM</option>
						<option value='12'>12:00 PM</option>
						<option value='1230'>12:30 PM</option>
						<option value='1'>1:00 PM</option>
						<option value='130'>1:30 PM</option>
						<option value='2'>2:00 PM</option>
						<option value='230'>2:30 PM</option>
						<option value='3'>3:00 PM</option>
						<option value='330'>3:30 PM</option>
						<option value='4'>4:00 PM</option>
						<option value='430'>4:30 PM</option>
						<option value='5'>5:00 PM</option>
						<option value='530'>5:30 PM</option>
						<option value='6'>6:00 PM</option>
						<option value='630'>6:30 PM</option>
						<option value='7'>7:00 PM</option>
						<option value='730'>7:30 PM</option>
						<option value='8'>8:00 PM</option>
						<option value='830'>8:30 PM</option>
						<option value='9'>9:00 PM</option>
						<option value='930'>9:30 PM</option>
						<option value='10PM'>10:00 PM</option>	
					<select>
					";
				};
				if($myrow['name'] == 'people'){
					echo "<p>{$myrow['text']}</p>
					<select name='people'>
						<option value='1'>1 person</option>
						<option value='2'>2 people</option>
						<option value='3'>3 people</option>
						<option value='4'>4 people</option>
						<option value='5'>5 people</option>
						<option value='6'>6 people</option>
						<option value='7'>7 people</option>
						<option value='8'>8 people</option>
						<option value='9'>9 people</option>
						<option value='10'>10 people</option>
					<select>
					";
				};
			};
			echo "<input type='submit' name='SUBMIT' value='SUBMIT' />
			 	  </fieldset></form>";
		?>
	</aside>
</html>