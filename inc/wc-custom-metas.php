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
	// LMS Courses metas
	$lmsc_metas = new_cmb2_box( array(
		'id'            => 'lms_courses_options',
		'title'         => 'LMS Courses Options',
		// 'desc'         	=> 'Please don\'t add more than 2 boards, extra boards will be ignored.',
		'object_types'  => array( 'product', ), // Post type
		'context'       => 'normal',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
	) );
	$lmsc_metas->add_field( array(
		'name' => 'LMS Course ID',
		'desc' => 'Enter the course ID',
		// 'default' => 'Choose Your Booking Option',
		'id'   => 'lms_course_id',
		'type' => 'text',
	) );
	
	// Video URL metas
	$video_opt_cmb = new_cmb2_box( array(
		'id'            => 'wc_product_video_url',
		'title'         => 'Video Option',
		// 'desc'         	=> 'Please don\'t add more than 2 boards, extra boards will be ignored.',
		'object_types'  => array( 'product', ), // Post type
		'context'       => 'normal',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
	) );
	$video_opt_cmb->add_field( array(
		'name' => 'Button Title',
		'desc' => 'Enter the Button title',
		'default' => 'Watch Now',
		'id'   => 'watch_video_btn',
		'type' => 'text',
	) );
	$video_opt_cmb->add_field( array(
		'name' => 'Video URL',
		'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
		'id'   => 'watch_video_url',
		'type' => 'oembed',
	) );

	// Success Story Video metas
	$success_video_opt_cmb = new_cmb2_box( array(
		'id'            => 'wc_product_success_video_url',
		'title'         => 'Success Story Video Option',
		// 'desc'         	=> 'Please don\'t add more than 2 boards, extra boards will be ignored.',
		'object_types'  => array( 'product', ), // Post type
		'context'       => 'normal',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
	) );
	$success_video_opt_cmb->add_field( array(
		'name' => 'Success Story Video URL',
		'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
		'id'   => 'watch_success_video_url',
		'type' => 'oembed',
	) );
	
	$cmb = new_cmb2_box( array(
		'id'            => 'wc_product_faqs',
		'title'         => 'Product FAQ',
		'object_types'  => array( 'page', 'product', 'gcse' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$faq_group_id = $cmb->add_field( array(
		'id'          => 'product_faqs',
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
	$cmb->add_group_field( $faq_group_id, array(
		'name' => 'FAQ Title',
		'desc' => 'Enter the FAQ title',
		'id'   => 'faq_title',
		'type' => 'text',
	) );
	$cmb->add_group_field( $faq_group_id, array(
		'name' => 'FAQ Text',
		'desc' => 'Enter the FAQ text',
		'id'   => 'faq_text',
		'type' => 'textarea',
	) );

    // Curriculums metas
    $curr_cmb = new_cmb2_box( array(
		'id'            => 'wc_product_curr',
		'title'         => 'Course Curriculums',
		'object_types'  => array( 'product', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$curr_group_id = $curr_cmb->add_field( array(
		'id'          => 'product_curriculums',
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
	$curr_cmb->add_group_field( $curr_group_id, array(
		'name' => 'Curriculum Title',
		'desc' => 'Enter the curriculum title',
		'id'   => 'curr_title',
		'type' => 'text',
	) );
	// $curr_cmb->add_group_field( $curr_group_id, array(
	// 	'name'    => 'Curriculum Image',
	// 	'desc'    => 'Upload the image',
	// 	'id'      => 'curr_image',
	// 	'type'    => 'file_list',
	// 	'query_args' => array( 'type' => 'image' ), // Only images attachment
	// 	// Optional, override default text strings
	// 	'text' => array(
	// 		'add_upload_files_text' => 'Add Images', // default: "Add or Upload Files"
	// 		// 'remove_image_text' => 'Replacement', // default: "Remove Image"
	// 		'file_text' => 'Image', // default: "File:"
	// 		// 'file_download_text' => 'Replacement', // default: "Download"
	// 		// 'remove_text' => 'Replacement', // default: "Remove"
	// 	),
	// ) );
	$curr_cmb->add_group_field( $curr_group_id, array(
		'name' => 'Curriculum Text',
		'desc' => 'Enter the Curriculum text',
		'id'   => 'curr_text',
		'type' => 'text',
		'repeatable' => true,
	) );
	$curr_cmb->add_group_field( $curr_group_id, array(
		'name' => 'Curriculum Duration',
		'desc' => 'Enter the Curriculum Duration',
		'id'   => 'curr_dur',
		'type' => 'text',
		'repeatable' => true,
	) );


    // Accreditation metas
    $acc_cmb = new_cmb2_box( array(
		'id'            => 'wc_product_acc',
		'title'         => 'Course Accreditation',
		'object_types'  => array( 'product', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$acc_cmb->add_field( array(
		'name'    => 'Accreditation',
		'desc'    => 'Accreditation goes here',
		'id'      => 'wc_product_accreditation',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );


    // Certification metas
    $acc_cmb = new_cmb2_box( array(
		'id'            => 'wc_product_cert',
		'title'         => 'Course certification',
		'object_types'  => array( 'product', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$acc_cmb->add_field( array(
		'name'    => 'Certification',
		'desc'    => 'Certification goes here',
		'id'      => 'wc_product_certification',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );


    // Exam Board metas
    $exm_borad_cmb = new_cmb2_box( array(
		'id'            => 'wc_product_exm_board',
		'title'         => 'Exam Board Options',
		// 'desc'         	=> 'Please don\'t add more than 2 boards, extra boards will be ignored.',
		'object_types'  => array( 'product', ), // Post type
		'context'       => 'normal',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
	) );
	$exm_borad_cmb->add_field( array(
		'name' => 'Board Section Title',
		'desc' => 'Enter the board section title',
		'default' => 'Choose Your Booking Option',
		'id'   => 'board_sec_title',
		'type' => 'text',
	) );
	$exm_borad_cmb->add_field( array(
		'name' => 'Show Course Attribute Buttons on Board Option?',
		'desc' => 'You Could Show/Hide The Course Attributes Buttons Here.',
		'id'   => 'board_sec_btns',
		'type' => 'radio_inline',
		'options' => [
			'show' => 'Show',
			'hide' => 'Hide',
		],
		'default' => 'show',
	) );

	// Right Sidebar Course Facilities Option metas
	$course_facilities_options_cmb = new_cmb2_box( array(
		'id'            => 'wc_product_facilities_options',
		'title'         => 'Right Sidebar Course Facilities Option',
		// 'desc'         	=> 'Please don\'t add more than 2 boards, extra boards will be ignored.',
		'object_types'  => array( 'product', ), // Post type
		'context'       => 'normal',
		'priority'      => 'default',
		'show_names'    => true, // Show field names on the left
	) );
	$course_facilities_options_cmb->add_field( array(
		'name' => 'First Item Title',
		'desc' => 'Enter the first item title. Ex: Duration: 13 Hours',
		// 'default' => 'Choose Your Booking Option',
		'id'   => 'course_facilities_first_title',
		'type' => 'text',
	) );
	$course_facilities_options_cmb->add_field( array(
		'name' => 'Second Item Title',
		'desc' => 'Enter the second item title. Ex: Instant Access',
		// 'default' => 'Choose Your Booking Option',
		'id'   => 'course_facilities_second_title',
		'type' => 'text',
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