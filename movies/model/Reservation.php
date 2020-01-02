<?php
class Reservation{
    public $id;
    public $sid;
    public $seat;
    public $under;
    public $over;
    public $student;
    
    public function __construct($id, $sid, $seat, $under, $over, $student){
        $this->id = $id;
        $this->sid = $sid;
        $this->seat = $seat;
        $this->under = $under;
        $this->over = $over;
        $this->student = $student;
    }
}
?>