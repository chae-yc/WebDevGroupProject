<div class="people container">
    <div class='btn-group-toggle under' data-toggle='buttons'>
        <span>Under 18</span>
        <label class='btn btn-secondary'>
        <input type='checkbox' checked autocomplete='off'>1</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>2</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>3</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>4</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>5</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>6</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>7</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>8</label>
    </div>
    <div class='btn-group-toggle over' data-toggle='buttons'>
        <span>Over 18</span>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>1</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>2</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>3</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>4</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>5</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>6</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>7</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>8</label>
    </div>
    <div class='btn-group-toggle student' data-toggle='buttons'>
        <span>Student</span>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>1</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>2</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>3</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>4</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>5</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>6</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>7</label>
        <label class='btn btn-secondary '>
        <input type='checkbox' checked autocomplete='off'>8</label>
    </div>
</div>

<div class="seats container">
<div id='screen'>screen</div>
<?php
    $content = "";
    $vsize = count($seats);
    
    $num = 0;
    for($i=1; $i<=$vsize/10; $i++){
        $content .= "<div class='btn-group-toggle' data-toggle='buttons'>";
        for($j=1; $j<=10; $j++){
            //<span class='glyphicon glyphicon-bed'></span>
            $id=$seats[$num]['r'].$seats[$num]['c'];
            if($seats[$num++]['v'] == 0)
                $content .= "<label class='btn invalidseat'>$id</label>";
            else
                $content .= "<label class='btn btn-secondary active seat' id='$id'>
                <input type='checkbox' checked autocomplete='off'>$id</label>";
        }
        $content .= "</div>";
    }
    echo $content;
    ?>
</div>

<div class="info container">
    <h2 id="info_sum">You Selected</h2>
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9">
            <dl class="row">
                <dt class="col-sm-3 col-md-3 col-lg-3">Under 18</dt>
                <dd class="col-sm-9 col-md-9 col-lg-9" id="info_under"></dd>

                <dt class="col-sm-3 col-md-3 col-lg-3">Over 18</dt>
                <dd class="col-sm-9 col-md-9 col-lg-9" id="info_over"></dd>

                <dt class="col-sm-3 col-md-3 col-lg-3">Student</dt>
                <dd class="col-sm-9 col-md-9 col-lg-9" id="info_student"></dd>

                <dt class="col-sm-3 col-md-3 col-lg-3" id="info_count">Seat</dt>
                <dd class="col-sm-9 col-md-9 col-lg-9" id="info_seat"></dd>
            </dl>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            <button class="btn btn-primary btn-lg" id='send_bt'>NEXT PAGE</button>
        </div>
</div>
<script src="js/reserv2.js"></script>