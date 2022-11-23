<?php
	session_start();

	include("connection.php");
	$_SESSION;
?>

<!DOCTYPE html>
<html>
	<head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
		<a href="logout.php">Logout</a>
		<h1>This is the login page</h1>

		<br>

		<div>
			<form method="post">
				<input type="text" name="username">
				<input type="text" name="email">
				<input type="password" name="password">

				<input type="submit" value="Login">

				<a href="signup.php">Click to Signup</a>
		</div>
	</body>
</html>