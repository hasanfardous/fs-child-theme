<?php
// Get first variable price by product id
function la_get_first_variable_price_by_product_id( $product_id ) {
	$product = wc_get_product($product_id);
    $variations = $product->get_available_variations();
    $first_variation_id = $variations[0]['variation_id'];
	$child_item 		= wc_get_product($first_variation_id);
	// $variable_price = $variations->get_price();
	return [ $child_item->regular_price ? $child_item->regular_price : '0.00', $child_item->sale_price ? $child_item->sale_price : '0.00' ];
}


    // Products array
    $all_products = [];
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'tax_query' => array(
            array(
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'     =>  array( $course_id ),
            ),
        )
    );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {
    // Product loop
    while ( $loop->have_posts() ) : $loop->the_post();
        global $product;
        $product_id = $loop->post->ID;
        $post_thumbnail_id = get_post_thumbnail_id( $product_id );
        $course_image = wp_get_attachment_image_src( $post_thumbnail_id, "single-post-thumbnail" )[0];
        $product_image_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
        $product_image_title = get_the_title($post_thumbnail_id);

        $product = get_product($product_id);
        if ( $product->get_type() == 'variable' ) {
            $variation_prices = la_get_first_variable_price_by_product_id( $product_id );
            $course_price = ( $variation_prices[1] == '' ) ? '<p>'.get_woocommerce_currency_symbol() . $variation_prices[0].'</p>' : '<del>'.get_woocommerce_currency_symbol() . $variation_prices[0].'</del><p>'.get_woocommerce_currency_symbol() . $variation_prices[1].'</p>';
        } else {
            $regular_price = get_post_meta( $product_id, "_regular_price", true );
            $sale_price = get_post_meta( $product_id, "_sale_price", true );
            $course_price = ( $sale_price == 0 ) ? '<p>'.get_woocommerce_currency_symbol() . $regular_price.'</p>' : '<del>'.get_woocommerce_currency_symbol() . $regular_price.'</del><p>'.get_woocommerce_currency_symbol() . $sale_price.'</p>';
        }
        $all_products[] = 
            '<div class="course-card-box">
                <div class="course-card">
                    <div class="course-card-img">
                        <img src="'.$course_image.'" alt="'.$product_image_alt.'"/>
                    </div>
                    <div class="course-body">
                        <div class="course-card-title">
                            <a href="'.esc_url(get_the_permalink()).'" class="course-title"><h2 class="woocommerce-loop-product__title">'.esc_html(get_the_title()).'</h2></a>
                        </div>
                        <div class="la-rv-course-ratings">
                            <img src="'.get_site_url().'/wp-content/uploads/2022/10/reviews-io-195x19-1.png" alt="tp-logo">
                        </div>
                        <div>
                            <div class="la-course-price">
                                '.$course_price.'
                            </div>               
                        </div>
                    </div>
                </div>
                <div class="course-d-btn">
                    <a href="'.esc_url(get_the_permalink()).'" class="course-title">View Course <img src="'.get_site_url().'/wp-content/uploads/2022/10/view-course-right-arrow.svg" alt="right arrow"></a>
                </div>
            </div>
            ';
    endwhile;
    } else {
        $all_products[] = '<h3>Sorry, no course found!</h3>';
    }
    // Resetting the query
    wp_reset_query();