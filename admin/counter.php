<?php

	session_start();
	if(isset($_SESSION['counter'] ) ){
		$_SESSION['counter'] ++;
	} else {
		$_SESSION['counter'] = 1;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Counter Session</title>
</head>
<body>
	<h3>You have visited this page <?php echo $_SESSION['counter']; ?> times  </h3>
</body>
</html>