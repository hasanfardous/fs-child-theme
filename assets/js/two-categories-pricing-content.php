<div id="course-fee-info">
    <div id="course-fee">
        <p class="la-course-fee-label">Course Fee</p>
        <?php
        $course_regular_price       = '';
        $course_sell_price          = '';
        $course_discount_price      = '';
        $variable_first_id          = '';
        $la_four_inst_price         = '';
        $course_carting_url         = '';
        if ( $product->get_type() == 'variable' ) {
            $variable_producs       = la_get_variable_ids_by_product_id( $current_product_id );
            $variable_first_id      = $variable_producs['variation_ids'][0];
            $variations             = la_get_variable_title_price_by_varid( $variable_first_id);
            $variable_both_prices   = $variations['variations'];
            $course_regular_price   = $variations['variations'][0];
            $course_sell_price      = $variations['variations'][1];
            $course_discount_price  = round( 
                ( 
                    ( $course_regular_price - $course_sell_price ) / 
                    $course_regular_price
                ) * 100 
            );
            $la_four_inst_price     = $course_sell_price / 4;
            $course_carting_url     = '/cart?add-to-cart='.$variable_first_id;
        }
        // Load Clearpay Icon
        // include ASTRA_CHILD_THEME_DIR . '/woocommerce/clearpay-icon.php';
        ?>
        <div id="course-price">
            <div class="float-row">
                <div class="float-left text-left">
                    <p class="la-course-fee-big-value"><?php echo get_woocommerce_currency_symbol().$course_sell_price?></p>
                </div>
                <div class="float-right text-right">
                    <p class="la-course-fee-small-value"><?php echo get_woocommerce_currency_symbol().$course_regular_price?></p>
                </div> 
                <p class="la-course-fee-discount-percent"><img src="/wp-content/uploads/2022/12/discount-white.webp" alt="discount white"> <?php echo $course_discount_price?>% OFF</p>
            </div>
            <?php
            if (
            // Exceptional Course Ids from BSL Course Cat
            ( '364465' == $current_product_id ) 			// British Sign Language Level 1	
            || ( '364491' == $current_product_id ) 			// British Sign Language Level 2 	
            ) {
                echo '<p class="mt-3 la-course-fee-first-line">👉  Live Zoom Class</p>';
                echo '<p class="la-course-fee-first-line">👉  Official Exam Included</p>';
            } elseif ( '383736' == $current_product_id ) {
                echo '
                <p class="la-bsl-max-learners"><i class="fa fa-users"></i> Maximum 15 Learners</p>
                <!--p class="la-bsl-max-learners"><i class="fa fa-video-camera"></i> Live Zoom Class</p-->
                <p class="la-bsl-max-learners"><i class="fa fa-id-badge"></i> Face to Face Training</p>';
            } else {
            ?>
                <p class="mt-3 la-course-fee-first-line">👉  CPD UK Accredited PDF Certificate Included</p>
                <?php
            }

            if ( '383736' != $current_product_id ) {
                ?>
                <p class="la-course-fee-second-line"><img src="/wp-content/uploads/2023/09/instalment-payment-icon.webp" width="50" height="41" alt="4 interest-free payments"> 4 interest-free payments of <?php 
                echo get_woocommerce_currency_symbol().$la_four_inst_price; ?></p>
                <?php
            }
            ?>
            <form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post">
                <?php
                do_action('woocommerce_before_add_to_cart_button');

                do_action('woocommerce_before_add_to_cart_quantity');

                woocommerce_quantity_input(
                    array(
                        'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                        'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                        'input_value' => isset($_POST['quantity']) ? wc_stock_amount($_POST['quantity']) : $product->get_min_purchase_quantity(),
                    )
                );

                do_action('woocommerce_after_add_to_cart_quantity');

                ?>
                <button type="submit" name="add-to-cart" value="<?php echo esc_attr($variable_first_id); ?>" class="single_add_to_cart_button button alt">
                    <?php echo esc_html($product->is_purchasable() ? 'ENROL NOW' : 'Read More'); ?>
                </button>
                <?php

                do_action('woocommerce_after_add_to_cart_button');

                ?>
            </form>
            <?php
            if ( ('383736' == $current_product_id || '365519' == $current_product_id) && 4 == get_current_user_id() ) {
                ?>
                <a href="#" id="bsl-enquiry-btn">Enquiry</a>
                <!-- Popup content -->
                <div id="bsl-inquery-modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>

                        <div class="gcse-inquery-modal-contents">
                            <?php echo do_shortcode( '[gravityform id="76" title="false" description="false" ajax="true"]' ); ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div id="course-fee-others">
        <div class="float-row">
            <?php
            $course_facilities_first_title = get_post_meta( $current_product_id, 'course_facilities_first_title', true ) ? get_post_meta( $current_product_id, 'course_facilities_first_title', true ) : 'Duration: * Hours';
            $course_facilities_second_title = get_post_meta( $current_product_id, 'course_facilities_second_title', true ) ? get_post_meta( $current_product_id, 'course_facilities_second_title', true ) : 'Instant Access';
            ?>
            <div class="float-left">
                <div>
                    <img src="/wp-content/uploads/2022/12/7-hours.webp" alt="14 Days Money Back Guarantee">
                </div>
                <?php echo $course_facilities_first_title?>
            </div>
            <div class="float-right">
                <div>
                    <img src="/wp-content/uploads/2022/12/face-to-face.webp" alt="Instant Access">
                </div>
                <?php echo $course_facilities_second_title?>
            </div>
        </div>
    </div>
</div>