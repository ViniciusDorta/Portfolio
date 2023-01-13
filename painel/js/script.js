$(function () {

    var open = true;
    var windowSize = $(window)[0].innerWidth;

    if (windowSize <= 768) {
        open = false;
    }

    $('.btn-menu').click(function () {
        if (open) {
            $('.menu').animate({ 'width': '0' });
            $('header').animate({
                'width': '100%',
                'left': '0',
            });
            $('.content').animate({
                'width': '100%',
                'left': '0',
            });
        } else {

        }
    });
});