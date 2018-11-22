$(document).ready(function () {
    $('.burger-menu').on('click', function () {
        $('.slide-menu').addClass('open');
        $('.overlay').addClass('show');
        $('body').addClass('hidden');
    });
    $('.overlay').on('click', function () {
        $('.slide-menu').removeClass('open');
        $(this).removeClass('show');
        $('body').removeClass('hidden');
    });
    $('.close').on('click', function () {
        $('.slide-menu').removeClass('open');
        $('body').removeClass('hidden');
        $('.overlay').removeClass('show');
    });

});
