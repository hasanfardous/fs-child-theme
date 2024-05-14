<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

$default_cat_thumb_url = 'https://lead-academy.org/wp-content/uploads/2022/10/6158252-2-min-scaled.webp';
if ( is_shop() ) {
    $cat_thumb_url = $default_cat_thumb_url;
    $cat_name = 'COURSES';
} else {
    $cat_thumb_id = get_term_meta( get_queried_object()->term_id, 'la_cat_banner_img', true );
    $cat_thumb_url = wp_get_attachment_image_url( $cat_thumb_id, 'full' ) ? wp_get_attachment_image_url( $cat_thumb_id, 'full' ) : $default_cat_thumb_url;
    $cat_name = get_queried_object()->name;
}
?>

<div id="all-courses-page">
    <!-- 1st Section -->
    <section class="all-courses-1s">
        <div class="bg-overlay">
            <img src="<?php echo esc_url( $cat_thumb_url )?>" alt="<?php echo esc_attr( $cat_name )?>" width="708" height="270">
	    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12" id="all-courses-banner">
                    <div id="all-courses-banner-content">
                        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                            <h1 class="all-course-heading"><?php woocommerce_page_title(); ?></h1>
                            <hr style="margin-top: 0px; opacity: 1; color: #b9b9b9; width: 150px;">
                        <?php endif; ?>

                        <?php 
                            if ( is_shop() ) {
                                echo '<h1 class="all-course-heading">COURSES</h1>
                                <p class="all-course-heading">All of our courses are accredited by CPD UK and IPHM. CPD is
                                globally recognised by employers, professional organisations and academic intuitions, thus a
                                certificate from CPD Certification Service creates value towards your professional goal and
                                achievement.</p>';    
                            } else {
                                do_action( 'woocommerce_archive_description' );
                            }
                        ?>
                    </div>
                </div>
            </div>
    </section>
    <!-- 2nd Section -->
    <section class="all-cs-2s">
        <div class="container">
            <div class="row">
                <!-- Courses Categories -->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                    <div class="ast-filter-wrap">
                        <div id="woocommerce_product_categories-2" class="ast-woo-sidebar-widget widget woocommerce widget_product_categories">
                            <ul class="product-categories">
                            <li class="cat-item all-course-cat"><a href="https://lead-academy.org/all-courses">All Courses</a></li>
                                <?php
                                    $prod_categories = get_terms( 'product_cat', array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'hide_empty' => 1, // 1 for yes, 0 for no
                                    'parent' => 0
                                    ));

                                    foreach( $prod_categories as $prod_cat ) :
                                        $cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
                                        $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
                                        $term_link = get_term_link( $prod_cat, 'product_cat' );
                                        ?>
                                        <li class="cat-item cat-item-<?php echo $prod_cat->term_id?> cat-parent">
                                            <div class="cat-img-title">
                                                <img class="cat-thm-img" src="<?php echo $cat_thumb_url; ?>" alt="<?php //echo $prod_cat->name; ?>"></img>
                                                <a href="<?php echo $term_link; ?>" title="<?php echo $prod_cat->name; ?>" class="courses_cat_name"><?php echo $prod_cat->name; ?></a>
                                            </div>

                                            <?php
                                            $sub_categories = get_term_children( $prod_cat->term_id, 'product_cat' ); 
                                            if ( $sub_categories && ! is_wp_error( $sub_categories ) ) : 
                                                ?>
                                                <ul class="children">
                                                    <?php
                                                        foreach( $sub_categories as $sub_category ) :
                                                            $term = get_term_by( 'id', $sub_category, $prod_cat->taxonomy );
                                                            $cat_thumb_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                                                            $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
                                                            $term_link = get_term_link( $sub_category, $prod_cat->taxonomy );
                                                            ?>
                                                            <li class="cat-item cat-item-<?php echo $sub_category?>">
                                                                <div class="cat-img-title">
                                                                    <img class="cat-thm-img" src="<?php echo $cat_thumb_url; ?>" alt="<?php echo $term->name; ?>">
                                                                    <a href="<?php echo $term_link; ?>" title="<?php echo $term->name; ?>" class="courses_cat_name"><?php echo $term->name; ?></a>
                                                                </div>
                                                            </li>
                                                            <?php
                                                        endforeach;
                                                    ?>
                                                </ul>
                                                <?php
                                            endif;
                                            ?>
                                        </li>
                                        <?php 
                                    endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Courses Categories -->


                    <div style="display: none;" class="mobile-cat">
                    <div class="col-9">
                        <?php echo do_shortcode( '[courses_menu]' ); ?>
                    </div>
                    <div class="col-3">
                        <?php 
                            /**
                            * Hook: woocommerce_before_shop_loop.
                            *
                            * @hooked woocommerce_output_all_notices - 10
                            * @hooked woocommerce_result_count - 20
                            * @hooked woocommerce_catalog_ordering - 30
                            */
                        do_action( 'woocommerce_before_shop_loop' );
                        ?> 
                    </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">         
                    <!-- Search / Order By -->
                    <div class="container all-courses-sc1">
                        <div class="row">
                            <div class="col-md-9">
                                <?php echo do_shortcode("[wpdreams_ajaxsearchlite]"); ?>
                            </div>
                            <div class="col-md-3">
                                <?php 
                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action( 'woocommerce_before_shop_loop' );
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- All Courses -->
                    <div class="container all-courses-sc2">
                    <div class="col-md-6">
                                <?php 
                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action( 'woocommerce_before_shop_loop' );
                                ?>
                            </div>                        
                        <?php
                        // Get first variable price by product id
                        // function la_get_first_variable_price_by_product_id( $product_id ) {
                        //     $product = wc_get_product($product_id);
                        //     $variations = $product->get_available_variations();
                        //     $first_variation_id = $variations[0]['variation_id'];
                        //     $child_item 		= wc_get_product($first_variation_id);
                        //     // $variable_price = $variations->get_price();
                        //     return [ $child_item->get_regular_price(), $child_item->get_sale_price() ];
                        // }
                        function la_get_first_variable_price_by_product_id( $product_id ) {
                            $product = wc_get_product($product_id);
                            $variations = $product->get_available_variations();
                            $first_variation_id = $variations[0]['variation_id'];
                            $child_item 		= wc_get_product($first_variation_id);
                            return [ $child_item->regular_price ? $child_item->regular_price : '', $child_item->sale_price ? $child_item->sale_price : '' ];
                        }

                        if ( woocommerce_product_loop() ) {
                            woocommerce_product_loop_start();

                            if ( wc_get_loop_prop( 'total' ) ) {
                                while ( have_posts() ) {
                                    the_post();

                                    $current_product_id = get_the_ID();
                                    $product = wc_get_product($current_product_id);
                                    $post_thumbnail_id = get_post_thumbnail_id( $current_product_id );
                                    // $product_image = wp_get_attachment_image_src( $post_thumbnail_id, "single-post-thumbnail" );
                                    $product_image = wp_get_attachment_image_src( $post_thumbnail_id, "la_course_archive_thumb_245x150" );
                                    $product_image_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
                                    $product_image_title = get_the_title($post_thumbnail_id);
                                    // $regular_price = get_post_meta( $current_product_id, "_regular_price", true );
                                    // $sale_price = get_post_meta( $current_product_id, "_sale_price", true );

                                    if ( $product->get_type() == 'variable' ) {
                                        $variation_prices = la_get_first_variable_price_by_product_id( $current_product_id );

                                        // if ( current_user_can('manage_options') ) {
                                        //     $variation_prices = la_get_first_variable_price_by_product_id( $current_product_id );
                                        //     print_r($variation_prices);
                                        // }
                                        // $variation_prices = ['00', '00'];
                                        $course_price = ( $variation_prices[1] == '' ) ? '<p>'.get_woocommerce_currency_symbol().$variation_prices[0].'</p>' : '<del>'.get_woocommerce_currency_symbol().$variation_prices[0].'</del><p>'.get_woocommerce_currency_symbol().$variation_prices[1].'</p>';
                                    } else {
                                        $regular_price = get_post_meta( $current_product_id, "_regular_price", true );
                                        $sale_price = get_post_meta( $current_product_id, "_sale_price", true );
                                        $course_price = ( $sale_price == 0 ) ? '<p>'.get_woocommerce_currency_symbol().$regular_price.'</p>' : '<del>'.get_woocommerce_currency_symbol().$regular_price.'</del><p>'.get_woocommerce_currency_symbol().$sale_price.'</p>';
                                    }

                                    $product_permalink = get_the_permalink();
                        
                                    /**
                                     * Hook: woocommerce_shop_loop.
                                     */
                                    do_action( 'woocommerce_shop_loop' );
                        
                                    // wc_get_template_part( 'content', 'product' );
                                    ?>
                                    <!-- <div class="col-md-4"> -->
                                        <div class="course-card-box course-<?php echo $current_product_id?>">
                                            <div class="course-card">
                                                <div class="course-card-img">
                                                    <?php echo get_the_post_thumbnail($current_product_id, 'la_course_archive_thumb_245x150');?>
                                                </div>
                                                <div class="course-body">
                                                    <div class="course-card-title">
                                                        <?php
                                                        echo '<a href="' . esc_url($product_permalink) . '" class="course-title">';
                                                        woocommerce_template_loop_product_title();
                                                        echo "</a>";
                                                        ?>
                                                    </div>
                                                    <div class="la-rv-course-ratings">
                                                        <img src="<?php echo get_site_url()?>/wp-content/uploads/2022/08/Group-15155.png" loading="lazy" width="209" height="20" alt="tp-logo">
                                                    </div>
                                                    <div>
                                                        <div class="la-course-price">
                                                            <?php echo $course_price?>
                                                        </div>               
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course-d-btn">
                                                <?php
                                                    echo '<a href="' . esc_url($product_permalink) . '" class="course-title">';
                                                    echo 'View Course <img src="'.get_site_url().'/wp-content/uploads/2022/10/view-course-right-arrow.svg" alt="right arrow image">';
                                                    echo "</a>";
                                                ?>
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                    <?php
                                }
                            }
                        
                            woocommerce_product_loop_end(); 	
                            
                            /**
                            * Hook: woocommerce_after_shop_loop.
                            *
                            * @hooked woocommerce_pagination - 10
                            */
                        do_action( 'woocommerce_after_shop_loop' );
                        } 
                        else {
                            /**
                             * Hook: woocommerce_no_products_found.
                             *
                             * @hooked wc_no_products_found - 10
                             */
                            do_action( 'woocommerce_no_products_found' );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
get_footer( 'shop' );