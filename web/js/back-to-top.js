$(document).ready(function() {
    var offset = 250;
    var duration = 300;
    $(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    $('.back-to-top').click(function(event) {
        //event.preventDefault();
        $('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
