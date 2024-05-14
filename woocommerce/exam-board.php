<?php
    $variable_producs = la_get_variable_ids_by_product_id( $current_product_id );
    $la_login_status_class = is_user_logged_in() ? 'la_logged_in_user' : 'la_not_logged_in_user';
    // $redirect_to_login = ! is_user_logged_in() ? wp_login_url( $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]) : '';
    $redirect_to_login = ! is_user_logged_in() ? wp_login_url( get_permalink() ) : '';

    // Check the product category
    if ( ! function_exists('la_check_the_current_course_category') ) {
        function la_check_the_current_course_category() {
            $specified_cats = [];
            $la_course_terms = get_the_terms( get_the_ID(), 'product_cat' );
            foreach( $la_course_terms as $cat ) {
                $specified_cats[] = $cat->term_id;
                $specified_cats[] = $cat->parent;
            }
            return $specified_cats;
        }
    }

if ( in_array( '359', la_check_the_current_course_category() ) ) {
?>
<div id="la-gcse-venues-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>

        <div class="la-all-venues-modal-contents">
            <?php
            $gcse_location_datas = [
                [
                    'gcse_location_title'   => 'GCSE Exam Centre in London',
                    'gcse_location'         => '54 Upton Lane, London E7 9LN',
                ],

                [
                    'gcse_location_title'   => 'GCSE Exam Centre in Birmingham',
                    'gcse_location'         => '1772 Coventry Rd, Yardley, Birmingham B26 1PB, UK',
                ],

                [
                    'gcse_location_title'   => 'GCSE Exam Centre in Wimbledon, London',
                    'gcse_location'         => 'Methodist Centre, Griffiths Rd, Wimbledon, London SW19 1SP',
                ],

                [
                    'gcse_location_title'   => 'GCSE Exam Centre in Taunton',
                    'gcse_location'         => 'Hi-Point, First Floor Offices, Thomas Street, Taunton TA2 6HB',
                ],

                [
                    'gcse_location_title'   => 'GCSE Exam Centre in St Neots',
                    'gcse_location'         => 'Suites 1 & 2, Terek House, Sandpiper Court, Eaton Socon, St Neots, PE19 8EP',
                ],

                [
                    'gcse_location_title'   => 'GCSE Exam Centre in Romford',
                    'gcse_location'         => 'Unit 5 Redwing Court Ashton Road Harold Hill Romford RM3 8QQ',
                ],

                [
                    'gcse_location_title'   => 'GCSE Exam Centre in High Wycombe',
                    'gcse_location'         => '46 - 48 Oxford Street High Wycombe HP11 2XG',
                ],

                [
                    'gcse_location_title'   => 'GCSE Exam Centre in Doncaster',
                    'gcse_location'         => '1 Don House, Sidings Court, Doncaster DN4 5NL',
                ],

                [
                    'gcse_location_title'   => 'GCSE Exam Centre in Coventry, West Midlands',
                    'gcse_location'         => 'Coventry Building Society Arena, North Stand Entrance, Judds Lane, Coventry CV6 6GE',
                ],

                [
                    'gcse_location_title'   => 'GCSE Exam Centre in Bolton',
                    'gcse_location'         => 'Victoria Hall, 37 Knowsley St, Bolton BL1 2AS',
                ],

                [
                    'gcse_location_title'   => 'GCSE Exam Centre in Belfast, Northern Ireland',
                    'gcse_location'         => '2nd Floor, 115-119 Royal Avenue, Belfast BT1 1FF',
                ],
            ];
            
            foreach ( $gcse_location_datas as $item ) {
                ?>
                <div class="la-single-venue-contents">
                    <h2><?php echo $item['gcse_location_title']?></h2>
                    <p class="m-0"><?php echo $item['gcse_location']?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
    echo '<p class="la-gcse-all-venues">Check out our <a href="#">All Venues</a></p>';
}

// Show Venues for specific courses
if ( 
    ('376160' == $current_product_id) 
    || ('376417' == $current_product_id)
    || ('376420' == $current_product_id)
    || ('377824' == $current_product_id)
    || ('361585' == $current_product_id)
    || ( '368595' == $current_product_id )
    || ( '371100' == $current_product_id )
    || ( '370863' == $current_product_id ) 
    || ( '382016' == $current_product_id ) 
) {
    ?>
    <p class="la-single-board-sec-title text-center"><?php $board_sec_title = $board_sec_title != '' ? $board_sec_title : '';echo esc_html($board_sec_title)?></p>
    <p class="la-single-board-sec-venue-details text-center">
        <?php
        if( ('361585' == $current_product_id) || ( '368595' == $current_product_id ) || ( '371100' == $current_product_id ) || ( '370863' == $current_product_id ) ) {
            if ( '368595' == $current_product_id || '370863' == $current_product_id ) {
                ?>
                <strong>Venue:</strong> <span> London </span><br>
                <?php
            } else {
                ?>
                <strong>Venue:</strong> <span> 25A Wincott Street, Kennington, SE11 4NT </span><br>
                <?php
            }
        } elseif('377824' == $current_product_id) {
            ?>
            <strong>Venue:</strong> <span> Pure Offices, Kembrey Park, Swindon, SN2 8BW </span><br>
            <?php
        } elseif( '376420' == $current_product_id ) {
            ?>
            <strong>Venue:</strong> <span> 5 Neptune Court, Barton Manor, Bristol BS2 0RL </span><br>
            <?php
        } elseif( '376417' == $current_product_id ) {
            ?>
            <strong>Venue:</strong> <span> Birmingham City Football Club PLC St Andrew's Stadium Cattell Road, Birmingham B9 4RL </span><br>
            <?php
        } elseif( '382016' == $current_product_id ) {
            ?>
            <strong>Venue Address:</strong> <span> Blucher Street, 44, Birmingham, B1 1QJ </span><br>
            <?php
        } else {
            ?>
            <strong>Venue:</strong> <span> A Team Academy, 305 Soho Road, Handsworth, Birmingham B21 9LX </span><br>
            <?php
        }
        ?> 
        <strong>Time:</strong> <span>10:00 am - 05:00 pm</span>
    </p>
    <?php
} else {
    ?>
    <p class="la-single-board-sec-title"><?php $board_sec_title = $board_sec_title != '' ? $board_sec_title : '';echo esc_html($board_sec_title)?></p>
    <?php
}

if ($show_board_sec_btns != 'hide') { ?>
<div id="exam-board-btns">
    <?php
        $counter = 0;
        foreach ( array_unique($variable_producs['attribute_boards']) as $single_item ) {
            $counter++;
            $filterable_id = $counter == 1 ? 'ncfe' : 'edexcel';
            $active_class = $counter == 1 ? 'active' : '';
            ?>
            <button class="<?php echo esc_attr($active_class)?>" id="<?php echo esc_attr($filterable_id)?>-exam-board">
                <span></span>&nbsp;<?php echo esc_html($single_item)?>
            </button>
            <?php
            if ( $counter > 3 ) {
                break;
            }
        }
    ?>
</div>
<?php 
    echo '<p class="la-single-board-sec-secondary-title">Select Option</p>';

} ?>

<div id="exam-board-options" data-course-id="<?php echo esc_attr($current_product_id)?>">
    <?php
    if ( $product->get_type() == 'variable' ) {
        $counter = 0;
        $j = 0;
        $attribute_boards = $variable_producs['attribute_boards'];
        $attribute_courses = $variable_producs['attribute_courses'];
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

        foreach ( $variable_producs['variation_ids'] as $variation_id ) {
            $variations = la_get_variable_title_price_by_varid( $variation_id);
            $variable_title = $attribute_courses[$j];
            $variable_price = $variations['variable_price'];
            $variable_both_prices = $variations['variations'];
            $variable_discount_percentage = round( ( ( $variations['variations'][0] -  $variations['variations'][1] ) / $variations['variations'][0] ) * 100 );
            $current_var_status = $variations['variable_stock'];

            if ( $j < $attr_loop_vals[0] ) {
                $filterable_slug = 'ncef_product';
                $dynamic_style = ' style=""';
            } else {
                $filterable_slug = 'edexcel_product';
                $dynamic_style = ' style="display: none"';
            }
                ?>
                <div class="exam-board-single-option <?php echo esc_attr($filterable_slug .' '. $current_var_status)?>" data-variation-id="<?php echo esc_attr($variation_id)?>" <?php echo $dynamic_style?>>
                    <label class="checkbox-container"><?php echo esc_html($variable_title)?>
                        <input type="radio" name="board-radio" value="<?php echo ($j == 0 && $variable_both_prices[0] == '0') ? 0 : esc_attr($variable_price)?>" data-var-prev-price="<?php echo $variations['variations'][0]?>" <?php echo $current_var_status != 'instock' ? 'disabled' : '' ?>>
                        <span class="checkmark"></span>
                        <?php 
                            if ( $current_var_status != 'instock' ) {
                                echo '<p class="la-variable-stock-out">Fully Booked!</p>';
                            }
                        ?>
                        <p class="la-show-black-friday-countdown-reminder"></p>
                        <script>
                        jQuery(document).ready(function () {
                            getBlackFridayRemainingCountdown('yes');
                        });
                        </script>
                    </label>
                    <div class="exam-board-single-option-price">
                        <?php
                            if ( $j == 0 && $variable_both_prices[0] == '0' ) {
                                ?>
                                <div class="entire-variable-discount">
                                    Free
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="entire-variable-prices">
                                    <span>
                                        <?php echo get_woocommerce_currency_symbol()?><span class="course-sale-price"><?php echo esc_html($variable_price)?></span>
                                    </span>
                                    <?php 
                                    if ($variable_both_prices[1] != '') {
                                        ?>
                                        <span class="course-prev-price-wrap">
                                            <?php echo get_woocommerce_currency_symbol()?><span class="course-prev-price"><?php echo esc_html($variable_both_prices[0])?></span>
                                        </span>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php 
                                if ($variable_both_prices[1] != '') {
                                    ?>
                                    <div class="entire-variable-discount">
                                        <?php echo $variable_discount_percentage?>% OFF
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <?php
                $j++;
        }
    }
    ?>
</div>
<div id="exam-board-total">
    <div class="float-row">
        <span class="float-left">Subtotal</span>
        <span class="float-right"><?php echo get_woocommerce_currency_symbol()?><span class="course-sale-price">0</span></span>
    </div>
    <div class="float-row">
        <span class="float-left"><b>Total (Excl. VAT)</b></span>
        <span class="float-right"><b><?php echo get_woocommerce_currency_symbol()?><span class="course-sale-price">0</span></b></span>
    </div>
</div>
<a href="#" id="enroll-btn">Buy Now</a>
<p class="la-course-ajax-confirmation-message"></p>