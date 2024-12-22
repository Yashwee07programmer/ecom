<?php
shuffle($product_shuffle);
// request method post 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['newphonessubmit'])) {
        // call method addtocart
        $Cart->addtocart($_POST['user_id'], $_POST['item_id']);
    }
}
$item_id = $_GET['item_id'] ?? 1;
foreach ($product->getData() as $item):
    if ($item['item_id'] == $item_id):
        ?>
        <section id="newphones">
            <div class="container py-4">
                <h4 class="font-rubik font-size-20">New Smart Phones</h4>
                <hr>
                <div class="owl-carousel owl-theme">
                    <?php
                    foreach ($product_shuffle as $item) {
                        ?>
                        <div class="item py-2 bg-light">
                            <div class="product font-rale py-1 px-3">
                            <?php include("sections/subsection.php");?>
                                        <?php
                                        if (in_array($item['item_id'], $Cart->getcartid($product->getData('cart'))??[])) {
                                            echo '<button type="submit" disabled class="btn btn-success fontsize12">In The Cart</button>';
                                        } else {
                                            echo '<button type="submit" name="newphonessubmit" class="btn btn-warning fontsize12">Add To Cart</button>';
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }endif;
endforeach; ?>
        </div>
    </div>
</section>