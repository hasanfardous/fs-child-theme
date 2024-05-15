<?php
// Set currimulum image size
add_image_size('la-course-curriculum-img-80x50', 80, 50, true);

// Get products functions
function la_get_wc_products_with_ids(){
	$all_products = [];
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {
		// Product loop
		while ( $loop->have_posts() ) : $loop->the_post();
			global $product;
			$product_id = $loop->post->ID;
			$all_products[$product_id] = get_the_title();
		endwhile;
	} else {
		$all_products[] = '<h3>Sorry, no course found!</h3>';
	}

    // Resetting the query
    wp_reset_query();

	return $all_products;
}


add_action( 'cmb2_admin_init', 'wc_product_metaboxes' );
function wc_product_metaboxes() {
	// Calendar Timeslot Setting metas
	$cmb = new_cmb2_box( array(
		'id'            => 'fs_timeslot_setting',
		'title'         => 'Calendar Timeslot Setting',
		'object_types'  => array( 'product' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$timeslot_settings = $cmb->add_field( array(
		'id'          => 'fs_timeslot_group',
		'type'        => 'group',
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => 'Item {#}',
			'add_button'    => 'Add Another Item',
			'remove_button' => 'Remove Item',
			'closed'        => true,  // Repeater fields closed by default - neat & compact.
			'sortable'      => true,  // Allow changing the order of repeated groups.
		),
	) );
	$cmb->add_group_field( $timeslot_settings, array(
		'name' => 'Select Calendar Column',
		'desc' => 'Select the Calendar Column',
		'id'   => 'fs_calendar_column',
		'type' => 'multicheck',
		'options' => [
			'one' => 'Column 1',
			'two' => 'Column 2',
			'three' => 'Column 3',
			'four' => 'Column 4',
			'five' => 'Column 5',
			'six' => 'Column 6',
			'seven' => 'Column 7',
		]
	) );
	$cmb->add_group_field( $timeslot_settings, array(
		'name' => 'Price for that Column',
		'desc' => 'Enter the price for that specified column. Ex: £239',
		'id'   => 'fs_col_price',
		'type' => 'text',
	) );
	$cmb->add_group_field( $timeslot_settings, array(
		'name' => 'Timeslot Text',
		'desc' => 'Enter the Timeslot text. Ex: 11:00 PM (£149)',
		'id'   => 'timeslot_text',
		'type' => 'text',
		'repeatable' => true,
	) );

    // Reviews metas
    $course_revs = new_cmb2_box( array(
		'id'            => 'la_course_reviews_el',
		'title'         => 'Course Reviews',
		'object_types'  => array( 'page', 'product', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$course_revs_group_id = $course_revs->add_field( array(
		'id'          => 'la_course_reviews',
		'type'        => 'group',
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => 'Item {#}',
			'add_button'    => 'Add Another Item',
			'remove_button' => 'Remove Item',
			'closed'        => true,  // Repeater fields closed by default - neat & compact.
			'sortable'      => true,  // Allow changing the order of repeated groups.
		),
	) );
	$course_revs->add_group_field( $course_revs_group_id, array(
		'name' => 'Reviewer Name',
		'desc' => 'Enter the Reviewer Name',
		'id'   => 'la_course_reviewer_name',
		'type' => 'text',
	) );
	$course_revs->add_group_field( $course_revs_group_id, array(
		'name' => 'Review Title',
		'desc' => 'Enter the Review title',
		'id'   => 'la_course_review_title',
		'type' => 'text',
	) );
	$course_revs->add_group_field( $course_revs_group_id, array(
		'name' => 'Review Date',
		'desc' => 'Enter the Review date',
		'id'   => 'la_course_review_date',
		'type' => 'text_date',
		'date_format' => 'M d, Y',
	) );
	$course_revs->add_group_field( $course_revs_group_id, array(
		'name' => 'Review',
		'desc' => 'Enter the Review',
		'id'   => 'la_course_review',
		'type' => 'textarea',
	) );

	// GCSE Custom post type metas
	$gcse_meta = new_cmb2_box( array(
		'id'            => 'la_gcse_course_metas',
		'title'         => 'Course Options',
		'object_types'  => array( 'gcse', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );
	$gcse_meta->add_field( array(
		'name' => 'Select GCSE Course',
		'desc' => 'Select the Course',
		'id'   => 'la_gcse_course_id',
		'type' => 'select',
		'options' => la_get_wc_products_with_ids()
	) );

	// Phlebotomy Courses Custom metas
	$phleb_metas = new_cmb2_box( array(
		'id'            => 'la_phleb_course_metas',
		'title'         => 'Phlebotomy Course Options',
		'object_types'  => array( 'product' ), // Post type
		'show_on'  		=> array( 'key' => 'id', 'value' => array(382548, 376417, 376420, 377824, 371100, 380325, 368595) ), // Post IDs
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );
	$phleb_metas->add_field( array(
		'name' => 'Course Regular Price',
		'desc' => 'Write the Course Regular Price',
		'id'   => 'la_phleb_course_regular_price',
		'type' => 'text',
	) );
	$phleb_metas->add_field( array(
		'name' => 'Course Sell Price',
		'desc' => 'Write the Course Sell Price',
		'id'   => 'la_phleb_course_sell_price',
		'type' => 'text',
	) );
	$phleb_metas_group_id = $phleb_metas->add_field( array(
		'id'          => 'la_phleb_course_meta_group',
		'type'        => 'group',
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => 'Phlebotomy Item {#}',
			'add_button'    => 'Add Another Item',
			'remove_button' => 'Remove Item',
			'closed'        => true,  // Repeater fields closed by default - neat & compact.
			'sortable'      => true,  // Allow changing the order of repeated groups.
		),
	) );
	$phleb_metas->add_group_field( $phleb_metas_group_id, array(
		'name' => 'Location',
		'desc' => 'Write the Location. Ex: London',
		'id'   => 'la_phleb_course_location',
		'type' => 'text',
	) );
	$phleb_metas->add_group_field( $phleb_metas_group_id, array(
		'name' => 'Address',
		'desc' => 'Write the Address. Ex: 25A Wincott Street, Kennington, SE11 4NT',
		'id'   => 'la_phleb_course_address',
		'type' => 'text',
	) );
	$phleb_metas->add_group_field( $phleb_metas_group_id, array(
		'name' => 'Course Date',
		'desc' => 'Write the Date. Ex: November 05th, 2023',
		'id'   => 'la_phleb_course_date',
		'type' => 'text',
	) );
	$phleb_metas->add_group_field( $phleb_metas_group_id, array(
		'name' => 'Course Time',
		'desc' => 'Write the Time. Ex: 10:00 AM - 05:30 PM',
		'id'   => 'la_phleb_course_time',
		'type' => 'text',
	) );
	$phleb_metas->add_group_field( $phleb_metas_group_id, array(
		'name' => 'Course Seats Left',
		'desc' => 'Write how many seats left. Ex: Hurry ! Only 05 seats left',
		'id'   => 'la_phleb_course_seats_left',
		'type' => 'text',
	) );
	$phleb_metas->add_group_field( $phleb_metas_group_id, array(
		'name' => 'Course ID',
		'desc' => 'Write the Exact Course ID Carefully. Ex: 376420',
		'id'   => 'la_phleb_course_var_id',
		'type' => 'text',
	) );
	$phleb_metas->add_group_field( $phleb_metas_group_id, array(
		'name' => 'Batch Full?',
		'desc' => 'Check the box if this Batch full.',
		'id'   => 'la_phleb_course_quota_full',
		'type' => 'checkbox',
	) );
}