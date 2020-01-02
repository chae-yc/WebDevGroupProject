$('.time').css( "display", "none" );
$('#send_bt').hide();

// disable yesterday
$('.date').first().toggleClass("disabled");
$('.date').first().removeClass("date");

// selected
var mid = "";
var date = "";
var time = "";
var sid = "";
        
$('#send_bt').click(function(event){
    var field = [];
    field[0] = makeHiddenField('page', 'reserv2');
    field[1] = makeHiddenField('mid', mid);
    field[2] = makeHiddenField('date', date);
    field[3] = makeHiddenField('time', time);
    field[4] = makeHiddenField('sid', sid);
    
    postData(field);
    return;
});

// in bottom container info_title info_date info_time
$('.time_bt').click(function(event){
    
    time = $(this).data('time');
    sid = $(this).data('sid');

    $('#info_time').show();
    $('#info_time').text(time);
    $('#send_bt').show();
})

// movie title click
$('.title').click(function(event){
    // block disabled item
    if($(this).hasClass('disabled')){
        return;
    }

    // initialise time and hide
    time = "";
    $('.time').css( "display", "none" );
    $("#info_time").hide();
    $("#send_bt").hide();

    $('.title').removeClass('active');
    $(this).toggleClass('active');
    
    mid = $(this).data('mid'); // save mid
    poster = $(this).data('poster');
    $('#info_title').text($(this).text());
    $('#poster').show();
    $('#poster').attr("src","http://image.tmdb.org/t/p/w342/"+poster);

    dateFilter(mid);
    if(date == "")
        return;

    var tid = "m"+mid+"d"+convertDate(date);
    $('#'+tid).css("display","block")
});
// date click
$('.date').click(function(event){
    // block disabled item
    if($(this).hasClass('disabled')){
        return;
    }

    // initialise time and hide
    time = "";
    $('.time').css( "display", "none" );
    $("#info_time").hide();
    $('#send_bt').hide();

    $('.date').removeClass('active');
    $(this).toggleClass('active');

    date = $(this).data('date');
    $('#info_date').text(date);
    midFilter(convertDate(date));
    
    if(mid == "")
        return;

    var tid = "m"+mid+"d"+convertDate(date);
    $('#'+tid).css("display","block")
});


function dateFilter(){
    // all disabled remove
    $('.date').removeClass('disabled');

    // store scheduled date id by mid
    let scheduled_date = new Set();
    $('.time').each(function(){
        // this.id = m(mid)d181122      // check all ids in the schedule
        // m = mid      d = 181122
        var m = (this.id).split("d")[0];
        m = m.substr(1, m.length);
        var d = (this.id).split("d")[1];
        if(mid == m){
            scheduled_date.add('d'+d);
        }
    });

    $('.date').each(function(){
        if(scheduled_date.has(this.id) == false){
            if($(this).hasClass('active')){
                $(this).remove('active');
                date = "";
            }
            $(this).toggleClass('disabled');
        }
    });
}
// time id = m(mid)d181122
// mid list id = m(mid) .title
// date list id = d181122 .date
function midFilter(){
    // all disabled remove
    $('.title').removeClass('disabled');

    // store scheduled date id by mid
    let scheduled_title = new Set();
    $('.time').each(function(){
        // this.id = m(mid)d181122      // check all ids in the schedule
        // m = mid      d = 181122
        var m = (this.id).split("d")[0];
        m = m.substr(1, m.length);
        var d = (this.id).split("d")[1];
        if(convertDate(date) == d){
            scheduled_title.add('m'+m);
        }
    });

    $('.title').each(function(){
        if(scheduled_title.has(this.id) == false){
            if($(this).hasClass('active')){
                $(this).remove('active');
                $('#poster').hide();
                mid = "";
            }
            $(this).toggleClass('disabled');
        }
    });
}

function convertDate(date){
    var tmp = date.split("/");
    date = "";
    for(var i=0; i<tmp.length; i++){
        date += tmp[i];
    }
    return date;
}