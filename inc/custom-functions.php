<?php

// Register Admin Menu Page
function la_abandoned_cart_menu_contents() {
    add_menu_page(
        'Abandoned Cart Items',
        'Abandoned Cart Items',
        'manage_options',
        'abandoned-cart-items',
        'la_abandoned_cart_callback',
        'dashicons-cart',
        6
    );
}
// add_action('admin_menu', 'la_abandoned_cart_menu_contents');

// Abandoned Cart Contents
function la_abandoned_cart_callback() {
    ?>
    <div class="wrap la-abandoned-cart-content-wrap">
        <form method="post">
            <h2><?php echo 'Student Abandoned Cart Items'?></h2>
            <?php
                global $wpdb;
                $table_name = $wpdb->la_abandoned_cart_tbl;
                $abandoned_cart = $wpdb->get_results( "SELECT * FROM {$wpdb->base_prefix}la_abandoned_cart_tbl", ARRAY_A );
            ?>
            <table class="la-abandoned-cart-table">
                <tr>
                    <th scope="row">Student ID</th>
                    <th scope="row">Student Name</th>
                    <th scope="row">Student Email</th>
                    <th scope="row">Student Phone</th>
                    <th scope="row">Course Id</th>
                    <th scope="row">Cart Time</th>
                </tr>
                <?php
                    foreach ( $abandoned_cart as $single_item ) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $single_item['student_id'];?>
                        </td>
                        <td>
                            <?php echo $single_item['student_name'];?>
                        </td>
                        <td>
                            <?php echo $single_item['student_email'];?>
                        </td>
                        <td>
                            <?php echo $single_item['student_phone'];?>
                        </td>
                        <td>
                            <?php echo $single_item['student_product_id'];?>
                        </td>
                        <td>
                            <?php echo $single_item['cart_time'];?>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
            </table>
        </form>
    </div>
    <?php
}

// Get Course Cat ID By Provided Course ID
function la_get_course_cat_id_by_course_id( $course_id ) {
	$specified_cats = [];
	$la_course_terms = get_the_terms( $course_id, 'product_cat' );
	foreach( $la_course_terms as $cat ) {
		$specified_cats[] = $cat->term_id;
		$specified_cats[] = $cat->parent;
	}
	return $specified_cats;
}

// Register GCSE Post Type
function la_register_gcse_course_func() {
	$labels = array(
		'name'                  => _x( 'GCSE Courses', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'GCSE Course', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'GCSE Courses', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'GCSE Course', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Course', 'textdomain' ),
		'new_item'              => __( 'New Course', 'textdomain' ),
		'edit_item'             => __( 'Edit Course', 'textdomain' ),
		'view_item'             => __( 'View Course', 'textdomain' ),
		'all_items'             => __( 'All Courses', 'textdomain' ),
		'search_items'          => __( 'Search Courses', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Courses:', 'textdomain' ),
		'not_found'             => __( 'No courses found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No courses found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Course Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Course archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Course', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Course', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Courses list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Courses list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Courses list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'gcse' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
	);

	register_post_type( 'gcse', $args );
}

add_action( 'init', 'la_register_gcse_course_func' );


// Remove Variation info from title on Cart page
// add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );

// add_filter( 'woocommerce_product_variation_title_include_attributes', 'custom_product_variation_title', 10, 2 );
// function custom_product_variation_title($should_include_attributes, $product){
//     $should_include_attributes = false;
//     return $should_include_attributes;
// }


// Initializing GCSE Course top shortcode
add_action( 'init', 'la_gcse_single_course_shortcode_callback' );
function la_gcse_single_course_shortcode_callback() {
    add_shortcode( 'gcse-course-top-content', 'la_gcse_single_course_shortcode_func' );
    add_shortcode( 'et-course-top-content', 'la_et_single_course_shortcode_func' );
}
function la_gcse_single_course_shortcode_func( $atts ) {
    ob_start();
    // Attributes
    $attributes = shortcode_atts(array(
        'course_price'     => '£38', // Ex. Bundle Offer, Accredited Courses, Trending Courses
    ), $atts);
    ?>
    <div class="la-gcse-top-post-content d-flex justify-content-between align-items-center text-center">
        <div class="la-gcse-top-left-content">
            <h2><?php echo $attributes['course_price'] ?>/month<br>
            Interest-free*</h2>
            <div class="la-gcse-facilities d-flex justify-content-between d-none">
                <p><b>Payments</b><span>6 months</span></p>
                <p><b>Deposit</b><span>£62</span></p>
                <p><b>Total Price</b><span>£290</span></p>
            </div>
        </div>
        <a href="#" class="gcse-enquery-btn">Make an Enquiry</a>
        <!-- Popup content -->
        <div id="gcse-inquery-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>

                <div class="gcse-inquery-modal-contents">
                    <?php echo do_shortcode( '[gravityform id="76" title="false" description="false" ajax="true"]' ); ?>
                </div>
            </div>
        </div>
    </div>
	<?php
	$html = ob_get_clean();
	return $html;
}

// Initializing GCSE course accordion shortcode
add_action( 'init', 'la_gcse_single_course_accordion_shortcode_callback' );
function la_gcse_single_course_accordion_shortcode_callback() {
    add_shortcode( 'gcse-course-accordion-content', 'la_gcse_single_course_accordion_shortcode_func' );
}
function la_gcse_single_course_accordion_shortcode_func( $atts, $content = '' ) {
    ob_start();
    // Attributes
    $attributes = shortcode_atts(array(
        'title'     => 'Aims and Objectives of GCSE Maths Online Course',
        'expand'    => 'false',
    ), $atts);
    $gcse_uniqid = uniqid();
    ?>
    <div class="gcse-course-accordion-content">
        <h3 class="gcse-accordion-header" id="small-panelsStayOpen-heading<?php echo $gcse_uniqid?>">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $gcse_uniqid?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?php echo $gcse_uniqid?>">
            <?php echo $attributes['title']?>
            </button>
        </h3>
        <div id="panelsStayOpen-collapse<?php echo $gcse_uniqid?>" class="accordion-collapse collapse <?php echo $attributes['expand']?>" aria-labelledby="small-panelsStayOpen-heading<?php echo $gcse_uniqid?>">
            <div class="gcse-accordion-body">
                <?php echo $content?>
            </div>
        </div>
    </div>
	<?php
	$html = ob_get_clean();
	return $html;
}

// GCSE Courses Ajaxify
add_action('wp_ajax_gcse_action', 'gcse_callback_add_product_to_cart');
add_action('wp_ajax_nopriv_gcse_action', 'gcse_callback_add_product_to_cart');
function gcse_callback_add_product_to_cart() 
{   
    $course_id	        = isset($_POST['course_id']) ? sanitize_text_field($_POST['course_id']) : '';
    $variation_id	    = isset($_POST['variation_id']) ? sanitize_text_field($_POST['variation_id']) : '';
    $sec_variation_id   = isset($_POST['sec_variation_id']) ? sanitize_text_field($_POST['sec_variation_id']) : '';
    $response           = [];

    if ( $course_id != '' && $sec_variation_id != '' ) {
        $gcse_cart_item_key = WC()->cart->add_to_cart( $course_id, 1, $sec_variation_id );    
        $response['condition'] = 'Secondary var is not empty';
    } elseif ( $course_id != '' && $variation_id != '' ) {
        $response['condition'] = 'Secondary var is empty';
        $gcse_cart_item_key = WC()->cart->add_to_cart( $course_id, 1, $variation_id );
    }

    if ( $gcse_cart_item_key ) {
        $response['status'] = 'success';
        $response['message'] = 'Enrolled Successfully, Redirecting..';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Sorry! We could not process your request. Please try again.';
    }
    
    echo wp_send_json( $response );
    wp_die();
}


// Initializing Education & Training Course top shortcode
function la_et_single_course_shortcode_func( $atts ) {
    ob_start();
    // Attributes
    $attributes = shortcode_atts(array(
        'course_price'     => '£37', // Ex. Bundle Offer, Accredited Courses, Trending Courses
    ), $atts);
    ?>
    <div class="la-gcse-top-post-content d-flex justify-content-between align-items-center text-center">
        <div class="la-gcse-top-left-content">
            <h2><?php echo $attributes['course_price'] ?>/month<br>
            Interest-free*</h2>
            <div class="la-gcse-facilities d-flex justify-content-between d-none">
                <p><b>Payments</b><span>6 months</span></p>
                <p><b>Deposit</b><span>£62</span></p>
                <p><b>Total Price</b><span>£290</span></p>
            </div>
        </div>

        <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
        <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
        <a href="#" class="gcse-enquery-btn la-education-training-popup-btn" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/lead-academy/free-consultation'});return false;">Book a Free Consultation</a>
    </div>
	<?php
	$html = ob_get_clean();
	return $html;
}


// Initializing FS Course icon shortcode
add_action( 'init', 'la_fs_single_course_icon_shortcode_callback' );
function la_fs_single_course_icon_shortcode_callback() {
    add_shortcode( 'fs-course-icon-content', 'la_fs_single_course_icon_shortcode_func' );
    add_shortcode( 'cpd-course-all-icons-content', 'la_cpd_course_all_icons_shortcode_func' );
}
function la_fs_single_course_icon_shortcode_func( $atts ) {
    ob_start();
    // Attributes
    $attributes = shortcode_atts(array(
        'title'     => 'Tutor Support',                     // Icon section title
        'sub_title' => 'Unlimited support till the exam',   // Icon section sub title
    ), $atts);
    // <div class="la-gcse-bottom-post-content">
        ?>
        <div class="la-gcse-bottom-single">
            <p><?php echo esc_html( $attributes['title'] )?></p>
            <p><?php echo esc_html( $attributes['sub_title'] )?></p>
        </div>
        <?php
    // </div>
	$html = ob_get_clean();
	return $html;
}


function la_cpd_course_all_icons_shortcode_func( $atts ) {
    ob_start();
    // Attributes
    $attributes = shortcode_atts(array(
        'title'     => 'Tutor Support',                     // Icon section title
        'sub_title' => 'Till exam',   // Icon section sub title
    ), $atts);
    $current_product_id 		= get_the_ID();	
    $course_info_icon_1 		= get_post_meta( $current_product_id, 'course_info_icon_1', true);
    $course_info_text_1 		= get_post_meta( $current_product_id, 'course_info_text_1', true);
    $course_info_text_2_1 		= get_post_meta( $current_product_id, 'course_info_text_2_1', true);
    $course_info_icon_2 		= get_post_meta( $current_product_id, 'course_info_icon_2', true);
    $course_info_text_2 		= get_post_meta( $current_product_id, 'course_info_text_2', true);
    $course_info_text_2_2 		= get_post_meta( $current_product_id, 'course_info_text_2_2', true);
    $course_info_icon_3 		= get_post_meta( $current_product_id, 'course_info_icon_3', true);
    $course_info_text_3 		= get_post_meta( $current_product_id, 'course_info_text_3', true);
    $course_info_text_2_3 		= get_post_meta( $current_product_id, 'course_info_text_2_3', true);
    $course_info_icon_4 		= get_post_meta( $current_product_id, 'course_info_icon_4', true);
    $course_info_text_4 		= get_post_meta( $current_product_id, 'course_info_text_4', true);
    $course_info_text_2_4 		= get_post_meta( $current_product_id, 'course_info_text_2_4', true);
    $course_info_icon_5 		= get_post_meta( $current_product_id, 'course_info_icon_5', true);
    $course_info_text_5 		= get_post_meta( $current_product_id, 'course_info_text_5', true);
    $course_info_text_2_5 		= get_post_meta( $current_product_id, 'course_info_text_2_5', true);
    $course_info_icon_6 		= get_post_meta( $current_product_id, 'course_info_icon_6', true);
    $course_info_text_6 		= get_post_meta( $current_product_id, 'course_info_text_6', true);
    $course_info_text_2_6 		= get_post_meta( $current_product_id, 'course_info_text_2_6', true);
    ?>
    <div class="la-gcse-bottom-post-content cpd-course-all-icons-content">
        <div class="la-gcse-bottom-single d-flex">
            <?php
            if ( $course_info_icon_1 ) {
                ?>
                <div class="la-cpd-single-icon-holder">
                    <img width="45" height="45" src="<?php echo wp_get_attachment_image_url($course_info_icon_1)?>" alt="<?php echo $course_info_text_1?>">
                </div>
                <?php
            }
            ?>
            <div class="la-cpd-single-icon-contents">
                <p><?php echo esc_html( $course_info_text_1 )?></p>
                <p><?php echo esc_html( $course_info_text_2_1 )?></p>
            </div>
        </div>
        <div class="la-gcse-bottom-single d-flex"><?php
            if ( $course_info_icon_2 ) {
                ?>
                <div class="la-cpd-single-icon-holder">
                    <img width="45" height="45" src="<?php echo wp_get_attachment_image_url($course_info_icon_2)?>" alt="<?php echo $course_info_text_2?>">
                </div>
                <?php
            }
            ?>
            <div class="la-cpd-single-icon-contents">
                <p><?php echo esc_html( $course_info_text_2 )?></p>
                <p><?php echo esc_html( $course_info_text_2_2 )?></p>
            </div>
        </div>
        <div class="la-gcse-bottom-single d-flex"><?php
            if ( $course_info_icon_3 ) {
                ?>
                <div class="la-cpd-single-icon-holder">
                    <img width="45" height="45" src="<?php echo wp_get_attachment_image_url($course_info_icon_3)?>" alt="<?php echo $course_info_text_3?>">
                </div>
                <?php
            }
            ?>
            <div class="la-cpd-single-icon-contents">
                <p><?php echo esc_html( $course_info_text_3 )?></p>
                <p><?php echo esc_html( $course_info_text_2_3 )?></p>
            </div>
        </div>
        <div class="la-gcse-bottom-single d-flex"><?php
            if ( $course_info_icon_4 ) {
                ?>
                <div class="la-cpd-single-icon-holder">
                    <img width="45" height="45" src="<?php echo wp_get_attachment_image_url($course_info_icon_4)?>" alt="<?php echo $course_info_text_4?>">
                </div>
                <?php
            }
            ?>
            <div class="la-cpd-single-icon-contents">
                <p><?php echo esc_html( $course_info_text_4 )?></p>
                <p><?php echo esc_html( $course_info_text_2_4 )?></p>
            </div>
        </div>
        <div class="la-gcse-bottom-single d-flex"><?php
            if ( $course_info_icon_5 ) {
                ?>
                <div class="la-cpd-single-icon-holder">
                    <img width="45" height="45" src="<?php echo wp_get_attachment_image_url($course_info_icon_5)?>" alt="<?php echo $course_info_text_5?>">
                </div>
                <?php
            }
            ?>
            <div class="la-cpd-single-icon-contents">
                <p><?php echo esc_html( $course_info_text_5 )?></p>
                <p><?php echo esc_html( $course_info_text_2_5 )?></p>
            </div>
        </div>
        <div class="la-gcse-bottom-single d-flex"><?php
            if ( $course_info_icon_6 ) {
                ?>
                <div class="la-cpd-single-icon-holder">
                    <img width="45" height="45" src="<?php echo wp_get_attachment_image_url($course_info_icon_6)?>" alt="<?php echo $course_info_text_6?>">
                </div>
                <?php
            }
            ?>
            <div class="la-cpd-single-icon-contents">
                <p><?php echo esc_html( $course_info_text_6 )?></p>
                <p><?php echo esc_html( $course_info_text_2_6 )?></p>
            </div>
        </div>
    </div>
    <?php
	$html = ob_get_clean();
	return $html;
}

// Hook to execute custom code when an order is completed
add_action('woocommerce_order_status_completed', 'la_custom_order_completed_action', 10, 1);

function la_custom_order_completed_action($order_id) {
    $order = wc_get_order($order_id);
    foreach ($order->get_items() as $item_id => $item) {
        $product_id = $item->get_product_id();
        if (
            // Checking for Phlebotomy Courses
               ( '377824' == $product_id ) 			// Phlebotomy Training Swindon		
            || ( '376420' == $product_id ) 			// Phlebotomy Training Bristol		
            || ( '376417' == $product_id ) 			// Phlebotomy Training Birmingham 	
            || ( '366854' == $product_id ) 			// Phlebotomy Training London 		
            || ( '368595' == $product_id ) 			// Advanced/Competency Phlebotomy Training - London
            || ( '371100' == $product_id ) 			// Cannulation Training
            || ( '370863' == $product_id ) 			// Catheterisation Training
            // Checking for Cannulation Courses
            || ( '380325' == $product_id ) 			// Cannulation Training – Birmingham	
            || ( '382016' == $product_id ) 			// Advanced / Competency Phlebotomy Training Birmingham	
        ) {
            $product = wc_get_product($product_id);
            if ($product->is_type('variable')) {
                $variation_id = $item->get_variation_id();
                $variation = wc_get_product($variation_id);
                $variable_title = wc_get_formatted_variation( $variation, true, false, false );
                if ( $variation->get_stock_quantity() && $variation->get_stock_quantity() < 2 ) {
                    // $to = 'frworkbd@gmail.com';
                    $to = get_option('admin_email');
                    $subject = 'URGENT! Only one seat left, take action.';
                    $message = $product->get_name() . ', Variation: ' . $variable_title . ' is low on stock. Current stock: ' . $variation->get_stock_quantity();
                    $headers = 'Content-Type: text/html';
                    wp_mail($to, $subject, $message, $headers);
                }
            }
        }
    }
}

// Health And Wellness Coach Training Course (100896)Boards: Default, Courses: Course Materials + CPD Accredited & Quality Licence Scheme Endorsed Hardcopy Certificate is low in stock. There are 1 left.

add_action( 'woocommerce_cart_calculate_fees', 'setAdditionalFee', 100 );
function setAdditionalFee() {
    $fs_values = WC()->session->get('fs-course-datas');
    
    if ( isset( $fs_values['course_data'] ) ) {
        // Add fees
        foreach( $fs_values['course_data'] as $value ) {
            WC()->cart->add_fee( $value['label'], $value['value'] );
        }
    }
}

// Unset the Session
add_action( 'woocommerce_thankyou', 'unset_fs_course_session' );
function unset_fs_course_session() {
    WC()->session->__unset('fs-course-datas');
}

add_action('wp_ajax_fs_ajaxify_course', 'fs_ajaxify_course_callback');
add_action('wp_ajax_nopriv_fs_ajaxify_course', 'fs_ajaxify_course_callback');
function fs_ajaxify_course_callback() {
    check_ajax_referer('fs_ajaxify_course');
    $product_id = isset( $_POST['course_id'] ) ? absint( $_POST['course_id'] ) : '';
    // Programatically adding to cart
    $data_response = WC()->cart->add_to_cart( $product_id );
    
    // Course data array
    $fs_course_datas = [
        'course_id' => $product_id,
        'cart_page_url' => wc_get_cart_url(),
        'cart_id' => $data_response,
        'course_data' => [
            $_POST[0],
            $_POST[1],
            $_POST[2],
            $_POST[3],
        ],
        'event_day_time' => $_POST['event-day-time']
    ];

    // If Session didn't set then set it
    if ( ! WC()->session->__isset( 'fs-course-datas' ) ) {
        WC()->session->set('fs-course-datas', $fs_course_datas );
    }
    
    return wp_send_json( $fs_course_datas );

    // } else {
    //     echo wp_send_json( ['Sorry, You can not do this.'] );
    // }
    wp_die();
}