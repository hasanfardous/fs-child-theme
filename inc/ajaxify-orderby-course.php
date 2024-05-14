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
    $products_pagination = [];
    $per_page = 21;
    $cur_page = isset($cur_page) ? $cur_page : 1;
    $args     = array(
        'limit' => $per_page,
        // 'paginate' => true,
        // 'offset' => $offset,
        'page' => $cur_page
    );
    $products = wc_get_products( $args );
    $all_products  = wc_products_array_orderby( $products, 'rating', 'ASC' );
    if ( count( $all_products ) > 0 ) {
        foreach ( $all_products as $product ) {
            $product_id = $product->get_id();
            $course_image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' )[0];
            $product_cat_id = get_the_terms( $product_id, 'product_cat' )[0];
            if ( $product->get_type() == 'variable' ) {
                $variation_prices = la_get_first_variable_price_by_product_id( $product_id );
                $course_price = ( $variation_prices[1] == '' ) ? '<p>'.get_woocommerce_currency_symbol() .$variation_prices[0].'</p>' : '<del>'.get_woocommerce_currency_symbol() .$variation_prices[0].'</del><p>'.get_woocommerce_currency_symbol() .$variation_prices[1].'</p>';
            } else {
                $regular_price = get_post_meta( $product_id, "_regular_price", true );
                $sale_price = get_post_meta( $product_id, "_sale_price", true );
                $course_price = ( $sale_price == 0 ) ? '<p>'.get_woocommerce_currency_symbol() .$regular_price.'</p>' : '<del>'.get_woocommerce_currency_symbol() .$regular_price.'</del><p>'.get_woocommerce_currency_symbol() .$sale_price.'</p>';
            }
            $hide_the_product = $product_cat_id->term_id == 17 ? 'display: none' : '';
            $all_products[] = 
                '<div class="course-card-box course-'.$product_id.' current-'.$cur_page.' course-cat-'.$product_cat_id->term_id.'" style="'.$hide_the_product.'">
                    <div class="course-card">
                        <div class="course-card-img">
                            <img src="'.esc_url( $course_image ).'" alt="'.esc_attr(get_the_title($product_id)).'"/>
                        </div>
                        <div class="course-body">
                            <div class="course-card-title">
                                <a href="'.esc_url(get_the_permalink($product_id)).'" class="course-title"><h2 class="woocommerce-loop-product__title">'.esc_html(get_the_title($product_id)).'</h2></a>
                            </div>
                            <div class="la-rv-course-ratings">
                                <img src="'.get_site_url().'/wp-content/uploads/2022/08/Group-15155.png" alt="tp-logo">
                            </div>
                            <div>
                                <div class="la-course-price">
                                    '.$course_price.'
                                </div>               
                            </div>
                        </div>
                    </div>
                    <div class="course-d-btn">
                        <a href="'.esc_url(get_the_permalink($product_id)).'" class="course-title">View Course <img src="'.get_site_url().'/wp-content/uploads/2022/10/view-course-right-arrow.svg" alt=""></a>
                    </div>
                </div>
                ';
        }
    } else {
        $all_products[] = '<h3>Sorry, no course found!</h3>';
    }
    // Resetting the query
    wp_reset_query();

    // Pagination markup
    $products_count = count( wc_get_products( ['limit' => -1] ) );
    $no_of_paginations = ceil($products_count / $per_page);

    if ($cur_page >= 7) {
        $start_loop = $cur_page - 3;
        if ($no_of_paginations > $cur_page + 3)
            $end_loop = $cur_page + 3;
        else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
            $start_loop = $no_of_paginations - 6;
            $end_loop = $no_of_paginations;
        } else {
            $end_loop = $no_of_paginations;
        }
    } else {
        $start_loop = 1;
        if ($no_of_paginations > 7)
            $end_loop = 7;
        else
            $end_loop = $no_of_paginations;
    }

    $list_item = '';
    for ($i = $start_loop; $i <= $end_loop; $i++) {
        // $list_item = 'firstloop';
        if ($cur_page == $i) {
            $list_item .= '<li><span aria-current="page" class="page-numbers current">'.$cur_page.'</span></li>';
            // $list_item = 'fistloop';
        } else {
            $list_item .= '<li><a class="page-numbers" href="'.get_site_url().'/all-courses/page/'.$i.'/">'.$i.'</a></li>';
            // $list_item = 'elseloop';
        }
        // $list_item = 'endloop';
    }

    $products_pagination[] = 
    '<nav class="woocommerce-pagination current-'.$cur_page.'">
        <ul class="page-numbers">'.$list_item.'</ul>
    </nav>';

    // if ($first_btn && $cur_page > 1) {
    //     $pag_container .= "<li p='1' class='active'>First</li>";
    // } else if ($first_btn) {
    //     $pag_container .= "<li p='1' class='inactive'>First</li>";
    // }

    // if ($previous_btn && $cur_page > 1) {
    //     $pre = $cur_page - 1;
    //     $pag_container .= "<li p='$pre' class='active'>Previous</li>";
    // } else if ($previous_btn) {
    //     $pag_container .= "<li class='inactive'>Previous</li>";
    // }
    // for ($i = $start_loop; $i <= $end_loop; $i++) {

    //     if ($cur_page == $i)
    //         $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
    //     else
    //         $pag_container .= "<li p='$i' class='active'>{$i}</li>";
    // }

    // if ($next_btn && $cur_page < $no_of_paginations) {
    //     $nex = $cur_page + 1;
    //     $pag_container .= "<li p='$nex' class='active'>Next</li>";
    // } else if ($next_btn) {
    //     $pag_container .= "<li class='inactive'>Next</li>";
    // }

    // if ($last_btn && $cur_page < $no_of_paginations) {
    //     $pag_container .= "<li p='$no_of_paginations' class='active'>Last</li>";
    // } else if ($last_btn) {
    //     $pag_container .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
    // }
        