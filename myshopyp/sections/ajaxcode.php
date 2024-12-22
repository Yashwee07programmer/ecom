<?php
require('../databases/dbshop.php');
require('../databases/Product.php');
$db = new DBControl();
$product =new Product($db);
if(isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}