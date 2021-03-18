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

    //Isotope Filter
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',
        layoutMode : 'fitRows'
    });

    //Filter items on Button click
    $(".button-group").on("click","button",function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter: filterValue});
    })
    
    //New phones Owl Carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loops: true,
        nav: false,
        dots: true,
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
    
    $("#blogs .owl-carousel").owlCarousel({
        loops: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            }
        }
    })
});
