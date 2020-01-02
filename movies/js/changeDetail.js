$("#loadings_gif").hide();

function changeDetail(){
    var form = $('#changeDetialForm');
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: 'text'
    }).done(function( data ) {
        if(data == 'success'){
            alert("Your password was changed");
            var field = [];
            field[0] = makeHiddenField('page', 'myPage');
            postData(field);
            //alert("posted");
        }else if(data == 'blankPw'){
            alert("password can not be blank");
            var field = [];
            field[0] = makeHiddenField('page', 'myPage');
            postData(field);
        }
        else if(data == 'failed'){
            alert("changing detail incountered error");
            var field = [];
            field[0] = makeHiddenField('page', 'myPage');
            postData(field);
        }
    });
}
function upload(){
    var form = $('#upload');
    var sourceFile = $('#fileToUpload').val();
    var flag=1;


    if(sourceFile==""){
        alert("Select your Image first");
        flag=0;
        //return;
    }

    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: 'text'
    }).done(function( data ) {

        if(flag){
            alert("Your Image has been uploaded");
            var field = [];
            field[0] = makeHiddenField('page', 'myPage');
            postData(field);
            location.reload(true);

        }else {
            var field = [];
            field[0] = makeHiddenField('page', 'myPage');
            postData(field);
            location.reload(true);
        }
    });
}

function resetButton(){
    $("#loadings_gif").show();
    var form = $('#hiddenform');
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: 'text',
    }).done(function(data) {
        data = data.trim();
        if(data == 'success'){
            var field = [];
            field[0] = makeHiddenField('page', 'home');
            alert('All databases Reseted');
            postData(field);
        }else if(data == 'failed'){
            var field = [];
            field[0] = makeHiddenField('page', 'home');
            postData(field);
        }else{
            var field = [];
            field[0] = makeHiddenField('page', 'home');
            alert('All databases Reseted');
            postData(field);
        }
        $("#loadings_gif").hide();
    });
}

