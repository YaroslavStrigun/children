$(document).ready(function () {
    $('.burger-menu').on('click', function() {
        $('.slide-menu').toggleClass('open');
        $('.overlay').toggleClass('show');
        $('body').addClass('hidden');
    });
    $('.overlay').on('click', function () {
        $('.slide-menu').removeClass('open');
        $(this).hide();
        $('body').removeClass('hidden');
    });

});
