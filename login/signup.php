<?php
session_start();

    include("connection.php");
    //include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if (!empty($username) && !empty($password) && !empty($email) && !is_numeric($username))
        {
            // save to db
            $query = "INSERT into users (username, email, password) values ('$username', '$email', '$password')";

            mysqli_query($con, $query);

            //header("Location: index.php");
            //die;
        } else 
        {
            echo "Please enter some valid information! ";
        }
    }
?>


<!DOCTYPE html>
<html>
	<head>
        <title>Signup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
		<h1>This is the signup page</h1>

		<br>

		<div>
			<form method="post">

				<input type="text" name="username">
				<input type="text" name="email">
				<input type="password" name="password">

				<input type="submit" value="Signup">

				<a href="login.php">Click to Login</a>
		</div>
	</body>
</html>