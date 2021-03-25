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
    
    //Blog Carousel
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

    //Product Quantity section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $("#deal-price");
    // let $input = $(".qty .qty_input");

    //click on qty up button
    $qty_up.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`); 

        // change product price using Ajax call
        $.ajax({ url: "Template/ajax.php", type: 'post', data: {itemid: $(this).data("id")}, success: function(result) {
            let obj = JSON.parse(result);
            let item_price = obj[0]['item_price'];

            if($input.val() >=1 && $input.val() <=9) {
                $input.val(function(i,oldval) {
                    return ++oldval;
                });

                // increase price of the product
                $price.text(parseInt(item_price * $input.val()).toFixed(2));

                // set Subtotal price
                let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                $deal_price.text(subtotal.toFixed(2));
            }

        }}); // closing Ajax request
    })

    //click on qty down button
    $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`); 

        // change product price using Ajax call
        $.ajax({ url: "Template/ajax.php", type: 'post', data: {itemid: $(this).data("id")}, success: function(result) {
            let obj = JSON.parse(result);
            let item_price = obj[0]['item_price'];

            if($input.val() > 1 && $input.val() <= 10){
                $input.val(function(i, oldval){
                    return --oldval;
                });

                // increase price of the product
                $price.text(parseInt(item_price * $input.val()).toFixed(2));

                // set Subtotal price
                let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                $deal_price.text(subtotal.toFixed(2));
            }

        }}); // closing Ajax request

        
    });



});