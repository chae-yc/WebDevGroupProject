<?php
    class pMovieInfo{
        private $dao;

        public function __construct(){
            $this->dao = new Dao();
        }
        
        public function getMovieInfo() {
            // select data
            $count = $this->dao->select("MovieDetail", $results);
            if($count < 1){
                echo 'getMovieInfo(): no MovieDetail data selected</br>';
                return ;
            }
            $num = 0;
            // put data in array
            $movieDetails = array();
            foreach($results as $row){
                $detail = new MovieDetail($row['mid'],
                    $row['title'], $row['release_date'],
                    $row['isAdult'], $row['popularity'],
                    $row['vote_average'], $row['overview'],
                    $row['imgsrc']);    // create detail_object
                $movieDetails[$num] = $detail;
                $num++;
            }
            // sort data
            usort($movieDetails, function($a, $b){
                return $a->vote_average < $b->vote_average;
            });

            return $movieDetails;
        }
    }
?>