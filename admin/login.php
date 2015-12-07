<?php
	
	if(isset($_POST['submit'])){
		$u = $_POST['username'];
		$p = $_POST['password'];
		if($u == 'yummyfood' && $p == 'atscargocafe'){
			session_start();
			$_SESSION['loggedin'] = true;
			header("Location: index.php");
			exit();
		} else {
			$alert = "Your username and/or password was incorrect. Please try again.";
			echo "<script type='text/javascript'> alert('$alert');</script>";

		};


	};


?>

<!DOCTYPE>
<html>
<head>
	<title>Login</title>
</head>
<body>
	
<?php require('header.html'); ?>
	<section id="login">
		<h2>Login</h2>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method='post'>
			<p>
				<input type='text' name='username' placeholder='username'/>
			</p>
			<p>
				<input type='password' name='password' placeholder='password'/>
			</p>	
			<p><input type='submit' name='submit' value='submit'/></p>
		</form>
	</section>

	<?php

	if($_SESSION['loggedin'] == true){
		echo "<ul>
		<li><a href='logout.php'>Logout</a></li>
		<li><a href='admin.php'>Admin</a></li>
		</ul>";
	}
	?>

</body>
</html>