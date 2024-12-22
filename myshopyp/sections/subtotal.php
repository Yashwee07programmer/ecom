<div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is
                        eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( 
                            <?php echo isset($subtotal) ? count($subtotal):0;?>item):&nbsp; <span class="text-danger">
                                <span class="text-danger" id="deal-price"> <!--if else-->
                                    ₹<?php echo isset($subtotal) ? $Cart->getsum($subtotal):0;?></span> </span> </h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            </div>
    </div>
</section>