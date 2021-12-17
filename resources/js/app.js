require('./bootstrap');
$(document).ready(function() {
    if(window.innerWidth > 768){
        $('#side_nav').hide();
    }else{
        $('#side_nav').show();
    }
});