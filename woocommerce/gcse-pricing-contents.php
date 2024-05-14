<div class="gcse-right-price-selection-wrap">
    <h2>Select Options</h2>
    <?php 
        $variable_product_ids = la_get_variable_ids_by_product_id( $current_product_id );
    ?>
    <div class="gcse-right-price-selection-holder gcse-study-options">
        <h3>Study Options</h3>
        <div class="gcse-right-price-selection d-flex justify-content-between">
            <?php
                $counter = 0;
                foreach ( array_unique($variable_product_ids['attribute_boards']) as $single_item ) {
                    $counter++;
                    $filterable_id = $counter == 1 ? 'foundation' : 'higher';
                    $active_class = $counter == 1 ? ' active' : '';
                    $checked_item = $counter == 1 ? ' checked' : '';
                    ?>
                    <div class="gcse-right-price-selection-single<?php echo esc_attr($active_class)?>" id="gcse-<?php echo esc_attr($filterable_id)?>-option-action">
                        <label class="checkbox-container">
                            <?php echo esc_html($single_item)?>
                            <input type="radio" name="gcse-study-option"<?php echo $checked_item?>>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                <?php
                if ( $counter > 2 ) {
                    break;
                }
                }
            ?>
        </div>
    </div>
    <div class="gcse-right-price-selection-holder gcse-course-options">
        <h3>Course Options</h3>
        <div class="gcse-right-price-selection">
            <?php
            // if ( $product->get_type() == 'variable' ) {
                $counter = 0;
                $j = 0;
                $attribute_boards = $variable_product_ids['attribute_boards'];
                $attribute_courses = $variable_product_ids['attribute_courses'];
                $unique_attr_vals = array_unique($attribute_boards);
                $count_attr_vals = array_count_values($attribute_boards);
                $attr_loop_vals = [];
                foreach( $count_attr_vals as $attr_val ){
                    $counter++;
                    $attr_loop_vals[] = $attr_val;
                    if ( $counter > 2 ) {
                        break;
                    }
                }       

                foreach ( $variable_product_ids['variation_ids'] as $variation_id ) {
                    $variations = la_get_variable_title_price_by_varid( $variation_id);
                    $variable_title = $attribute_courses[$j];
                    $variable_price = $variations['variable_price'];
                    $variable_both_prices = $variations['variations'];
                    $checked_item = $j == 2 ? 'checked' : '';
                    // $variable_discount_percentage = round( ( ( $variations['variations'][0] -  $variations['variations'][1] ) / $variations['variations'][0] ) * 100 );
                    if ( $j < $attr_loop_vals[0] ) {
                        $filterable_slug = 'foundation_tier';
                        $dynamic_style = '';
                    } else {
                        $filterable_slug = 'higher_tier';
                        $dynamic_style = ' style="display: none"';
                    }

                    if (strpos($variable_title, 'Monthly')) {
                        $monthly_pack_class = ' monthly_pack';
                    } else {
                        $monthly_pack_class = '';
                    }
                    ?>
                    <div class="gcse-right-price-selection-single <?php echo esc_attr($filterable_slug.$monthly_pack_class)?>" data-payment-type="monthly"<?php echo $dynamic_style?>>
                        <label class="checkbox-container" data-current-item="<?php echo $j?>">
                            <?php echo esc_html($variable_title)?>
                            <input type="radio" name="gcse-course-option" value="<?php echo esc_attr($variations['variations'][0])?>" data-var-id="<?php echo esc_attr($variation_id)?>">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <?php
                    $j++;
                }
            // }
            ?>
        </div>
    </div>
    <div class="gcse-right-price-selection-holder gcse-payment-options d-none">
        <h3>Payment Options</h3>
        <div class="gcse-right-price-selection d-flex justify-content-between">
            <div class="gcse-right-price-selection-single pay-upfront">
                <label class="checkbox-container">
                    Pay Upfront
                    <input type="radio" name="gcse-payment-option" value="0">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="gcse-right-price-selection-single pay-monthly">
                <label class="checkbox-container">
                    Pay Monthly
                    <input type="radio" name="gcse-payment-option" value="0">
                    <span class="checkmark"></span>
                </label>      
            </div>
        </div>
    </div>
    <div class="gcse-include-fees-checkbox d-none">
        <label for="gcse-include-fees">
            <input type="checkbox" value="245" id="gcse-include-fees">
        </label>                    
        <label for="gcse-include-fees-monthly">
            <input type="checkbox" value="21" id="gcse-include-fees-monthly">
        </label>                    
    </div>

    <div class="gcse-total-course-fees">
        <p class="gcse-course-fees-value">
            <span>£</span>
            <span class="gcse-course-dynamic-fee">0</span>
        </p>
        <a href="#" id="gcse-enroll-btn" data-course-id="<?php echo esc_attr($current_product_id)?>">Enrol Now</a>
        <p class="gcse-course-ajax-confirmation-message"></p>
    </div>
</div>