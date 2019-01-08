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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">




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

<h2 id="recentPostTitle" class="h1-responsive font-weight-bold text-center my-5">Account Settings</h2>

<div class="settings">
    <h4 style="margin-left: 50px" class="h4-responsive font-weight-bold my-5">Profile</h4>






</div>















<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/js/mdb.min.js"></script>

</body>
</html>