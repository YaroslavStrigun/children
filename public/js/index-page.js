$(document).ready(function () {
    $('#help-link').click(function () {
        $('.overlay').click();
    });


    var mainSlider = new Swiper('.main-slider', {
        slidesPerView: 1,
        loop: true,
        // autoplay: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var reviewSlider = new Swiper('.review__slider', {
        slidesPerView: 1,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });


});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

