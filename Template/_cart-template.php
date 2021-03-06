<?PHP
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['delete-cart-submit'])) {
            $deletedRecord = $Cart->deleteCart($_POST['item_id']);
        }
    }
    $in_cart = $Cart->getCartid($product->getData('cart'));

    // save for later
    if(isset($_POST['wishlist-submit'])) {
        $Cart->saveForLater($_POST['item_id']);
    }
?>

<!--Shopping Cart-->
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>
        <!--Shopping-Cart items-->
        <div class="row">
            <div class="col-sm-9">
                <!--Cart item-->
                <?PHP 
                    foreach($product->getData('cart') as $item) :
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item) use($in_cart) {
                ?>
                <div class="row border-top py-3 my-4">
                    <div class="col-sm-2">
                        <img src="<?PHP echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="cart1" class="img-fluid" style="height: 120px;">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?PHP echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small>by <?PHP echo $item['item_brand'] ?? "Brand"; ?></small>

                        <!--Product rating-->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="" class="px-2 font-rale font-size-14">20,530 ratings</a>
                        </div>
                        <!--!Product rating-->

                        <!--Product Qty-->
                        <div class="qty pt-2 d-flex">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?PHP echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?PHP echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 bg-light w-100 text-center" disabled value="1" placeholder="1">
                                <button class="qty-down border bg-light" data-id="<?PHP echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-down"></i></button>
                            </div>

                            <!--Delete Cart item Button-->
                            <form method="post">
                                <input type="hidden" value="<?PHP echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button name="delete-cart-submit" type="submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>

                            <!--Add to Wishlist Button-->
                            <form method="post">
                                <input type="hidden" value="<?PHP echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger px-3">Save for Later</button>
                            </form>

                        </div>
                        <!--!Product Qty-->

                    </div>
                    <div class="col-sm-2">
                        <div class="font-size-20 text-danger font-baloo">
                            Rs&nbsp;<span data-id="<?PHP echo $item['item_id'] ?? '0'; ?>" class="product_price" ><?PHP echo $item['item_price'] ?? '0'; ?></span>
                        </div>
                    </div>
                </div>
                <!--!Cart item-->
                <?PHP
                    return $item['item_price'];
                    }, $cart); // closing array_map function
                    endforeach;
                ?>
            </div>

            <!--Subtotal Section-->
            <div class="col-sm-3">
                <div class="sub-total border mt-2 text-center">
                    <h6 class="font-rale font-size-12 text-success py-3"><i class="fas fa-check"></i>Your order is eligible for free delivery</h6>
                    <div class="border-top py-4">
                    <h5 class="font-baloo font-size-20">Subtotal (<?PHP echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp;&nbsp;<span class="text-danger">Rs&nbsp;</span><span class="text-danger" id="deal-price"><?PHP echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span></h5>
                    <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!--!Subtotal Section-->

        </div>
        <!--!Shopping Cart items-->
    </div>
</section>
<!--!Shopping Cart-->