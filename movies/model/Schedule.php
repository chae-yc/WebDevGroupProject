<?php
class Schedule{
    public $mid;
    public $time;
    public $venue;
    public $seatavailable;

    public function __construct($mid, $time, $venue, $seatavailable){
        $this->mid = $mid;
        $this->time = $time;
        $this->venue = $venue;
        $this->seatavailable = $seatavailable;
    }
}
?>