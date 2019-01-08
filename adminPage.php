<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>


    <style>
        .fa{
            margin-left: 10%;
            margin-top: 5%;
        }



        .row{
            margin-left: 30px;
            margin-right: 0;
        }

        .imageSelectText{
            float: left;
            margin-bottom: 30px;
        }

        .fileInputLabel{

        }




    </style>


</head>
<body>

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

            <li class="nav-item active">
                <a class="nav-link" href="homePage.php">Explore
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="inbox.php">Inbox</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="notifications.php">Notifications</a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">Activity</a>
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
                        <a class="nav-link waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img src="images/me.jpg" style="height: 35px;" class="rounded-circle z-depth-0" alt="avatar image"></a>

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


<?php

require_once 'db_connector.php';

?>


<!-- Section: Features v.2 -->
<section class="my-5">


    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold text-center my-5">Welcome, <?php echo $_SESSION['userName']; ?></h2>
    <hr>
    <!-- Section description -->

    <div class="iconContainer">
        <!-- Grid row -->
        <div class="row" style="margin-top: 5%; text-align: center;">

            <!-- Grid column -->
            <div class="col-md-4 mb-md-0 mb-5">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-lg-10 col-md-9 col-10">
                        <h4 class="font-weight-bold" style="margin-left: 30px;">Create Post</h4>
                        <div>
                            <a data-toggle="modal" data-target="#newPostModal"><i class="fa fa-plus pink-text fa-8x animated fadeInLeft"></i></a>
                        </div>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 mb-md-0 mb-5">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-lg-10 col-md-9 col-10">
                        <h4 class="font-weight-bold">Assign New Admins</h4>
                        <div>
                            <a data-toggle="modal" data-target="#newPostModal"><i class="fa fa-user-plus orange-text fa-8x animated fadeInUp"></i></a>
                        </div>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-lg-10 col-md-9 col-10">
                        <h4 class="font-weight-bold">Edit Posts</h4>
                        <div>
                            <a data-toggle="modal" data-target="#newPostModal"><i class="fa fa-edit blue-text fa-8x animated fadeInRight"></i></a>
                        </div>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Grid column -->

        </div>
    </div>
    <!-- Grid row -->

</section>
<!-- Section: Features v.2 -->








<section class="my-5" style="margin-left: 25px; text-align: center">

    <!--    <button data-toggle="modal" data-target="#newPostModal" type="button" class="btn btn-primary waves-effect">Create New Post</button>-->
    <!--    <a data-toggle="modal" data-target="#newPostModal" href="#newPostModal">Create New Post</a>-->

    <div id="newPostModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modalHeader"></div>
            <div id="modalContent" class="modal-content" style="position: absolute; width: 120%; height: auto; left: -10%;">
                <!-- Default form contact -->
                <form class="text-center border border-light p-5" action="createBlogPost.php" method="POST" enctype="multipart/form-data">

                    <p style="margin: 0 auto;" class="h4 mb-4">New Post</p>

                    <!-- Name -->
                    <input type="text" name="title" class="form-control mb-4" placeholder="Title of Post">

                    <!-- Email -->
                    <input type="text" name="author" class="form-control mb-4" placeholder="Name of Author">

                    <!-- Message -->
                    <div class="form-group">
                        <textarea name="body" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message"></textarea>
                    </div>

                    <!-- Image -->
                    <label class="fileInputLabel">
                        <input class="inputFile" type="file" name="fileToUpload" id="fileToUpload">
                    </label>

                    <!-- Send button -->
                    <button name="submitPost" class="btn btn-info btn-block" type="submit">Submit</button>

                </form>
                <!-- Default form contact -->

            </div>
        </div>
    </div>
</section>

</body>
</html>







