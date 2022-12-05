<?php
session_start();

    include("login/connection.php");
    //include("login/functions.php");

    //$user_data = check_login($con);
    
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if (!empty($username) && !empty($password) && !empty($email) && !is_numeric($username))
        {
            // save to db
            $query = "INSERT into USERS (username, email, password) values ('$username', '$email', '$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        } else 
        {
            echo "Please enter some valid information! ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Captsone Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body class="bg-secondary bg-gradient">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Smith Card Design</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" href="gallery.php">Gallery</a>
                        <a class="nav-link" href="about.php">About</a>
                        <a class="nav-link" href="contact.php">Contact</a>
                        <!-- <a class="nav-link" href="registration/register.php">Register</a> -->
                        <a class="nav-link float-end" href="cart.php">Cart</a> 
                        <!-- <a class="nav-link" href="server.php">DatabaseConnectionTest</a> -->
                        <a class="nav-link" href="login/login.php">Login</a>
                    </div>
                </div>

            </div>
        </nav>

        <div class="container-fluid text-center bg-light bg-gradient p-3 my-3 border">
            <h1>Smith Card Design</h1>
            <p>Welcome to my home for cards and creativity. </p>
        </div>

        <div class="container-fluid">
            <img src="images/ahmed-4Qny1OxMDyQ-unsplash.jpg" height="auto" width="100%" alt="Background">
        </div>

        <div class="cover-container text-center d-flex w-100 h-100 p-3 mx-auto flex-column">
            <main class="px-3">
                <h2>Looking for a card?</h2>
                <p class="lead">Birthdays, Graduations, Anniversaries. You will find cards for every season and occasion here! Check out the gallery for an album of all the cards to choose from. </p>
                <p class="lead">
                  <a href="gallery.php" class="btn btn-lg btn-primary fw-bold border-dark bg-dark">Check the Gallery</a>
                </p>
            </main>
        </div>

        <div class="mt-4 p-4 bg-dark text-white text-center">
            <p>Smith Card Design 2022</p>
        </div>

    </body>
</html>