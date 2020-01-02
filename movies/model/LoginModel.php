<?php
    require 'Dao.php';

    if (!isset($_POST['submit']) && !$_POST['submit'] === 'sub')  //login sequence
        return ;
    $uname_tmp = test_input($_POST['uname']);
    $pwd = test_input($_POST['pwd']);

    $dao = new Dao();
    $sql = "SELECT id, pwd, email, birth FROM users WHERE id = '$uname_tmp' AND pwd = '$pwd'";
    $count = $dao->select("users", $result, $sql);

    $result = array(); //declare empty array

    if($count == 1) {
        $uname = $uname_tmp;
        session_start();
        $_SESSION['uname'] = $uname;
        
        echo 'success';
    }
    else{
        echo 'failed';
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>