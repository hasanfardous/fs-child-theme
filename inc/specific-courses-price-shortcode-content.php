<?php
// Initializing shortcode
add_action( 'init', 'la_specific_courses_shortcode_callback' );
function la_specific_courses_shortcode_callback() {
    add_shortcode( 'la-specific-course-price', 'la_specific_courses_shortcode_func' );
}
function la_specific_courses_shortcode_func( $atts ) {
    ob_start();
    // Attributes
    $attributes = shortcode_atts(array(
        'product_id'     => '364491'
    ), $atts);
    // [la-specific-course-price product_id="364491"]
    // Get prices contents
    require ASTRA_CHILD_THEME_DIR . '/inc/get-specific-course-prices.php';
    // if ( current_user_can('manage_options') ) {
    //     echo '<pre>';
    //     print_r($attributes);
    //     echo '</pre>';
    // }
    ?>
	<?php
	$html = ob_get_clean();
	return $html;
}