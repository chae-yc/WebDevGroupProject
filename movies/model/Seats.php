<?php
class Seats{
    public $sid;
    public $row;
    public $col;
    public $isavailable;

    public function __construct($sid, $row, $col, $isavailable){
        $this->sid = $sid;
        $this->row = $row;
        $this->col = $col;
        $this->isavailable = $isavailable;
    }
}
?>