<?php
$brand = array_map(function ($pro) {
    return $pro['item_brand']; }, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);
// request method post 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['specialpricesubmit'])) {
        // call method addtocart
        $Cart->addtocart($_POST['user_id'], $_POST['item_id']);
    }
}
$incart = $Cart->getcartid($product->getData('cart'))
    ?>

<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Brand</button>
            <?php
            array_map(function ($brand) {
                printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
            }, $unique);
            ?>
        </div>
        <div class="grid d-flex">
            <?php array_map(function ($item) use ($incart) { ?>
                <div class="grid-item border <?php echo $item['item_brand'] ?? 'brand'; ?>">
                    <div class="item" style="width: 200px;">
                        <div class="product font-rale">
                        <?php include("sections/subsection.php");?>
                                    <?php
                                    if (in_array($item['item_id'], $incart ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success fontsize12">In The Cart</button>';
                                    } else {
                                        echo '<button type="submit" name="specialpricesubmit" class="btn btn-warning fontsize12">Add To Cart</button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<section id="banner_adds">
    <div class="container py-5 text-center">
        <img src="images/banner1-cr-500x150.jpg" class="img-fluid" alt="banner1">
        <img src="images/banner2-cr-500x150.jpg" class="img-fluid" alt="banner1">
    </div>
</section>
