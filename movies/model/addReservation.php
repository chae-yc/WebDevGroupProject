<?php
    require 'Dao.php';

    session_start();

    if (!isset($_SESSION['uname']) && !isset($_COOKIE['under'])
    && !isset($_COOKIE['over']) && !isset($_COOKIE['student'])
    && !isset($_COOKIE['seats']) && !isset($_COOKIE['mid']) 
    && !isset($_COOKIE['sid']))
        echo 'nodata';

    $id = $_SESSION['uname'];
    $sid = $_COOKIE['sid'];
    $under = $_COOKIE['under'];
    $over = $_COOKIE['over'];
    $student = $_COOKIE['student'];
    $seat = $_COOKIE['seats'];

    
    $str_seat = str_replace(',','-',$seat);
    $arr_seat = explode('-', $str_seat);
    $count = 0;
    $rc_seat = array();

    foreach($arr_seat as $s){
        $arr = str_split($s);
        $rc_seat[$count++] = ['r'=>$arr[0], 'c'=>$arr[1]];
    }
 
    $host = "localhost";
    $user = "root";
    $DBpwd = "";
    $db = "webca";

    // connect
    try{
        $conn = new PDO("mysql:host=$host;dbname=$db",$user,$DBpwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        print("connect ".$e->getMessage());
        echo 'failed';
        return ;
    }

    // insert
    try{
        $sql = "INSERT INTO reservation (id, sid, under, over, student, seat)
        VALUES ('$id', $sid, $under, $over, $student, '$str_seat')";
        $conn->exec($sql);
        
    }catch(PDOException $e){
        print("insert reserv". $e->getMessage());
        echo 'failed';
        return ;
    }
    
    // update schedule valid seat
    try{
        $sql = "UPDATE schedule SET seatavailable = seatavailable - $count WHERE sid = $sid";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }catch(PDOException $e){
        print("update schedule". $e->getMessage());
        echo 'failed';
        return ;
    }
    // update seats available
    for($i=0; $i<$count; $i++){
        try{
            $r =  $rc_seat[$i]['r'];
            $c =  $rc_seat[$i]['c'];
            $sql = "UPDATE seats SET isAvailable=0 WHERE sid = $sid AND row = '$r' AND col = $c";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }catch(PDOException $e){
            print("update seat". $e->getMessage());
            echo 'failed';
            return ;
        }
    }
    echo 'success';
    $conn = null;

?>