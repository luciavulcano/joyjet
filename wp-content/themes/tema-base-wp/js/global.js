var header = $("#nav_main");
$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        header.addClass("scrolled");
    } else {
        header.removeClass("scrolled");
    }
});

$('.cards-slick').slick({
    dots: true,
    arrows: true,

    autoplay: true,
    autoplaySpeed: 8000,
    slidesToShow: 3,
    responsive: [{
        breakpoint: 767,
        settings: {
            arrows: false,
            slidesToShow: 1,
        }
    },]
});