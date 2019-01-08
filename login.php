<?php

session_start();
require_once 'db_connector.php';



//declare local variables from form submission
$personEmail = $_POST['emailInput'];
$personPassword = $_POST['passwordInput'];

$hash = password_hash($personPassword, PASSWORD_DEFAULT);

//define SQL query
$sql_statement = "SELECT * FROM users WHERE email = '$personEmail'";

//check connection
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}


////declare results and check if null
if ($result = $conn->query($sql_statement)) {
    //update header if a match is greater than zero
    if ($result->num_rows > 0){
        $row = $result->fetch_row();

        if ((password_verify($row[8], $hash)) ) {
            header('Location: index.php');
        }
        else {
            include "loginErrorPage.html";

        }

        $_SESSION['loginUser'] = $row[4];
        $_SESSION['userName'] = $row[6];


//        // if there is an admin column in the users table, we can save that in the session variable.
        $_SESSION['role'] = $row[8];

        // header("Location: home.php");
    }
    die();
}

//close db connect
$conn->close();
