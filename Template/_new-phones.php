<?PHP
    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['new_phones_submit'])) {
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        } 
    }
?>

<!--New Phones-->
<section id="new-phones">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">New Phones</h4>
        <hr>
        <div class="owl-carousel owl-theme">
            <?PHP foreach($product_shuffle as $item) { ?>
            <div class="item py-2 bg-light">
                <div class="product font-rale">
                <a href="<?PHP printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"><img src="<?PHP echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                <div class="text-center">
                    <h6><?PHP echo $item['item_name'] ?? "Unknown"; ?></h6>
                    <div class="rating text-warning font-size-12">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                    </div>
                    <div class="price py-2">
                    <span>Rs&nbsp;<?PHP echo $item['item_price'] ?? '0'; ?></span>
                    </div>
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?PHP echo 2; ?>">
                        <input type="hidden" name="item_id" value="<?PHP echo $item['item_id'] ?? 1; ?>"> 
                        <?PHP
                            if(in_array($item['item_id'], $Cart->getCartid($product->getData('cart')) ?? [])) {
                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                            } else {
                                echo '<button type="submit" name="new_phones_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                            }
                        ?>
                    </form>
                </div>
                </div>
            </div>
            <?PHP } // closing foreach function ?>
        </div>
    </div>
</section>  
<!--!New Phones-->