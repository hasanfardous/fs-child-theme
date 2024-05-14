<?php
// Add custom taxonomy field for banner on add taxonomy page
add_action( 'product_cat_add_form_fields', 'la_add_term_fields' );

function la_add_term_fields( $taxonomy ) {
	?>
	<div class="form-field">
		<label>Upload Banner Image</label>
		<a href="#" class="button la-upload-cat-banner">Upload image</a>
		<a href="#" class="la-remove-cat-banner" style="display:none">Remove image</a>
		<input type="hidden" name="la_cat_banner_img" value="">
	</div>
	<?php
}

// Add custom taxonomy field for banner on edit taxonomy
add_action( 'product_cat_edit_form_fields', 'la_edit_term_fields', 10, 2 );
function la_edit_term_fields( $term, $taxonomy ) {

	// get meta data value
	$image_id = get_term_meta( $term->term_id, 'la_cat_banner_img', true );

	?>
	<tr class="form-field">
		<th>
			<label for="la_cat_banner_img">Banner Image Field</label>
		</th>
		<td>
			<?php if( $image = wp_get_attachment_image_url( $image_id, 'medium' ) ) : ?>
				<a href="#" class="la-upload-cat-banner">
					<img src="<?php echo esc_url( $image ) ?>" />
				</a>
				<a href="#" class="la-remove-cat-banner">Remove image</a>
				<input type="hidden" name="la_cat_banner_img" value="<?php echo absint( $image_id ) ?>">
			<?php else : ?>
				<a href="#" class="button la-upload-cat-banner">Upload image</a>
				<a href="#" class="la-remove-cat-banner" style="display:none">Remove image</a>
				<input type="hidden" name="la_cat_banner_img" value="">
			<?php endif; ?>
		</td>
	</tr><?php
}

// Saving custom taxonomy data
add_action( 'created_product_cat', 'la_save_term_fields' );
add_action( 'edited_product_cat', 'la_save_term_fields' );
function la_save_term_fields( $term_id ) {
	update_term_meta(
		$term_id,
		'la_cat_banner_img',
		absint( $_POST[ 'la_cat_banner_img' ] )
	);
	
}

// Setting the custom email header on WC new order
// . $email->get_recipient()
// add_filter( 'woocommerce_email_headers', 'new_order_reply_to_admin_header', 20, 3 );
// function new_order_reply_to_admin_header( $header, $email_id, $order ) {

//     if ( $email_id === 'new_order' ){
//         $email = new WC_Email($email_id);

//         $header = "Content-Type: " . $email->get_content_type() . "\r\n";
// 		$header .= 'Reply-to: <' . get_option( 'admin_email' ) . ">\r\n";
//         // $header .= 'Reply-to: <info@lead-academy.org>' . "\r\n";
//     }
//     return $header;
// }

function wp_mail_smtp_dev_reply_to( $args ) {
 
	$reply_to = 'Reply-To: Lead Academy <info@lead-academy.org>';
	
	if ( ! empty( $args['headers'] ) ) {
	 if ( ! is_array( $args['headers'] ) ) {
	  $args['headers'] = array_filter( explode( "\n", str_replace( "\r\n", "\n", $args['headers'] ) ) );
	 }
	
	 // Filter out all other Reply-To headers.
	 $args['headers'] = array_filter( $args['headers'], function ( $header ) {
	  return strpos( strtolower( $header ), 'reply-to' ) !== 0;
	 } );
	} else {
	 $args['headers'] = [];
	}
	
	$args['headers'][] = $reply_to;
	
	return $args;
}
	
add_filter( 'wp_mail', 'wp_mail_smtp_dev_reply_to', PHP_INT_MAX );

// Change the schema type from product to course
add_filter( 'woocommerce_structured_data_type_for_page', 'add_course_type', 10, 1);

function add_course_type(){
	$types[] = is_shop() || is_product_category() || is_product() ? 'courses' : '';
}
										   
add_filter( 'woocommerce_structured_data_product', 'filter_woocommerce_structured_data', 10, 2 );

function filter_woocommerce_structured_data( $markup, $product ) {
	$markup['name'] = 'Courses';
	return '';
}

// Add custom thank you message on order completion page
add_action( 'woocommerce_thankyou_order_received_text', 'la_coupon_thankyou', 10, 2 ); 

function la_coupon_thankyou( $order_id ) {
	echo 'Thank you. Your order has been received. You will get your course login details from our learning portal within 24 hours. For any Query email us to: <a href="mailto:info@lead-academy.org">info@lead-academy.org</a> <br/>
	If you only want to book your remote exam then please provide your preferred exam date and time 2 days prior for NCFE or 9 days prior for Edexcel to the exam date with a copy of your passport or driving license and send in info@lead-academy.org, then our relevant team will book the exam accordingly.';
}