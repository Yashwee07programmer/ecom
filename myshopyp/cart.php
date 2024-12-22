<?php
ob_start();
include('header.php');
?>
<?php
echo '<h5>Shopping Cart</h5>';
// if else for empty cart
count($product->getData('cart')) ? 
include('sections/cartsection.php') : include('sections/empty.php');
include('sections/subtotal.php');
echo '<h5>Wishlist</h5>';
count($product->getData('wishlist')) ? 
include('sections/wishlist.php') : include('sections/empty.php');

include('./sections/newphones.php');
?>
<?php
include('footer.php');
?>