<?PHP
    $product_shuffle = $product->getData();
    shuffle($product_shuffle);
?>

<!--Top Sale-->
<section id="top-sale">
<div class="container py-5">
    <h4 class="font-rubik font-size-20">Top Sale</h4>
    <hr>
    <!--Owl Carousel-->
    <div class="owl-carousel owl-theme">
    <?PHP foreach($product_shuffle as $item) { ?>
    <div class="item py-2">
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
            <button type="submit" class="btn btn-warning font-size-12">Add to cart</button>
        </div>
        </div>
    </div>
    <?PHP } // closing foreach function ?>
    </div>
    <!--!Owl Carousel-->
</div>
</section>
<!--!Top Sale-->