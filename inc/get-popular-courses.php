<?php
// Get buttons
// function la_get_popular_courses_btns( $course_button_strings ){
//     $button_labels = [];
//     $button_strings = explode(',', $course_button_strings);
//     foreach ( $button_strings as $all_buttons ) {
//         $button_labels[] = trim($all_buttons);
//     }
//     return $button_labels;
// }

// Get course ids
// function la_get_popular_courses_ids( $course_cat_id_strings ){
//     $cat_ids = [];
//     $cat_id_strings = explode(',', $course_cat_id_strings);
//     foreach ( $cat_id_strings as $all_cat_ids ) {
//         $cat_ids[] = trim($all_cat_ids);
//     }
//     return $cat_ids;
// }

// Get premium course count
function la_get_premium_course_count( $premium_course_counts ){
    $counts = [];
    $counts_string = explode(',', $premium_course_counts);
    foreach ( $counts_string as $counts_single_item ) {
        $counts[] = trim($counts_single_item);
    }
    return $counts;
}

// Get first variable price by product id
function la_get_first_variable_price_by_product_id( $product_id ) {
	$product = wc_get_product($product_id);
    $variations = $product->get_available_variations();
    $first_variation_id = $variations[0]['variation_id'];
	$child_item 		= wc_get_product($first_variation_id);
	// $variable_price = $variations->get_price();
	return [ $child_item->get_regular_price(), $child_item->get_sale_price() ];
}

// Get course for Shortcode contents
function la_get_courses_for_shortcode_contents( $course_ids = null, $course_cat_ids = null, $course_count = 4, $premium_course_counts = null ) {
    // Course query arguments
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $course_count,
        'post_status'    => 'publish',
    );
    // If course ids passed
    if ( null != $course_ids && is_array( $course_ids ) ) {
        $args['post__in'] = $course_ids;
    }
    // If course category ids passed
    if ( null != $course_cat_ids ) {
        $args['tax_query'] = array(
            array(
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $course_cat_ids,
            )
        );
    }
    // Course query
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {
    $counter = 0;
    while ( $loop->have_posts() ) : $loop->the_post();
        global $product;
        $product_id = $loop->post->ID;
        $course_image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' )[0];
        $product = wc_get_product($product_id);
        if ( $product->get_type() == 'variable' ) {
            $variation_prices = la_get_first_variable_price_by_product_id( $product_id );
            $course_price = ( $variation_prices[1] == '' ) ? '<p>'.get_woocommerce_currency_symbol() . $variation_prices[0].'</p>' : '<del>'.get_woocommerce_currency_symbol() . $variation_prices[0].'</del><p>'.get_woocommerce_currency_symbol() . $variation_prices[1].'</p>';
        } else {
            $regular_price = get_post_meta( $product_id, "_regular_price", true );
            $sale_price = get_post_meta( $product_id, "_sale_price", true );
            $course_price = ( $sale_price == 0 ) ? '<p>'.get_woocommerce_currency_symbol() . $regular_price.'</p>' : '<del>'.get_woocommerce_currency_symbol() . $regular_price.'</del><p>'.get_woocommerce_currency_symbol() . $sale_price.'</p>';
        }
        ?>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
            <div class="course-card-box">
                <div class="course-card">
                    <div class="course-card-img">
                        <img src="<?php echo $course_image?>" alt="<?php echo get_the_title()?>">
                    </div>
                    <div class="course-body">
                        <div class="course-card-title">
                            <a href="<?php echo get_the_permalink()?>" class="course-title">
                                <h2 class="woocommerce-loop-product__title"><?php echo get_the_title()?></h2>
                            </a>                                                    
                        </div>
                        <div class="la-rv-course-ratings">
                            <img src="<?php echo get_site_url()?>/wp-content/uploads/2022/12/Trustpilot.svg" alt="reviews-image">
                        </div>
                        <div>
                            <div class="la-course-price">
                                <?php echo $course_price?>                                                       
                            </div>               
                        </div>
                        <?php
                        if ( is_array($premium_course_counts) ) {
                            ?>
                            <div class="la-premius-course-count">
                                <p><?php echo $premium_course_counts[$counter++]?> Premium CPD Courses</p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="course-d-btn">
                    <a href="<?php echo get_the_permalink()?>" class="course-title">
                        View Course 
                        <img src="<?php echo get_site_url()?>/wp-content/uploads/2022/10/view-course-right-arrow.svg" alt="right arrow icon">
                    </a>                                            
                </div>
            </div>
        </div>
        <?php
    endwhile;
    } else {
        echo '<h3>Sorry, no course found!</h3>';
    }
    // Resetting the query
    wp_reset_query();
}
?>
<style>
        
    @media (min-width: 576px) {
        .rounded-nav {
        border-radius: 50rem !important;
        }
    }
    @media screen and (max-width: 480px) {
        .la-home-page-tab ul#myTab {
        width: 100% !important;
        margin: auto;
    }
    ul#myTab li {
        margin: 25px auto !important;
    }
    }
    
    @media (min-width: 576px) {
        .rounded-nav .nav-link {
        border-radius: 50rem !important;
        }
    }
    
    /* With arrow tabs */
    
    .with-arrow .nav-link.active {
        position: relative;
    }
    
    .with-arrow .nav-link.active::after {
        content: '';
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid #AF1F47;
        position: absolute;
        bottom: -6px;
        left: 50%;
        transform: translateX(-50%);
        display: block;
    }
    
    /* lined tabs */
    
    .lined .nav-link {
        border: none;
        color: #303030;
        border-bottom: 3px solid transparent;
    }
    
    .lined .nav-link:hover {
        border: none;
        border-bottom: 3px solid transparent;
    }
    
    .lined .nav-link.active {
        background: none;
        color: #AF1F47;;
        border-color: #AF1F47;
    }
    .course-card-box {
        width: auto !important;
    }

    .la-home-page-tab ul#myTab {
    background-color: #fff !important;
        display: flex;
        justify-content: center;
    }
    .la-hm-tab {
    border: 1px solid #303030 !important;
    filter: drop-shadow(0px 5px 10px rgba(0, 0, 0, 0.03)) !important;
    border-radius: 10px;
    margin: 0px 20px;
    font-weight: 500;
    font-size: 16px;
    line-height: 22px;
    letter-spacing: 0.01em;
    color: #303030;
    padding: 15px 30px;
    display: inline;
    }
    a.nav-link.la-hm-tab.active {
    background-color: #AF1F47;
    color: #fff;
    border: 1px solid #AF1F47 !important;
    }
    .la-hm-tab:hover {
    color: #fff;
    background-color: #AF1F47;
    border: 1px solid #AF1F47;
    }
    ul#myTab2, ul#myTab3 {
        margin: 0;
        padding: 0;
    }
    .la-rv-course-ratings img {
    width: 75%;
    margin: -25px 0px 0px 0px;
    }
    .la-course-price p {
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 23px;
    color: #303030;
    }
    .la-course-price del {
    font-weight: 500;
    font-size: 12px;
    line-height: 15px;
    text-decoration-line: line-through;
    color: #303030;
    }
    .la-premius-course-count p {
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 22px;
    text-align: left;
    letter-spacing: 0.01em;
    color: #ffffff;
    margin-top: 5px;
    }
    .la-course-price {
    margin-top: -5px;
    }
    .course-card {
    height: 280px;
    }
    .la-premius-course-count {
    position: relative;
    top: -155px;
    left: 0px;
    background-color: #AF1F47;
    margin: 8px;
    padding: 0px 12px;
    border-radius: 4px;
    }
    .slider {
    width: 100%;
    margin: 50px auto;
    }

    .slick-slide {
    margin: 0px 20px;
    }

    .slick-slide img {
    width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
    color: black;
    }


    .slick-slide {
    transition: all ease-in-out .3s;
    opacity: .2;
    }

    .slick-active {
    opacity: .5;
    }

    .slick-current {
    opacity: 1;
    }
    /* @media screen and (min-width: 767px) and (max-width: 1399px) {
    .la-home-page-tab ul#myTab {
        background-color: #fff !important;
        width: 102%;
        margin: auto;
    }
    } */
</style>
<div class="container">
    <div class="row">
        <div class="la-home-page-tab">
            <!-- Rounded tabs -->
            <ul id="myTab" role="tablist" class="nav">
                <?php
                $counter = 0;
                $button_labels = [];
                $course_button_strings = $attributes['top_button_labels'];
                $button_strings = explode(',', $course_button_strings);
                foreach ( $button_strings as $all_buttons ) {
                    $button_labels[] = trim($all_buttons);
                }
                foreach( $button_labels as $button_label ) {
                    $counter++;
                    $dynamic_class = $counter == 1 ? ' active' : '';
                    $dynamic_value = $counter == 1 ? 'true' : 'false';
                    ?>
                    <li class="nav-item">
                        <a id="button-content<?php echo $counter?>" data-toggle="tab" href="#tabcontent<?php echo $counter?>" role="tab" aria-controls="tab<?php echo $counter?>" aria-selected="<?php echo $dynamic_value?>" class="nav-link la-hm-tab<?php echo $dynamic_class?>"><?php echo $button_label?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <div id="myTabContent" class="tab-content">
                <?php
                $counter = 0;
                $cat_ids = [];
                $course_cat_string = $attributes['course_cat_ids'];
                $cat_id_strings = explode(',', $course_cat_string);
                foreach ( $cat_id_strings as $all_cat_ids ) {
                    $cat_ids[] = trim($all_cat_ids);
                }
                foreach( $cat_ids as $current_course_string ) {
                    $dynamic_class = $counter == 0 ? ' show active' : '';
                    ?>
                    <div id="tabcontent<?php echo $counter+1?>" role="tabpanel" aria-labelledby="button-content<?php echo $counter+1?>" class="tab-pane fade py-5<?php echo $dynamic_class?>">
                        <div class="row">
                            
                        </div>
                    </div>
                    <?php
                    $counter++;
                }
                ?>
            </div>  <!-- End tab content -->
        </div>
    </div>
</div>