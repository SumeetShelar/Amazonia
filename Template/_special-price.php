<?PHP
    $product_shuffle = $product->getData();
    shuffle($product_shuffle);
    $brand = array_map(function ($pro){return $pro['item_brand'];}, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['special_price_submit'])) {
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        } 
    }

    $in_cart = $Cart->getCartid($product->getData('cart'));
?>

<!--Special Price-->
<section id="special-price">
<div class="container">
<h4 class="font-rubik font-size-20">Special Price</h4>
<!--Brand Button Group-->
<div id="filters" class="button-group text-right font-baloo font-size-16">
<button class="btn is-checked" data-filter="*">All Brands</button>
<?PHP
    array_map(function($brand){
        printf('<button class="btn" data-filter=".%s">%s</button>',$brand,$brand);
    }, $unique);
?>
</div>
<!--!Brand Button Group-->

<!--Phone display according to brands-->
<div class="grid">
<?PHP array_map(function($item) use($in_cart) { ?>
<div class="grid-item border <?PHP echo $item['item_brand'] ?? 'Brand' ; ?>">
    <div class="item py-2" style="width: 200px;">
    <div class="product font-rale">
        <a href="<?PHP printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"><img src="<?PHP echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
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
                    if(in_array($item['item_id'], $in_cart ?? [])) {
                        echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                    } else {
                        echo '<button type="submit" name="special_price_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                    }
                ?>
            </form>
        </div>
    </div>
    </div>
</div>
<?PHP }, $product_shuffle) ?>
</div>
<!--!Phone display according to brands-->
</div>
</section>
<!--Special Price-->