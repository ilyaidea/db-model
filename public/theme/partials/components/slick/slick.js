$(document).ready(function(){
    $(".slick-dot").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
    });
    $(".slick-button").slick({
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
    });

    $(".slick-autoplay").slick({
        autoplay:true,
        autoplaySpeed:3000,
        slidesToShow: 1,
        slidesToScroll: 1,

    });
});