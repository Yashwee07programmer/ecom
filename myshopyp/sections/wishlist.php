<?php
// Delete item from cart

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deletefromwishlist'])) {
        $deletedrecord = $Cart->deletecart($_POST['item_id'], 'wishlist');
    }// request method post
    if (isset($_POST['cart_submit'])) {
        // call method addtocart
        $Cart->saveforlater($_POST['item_id'], 'cart', 'wishlist');
    }
}
?>
<section id="cart" class="py-1">
    <div class="container-fluid w-75">
        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('wishlist') as $item):
                    $cart = $product->getProduct($item['item_id']);
                    $subtotal[] = array_map(function ($item) {
                        ?>
                        <!-- cart item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                            <a href="<?php printf('%s? item_id=%s', 'product.php', $item['item_id']) ?>">
                            <img src="<?php echo $item['item_image'] ?? "./images/products/1.jpg"; ?>" alt="product1" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                                <small>by <?php echo $item['item_brand'] ?? "brand"; ?></small>
                                <!-- product rating -->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                </div>
                                <!--  !product rating-->

                                <!-- product qty -->
                                <div class="qty d-flex pt-2">

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="deletefromwishlist"
                                            class="btn font-baloo text-danger pl-0 pr-3 border-right">Delete</button>
                                        <input type="hidden" name="user_id" value="<?php echo 1; ?>">

                                    </form>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="cart_submit" class="btn font-baloo text-danger">Add to
                                            Cart</button>
                                        <input type="hidden" name="user_id" value="<?php echo 1; ?>">

                                    </form>

                                </div>
                                <!-- !product qty -->

                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-baloo">
                                    ₹<span class="product_price font-baloo"
                                        data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- !cart item -->
                        <?php
                        return $item['item_price'];
                    }, $cart); //closing arraymap fnction
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>