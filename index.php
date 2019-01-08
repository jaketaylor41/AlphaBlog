<?php
session_start();

if (!isset($_SESSION['loginUser'])) {
    include 'login.html';
}


if (isset($_GET['pageNumber']))
    $menuChoice = $_GET['pageNumber'];
else
    $menuChoice = 3;

if ( $_SESSION['loginUser']) {
    require_once 'homePage.php';

    switch ($menuChoice) {
        case 1:
            require_once 'homePage.php';
            break;
        case 2:
            require_once 'showAddForm.php';
            break;
        case 3:
            require_once 'showMainWelcome.php';
            break;
    }
}
