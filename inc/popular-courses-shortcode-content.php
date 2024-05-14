<?php
// Initializing shortcode
add_action( 'init', 'la_popular_courses_shortcode_callback' );
function la_popular_courses_shortcode_callback() {
    add_shortcode( 'la-popular-courses', 'la_popular_courses_shortcode_func' );
}
function la_popular_courses_shortcode_func( $atts ) {
    ob_start();
    // Attributes
    $attributes = shortcode_atts(array(
        'top_button_labels'     => 'Bundle Offer, Accredited Courses, Trending Courses', // Ex. Bundle Offer, Accredited Courses, Trending Courses
        'course_cat_ids'        => '0:364491|364465|364462|364290, 250|252|337, 333|297|319', // Ex. 0:364491|364465|364462|364290, 250, 252
        'show_course_items'     => 4,               // Ex. 4
        'premium_course_count'  => '5, 7, 4, 8',    // Ex. '5, 7, 4, 8'
        'button_label'          => 'View More',     // Ex. View More
    ), $atts);
    // [la-popular-courses premium_course_count="5, 7, 4, 8" top_button_labels="Bundle Offer, Accredited Courses, Trending Courses" course_cat_ids="0:364491|364465|364462|364290, 250|252|337, 333|297|319"]
    // Get member contents
    // require ASTRA_CHILD_THEME_DIR . '/inc/get-popular-courses.php';
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