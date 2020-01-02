<?php
        
    class HomeController {
        public function __construct($model){
            $this->model = $model;
        }

        public function display(){
            $container_content = '';
            if (session_status() == PHP_SESSION_NONE)   // if no session, create a session
                session_start();
            if(isset($_POST['logout']) && $_POST['logout'] == 'lg'){    // session restart
                session_destroy();
                session_start();
            }
            switch ($_POST['page']){
                case 'home':
                    $movieDetails = $this->model->getMovieInfo();
                    $css = 'css/movieinfo.css';
                    $container_content = 'view/MovieInfo.php';
                    break;

                case 'login':
                    $css = 'css/login.css';
                    $container_content = 'view/login.php';
                    break;

                case 'reserv1':
                    $schedules = $this->model->getSchedule();
                    $movieList = $this->model->getMovieList();
                    $dateList = $this->model->getDateList();
                    $css = 'css/reserv1.css';
                    $container_content = 'view/reserv1.php';
                    break;

                case 'reserv2':
                    if($this->model->getSeats($seats) == 0){
                        $css = '';
                        $container_content = 'view/error.html';  // Display
                        break;
                    }
                    $css = 'css/reserv2.css';
                    $container_content = 'view/reserv2.php';  // Display
                    break;

                case 'reserv3':
                    if($this->model->getInfo($info) == 0){
                        $css = '';
                        $container_content = 'view/error.html';  // Display
                        break;
                    }
                    $css = '';
                    $container_content = 'view/reserv3.php';  // Display
                    break;
                    
                case 'QnA':
                    $content = $this->model->readData();
                    $css = '';
                    $container_content = 'view/QnA.php';  // Display
                    
                    break;
                case 'myPage':
                    $content = $this->model->getUserInfo();
                    $css = 'css/myPage.css';
                    $container_content = 'view/myPage.php';  // Display
                    
                    break;


            }
            include 'view/home.php';
            

        }
    }
?>