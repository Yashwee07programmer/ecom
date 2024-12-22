<section id="banner">
    <style>
        .banner {
            width: 90%;
            height: 20rem;
        }
    </style>
    <div class="owl-carousel owl-theme">
        <div class="item"><img class="banner" src="images/Banner1.jpg" alt="Banner1"></div>
        <div class="item"><img class="banner" src="images/banner2.jpg" alt="Banner2"></div>
        <div class="item"> <img class="banner" src="images/Banner1.jpg" alt="Banner3"></div>
    </div>
</section>
<?php
shuffle($product_shuffle);
// request method post 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['topsalesubmit'])) {
        // call method addtocart
        $Cart->addtocart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<section id="topsale">
    <div class="container">
        <h4 class="font-rubik font-size-20"> Top Sale</h4>
        <hr>
        <div class="owl-carousel owl-theme">
            <?php
            foreach ($product_shuffle as $item) {
                ?>
                <div class="item py-1 px-3">
                    <div class="product font-rale">
                        <?php include("sections/subsection.php"); ?>
                        <?php
                        if (in_array($item['item_id'], $Cart->getcartid($product->getData('cart')) ?? [])) {
                            echo '<button type="submit" disabled class="btn btn-success fontsize12">In The Cart</button>';
                        } else {
                            echo '<button type="submit" name="topsalesubmit" class="btn btn-warning fontsize12">Add To Cart</button>';
                        }
                        ?>

                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    </div>
</section>