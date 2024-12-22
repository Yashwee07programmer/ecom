<?php
// request method post 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['productsubmit'])) {
        // call method addtocart
        $Cart->addtocart($_POST['user_id'], $_POST['item_id']);
        // Redirect to the same product page to prevent default redirection
        header("Location: " . $_SERVER['PHP_SELF'] . "?item_id=" . $_POST['item_id']);
        exit();
    }
}
// Get the current item ID from GET parameter
$item_id = $_GET['item_id'] ?? 1;
foreach ($product->getData() as $item):
    if ($item['item_id'] == $item_id):
        ?>
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 py-5">
                        <img src="<?php echo $item['item_image'] ?? 'images/products/2.jpg'; ?>" alt="product1"
                            class="img-fluid">
                        <div class="form-row pt-4 font-baloo font-size-16" style="display: flex;">
                            <div class="col">
                                <button class="btn btn-primary form-control" type="submit">Buy Now</button>
                            </div> &nbsp;&nbsp;
                            <div class="col">
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if (in_array($item['item_id'], $Cart->getcartid($product->getData('cart')) ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success fontsize12">In The Cart</button>';
                                    } else {
                                        echo '<button type="submit" name="productsubmit" class="btn btn-warning fontsize12">Add To Cart</button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h3 class="font-rubik"><?php echo $item['item_name'] ?? 'unknown'; ?></h3>
                        <span>by <?php echo $item['item_brand'] ?? 'unknown'; ?></span>
                        <div class="rating text-warning font-size-14">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                            <a href="#" class="font-rale font-size-14">20,123 ratings|1000+Questions</a>
                        </div>
                        <div class="font-size-16 px-3">
                            Deal Price: ₹<span class="text-danger font-size-20 font-baloo"><?php echo $item['item_price'] ?? 0; ?></span>
                            Inclusive of all taxes<br>
                            You Save: 999.00<br>
                            <i class="fa-solid fa-arrows-rotate iconborder"></i>
                            <i class="fa-solid fa-truck iconborder"></i>
                            <i class="fa-solid fa-check-double iconborder"></i>
                        </div>
                        <div class="row font-rale font-size-12">
                            <div class="col-3">10 Days
                                Replacement</div>
                            <div class="col-3">
                                Myshop Delivered</div>
                            <div class="col-3">
                                1 Year Warranty</div>
                        </div><small>
                            FREE delivery<br>
                            <i class="fa-solid fa-location-dot"></i> Delivering to City 112233 - Update location
                            <br>Ships from MyShop <br>Sold by-Shop Retail Private Ltd</small> <br><br>
                        <div class="row">
                            <div class="col-6">
                                Color:
                                <div class="color my-3">
                                    <div class="d-flex justify-content-evenly">

                                        <div class="p-2 color-yellow-bg rounded-circle"><button
                                                class="btn font-size-14"></button></div>
                                        <div class="p-2 color-primary-bg rounded-circle"><button
                                                class="btn font-size-14"></button></div>
                                        <div class="p-2 color-second-bg rounded-circle"><button
                                                class="btn font-size-14"></button></div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="qty d-flex">
                                    <h6 class="font-baloo">Qty</h6>
                                    <div class="d-flex font-rale w-10">
                                        <button class="qty-up border bg-light"
                                            data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i
                                                class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>"
                                            class="qty_input border px-3 w-50 bg-light" disabled value="1" placeholder="1">
                                        <button data-id="<?php echo $item['item_id'] ?? '0'; ?>"
                                            class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        Size:<br>
                        <div class="d-flex justify-content-evenly"><button>8 GB</button>
                            <button>16 GB</button>
                            <button>32 GB</button>
                        </div>



                    </div>
                    <div class="col-sm-4">
                        <h4> Product Details:</h4>
                        <p class="font-rale"><b>Performance: </b>
                            Octa core (2.4 GHz, Single Core + 2.36 GHz, Tri core + 1.8 GHz, Quad core)
                            Snapdragon 7 Gen 1
                            8 GB RAM<br>
                            <b>Display:</b>
                            6.7 inches (17.02 cm)
                            FHD+, Super AMOLED Plus
                            120 Hz Refresh Rate<br>
                            <b>Camera:</b>
                            50 MP + 8 MP + 2 MP Triple Primary Cameras
                            LED Flash
                            50 MP Front Camera<br>
                            <b>Battery:</b>
                            5000 mAh
                            Fast Charging
                            USB Type-C Port
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endif;
endforeach;
?>