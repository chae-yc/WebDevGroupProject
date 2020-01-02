document.getElementById('loginWin').style.display = 'block';

function login(){
    var form = $('#loginform');
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: 'text'
    }).done(function( data ) {
        data = data.trim();
        //alert(data);
        if(data == 'success'){
            alert('Login success');
            var field = [];
            field[0] = makeHiddenField('page', 'home');
            postData(field);
        }
        else if(data == 'failed'){
            alert('Please check your ID/Password');
            var field = [];
            field[0] = makeHiddenField('page', 'login');
            postData(field);
        }
    });
}
function cancel(){
    document.getElementById('loginWin').style.display='none'
    
    // page to home
    var field = [];
    field[0] = makeHiddenField('page', 'home');
    postData(field);
}