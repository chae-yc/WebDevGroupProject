$('#send_bt').hide();

var count = 0;
var under = 0;
var over = 0;
var student = 0;

$('#send_bt').click(function(event){
    var seats = $('#info_seat').text().split(" ");
    var field = [];
    field[0] = makeHiddenField('page', 'reserv3');
    field[1] = makeHiddenField('under', under);
    field[2] = makeHiddenField('over', over);
    field[3] = makeHiddenField('student', student);
    field[4] = makeHiddenField('seats[]', seats);
    
    postData(field);
    return;
});


$('.seat').click(function(event){
    var sum = under + over + student;
    
    if(sum == 0){
        alert("Select the amount of ticket first");
        $(this).toggleClass('active');
        return ;
    }
    // select count
    if($(this).hasClass('active'))
        count++;
    else{
        count--;
        $('#send_bt').hide();
    }

    // count is greater or same than sum
    if(sum < count){
        alert("If you want to change your seat, please cancel the previous one");
        $(this).toggleClass('active');
        count--;
        return ;
    }

    if(count > 0){
        $('.people label').removeClass('btn-secondary');
        $('.people label.active').addClass('btn-secondary');
        $(this).toggleClass('active');
        var s = [];
        $('.seat').not('.active').each(function( index ) {
            s[s.length] =  $(this).attr('id');
        });
        s.sort();
        $('#info_seat').text(s.join(' '));
        $(this).toggleClass('active');
        $('#info_count').text('Seat ('+s.length+')');
    }else{
        if(!$('.under label').hasClass('active'))
            $('.under label').addClass('btn-secondary');
        if(!$('.over label').hasClass('active'))
            $('.over label').addClass('btn-secondary');
        if(!$('.student label').hasClass('active'))
            $('.student label').addClass('btn-secondary');
        $('#info_seat').text('');
        $('#info_count').text('Seat');
    }
    if(count == sum){
        $('#send_bt').show();
    }
});


$('.under label').click(function(){
    if(count > 0){
        $(this).toggleClass('active');
        alert('If you want to change the amount of tickets reserved, please cancel all the seats first');
        return;
    }
    var th = $(this);
    controlPeople('under', th);
    $('#info_under').text(under);
});
$('.over label').click(function(){
    if(count > 0){
        $(this).toggleClass('active');
        alert('If you want to change the amount of tickets reserved, please cancel all the seats first');
        return;
    }
    var th = $(this);
    controlPeople('over', th);
    $('#info_over').text(over);
});
$('.student label').click(function(){
    if(count > 0){
        $(this).toggleClass('active');
        alert('If you want to change the amount of tickets reserved, please cancel all the seats first');
        return;
    }
    var th = $(this);
    controlPeople('student', th);
    $('#info_student').text(student);
});

function controlPeople(age, th){
    var num;
    switch(age){
        case 'under': num = under; break;
        case 'over': num = over; break;
        case 'student': num = student; break;
    }

    // cancel people count selection
    if(th.hasClass('active')){
        num = 0;
        $('.'+age+' label').addClass('btn-secondary');
    }else{
        // change people count selection
        num = parseInt(th.text());
        $('.'+age+' label').removeClass('btn-secondary');
        th.addClass('btn-secondary');
    }
    if(num > 0){
        $('.'+age+' label').removeClass('active');
    }

    switch(age){
        case 'under': under = num; break;
        case 'over': over = num; break;
        case 'student': student = num ; break;
    }
    var sum = under+over+student;
    if(sum > 0){
        $('#info_sum').text('You Selected ('+sum+')');
    }else
        $('#info_sum').text('You Selected');
}