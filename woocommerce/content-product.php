<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$current_product_id = get_the_ID();
$product_image = wp_get_attachment_image_src( get_post_thumbnail_id( $current_product_id ), "single-post-thumbnail" );

if ( $product->get_type() == 'variable' ) {
    $variations = $product->get_available_variations();
	// echo '<pre>';
	// print_r($variations);
	// echo '</pre>';
	$first_variation_id = $variations[0]['variation_id'];
	$child_item 		= wc_get_product($first_variation_id);
    // $regular_price = $child_item->get_regular_price();
    // $sale_price = $child_item->get_sale_price();

	$regular_price = $child_item->regular_price ? $child_item->regular_price : '0.00';
	$sale_price = $child_item->sale_price ? $child_item->sale_price : '0.00';

	$course_price = ( $sale_price == '' ) ? '<p>'.get_woocommerce_currency_symbol().$regular_price.'</p>' : '<del>'.get_woocommerce_currency_symbol().$regular_price.'</del><p>'.get_woocommerce_currency_symbol().$sale_price.'</p>';
} else {
	$regular_price = get_post_meta( $current_product_id, "_regular_price", true );
	$sale_price = get_post_meta( $current_product_id, "_sale_price", true );
	$course_price = ( $sale_price == 0 ) ? '<p>'.get_woocommerce_currency_symbol().$regular_price.'</p>' : '<del>'.get_woocommerce_currency_symbol().$regular_price.'</del><p>'.get_woocommerce_currency_symbol().$sale_price.'</p>';
}
?>

<li <?php wc_product_class( '', $product ); ?>>

	<div class="col-md-4">
		<div class="course-card-box">
			<div class="course-card">
				<div class="course-card-img">
					<img src="<?php echo $product_image[0]; ?>" alt="<?php echo get_the_title()?>"/>
				</div>
				<div class="course-body">
					<div class="course-card-title">
						<?php
						echo '<a href="' . esc_url(get_the_permalink()) . '" class="course-title">';
						woocommerce_template_loop_product_title();
						echo "</a>";
						?>
					</div>
					<div class="la-rv-course-ratings">
						<img src="<?php echo get_site_url()?>/wp-content/uploads/2022/08/Group-15155.png" alt="tp-logo">
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
					echo '<a href="' . esc_url(get_the_permalink()) . '" class="course-title">';
					echo 'View Course <img src="'.get_site_url().'/wp-content/uploads/2022/10/view-course-right-arrow.svg" alt="right arrow image">';
					echo "</a>";
				?>
			</div>
		</div>
	</div>

	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
