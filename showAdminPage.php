<?php

session_start();
require_once 'db_connector.php';


if($_SESSION['role'] != 'admin'){
    echo "Please Login as an Admin";
    exit;
} else{
    include 'adminPage.php';
}
