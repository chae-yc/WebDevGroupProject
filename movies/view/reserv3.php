<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="container">
            <form class="form-horizontal" role="form">
            <fieldset>
                <legend>Payment</legend>
            <div class="form-group">
                <label class="col-sm-6 col-md-6 col-lg-6 control-label" for="card-holder-name">Name on Card</label>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
                </div> <!-- col-sm-9 col-md-9 col-lg-9 -->
            </div>  <!-- form-group1 -->

            <div class="form-group">
                <label class="col-sm-6 col-md-6 col-lg-6 control-label" for="card-number">Card Number</label>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
                </div>
            </div>  <!-- form-group2 -->

            <div class="form-group">
                <label class="col-sm-9 col-md-9 col-lg-9 control-label" for="expiry-month">Expiration Date</label>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <div class="row">
                        <div class="col-xs-6" style="margin-left: 16px">
                            <select class="form-control" name="expiry-month" id="expiry-month">
                                <option>Month</option>
                                <option value="01">Jan (01)</option>
                                <option value="02">Feb (02)</option>
                                <option value="03">Mar (03)</option>
                                <option value="04">Apr (04)</option>
                                <option value="05">May (05)</option>
                                <option value="06">June (06)</option>
                                <option value="07">July (07)</option>
                                <option value="08">Aug (08)</option>
                                <option value="09">Sep (09)</option>
                                <option value="10">Oct (10)</option>
                                <option value="11">Nov (11)</option>
                                <option value="12">Dec (12)</option>
                            </select>
                        </div>  <!-- Month div xs-3 -->

                        <div class="col-xs-3" style="margin-left: 5px">
                            <select class="form-control" name="expiry-year">
                                <option value="18">2018</option>
                                <option value="19">2019</option>
                                <option value="20">2020</option>
                                <option value="21">2021</option>
                                <option value="22">2022</option>
                                <option value="23">2023</option>
                                <option value="24">2024</option>
                                <option value="25">2025</option>
                                <option value="26">2026</option>
                                <option value="27">2027</option>
                                <option value="28">2028</option>
                                <option value="29">2029</option>
                            </select>
                        </div>  <!-- Year div xs-3 -->

                    </div>  <!-- row -->
                </div>  <!-- sm-9 -->
            </div>  <!-- formgroup 3 -->
            <div class="form-group">
                <label class="col-sm-6 col-md-6 col-lg-6 control-label" for="cvv">Card CVV</label>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
                </div>
            </div>  <!-- formgroup 4 -->
            </fieldset>
            </form>
        </div>  <!-- container -->
        <dl class="row">
            <dt class="col-sm-3 col-md-3 col-lg-3">Under 18(7.5): </dt>
            <dd class="col-sm-3 col-md-3 col-lg-3"><?php echo $info['under'];?> tickets</dd>
            <dd class="col-sm-6 col-md-6 col-lg-6">€<?php echo $info['under']*7.5;?></dd>

            <dt class="col-sm-3 col-md-3 col-lg-3">Over 18(8.0): </dt>
            <dd class="col-sm-3 col-md-3 col-lg-3" ><?php echo $info['over'];?> tickets</dd>
            <dd class="col-sm-6 col-md-6 col-lg-6">€<?php echo $info['over']*8.0;?></dd>

            <dt class="col-sm-3 col-md-3 col-lg-3">Student(7.0): </dt>
            <dd class="col-sm-3 col-md-3 col-lg-3" ><?php echo $info['student'];?> tickets</dd>
            <dd class="col-sm-6 col-md-6 col-lg-6">€<?php echo $info['student']*7.0;?></dd>

            <dt class="col-sm-3 col-md-3 col-lg-3">Total: </dt>
            <dd class="col-sm-3 col-md-3 col-lg-3"><?php echo $info['total'];?> tickets</dd>
            <dd class="col-sm-3 col-md-3 col-lg-3" id='cost'>€<?php echo $info['cost'];?></dd>
            <dd class="col-sm-3 col-md-3 col-lg-3">
                <button type="button" class="btn btn-success" id="send_bt">Pay Now</button>
            </dd>
        </dl>
    </div>  <!-- row1 col 8 -->
    
    <div class="col-sm-4 col-md-4 col-lg-4">
        <img src="http://image.tmdb.org/t/p/w185/<?php echo $info['movie']['poster'];?>"/>
        <dl class="row">
            <dt class="col-sm-3 col-md-3 col-lg-3">TITLE</dt>
            <dd class="col-sm-10 col-md-10 col-lg-10"><?php echo $info['movie']['title'];?></dd>

            <dt class="col-sm-3 col-md-3 col-lg-3">DATE</dt>
            <dd class="col-sm-10 col-md-10 col-lg-10"><?php echo $info['date'];?></dd>

            <dt class="col-sm-3 col-md-3 col-lg-3">TIME</dt>
            <dd class="col-sm-10 col-md-10 col-lg-10"><?php echo $info['time'];?></dd>

            <dt class="col-sm-3 col-md-3 col-lg-3">SEATS </dt>
            <dd class="col-sm-10 col-md-10 col-lg-10">
                <?php for($i=0; $i<count($info['seats']); $i++)
                    echo $info['seats'][$i].' ';?>
            </dd>
        </dl>
    <div>
</div>  <!-- row -->
<script src="js/reserv3.js"></script>
<form method="post" id='add' action="model/addReservation.php">
<input type="hidden" name="a" value="a">
</form>

