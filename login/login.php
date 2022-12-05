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
	<body class="bg-secondary bg-gradient">
		<br>
		<h1 class="container text-center p-3">Please Login</h1>

		<br>

		<div class="container-fluid bg-light border text-center p-3">
			<form method="post">
				<span>Username  </span><input type="text" name="username"><br><br>
				<span>Email  </span><input type="text" name="email"><br><br>
				<span>Password  </span><input type="password" name="password">

				<input type="submit" value="Login">
				<br>
				<div class="container p-3">
				<a href="logout.php">Logout</a><br>
				<a href="signup.php">Click to Signup</a>
				</div>

		</div>
	</body>
</html>