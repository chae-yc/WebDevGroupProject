<?php
class pReserv1{
    private $dao;

    public function __construct(){
        $this->dao = new Dao();
    }

    public function getSchedule() {
        // select data
        $count = $this->dao->select("schedule", $results);
        if($count < 1){
            echo 'getSchedule(): no schedule data selected</br>';
            return null;
        }
        
        $schedules = array();
        foreach($results as $row){
            $dbtime = date_create($row['time']);
            $date = date_format($dbtime, 'y/m/d');
            $time = date_format($dbtime, 'H:i');
            $mid = $row['mid'];
            $sid = $row['sid'];

            $schedules[$date][$mid][$time] = ["seat"=>$row['seatavailable'], "venue"=>$row["venue"], "sid"=>$sid];
        }

        ksort($schedules);
        return $schedules;
    }

    public function getMovieList() {
        // select data
        $count = $this->dao->select("MovieDetail", $results);
        if($count < 1){
            echo 'getMovieList(): no movie data selected</br>';
            return null;
        }
        // put data in array
        $movieList = array();
        
        $n = 0;
        foreach($results as $row){
            $movieList[$n++] = ["mid"=>$row['mid'], "title"=>$row['title'], "poster"=>$row['imgsrc']];
        }
        
        return $movieList;
    }
    public function getDateList() {
        $dates = array();
        for($i=-1; $i<9; $i++){
            $objDateTime = new DateTime('NOW', new DateTimeZone("Europe/Dublin"));
            $objDateTime->modify('+'.$i.' day');  // from yesterday 9 days after
            $dates[$i+1] = date_format($objDateTime, 'y/m/d');
        }
        return $dates;
    }
}
?>