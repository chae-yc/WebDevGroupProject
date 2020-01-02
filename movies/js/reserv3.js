$('#send_bt').hover(
    function(){
        $(this).text('Pay '+$('#cost').text());
    },
    function(){
        $(this).text('Pay now');
    }
);

$('#send_bt').click(function(event){
    var form = $('#add');
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: 'text',
    }).done(function(data) {
        data = data.trim();
        if(data == "success"){
            alert("Your reservation successfully made!! You can check your reservation below the My Page!");
            var field = [];
            field[0] = makeHiddenField('page', 'myPage');
            postData(field);
        }else if(data == 'nodata'){
            var field = [];
            field[0] = makeHiddenField('page', 'reserv2');
            postData(field);
        }else if(data == 'failed')
            alert("failed");
    });

});