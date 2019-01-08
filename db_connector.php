<?php

////jake's local database
$hostname = "localhost:8889";
$username = "root";
$password = "root";
$database = "blog";

//establish db connect
$conn = mysqli_connect($hostname, $username, $password, $database);

// Create connection
//$conn = mysqli_connect($user, $password, $db, $host, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connection was successfully established!";