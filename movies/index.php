<?php
// controller
require 'controller/HomeController.php';

// model
require 'model/Dao.php';
require 'model/MovieDetail.php';
require 'model/Schedule.php';
require 'model/Seats.php';

// model-page
require 'model/page/pHomeModel.php';
require 'model/page/pMovieInfo.php';
require 'model/page/pReserv1.php';
require 'model/page/pReserv2.php';
require 'model/page/pReserv3.php';
require 'model/page/pQnA.php';
require 'model/page/pMyPage.php';

$homeModel = new pHomeModel();
$model = $homeModel->pageSelector();
$homeController = new HomeController($model);
$homeController->display();
// print ($_POST['page']);
/*
$dbm = new AccountManage();
$dbm->resetMovies();*/