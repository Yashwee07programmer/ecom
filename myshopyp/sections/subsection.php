    <a href="<?php printf('%s? item_id=%s', 'product.php', $item['item_id']) ?>">
        <img src="<?php echo $item['item_image'] ?? "./images/products/1.jpg"; ?>" alt="product1" class="img-fluid"></a>
    <div class="text-center">
        <h6><?php echo $item['item_name'] ?? 'Unknown'; ?></h6>
        <div class="rating text-warning font-size-12">
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="far fa-star"></i></span>
        </div>
        <div class="price py-2">
            ₹<span class="font-size-20 font-baloo"><?php echo $item['item_price'] ?? '0'; ?></span>
        </div>
        <form method="POST">
            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
            <input type="hidden" name="user_id" value="<?php echo 1; ?>">