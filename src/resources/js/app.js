require('./bootstrap');

$(document).ready(function(){
    if($('#messages').html().length > 0){
        $('#messages').delay(500).slideDown();
    }
});
