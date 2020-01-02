<?php
require 'Dao.php';
require 'MovieDetail.php';
require 'Schedule.php';
require 'Seats.php';

$dao = new Dao();
DatabaseReset($dao);
/*try{
    resetMovies($dao);
}catch(Exception $e){
    print('ResetDB(): '.$e->getMessage());
    echo 'failed';
}
echo 'success';*/

function DatabaseReset($dao){
    try{
        dropTables($dao);
        createTables($dao);
        resetMovies($dao);
    }catch(Exception $e){
        print('ResetDB(): '.$e->getMessage());
        echo 'failed';
    }
    echo 'success';
}

function dropTables($dao){
    $sql = array();
    //$sql[0] = "DROP TABLE moviedetail;";
    $sql[0] = "DROP TABLE schedule;";
    $sql[1] = "DROP TABLE seats;";
    $sql[2] = "DROP TABLE users;";
    $sql[3] = "DROP TABLE reservation;";

    foreach($sql as $c)
        $dao->execSql($c);
}

function createTables($dao){
    $sql = array();
    /*$sql[0] = "CREATE TABLE moviedetail (
        mid int PRIMARY KEY,
        title VARCHAR(100),
        release_date DATE,
        isAdult Int,
        popularity Float,
        vote_average Float,
        overview TEXT,
        imgsrc Varchar(255)
    );";*/
    $sql[0] = "CREATE TABLE schedule (
        sid int PRIMARY KEY AUTO_INCREMENT,
        mid int REFERENCES moviedetail(mid),
        time DATETIME,
        venue int,
        seatavailable int,
        vsize int
    );";
    $sql[1] = "CREATE TABLE seats (
        sid INTEGER REFERENCES schedule(sid),
        row CHARACTER,
        col INT,
        isAvailable Int,
        PRIMARY KEY (sid, row, col)
    );";
    $sql[2] = "CREATE TABLE users (
        id VARCHAR(20)  PRIMARY KEY,
        pwd VARCHAR(20),
        email VARCHAR(20) UNIQUE, 
        birth DATE
    );";
    
    $sql[3] = "INSERT INTO users(id, pwd, email, birth)
    VALUE('admin', '1', 'admin@mail.com', '1995-07-28')";

    $sql[4] = "CREATE TABLE reservation (
        rid INT PRIMARY KEY AUTO_INCREMENT,
        id VARCHAR(20) REFERENCES muser(id),
        sid INTEGER REFERENCES SCHEDULE(sid),
        seat Varchar(50),
        under int,
        over int,
        student int
    );";

    foreach($sql as $c)
        $dao->execSql($c);
}

function insertMovies($dao){
    $details = array();
    // load new movie data from TMDb
    $movies = MovieDetail::loadMovies();
    
    if(count($movies) > 0){
        for($i=0; $i<count($movies); $i++){
            if($i==10)
                break;
            $detail = new MovieDetail($movies[$i]['id'],
            $movies[$i]['title'], $movies[$i]['release_date'],
            $movies[$i]['adult'], $movies[$i]['popularity'],
            $movies[$i]['vote_average'], $movies[$i]['overview'],
            $movies[$i]['poster_path']);    // create detail_object
            
            $details[$i] = $detail;         // store detail_object in detail array
        }
        usort($details, function($a, $b){
            return $a->vote_average < $b->vote_average;
        });

        $dao->insert("MovieDetail", $details);
    }else{
        echo 'insertMovies(): no movie detail data</br>';
    }
}

function insertSchedule($dao){
    $seats = array();
    // select movie information from moviedetail
    $num = $dao->select("MovieDetail", $result);
    if($num < 1)
        echo "insertSchedule(): no seleted moviedetail data</br>";
    else{
        $hours = array(9,12,15,18,21);
        $minutes = array(0,15,25,35,45,50);
        $venues = array(11,12,13,14,21,22,23,31,32,33);
        $vsize = array(100,90,80,60,70,60,40,50,60,30);
        $count = 0;
        
        // number of movie
        $movie = 0;
        foreach($result as $row){
            // 9 days of schedule
            for($day=0; $day<9; $day++){
                // 0~7 times(diff hour) for each movie each day
                for($j=0; $j<rand(0,7); $j++){
                    // set date
                    $objDateTime = new DateTime('NOW', new DateTimeZone("Europe/Dublin"));
                    $objDateTime->modify('+'.$day.' day');  // update day
                    $objDateTime->setTime($hours[rand(0,4)], $minutes[rand(0,5)], 0);
                    
                    $schedule = new Schedule($row['mid'], $objDateTime, $venues[$movie], $vsize[$movie], $vsize[$movie]);

                    // store each schedule into seats
                    $seats[$count] = $schedule;
                    $count++;
                }
            }
            $movie++;
        }
        // insert to Schedule table
        $dao->insert("Schedule", $seats);
    }
}

function insertSeats($dao){
    $seats = array();
    // select movie information from moviedetail
    $num = $dao->select("Schedule", $result, "SELECT sid, vsize FROM schedule");
    if($num < 1)
        echo "insertSeats(): seleted no Schedule data</br>";
    else{
        $count = 0;
        
        // loop number of schedule
        foreach($result as $row){
            $vsize = $row['vsize'];
            for($r=0; $r<$vsize/10; $r++){
                for($c=1; $c<=10; $c++){
                    $seat = new Seats($row['sid'], chr(65+$r), $c, 1);
                    // store each seat into seats
                    $seats[$count] = $seat;
                    $count++;
                }
            }
        }
        // insert to Schedule table
        $dao->insert("Seats", $seats);
    }
}

function resetMovies($dao){
    // clear all related tables
    $dao->delete('reservation');
    $dao->delete('seats');
    $dao->delete('schedule');
    //$dao->delete('moviedetail');
    // load movies
    //insertMovies($dao);
    insertSchedule($dao);
    insertSeats($dao);
}


?>