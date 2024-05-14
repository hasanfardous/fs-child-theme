<?php
// Ajax handler function
add_action('wp_ajax_ajaxify_courses_ot', 'ajaxify_courses_ot_callabck');
add_action('wp_ajax_nopriv_ajaxify_courses_ot', 'ajaxify_courses_ot_callabck');

// Ajaxify courses data process
if ( ! function_exists( 'ajaxify_courses_ot_callabck' ) ) {
	function ajaxify_courses_ot_callabck() {
		$response = [];
		$course_id = isset($_POST['course_id']) ? sanitize_text_field($_POST['course_id']) : '';
		$course_order = isset($_POST['course_order']) ? sanitize_text_field($_POST['course_order']) : '';
		$cart_course_id = isset($_POST['cart_course_id']) ? $_POST['cart_course_id'] : '';
		$variation_ids = isset($_POST['variation_ids']) ? $_POST['variation_ids'] : '';
		$first_name	= isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : '';
		$last_name	= isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']) : '';
		$user_email	= isset($_POST['user_email']) ? sanitize_email($_POST['user_email']) : '';
		$user_name	= isset($_POST['user_name']) ? sanitize_text_field($_POST['user_name']) : '';
		$password	= isset($_POST['password']) ? sanitize_text_field($_POST['password']) : '';
		$request_for= isset($_POST['request_for']) ? sanitize_text_field($_POST['request_for']) : '';
		
        if ( $course_id != '' ) {
			include( ASTRA_CHILD_THEME_DIR . '/inc/ajaxify-single-course.php' );
        } elseif ( $cart_course_id != '' && $variation_ids != '' ) {
			include( ASTRA_CHILD_THEME_DIR . '/inc/enroll-course.php' );
        } else {
			$cur_page = isset($_POST['cur_page']) ? sanitize_text_field($_POST['cur_page']) : 1;
            include( ASTRA_CHILD_THEME_DIR . '/inc/ajaxify-orderby-course.php' );
            // $args     = array(); // Optional arguments
            // $products = wc_get_products( $args );
            // $all_products  = wc_products_array_orderby( $products, 'price', 'ASC' );
        }

        $response['status'] = 'success';
        $response['course_id'] = $course_id;
        $response['course_order'] = $course_order;
        $response['courses'] = $all_products;
        $response['products_pagination'] = $products_pagination;
        // $response['message'] = $message;

		// Saving the settings
		// if ( $course_id ) {
			// $response['status'] = 'success';
			// $response['message'] = __('Got the id', 'wc-product-table' );
			// $response['course_id'] = $course_id;
			// $response['courses'] = $all_products;
			// $response['products_ordered'] = $course_order;
		// } else {
		// 	$response['status'] = 'warning';
		// 	$response['message'] = __('Nothing got', 'wc-product-table');
		// }
		echo wp_send_json( $response );
		wp_die();
	}
}
