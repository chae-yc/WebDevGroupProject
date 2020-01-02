<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JY Cinema</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>">
    <link rel="stylesheet" type="text/css" href="css/home.css">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">JY CINEMA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <!-- MovieInfo, Reservation, Watched -->
            <ul class="navbar-nav mr-auto">
                <li class="active nav-item"><a class="nav-link" href="index.php">Movie Info</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="reservButton(<?= isset($_SESSION['uname']) ?>)">Movie Reservation</a></li>
            </ul>
            
            <!-- Welcome, QNA, Mypage, Login -->
            <ul class="navbar-nav ml-auto">
            <li class="nav-item"><?php if(isset($_SESSION["uname"])){echo "<a class='nav-link' href='#'> Hi! ".$_SESSION["uname"]."</a>";}?></li>
               
                <li class="nav-item"><a class="nav-link" href="#" onClick="QnAButton(<?= isset($_SESSION['uname']) ?>)">QnA</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="myPageButton(<?= isset($_SESSION['uname']) ?>)">My Page</a></li>
                <li class="nav-item">
                    <button class="btn btn-outline-success" id="loginButton" onclick="loginButton(<?= isset($_SESSION['uname']) ?>)" style="width:auto;">
                        <?php if(isset($_SESSION["uname"])){echo "logout";} else{echo "login";}?>
                    </button>
                </li>
            </ul>
        </div> 
    </nav>

    <div class="container-fluid" style="float: center">
        <?php
            include $container_content;
        ?>
    </div> <!-- main container -->

    <footer class="container-fluid text-center">
        <p>Copyright(c) 2018 All rights reserved. </p>
    </footer>

    <script src="js/navigateBar.js"></script>
</body>

</html>