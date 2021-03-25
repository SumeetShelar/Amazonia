<?PHP
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['delete-wishlist-submit'])) {
            $deletedRecord = $Cart->deleteCart($_POST['item_id'],'wishlist');
        }
    }
    $in_cart = $Cart->getCartid($product->getData('cart'));

    // add to cart
    if(isset($_POST['add-to-cart-submit'])) {
        $Cart->saveForLater($_POST['item_id'],'cart', 'wishlist');
    }
?>

<!--Shopping Cart-->
<section id="cart" class="py-3">
<div class="container-fluid w-75">
<h5 class="font-baloo font-size-20">Wishlist</h5>
<!--Shopping-Cart items-->
<div class="row">
    <div class="col-sm-9">
        <!--Cart item-->
        <?PHP 
            foreach($product->getData('wishlist') as $item) :
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

                    <!--Delete Item Button-->
                    <form method="post">
                        <input type="hidden" value="<?PHP echo $item['item_id'] ?? 0; ?>" name="item_id">
                        <button name="delete-wishlist-submit" type="submit" class="btn font-baloo text-danger pl-0 pr-3 border-right">Delete</button>
                    </form>

                    <!--Add to Cart Button-->
                    <form method="post">
                        <input type="hidden" value="<?PHP echo $item['item_id'] ?? 0; ?>" name="item_id">
                        <button type="submit" name="add-to-cart-submit" class="btn font-baloo text-danger px-3">Add to Cart</button>                    </form>
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

</div>
    <!--!Shopping Cart items-->
</div>
</section>
<!--!Shopping Cart-->