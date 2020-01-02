<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="row">
            <div class="col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-sm-11 col-md-11 col-lg-11">
                <ul class="list-group">
                <?php
                    $j=1;
                    for($i=0; $i<count($movieDetails); $i++){    
                        $title = $movieDetails[$i]->title;
                        $popularity = $movieDetails[$i]->popularity;
                        $vote_average = $movieDetails[$i]->vote_average;
                        
                        $content = "<a href='#myCarousel' data-slide-to='$i'
                        class='list-group-item list-group-item-action' id='list_$i'>
                        <i class='fas fa-star'></i>&nbsp;&nbsp;$vote_average
                        &nbsp;&nbsp;&nbsp;&nbsp;$j.&nbsp;$title&nbsp;&nbsp;&nbsp;
                        <span class='badge badge-secondary'>Popularity: $popularity</span>
                        </a>";
                        echo $content;
                        $j++;
                    }
                ?>
                </ul>
            </div>  <!-- row2 col 5 -->
        </div>  <!-- row2 -->
    </div>  <!-- row1 col 5-->
    
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" style="float: center">
            <div class="carousel-inner">
            <?php
                for($i=0; $i<count($movieDetails); $i++){
                    $imgurl = "http://image.tmdb.org/t/p/w780".$movieDetails[$i]->imgsrc;
                    $title = $movieDetails[$i]->title;
                    $overview = $movieDetails[$i]->overview;
                    $content = "
                    <div class='carousel-item' id='cinner_$i'>
                        <img class='img-responsive center-block' src='$imgurl' alt='Poster'></img>
                        <div class='carousel-caption d-none d-md-block'>
                            <h2>$title</h3>
                            <p style='visibility:hidden'>$overview</p>
                        </div>
                    </div>";
                    echo $content;
                }
            ?>
            </div>  <!-- carousel-inner -->
            
            <a class="left carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>  <!-- crousel -->
    </div>  <!-- row1 col-7 -->
</div>  <!-- row1 -->

<script src="js/movieinfo.js"></script>

