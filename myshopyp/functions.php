<?php

//require mysql connection
require_once('databases/dbshop.php');

//require product class
require_once('databases/Product.php');
// require cart class
require_once('databases/cart.php');
//dbshop object
$db = new DBControl();

//product object
$product = new Product($db);
$product_shuffle = $product->getData();
$Cart= new Cart($db);
