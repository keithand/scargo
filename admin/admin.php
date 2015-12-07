<?php

	session_start();
	if($_SESSION['loggedin'] != true){
		header("Location:login.php");
		exit();
	}
?>

<html>
<head>
	<title>Admin</title>
</head>
<body>
	<h1>You are logged in to the admin page</h1>
	<ul>
		<li><a href="login.php">Login</a></li>
		<li><a href="logout.php">Logout</a></li>
		<li><a href="admin.php">Admin</a></li>
	</ul>
</body>
</html>