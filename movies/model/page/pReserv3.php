<?php
class pReserv3{
    private $dao;

    public function __construct(){
        $this->dao = new Dao();
    }

    public function getInfo(&$info) {
        if(!isset($_POST['under']) && !isset($_POST['over']) && !isset($_POST['student']) && !isset($_POST['seats']))
            return 0;
        
        if(!isset($_COOKIE['mid']) && !isset($_COOKIE['date']) && !isset($_COOKIE['time']) && !isset($_COOKIE['sid']))
            return 0;
        
        // get movie details from Database
        $mid = $_COOKIE['mid'];
        $date = $_COOKIE['date'];
        $time = $_COOKIE['time'];
        
        $sql = "SELECT * FROM moviedetail WHERE mid = '$mid'";
        $movie = array();
        if($this->dao->select('', $result, $sql) > 0)
            foreach($result as $row){
                $movie["title"] = $row['title'];
                $movie["poster"] = $row['imgsrc'];
            }
        
        $under = $_POST['under'];
        $over = $_POST['over'];
        $student = $_POST['student'];
        $seats = $_POST['seats'];
        $seat_str = join(' ', $seats);
        
        setCookie('under', $under, time()+500);
        setCookie('over', $over, time()+500);
        setCookie('student', $student, time()+500);
        setCookie('seats', $seat_str, time()+500);

        // set data will display
        $info = array(
            'movie' => $movie,
            'date' => $date,        // from cookie
            'time' => $time,        // from cookie
            'under' => $under,
            'over' => $over,
            'student' => $student,
            'seats' => $seats,
            'total' => ($under+$over+$student),
            'cost' => ($under*7.5 + $over*8.0 + $student*7.0),
        );
        return 1;
    }
}
?>