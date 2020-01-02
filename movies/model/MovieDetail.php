<?php
class MovieDetail{
    public $mid;
    public $title;
    public $release_date;
    public $isAdult;
    public $popularity;
    public $vote_average;
    public $overview;
    public $imgsrc;

    public function __construct($mid, $title, $release_date,
    $isAdult, $popularity, $vote_average, $overview, $imgsrc){
        $this->mid = $mid;
        $this->title = $title;
        $this->release_date = $release_date;
        if($isAdult == 0)
            $isAdult = 0;
        $this->isAdult = $isAdult;
        $this->popularity = $popularity;
        $this->vote_average = $vote_average;
        $this->overview = $overview;
        $this->imgsrc = $imgsrc;
    }

    static public function loadMovies(){
        $key = "d4a6dd74e20df5bdc24048a2d7f114b7";
        $url = "https://api.themoviedb.org/3/discover/movie?page=1&include_video=false&include_adult=ftrue&certification_country=Ireland&sort_by=popularity.desc&language=en-US&api_key=$key";
        $json = file_get_contents($url);
        $response = json_decode($json, true);
        $movies = $response['results'];

        return $movies;
    }
}
?>

