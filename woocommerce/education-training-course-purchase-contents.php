<?php
$course_regular_price           = ''; // Initialize variables
$course_sell_price              = '';
$course_discount_price          = '';
$variable_first_id              = '';
$la_four_inst_price             = '';
$la_fifth_inst_regular_price    = '';
$la_fifth_inst_sell_price       = '';

if ($product->get_type() == 'variable') {
    // Assuming these functions are defined elsewhere
    $variable_producs               = la_get_variable_ids_by_product_id($current_product_id);
    $variable_first_id              = $variable_producs['variation_ids'][0];
    $variable_second_id             = $variable_producs['variation_ids'][1];
    $first_variations               = la_get_variable_title_price_by_varid($variable_first_id);
    $second_variations              = la_get_variable_title_price_by_varid($variable_second_id);
    // $variable_both_prices        = $variations['variations'];
    $course_regular_price           = $first_variations['variations'][0];
    $course_sell_price              = $first_variations['variations'][1];
    // $course_discount_price       = round((($course_regular_price - $course_sell_price) / $course_regular_price) * 100);
    $la_fifth_inst_regular_price    = $second_variations['variations'][0];
    $la_fifth_inst_sell_price       = $second_variations['variations'][1];
    // $course_carting_url          = $variable_first_id;
}

// Load Clearpay Icon
// include ASTRA_CHILD_THEME_DIR . '/woocommerce/clearpay-icon.php';
?>

<div class="csh-course-fee">
    <div class="sp-course-fee-tab d-none">
        <ul>
            <li class="sp-course-fee-tab-btn sp-course-fee-tab-btn-single active" onclick="showTab('individual')">Individual</li>
            <li class="sp-course-fee-tab-btn sp-course-fee-tab-btn-business" onclick="showTab('business')">Business</li>
        </ul>
    </div>
    <div id="individual" class="sp-course-fee-tab-content active">
        <form class="sp-single-course-price-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php
            do_action('woocommerce_before_add_to_cart_button');

            do_action('woocommerce_before_add_to_cart_quantity');

            // Assuming these functions are defined elsewhere
            woocommerce_quantity_input(
                array(
                    'min_value' => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                    'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                    'input_value' => isset($_POST['quantity']) ? wc_stock_amount($_POST['quantity']) : $product->get_min_purchase_quantity(),
                )
            );

            do_action('woocommerce_after_add_to_cart_quantity');

            ?>
            <div class="sp-course-price radio-container active">
                <div class="sp-price-p">
                    <span>One Time Purchase</span>
                </div>
                <input type="radio" id="course-price" name="sp-course" value="<?php echo esc_attr($variable_first_id); ?>" checked>
                <label class="course-price-label" for="course-price"><del><?php echo get_woocommerce_currency_symbol() . $course_regular_price ?></del><span><?php echo get_woocommerce_currency_symbol() . $course_sell_price ?></span></label><br>
                <label for="course-price"><p>A simple one-off payment and you're ready to start learning.</p></label>
            </div>
            <div class="sp-lifetime-access radio-container" data-lifetime-course-id="<?php echo $variable_second_id?>">
                <div class="sp-price-p">
                    <span>Monthly Subscription</span>
                </div>
                <input type="radio" id="lifetime-access" name="course-fee" value="lifetime-access">
                    <label class="lifetime-access-label" for="lifetime-access">
                        <strong><del>
                            <?php echo get_woocommerce_currency_symbol() . $la_fifth_inst_regular_price ?></del>
                            <span class="lifetime-access-price"><?php echo get_woocommerce_currency_symbol() . $la_fifth_inst_sell_price ?></span>
                        </strong><!--<small class="">(billed annually)</small> -->
                    </label><br>
                <label for="lifetime-access" class="lifetime-access-price-label-two">
                    <p>Recurring monthly payments to split the cost. <?php echo get_woocommerce_currency_symbol() . $la_fifth_inst_sell_price ?> per month for 5 months (Excl. VAT)</p>
                </label>
            </div>
            <div class="right-sp-course-btn">
                <button type="submit" name="add-to-cart" value="<?php echo esc_attr($course_carting_url); ?>" class="button alt" id="proceed-to-cart">Proceed to Cart</button>
            </div>
        </form>
    </div>
    <div id="business" class="sp-course-fee-tab-content d-none">
        <div class="sp-bs-price">
            <?php
                // Assuming $course_sell_price is the unit price
                $unit_price = floatval($course_sell_price);
                $quantity = 15;
                $total_price = $unit_price * $quantity;
            ?>
            <?php echo get_woocommerce_currency_symbol().$course_sell_price?><span> /Unit Price</span>
        </div>
        <div class="sp-bs-total-price">
            £<?php echo number_format($total_price, 2); ?>
        </div>
        <div class="sp-bs-qty">
            <span>Quantity:</span>
            <button class="button" onclick="decrement()">-</button>
            <input id="demoInput" type="number" value="15" min="15" max="500" disabled="">
            <button class="button" onclick="increment()">+</button>
        </div>
        <div class="sp-bs-btn-dv">
            <a href="?add-to-cart=<?php echo esc_attr($variable_first_id); ?>" class="button product_type_simple add_to_cart_button ajax_add_to_cart sp-bs-btn" data-product_id="<?php echo esc_attr($variable_first_id); ?>" aria-label="Add" data-quantity="15" rel="nofollow">Proceed to Cart</a>
        </div>
    </div>
</div>
<script>
    function increment() {
        document.getElementById('demoInput').stepUp();
        updateTotalPrice();
    }

    function decrement() {
        document.getElementById('demoInput').stepDown();
        updateTotalPrice();
    }

    function updateTotalPrice() {
        var inputVal = $('#demoInput').val();
        var sellPrice = parseFloat(<?php echo $course_sell_price; ?>);

        if (inputVal >= 15 && inputVal <= 500) {
            $(".sp-bs-btn").attr("data-quantity", inputVal);
            $(".sp-bs-price").html("£" + sellPrice.toFixed(2) + "<span> /Unit Price</span>");
            $(".sp-bs-total-price").html("£" + (inputVal * sellPrice).toFixed(2));
        }
    }

    jQuery(document).ready(function($) {
        $("button").click(function() {
            updateTotalPrice();
        });
    });
</script>

<script>
    // Course fee Individual price
    document.addEventListener('DOMContentLoaded', function () {
        const proceedToCartButton = document.getElementById('proceed-to-cart');
        const coursePriceRadio = document.getElementById('course-price');
        const lifetimeAccessRadio = document.getElementById('lifetime-access');
        const totalPriceSpan = document.querySelector('.total-price span');

        function updateTotalPrice(price = null, regularPrice = null) {
            totalPriceSpan.innerHTML = regularPrice ? `<p class="btm-sp-regular-price">${price}</p><del class="btm-sp-regular-price">${regularPrice}</del>` : price;
        }

        // Add event listener to the radio buttons
        coursePriceRadio.addEventListener('click', function () {
            coursePriceRadio.checked = true; // Force check the 'course-price' radio
            lifetimeAccessRadio.checked = false; // Uncheck 'lifetime-access' radio
            proceedToCartButton.value = '<?php echo esc_attr($variable_first_id); ?>';
            updateTotalPrice('<?php echo get_woocommerce_currency_symbol() . $course_sell_price ?>', '<?php echo get_woocommerce_currency_symbol() . $course_regular_price ?>');
        });

        lifetimeAccessRadio.addEventListener('click', function () {
            lifetimeAccessRadio.checked = true; // Force check the 'lifetime-access' radio
            coursePriceRadio.checked = false; // Uncheck 'course-price' radio
            // Add the custom product ID for lifetime access here
            const lifetimeAccessProductID = '<?php echo esc_attr($variable_second_id); ?>'; // You may need to replace this with the correct product ID
            proceedToCartButton.value = lifetimeAccessProductID;
            updateTotalPrice('£299');
        });

        // Trigger initial total price update based on the default checked radio button
        if (coursePriceRadio.checked) {
            updateTotalPrice('<?php echo get_woocommerce_currency_symbol() . $course_sell_price ?>', '<?php echo get_woocommerce_currency_symbol() . $course_regular_price ?>');
        } else if (lifetimeAccessRadio.checked) {
            updateTotalPrice('£299');
        }
    });
</script>

