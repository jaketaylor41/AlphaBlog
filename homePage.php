<?php
session_start();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <style>

        #imgContainer{
            width: 500px;
            height: 300px;
        }

        .img-fluid{
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        #welcomeUser{
            color: #000000;
            padding-bottom: 10px;
            margin-bottom: 0 !important;
        }

        i:hover{
            color: #FFA500;
        }

        #searchPosts{
            width: 20%;
            margin: 0 auto !important;
        }

        .homepageTitle{
            margin-bottom: 10%;
        }

        .col-lg-5{
            padding-left: 50px;
        }

        #row1{
            padding-left: 50px;
        }

        #recentPostTitle{
            margin-bottom: 0 !important;
            padding-bottom: 5px;
        }


    </style>

</head>
<body>
<?php
require_once 'db_connector.php';
?>

<!--Navbar------------------------------------------------------------------------------------------------------------->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="homePage.php">Alpha Blog</a>


    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="homePage.php"><i id="navIcon" class="fa fa-home fa-1x animated fadeInUp"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="inbox.php"><i id="navIcon" class="fa fa-inbox fa-1x animated fadeInUp"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="notifications.php"><i id="navIcon" class="fa fa-bell fa-1x animated fadeInUp"></i></a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false"><i id="navIcon" class="fa fa-bolt fa-1x animated fadeInUp "></i></a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

        </ul>
        <!-- Links -->

        <form class="form-inline">
            <div class="header">
                <a class="navbar-brand" style="color: #ffffff;" href="#"></a>
                <input id="homeSearch" class="form-control form-control-sm mr-sm-2 mb-0" type="text" placeholder="Search" aria-label="Search">
            </div>
            <div class="md-form my-0">
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item avatar dropdown">
                        <a class="nav-link waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img src="uploads/me.jpg" style="height: 35px;" class="rounded-circle z-depth-0" alt="avatar image"></a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                            <a class="dropdown-item waves-effect waves-light" href="accountSettings.php">Account Settings</a>

                            <?php
                            if ($_SESSION['role'] == 'admin'): ?>
                                <a class="dropdown-item waves-effect waves-light" href="adminPage.php">Admin Page</a>
                            <?php endif; ?>
                            <a class="dropdown-item waves-effect waves-light" href="userProfile.php">View Profile</a>
                            <a class="dropdown-item waves-effect waves-light" href="logout.php">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </div>
    <!-- Collapsible content -->
</nav>
<!--/.Navbar----------------------------------------------------------------------------------------------------------->





<section class="my-5">

    <form action="searchPosts.php" method="post">
        <div class="homepageTitle">
            <h2 id="recentPostTitle" class="h1-responsive font-weight-bold text-center my-5">Recent posts</h2>
            <input id="searchPosts" class="form-control form-control-sm mr-sm-2 mb-0" name="titleName" type="text" placeholder="Search" aria-label="Search">
            <input type="submit" name="submit" value="Search">
        </div>
    </form>



    <?php

    require_once 'db_connector.php';


    $sql = "SELECT * FROM posts ORDER BY id DESC;";
    $result = $conn->query($sql);

    $counter = 0;
    While ($row = $result->fetch_assoc()) {

        $counter++;
        If (($counter % 2) == 0 ) {
// counter is even
// print picture to the right
// research “PHP mod” to see what the % sign is all about.
            echo '<div class="row">'.


                '<div class="col-lg-5">'.


                '<div id="imgContainer" class="view overlay rounded z-depth-2 mb-lg-0 mb-4">';
            ?>
            <img class="img-fluid" src="uploads/<?php echo $row['image'];?>" alt="Sample image">

            <?php
            echo '<a>'.
                '<div class="mask rgba-white-slight"></div>'.
                '</a>'.
                '</div>'.

                '</div>'.



                '<div class="col-lg-7">'.


                '<a href="#!" class="green-text">'.
                '<h6 class="font-weight-bold mb-3"><i class="fa fa-cutlery pr-2"></i>Food</h6>'.
                '</a>'.

                '<h3 class="font-weight-bold mb-3"><strong>'.$row["title"].'</strong></h3>'.

                '<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
                placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus et aut officiis debitis.</p>'.

                '<p>by <a><strong>'.$row["author"].'</strong></a>, 19/08/2018</p>'.

                '<a class="btn btn-success btn-md">Read more</a>'.

                '</div>'.


                '</div>'.


                '<hr class="my-5">';
        }
        else {
// counter is odd
// print picture to the left

            echo '<div class="row">'.


                '<div id="row1" class="col-lg-7">'.


                '<a href="#!" class="pink-text">'.
                '<h6 class="font-weight-bold mb-3"><i class="fa fa-image pr-2"></i>Lifestyle</h6>'.
                '</a>'.

                '<h3 class="font-weight-bold mb-3"><strong>' .$row["title"]. '</strong></h3>'.

                '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                provident.</p>'.

                '<p>by <a><strong>'.$row["author"].'</strong></a>, 14/08/2018</p>'.

                '<a class="btn btn-pink btn-md mb-lg-0 mb-4">Read more</a>'.

                '</div>'.



                '<div class="col-lg-5">'.


                '<div id="imgContainer" class="view overlay rounded z-depth-2">';
            ?>
            <img class="img-fluid" src="uploads/<?php echo $row['image'];?>" alt="Sample image">

            <?php
            echo '<a>'.
                '<div class="mask rgba-white-slight"></div>'.
                '</a>'.
                '</div>'.

                '</div>'.

                '</div>'.


                '<hr class="my-5">';

        }
    }


    ?>


</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/js/mdb.min.js"></script>

</html>