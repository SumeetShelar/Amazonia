<?PHP
    $itemid = $_GET['item_id'] ?? 1;
    foreach($product->getData() as $item) :
        if($item['item_id'] == $itemid) :
            // request method post
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                if(isset($_POST['proceed_submit'])) {
                    // call method addToCart
                    $Cart->addToCart($_POST['user_id2'], $_POST['item_id2']);
                }
                header("Refresh:0; url=cart.php");
            }
            // request method post
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                if(isset($_POST['product_submit'])) {
                    // call method addToCart
                    $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
                } 
            }  
?> 

<!--Product-->
<section id="product" class="py-3">
    <div class="container">
    <div class="row">
        <div class="col-sm-6"><!--Left Side Column-->
            <img src="<?PHP echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product" class="img-fluid">
            <div class="form-row pt-4 font-size-16 font-baloo">
                <div class="col">
                <form method="post">
                    <input type="hidden" name="user_id2" value="<?PHP echo 2; ?>">
                    <input type="hidden" name="item_id2" value="<?PHP echo $item['item_id'] ?? 1; ?>">
                    <?PHP
                        if(in_array($item['item_id'], $Cart->getCartid($product->getData('cart')) ?? [])) {
                            echo '<button type="submit" class="btn btn-danger form-control" >Proceed to Buy</button>';
                        } else {
                            echo '<button type="submit" name="proceed_submit" class="btn btn-danger form-control">Proceed to Buy</button>';
                        }
                    ?>
                </form>    

                </div>
                <div class="col">
                    <form method="post" >
                    <input type="hidden" name="user_id" value="<?PHP echo 2; ?>">
                    <input type="hidden" name="item_id" value="<?PHP echo $item['item_id'] ?? 1; ?>">
                    <?PHP
                        if(in_array($item['item_id'], $Cart->getCartid($product->getData('cart')) ?? [])) {
                            echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                        } else {
                            echo '<button type="submit" name="product_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                        }
                    ?> 
                    </form> 
                </div>
            </div>
        </div>
        <div class="col-sm-6 py-5"><!--Right Side Column-->
            <h5 class="font-baloo font-size-20"><?PHP echo $item['item_name'] ?? "Unknown"; ?></h5>
            <small>by <?PHP echo $item['item_brand'] ?? "Brand"; ?></small>
            <div class="d-flex">
                <div class="rating text-warning font-size-12">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                </div>
                <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
            </div>
            <hr class="m-0">

            <!--Product Price-->
            <table class="my-3">
                <tr class="font-rale font-size-14">
                    <td>M.R.P.</td>
                    <td><strike>Rs 82,000</strike></td>
                </tr>
                <tr class="font-rale font-size-14">
                    <td>Deal Price</td>
                    <td class="text-danger font-size-20">Rs <span><?PHP echo $item['item_price'] ?? 0; ?></span><small class="text-dark font-size-12">&nbsp;Inclusive of all taxes</small></td>
                </tr>
                <tr class="font-rale font-size-14">
                    <td>You Saved</td>
                    <td><span class="text-danger font-size-16">&nbsp;Rs 12,000</span></td>
                </tr>
            </table>
            <!--!Product price-->

            <!--Policy-->
            <div id="policy">
                <div class="d-flex">
                    <div class="return mr-5 text-center">
                        <div class="font-size-20 my-2 color-second">
                            <span class="fas fa-retweet border rounded-pill p-3"></span>
                        </div>
                        <a href="#" class="font-rale font-size-12">10 Days<br>Replacement</a>
                    </div>
                    <div class="return mr-5 text-center">
                        <div class="font-size-20 my-2 color-second">
                            <span class="fas fa-truck border rounded-pill p-3"></span>
                        </div>
                        <a href="#" class="font-rale font-size-12">Super Fast<br>Delivery</a>
                    </div>
                    <div class="return mr-5 text-center">
                        <div class="font-size-20 my-2 color-second">
                            <span class="fas fa-check-double border rounded-pill p-3"></span>
                        </div>
                        <a href="#" class="font-rale font-size-12">1 Year<br>Warranty</a>
                    </div>
                </div>
            </div>
            <!--!Policy-->
            <hr>

            <!--Order Details-->
            <div id="order-details" class="font-rale d-flex flex-column text-dark">
                <small>Delivery by:Mar 28 - Apr 1</small>
                <small>Sold by <a href=""> A1 Electronics </a>&nbsp;(4.5 out of 5 | 18,198 ratings)</small>
                <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 421501</small>
            </div>
            <!--!Order Details-->

            <div class="row">
                <div class="col-6">
                    <!--Color-->
                    <div class="color my-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-baloo">Color:</h6>
                            <div class="color-yellow-bg rounded-circle p-2"><button class="btn font-size-14"></button></div>
                            <div class="color-primary-bg rounded-circle p-2"><button class="btn font-size-14"></button></div>
                            <div class="color-second-bg rounded-circle p-2"><button class="btn font-size-14"></button></div>
                        </div>
                    </div>
                    <!--!Color-->
                </div>

                <!--Product Quantity-->
                <div class="col-6">
                    <div class="qty d-flex">
                        <h6 class="font-baloo">Qty:</h6>
                        <div class="px-4 d-flex font-rale ">
                            <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                            <input type="text" data-id="pro1" class="qty_input border px-2 bg-light w-50 text-center" disabled value="1" placeholder="1">
                            <button class="qty-down border bg-light" data-id="pro1"><i class="fas fa-angle-down"></i></button>
                        </div>
                    </div>
                </div>
                <!--!Product Quantity-->
            </div>

            <!--Size-->
            <div class="size my-4">
                <h6 class="font-baloo">Size:</h6>
                <div class="d-flex justify-content-between w-75">
                    <div class="font-rubik border p-2">
                        <button class="btn p-0 font-size-14">4GB RAM</button>
                    </div>
                    <div class="font-rubik border p-2">
                        <button class="btn p-0 font-size-14">6GB RAM</button>
                    </div>
                    <div class="font-rubik border p-2">
                        <button class="btn p-0 font-size-14">8GB RAM</button>
                    </div>
                </div>
            </div>
            <!--!Size-->
        </div>
        <div class="col-12">
            <h5 class="font-rubik">Product Description</h5>
            <hr>
            <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis eius consequatur earum necessitatibus rem unde molestias quaerat assumenda architecto cupiditate! Nobis obcaecati sequi repudiandae dolor exercitationem sunt, facere beatae! Qui?</p>
            <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis eius consequatur earum necessitatibus rem unde molestias quaerat assumenda architecto cupiditate! Nobis obcaecati sequi repudiandae dolor exercitationem sunt, facere beatae! Qui?</p>
        </div>
    </div>
    </div>
</section>
<!--!Product-->

<?PHP
    endif;
    endforeach;
?>