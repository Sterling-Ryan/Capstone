<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "web_db";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
      die("Failed to connect");
    }
?>