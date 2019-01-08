<?php

require_once 'db_connector.php';

$personName = $_POST['fNameInput'];
$personLname = $_POST['lNameInput'];
$personEmail = $_POST['emailInput'];
$personConfirmEmail = $_POST['confirmEmail'];
$personBirthday = $_POST['dobInput'];
$personUsername = $_POST['usernameInput'];
$personPassword = $_POST['passwordInput'];
$personConfirmPassword = $_POST['confirmPassword'];

$hash = password_hash($personPassword, PASSWORD_DEFAULT);



$sql_statement = "INSERT INTO `users` (`id`, `fName`, `lName`, `email`, `confirmEmail`, `birthday`, `username`, `password`, `confirmPassword`) VALUES (NULL, '$personName', '$personLname', '$personEmail', '$personConfirmEmail', '$personBirthday', '$personUsername', '$hash', '$personConfirmPassword')";



if($result = $conn->query($sql_statement) == TRUE){
    include "homePage.php";
}
else {
    echo "Error " . $sql_statement . "<br>" . $conn->error;
}

$conn->close();