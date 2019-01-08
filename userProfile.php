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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <style>
        .profileContainer{
            height: auto;
            width: 100%;
            overflow: hidden;
            position: absolute;
        }

        .profileVideo{

        }

        i:hover{
            color: #FFA500;
        }

        .musicPlayer{
            text-align: center;
            margin-top: 20%;
        }

        .blogFavorites{
            margin: 50px;
            padding-top: 12%;
        }

        .userInfoContainer{
            margin-top: 50px;
        }

        .favoriteMovie{
            text-align: center;
            margin-top: 20%;
        }

        #imgContainer{
            width: 430px;
            height: 300px;
        }

        .img-fluid{
            object-fit: cover;
            height: 100%;
            width: 100%;
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
                            <a class="dropdown-item waves-effect waves-light" href="#">Account Settings</a>

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
$sql = "SELECT * FROM posts ORDER BY id DESC;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- Grid column -->
<div class="profileContainer">
    <video class="profileVideo" autoplay muted loop id="myVideo" style="position: absolute; z-index: -5; min-width: 100%; min-height: 100%; ">
        <source src="images/abstractVid.mp4" type="video/mp4">
    </video>


    <div class="userInfoContainer">
        <div style="margin: 0 auto; padding-top: 3%; text-align: center; border-radius: 5px" class="col-lg-3 col-md-6 mb-lg-0 mb-5">
            <div class="avatar mx-auto">
                <img style="width: 70%;" src="uploads/me.jpg" class="rounded-circle z-depth-1"
                     alt="Sample avatar">
            </div>
            <!-- Facebook-->
            <a class="btn-floating btn-sm mx-1 mb-0 btn-fb">
                <i class="fab fa-facebook-f"></i>
            </a>
            <!--Dribbble -->
            <a class="btn-floating btn-sm mx-1 mb-0 btn-dribbble">
                <i class="fab fa-instagram"></i>
            </a>
            <!-- Twitter -->
            <a class="btn-floating btn-sm mx-1 mb-0 btn-tw">
                <i class="fab fa-twitter"></i>
            </a>
            <h5 class="font-weight-bold mt-4 mb-3"><?php echo $_SESSION['userName'] ?></h5>
            <p class="text-uppercase blue-text"><strong>Software Engineer</strong></p>
            <hr>
        </div>



    </div>

    <div class="blogFavorites">
        <!-- Section heading -->
        <h2 style="text-align: center" class="h1-responsive font-weight-bold my-5">Favorite Posts</h2>
        <!-- Grid row -->
        <div class="row text-center">

            <!-- Grid column -->
            <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
                <!--Featured image-->
                <div id="imgContainer">
                    <div class="view overlay rounded z-depth-1">
                        <img class="img-fluid" src="uploads/<?php echo $row['image'];?>" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                </div>
                <!--Excerpt-->
                <div class="card-body pb-0">
                    <h4 class="font-weight-bold my-3"><?php echo $row["title"] ?></h4>
                    <p class="black-text"><?php echo $row["body"] ?></p>
                    <a class="btn btn-indigo btn-sm"><i class="fa fa-clone left"></i> View Post</a>
                </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
                <!--Featured image-->
                <div id="imgContainer">
                    <div class="view overlay rounded z-depth-1">
                        <img class="img-fluid" src="uploads/<?php echo $row['image'];?>" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                </div>
                <!--Excerpt-->
                <div class="card-body pb-0">
                    <h4 class="font-weight-bold my-3"><?php echo $row["title"] ?></h4>
                    <p class="black-text"><?php echo $row["body"] ?></p>
                    <a class="btn btn-indigo btn-sm"><i class="fa fa-clone left"></i> View Post</a>
                </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-4 col-md-6">
                <!--Featured image-->
                <div id="imgContainer">
                    <div class="view overlay rounded z-depth-1">
                        <img class="img-fluid" src="uploads/<?php echo $row['image'];?>" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                </div>
                <!--Excerpt-->
                <div class="card-body pb-0">
                    <h4 class="font-weight-bold my-3"><?php echo $row["title"] ?></h4>
                    <p class="black-text"><?php echo $row["body"] ?></p>
                    <a class="btn btn-indigo btn-sm"><i class="fa fa-clone left"></i> View Post</a>
                </div>
            </div>
            <!-- Grid column -->
        </div>
    </div>

    <div class="musicPlayer">
        <h2 style="text-align: center" class="h1-responsive font-weight-bold my-5">Favorite Song</h2>
        <iframe src="https://open.spotify.com/embed/track/2WWfjbHALIb3e7FMcj9mr4&view=coverart&theme=white" width="400" height="500" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
    </div>

    <div class="favoriteMovie">
        <h2 style="text-align: center" class="h1-responsive font-weight-bold my-5">Favorite Movie</h2>
        <a href="https://www.youtube.com/watch?v=bggUmgeMCdc" target="_blank"><img style="width: 30%; box-shadow: 0 8px 17px 0 rgba(0,0,0,.2), 0 6px 20px 0 rgba(0,0,0,.19);border-radius: 10px;" class="img-fluid" src="images/exmachina.jpg" alt="Sample image"></a>
    </div>





</body>
</html>