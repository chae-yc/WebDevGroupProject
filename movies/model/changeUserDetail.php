<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webca";
    $blank_pw = 0;//false

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        session_start();
        $uname = $_SESSION["uname"];
        $pwd = $_POST["password"];

        if( $pwd == ""){
            $blank_pw = 1;
        }else{
            $sql = "UPDATE users SET PWD='$pwd' WHERE ID='$uname'";
            //echo $sql;
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
        }
        // echo a message to say the UPDATE succeeded
        //echo $stmt->rowCount() . " records UPDATED successfully";
    }
    catch(PDOException $e){
        echo 'failed';
        //echo $sql . "<br>" . $e->getMessage();
    }
    if($blank_pw)
        echo 'blankPw';
    else
        echo 'success';

    $conn = null;


?>