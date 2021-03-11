$(document).ready(function(){
    //Banner Owl Carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    //Top sale Owl Carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loops: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
});
