<?php
class pReserv2{
    private $dao;

    public function __construct(){
        $this->dao = new Dao();
    }
    
    public function getSeats(&$seats) {
        if(!isset($_POST['mid']) && !isset($_POST['date']) && !isset($_POST['time']) && !isset($_POST['sid']))
            return 0;
        $mid = $_POST['mid'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $sid = $_POST['sid'];
        
        setCookie('mid', $mid, time()+600);
        setCookie('date', $date, time()+600);
        setCookie('time', $time, time()+600);
        setCookie('sid', $sid, time()+600);
        
        // datetime transform
        $dbtime = DateTime::createFromFormat('y/m/d H:i', $date.' '.$time);
        $dbtime = $dbtime->format('Y-m-d H:i:s');
        

        // // get SID sql: SELECT sid FROM schedule WHERE mid = 338952 AND time = '2018-11-24 21:15:00'
        // $sql = "SELECT sid FROM schedule WHERE mid = $mid AND time = '$dbtime'";
        // $count = $this->dao->select("schedule", $results, $sql);
        // if($count < 1){
        //     echo 'getSeats(): no schedule data selected</br>';
        //     return null;
        // }
        // $sid = 0;
        // foreach($results as $row)
        //     $sid = $row['sid'];

        // get * seats with SID
        $sql = "SELECT * FROM seats WHERE sid = $sid";
        $count = $this->dao->select("seats", $results, $sql);
        if($count < 1){
            echo 'getSeats(): no seat data selected</br>';
            return null;
        }

        $seats = array();
        $num = 0;
        foreach($results as $row){
            $seats[$num++] = ['r'=>$row['row'], 'c'=>$row['col'], 'v'=>$row['isAvailable']];
        }
        
        return $num;    // number of seat
    }
}
?>