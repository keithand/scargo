<?php

	session_start();
	if($_SESSION['loggedin'] != true){
		header("Location: login.php");
		exit();
	} else {
		session_destroy();
		setcookie( session_name(), '', time() - 4200, '/');
	}

	require('header.html');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
	<section id='edit-dish'>
		<h1>You are logged Out</h1>
		<a href="login.php">Login</a></li>
	</section>
</body>
</html>