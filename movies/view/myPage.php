


    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



<div class="row content">
    <div class="col-sm-3 sidenav">
        <br>
        <h4 style = "text-align: center"><?php echo $_SESSION['uname']?>'s My Page</h4><br>
        <p align="center"> Thank you for visiting our CINEMA</p>
        <div class="imgcontainer">
            <img src="uploads\<?php echo $_SESSION["uname"].".jpg";?>" alt="You can upload you image to here!" class="avatar">
        </div>
    </div>

    <div class="col-sm-9">
        <h4><small>YOUR DETAILS</small></h4>
        <hr>
        <h2><?php echo $_SESSION['uname']?></h2>
        <h5><span class="glyphicon glyphicon-time"></span><?php echo $content['email'] ;?> </h5>
        <h5><span class="label label-danger"><?php echo $content['birth'] ;?></span> </h5><br>
        
        <form method="post" id = "changeDetialForm" action="model/changeUserDetail.php">
            <div class="input-group">
            <input type="text" name = "password" class="form-control" placeholder="password" require>
            </div><br>
            <div class="input-group">
                <input type="text" class="form-control" readonly='true' value="<?php echo $content['email'] ;?>">
                
            </div><br>
            <div class="input-group">
                <input type="text" class="form-control" readonly='true' value="<?php echo $content['birth'] ;?>">

            </div><br>
            <button class="btn" type="submit" onclick="changeDetail()" >Change Password</button>
        </form><br>
        <form id = "upload" action="model/upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <br><br>

                <input class="fileButton" type="file" name="fileToUpload" id="fileToUpload">
                <br><br>

                <input class="fileButton" onclick="upload()" type="submit" value="Upload Image" name="submit" >
        </form><br>


        <!-- reserved movie -->
        <hr>
        
        <h2>YOUR RESERVED MOVIE</h2>

        <?php
            //require 'model/Dao.php';
            $dao = new Dao();
            $uname = $_SESSION["uname"];
            $sql = "select * from reservation join schedule using(sid) join moviedetail using(mid)  where id = '$uname'";

            //$sql = "SELECT * FROM reservation WHERE id = '$uname'";
            $count = $dao->select("reservation", $results, $sql);

            if($count >=1 ){
                foreach($results as $row){

                    $rid = $row['rid'];
                    $id = $row['id'];
                    $sid = $row['sid'];
                    $seat = $row['seat'];
                    $venue = $row['venue'];

                    $under = $row['under'];
                    $over = $row['over'];
                    $student = $row['student'];
                    $movieTitle = $row['title'];
                    $moviePoster = $row['imgsrc'];
                    $time = $row['time'];

                    //echo "".$rid."/".$id."/".$sid."/".$seat."/".$under."/".$over."/".$student."/".$movieTitle."/".$moviePoster  ;
                    echo "<br>";
                    echo "<img src='http://image.tmdb.org/t/p/w185/"."$moviePoster'/>";
                    echo "<dl class='row'>";
                    echo "<dt class='col-sm-3 col-md-3 col-lg-3'>TITLE</dt>";
                    echo "<dd class='col-sm-10 col-md-10 col-lg-10'> $movieTitle</dd>";
                    echo "<dt class='col-sm-3 col-md-3 col-lg-3'>DATE</dt>";
                    echo "<dd class='col-sm-10 col-md-10 col-lg-10'>$time</dd>";
                    echo "<dt class='col-sm-3 col-md-3 col-lg-3'>Venue</dt>";
                    echo "<dd class='col-sm-10 col-md-10 col-lg-10'>$venue</dd>";
                    echo "<dt class='col-sm-3 col-md-3 col-lg-3'>SEATS </dt>";
                    echo "<dd class='col-sm-10 col-md-10 col-lg-10'>$seat</dd>";
                    echo "<dt class='col-sm-3 col-md-3 col-lg-3'>Client Details </dt>";
                    echo "<dd class='col-sm-10 col-md-10 col-lg-10'> Under18: $under </dd>";
                    echo "<dd class='col-sm-10 col-md-10 col-lg-10'> Over 18: $over</dd>";
                    echo "<dd class='col-sm-10 col-md-10 col-lg-10'> Student: $student</dd>";
                    echo "</dl>";
                    echo "<hr>";
                }
            }
            echo "<hr>";
            if(isset($_SESSION['uname']) && $_SESSION['uname'] === 'admin'){
                echo '<button class="btn btn-danger" id="resetButton" onclick="resetButton()">RESET</button>';
                echo '<img src="resource/loading.gif" id="loadings_gif" loop="INFINITE">'; 
            }

        ?>

        <form method="post" id='hiddenform' action="model/adminReset.php">
        <input type="hidden" name="a" value="a">
         <!-- 아래로 내리면 안돌아감 -->
    <script src = 'js/changeDetail.js'></script>
    </div>
</div><br>
