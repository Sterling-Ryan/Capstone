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
	<body class="bg-secondary bg-gradient">
        <br>
		<h1 class="container text-center p-3">Signup Here</h1>

		<br>

		<div class="container-fluid bg-light border text-center p-3">
			<form method="post">

                <span>Username  </span><input type="text" name="username"><br><br>
				<span>Email  </span><input type="text" name="email"><br><br>
				<span>Password  </span><input type="password" name="password">

				<input type="submit" value="Signup">
                <br>
				<a href="login.php">Click to Login</a>
		</div>
	</body>
</html>