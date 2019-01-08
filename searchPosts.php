<?php

require_once 'db_connector.php';


$searchForTitle = $_GET['titleName'];

$sql_statement = "SELECT * FROM `posts` WHERE title LIKE '%$searchForTitle%'";

if ($conn){
    $result = mysqli_query($conn, $sql_statement);
    if($result){
        while ($row = mysqli_fetch_array($result)){
            echo  $row['title'] . "<br>";
        }
    }

} else {

    echo "Error connecting " . mysqli_connect_error();
}