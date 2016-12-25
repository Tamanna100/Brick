$(document).ready(function(){
    $(window).bind('scroll', function() { 
        ($(window).scrollTop() > navHeight) ? $('.nav-section').addClass('goToTop') : $('.nav-section').removeClass('goToTop');
    });
});