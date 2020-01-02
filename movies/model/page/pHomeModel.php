<?php
class pHomeModel{
    private $model;

    public function pageSelector(){
        if(!isset($_POST['page'])){
            $_POST['page'] = 'home';
        }

        switch ($_POST['page']){
            case 'home':
                $this->model = new pMovieInfo();
                break;
            case 'reserv1':
                $this->model = new pReserv1();
                break;
            case 'reserv2':
                $this->model = new pReserv2();
                break;
            case 'reserv3':
                $this->model = new pReserv3();
                break;
                
            case 'QnA':
                $this->model = new pQnA();
                break;  
            case 'myPage':
                $this->model = new pMyPage();
                break;   
        }
        return $this->model;
    }
}
?>