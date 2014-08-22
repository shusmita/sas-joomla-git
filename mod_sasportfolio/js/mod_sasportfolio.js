jQuery(document).ready(function($){
 


//Portfolio filters
$(function(){
 $('#grid').mixItUp();
 });

$(function(){
 //Portfolio Filter Active State
        $('ul#filters li').click(function(){
            $('ul#filters li').removeClass('active');
            $(this).addClass('active');
        });
 });


});