$(function() {
    $(window).keydown(function(e){
        if(e.keyCode == 77){
            $("#helpbar").removeClass('checked');
            $("#sidebar").toggleClass('checked');
        }
        if(e.keyCode == 72){
            $("#sidebar").removeClass('checked');
            $("#helpbar").toggleClass('checked');
        }
    });
});
