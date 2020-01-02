<?php
    class pMyPage{

        private $dao;
        public function __construct(){
            $this->dao = new Dao();
        }
        
        public function getUserInfo() {
            //db connection + data control;
            $numane = $_SESSION["uname"];
            $sql = "SELECT id, pwd, email, birth FROM users WHERE id = '$numane' ";
            $count =  $this->dao->select("users", $result, $sql);

            foreach($result as $row){
                $userInfo = $row;
            }
            return $userInfo;
        }
    }
?>