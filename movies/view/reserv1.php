<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4">
        <ul class="list-group">
        <?php
            for($i=0; $i<count($movieList); $i++){
                $title = $movieList[$i]['title'];
                $mid = $movieList[$i]['mid'];
                $path = $movieList[$i]['poster'];
                $id = 'm'.$mid;
                $content = "<a class='list-group-item list-group-item-action title' data-poster='$path' data-mid='$mid' id='$id'>$title</a>";
                echo $content;
            }
        ?>
        </ul>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
        <ul class="list-group">
        <?php
            // today  
            //$objDateTime = new DateTime('NOW', new DateTimeZone("Europe/Dublin"));
            //$dates[$i+1] = date_format($objDateTime, 'y/m/d');
            // from yesterday to 10 days later
            for($i=0; $i<count($dateList); $i++){
                $date = $dateList[$i];
                $id = 'd'.str_replace('/', '', $date);
                
                $content = "<a class='list-group-item list-group-item-action date' data-date='$date' id='$id'>$date</a>";
                echo $content;
            }
        ?>
        </ul>
    </div>
    
    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php
            //schedule[date][mid][seat venue time]
            $objDateTime = new DateTime('NOW', new DateTimeZone("Europe/Dublin"));
            $today = $objDateTime->format('Y-m-d H:i');

            $dates = array_keys($schedules);
            for($i=0; $i<count($dates); $i++){
                $date = $dates[$i];
                $mids = array_keys($schedules[$date]);
                
                list($year, $mon, $day) = explode("/", $date);
                $tmp_date = '20'.$year.'-'.$mon.'-'.$day;

                for($j=0; $j<count($mids); $j++){
                    $mid = $mids[$j];
                    $id = 'm'.$mid.'d'.$date;
                    $id = str_replace('/', '', $id);
                    
                    $content = "<ul class='list-group time' id='$id'>";
                    $times = array_keys($schedules[$date][$mid]);
                    sort($times);
                    for($k=0; $k<count($times); $k++){
                        $time = $times[$k];
                        $venue = $schedules[$date][$mid][$time]["venue"];
                        $seat = $schedules[$date][$mid][$time]["seat"];
                        $sid = $schedules[$date][$mid][$time]["sid"];

                        $tmp_time = new DateTime($tmp_date.' '.$time);
                        $tmp_time = $tmp_time->format('Y-m-d H:i');
                        
                        $content .= 
                        "<a class='list-group-item'>
                            <i class='fas fa-film'></i> $venue
                            <i class='fas fa-chair'></i></span> $seat ";
                        if($tmp_time <= $today){
                            $content .= "<button class='btn btn-secondary time_bt' disabled data-sid='$sid' data-time='$time'>$time</button>";
                        }
                        else
                            $content .= "<button class='btn btn-secondary time_bt' data-sid='$sid' data-time='$time'>$time</button>";
                        $content .= "</a>";
                        

                    }
                    $content .= "</ul>";
                    echo $content;
                }
            }
        ?>
        </ul>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3"><img id="poster"/></div>
</div>

<div class="info container">
    <h2 id="info_sum">You Selected</h2>
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9">
            <dl class="row">
                <dt class="col-sm-3 col-md-3 col-lg-3">TITLE</dt>
                <dd class="col-sm-9 col-md-9 col-lg-9" id="info_title"></dd>

                <dt class="col-sm-3 col-md-3 col-lg-3">DATE</dt>
                <dd class="col-sm-9 col-md-9 col-lg-9" id="info_date"></dd>

                <dt class="col-sm-3 col-md-3 col-lg-3">TIME</dt>
                <dd class="col-sm-9 col-md-9 col-lg-9" id="info_time"></dd>
            </dl>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <button class="btn btn-primary btn-lg" id='send_bt'>NEXT PAGE</button>
        </div>
</div>

<script src="js/reserv1.js"></script>