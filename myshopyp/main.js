// jquery
$(document).ready(function () {
  $("#banner .owl-carousel").owlCarousel({
    dots: true,
    items: 1,
  });
  $("#topsale .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    responsive: {
      0: { items: 2 },
      600: { items: 3 },
      1000: { items: 5 },
    },
  });
  // isotope filter
  var $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    layoutMode: "fitRows",
  });
  // filter on click
  $(".button-group").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({ filter: filterValue });
  });
  // newphones
  $("#newphones .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    responsive: {
      0: { items: 2 },
      600: { items: 3 },
      1000: { items: 5 },
    },
  });
  // blogs
  $("#blogs .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    responsive: {
      0: { items: 2 },
      600: { items: 3 },
    },
  });
let $qty_up = $(".qty .qty-up");
let $qty_down = $(".qty .qty-down");
let $deal_price = $("#deal-price");

// Increment quantity
$qty_up.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
    
    // Change product price via AJAX call
    $.ajax({
        url: "sections/ajaxcode.php",
        type: "POST", // Use uppercase for consistency
        data: { itemid: $(this).data("id") },
        success: function (result) {
            try {
                let obj = JSON.parse(result);
                let item_price = parseFloat(obj[0]["item_price"]); // Use parseFloat for price

                if ($input.val() >= 1 && $input.val() < 10) { // Updated condition
                    $input.val(function (i, oldval) {
                        return parseInt(oldval) + 1;
                    });

                    // Update product price
                    $price.text((item_price * $input.val()).toFixed(2));

                    // Update subtotal
                    let totalprice = parseFloat($deal_price.text()) + item_price; // Fixed logic
                    $deal_price.text(totalprice.toFixed(2));
                }
            } catch (error) {
                console.error("Error parsing response:", error.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX request failed:", error);
        }
    });
});

// Decrement quantity
$qty_down.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`); // Fixed missing quotes
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    // Change product price via AJAX call
    $.ajax({
        url: "sections/ajaxcode.php", // Corrected property name
        type: "POST", // Use uppercase for consistency
        data: { itemid: $(this).data("id") },
        success: function (result) {
            try {
                let obj = JSON.parse(result);
                let item_price = parseFloat(obj[0]["item_price"]); // Use parseFloat for price

                if ($input.val() > 1) { // Prevent quantity from going below 1
                    $input.val(function (i, oldval) {
                        return parseInt(oldval) - 1;
                    });

                    // Update product price
                    $price.text((item_price * $input.val()).toFixed(2));

                    // Update subtotal
                    let totalprice = parseFloat($deal_price.text()) - item_price;
                    $deal_price.text(totalprice.toFixed(2));
                }
            } catch (error) {
                console.error("Error parsing response:", error.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX request failed:", error);
        }
    });
});

});
