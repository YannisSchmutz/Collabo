require('./bootstrap');

function showMessages(delay){
    $('#messages div:hidden').each(function(){
       if($(this).find('p').length > 0){
           $(this).delay(delay).slideDown();
       }
    });
}

function addErrorMessage(message){
    let paragraph = '<p>' + message + '</p>';
    $('#messages div.alert-danger').html(paragraph);
}

$(document).ready(function(){
    showMessages(500);
});
