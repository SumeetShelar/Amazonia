<!--Shopping Cart-->
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>
        <!--Shopping-Cart items-->
        <div class="row">
            <div class="col-sm-9">
            <!--Empty Cart-->
            <div class="row">
                <div class="col-sm-12 border-top py-3 mt-3 text-center">
                    <img src="./assets/blog/empty_cart.png" alt="Empty Cart" class="img-sluid" style="height: 200px;">
                    <p class="font-baloo font-size-16 text-black-50">Empty Cart</p>
                </div>
            </div>
            <!--!Empty Cart-->
            </div>

            <!--Subtotal Section-->
            <div class="col-sm-3">
                <div class="sub-total border mt-2 text-center">
                    <h6 class="font-rale font-size-12 text-success py-3"><i class="fas fa-check"></i>Your order is eligible for free delivery</h6>
                    <div class="border-top py-4">
                    <h5 class="font-baloo font-size-20">Subtotal (<?PHP echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp;&nbsp;<span class="text-danger">Rs&nbsp;</span><span class="text-danger" id="deal-price"><?PHP echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span></h5>
                    <button type="submit" class="btn btn-warning mt-3" disabled>Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!--!Subtotal Section-->

        </div>
        <!--!Shopping Cart items-->
    </div>
</section>
<!--!Shopping Cart-->