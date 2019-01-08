<?php
// This module should logout the user.  Unset any $_SESSION variables, destroy the session.


session_start();

$_SESSION = array();


session_destroy();
session_unset();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



    <style>

        .logoutMessage{
            font-size: 50px;
            text-align: center;
        }

        .tryAgain{
            text-align: center;
            display: block;
            font-size: 30px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<?php

echo "<p class='logoutMessage'>You have been successfully logged out! WOOP WOOP! </p><br>";

echo "<iframe style='display: block; margin-right: auto; margin-left: auto; top: 5%;' src=\"https://giphy.com/embed/26gsaafwvzDkN7wJ2\" width=\"480\" height=\"338\" frameBorder=\"0\" class=\"giphy-embed\" allowFullScreen></iframe><p><a href=\"https://giphy.com/gifs/netflix-party-excited-26gsaafwvzDkN7wJ2\"></a></p><br>";
echo "<a class=\"tryAgain\" href=\"login.html\">Login</a>";

?>



</body>
</html>
