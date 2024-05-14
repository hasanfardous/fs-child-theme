<?php
/**
 * Lead Academy Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lead Academy Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'FS_CHILD_THEME_VERSION', '1.0.0' );
define( 'FS_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FS_CHILD_THEME_DIR_URI', get_stylesheet_directory_uri() );


/**
 * ===============================================================
 * Enqueue scripts and styles
 * ===============================================================
 */
function fs_wp_scripts() {
	
	/* --- CSS --- */
	wp_enqueue_style( 'fs-bootstrap', FS_CHILD_THEME_DIR_URI . '/assets/css/bootstrap/bootstrap.css' );
	wp_enqueue_style( 'fs-beta-custom', FS_CHILD_THEME_DIR_URI . '/assets/css/fs-custom.css', array(), rand(1, 9999) );
	wp_enqueue_style( 'all-course-page-design', FS_CHILD_THEME_DIR_URI . '/assets/css/all-course-page-design.css' );
	wp_enqueue_style( 'fs-main', FS_CHILD_THEME_DIR_URI . '/assets/css/fs-main.css', array(), rand(1, 9999), 'all' );
	wp_enqueue_style( 'fs-course-details-styles', FS_CHILD_THEME_DIR_URI . '/assets/css/course-details-styles.css', array(), rand(1, 9999)  );
	wp_enqueue_style( 'font-awesome-4-7', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'font-google', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap', array(), '1.0.0' );
	wp_enqueue_style('owl.carousel.min', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', false);
	wp_enqueue_style('owl.theme.min', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', false);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	 if(is_page( 'cart' )) {
	// 	wp_enqueue_style( 'cart-page', FS_CHILD_THEME_DIR_URI . '/assets/css/cart-page.css', array(), rand(1, 9999), 'all' );
	 	wp_enqueue_style( 'cart-page', FS_CHILD_THEME_DIR_URI . '/assets/css/cart-page-suggestion.css', array(), rand(1, 9999), 'all' );
	 }

	if(is_page ( array( 'phlebotomy-training-london', 'phlebotomy-training-birmingham', 'nail-technician', 'mental-health-first-aid' ))) {
		wp_enqueue_style( 'phlebotomy-training', FS_CHILD_THEME_DIR_URI . '/assets/css/phlebotomy-training.css', array(), rand(1, 9999), 'all' );
		wp_enqueue_style( 'phlebotomy-modal-css', FS_CHILD_THEME_DIR_URI . '/assets/css/jquery.modal.min.css', array(), rand(1, 9999), 'all' );

		// Load JS
		wp_enqueue_script( 'phlebotomy-modal-js', FS_CHILD_THEME_DIR_URI . '/assets/js/jquery.modal.min.js', array('jquery'), mt_rand(1, 9999), true );
		wp_enqueue_script( 'phlebotomy-training', FS_CHILD_THEME_DIR_URI . '/assets/js/phlebotomy-training.js', array('phlebotomy-modal-js', 'jquery'), mt_rand(1, 9999), true );
	}

	if(is_page( array('phlebotomy-training', 388042, 390119) )) {
		wp_enqueue_style( 'phlebotomy-training-landing-page', FS_CHILD_THEME_DIR_URI . '/assets/css/phuk-landing-page.css', array(), rand(1, 9999), 'all' );
		wp_enqueue_style( 'phlebotomy-training-london', FS_CHILD_THEME_DIR_URI . '/assets/css/phlebotomy-training.css', array(), rand(1, 9999), 'all' );
	}
	

	if(is_page ( array( 'massage-therapy-courses', 'nail-technician-courses', 'complete-nail-technician-course' ))) {
		wp_enqueue_style( 'massage-therapy', FS_CHILD_THEME_DIR_URI . '/assets/css/massage-therapy-style.css', array(), rand(1, 9999), 'all' );
	}

	if(is_page( 'contact-us' )) {
		wp_enqueue_style( 'contact-us', FS_CHILD_THEME_DIR_URI . '/assets/css/contact-us-style.css', array(), rand(1, 9999), 'all' );
	}

	if(is_page( 'home' )) {
		wp_enqueue_style( 'home-page', FS_CHILD_THEME_DIR_URI . '/assets/css/fs-home-page-style.css', array(), rand(1, 9999), 'all' );
	}

	if(is_singular( array('gcse', 'product') )) {
		wp_enqueue_style( 'gcse', FS_CHILD_THEME_DIR_URI . '/assets/css/gcse-styles.css', array(), rand(1, 9999), 'all' );	
		wp_enqueue_script( 'gcse', FS_CHILD_THEME_DIR_URI . '/assets/js/gcse-scripts.js', array('jquery'), mt_rand(1, 9999), true );
		wp_localize_script(
			'gcse',
			'gcse_obj',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'cart_url' => wc_get_cart_url(),
			)
		);
	}

	/* --- JS --- */
	wp_enqueue_script( 'fs-owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), mt_rand(1, 9999) );
	wp_enqueue_script( 'fs-postcoder-address', FS_CHILD_THEME_DIR_URI . '/assets/js/postcoder-address.js', '', mt_rand(1, 9999) );
	wp_enqueue_script( 'fs-main', FS_CHILD_THEME_DIR_URI . '/assets/js/fs-main.js', array('jquery'), mt_rand(1, 9999), true );
	wp_enqueue_script( 'fs-bootstrap-js', FS_CHILD_THEME_DIR_URI . '/assets/js/bootstrap.min.js', array('jquery'), mt_rand(1, 9999), true );
	wp_enqueue_script( 'fs-bootstrap-bundle-js', FS_CHILD_THEME_DIR_URI . '/assets/js/bootstrap.bundle.min.js', array('jquery'), mt_rand(1, 9999), true );
	wp_enqueue_script( 'fs-course-details-scripts', FS_CHILD_THEME_DIR_URI . '/assets/js/course-details-scripts.js', array('jquery'), mt_rand(1, 9999), true );
	wp_enqueue_script( 'fs-on-switch-add-product-cart-scripts', FS_CHILD_THEME_DIR_URI . '/assets/js/switch_add_product_to_cart.js', array('jquery', 'fs-owl-carousel'), mt_rand(1, 9999), true );

	// Ajaxify all-courses page
	wp_enqueue_script( 'fs-courses-ajaxify', FS_CHILD_THEME_DIR_URI . '/assets/js/ajaxify-courses.js', array('jquery'), mt_rand(1, 9999), true );
// 
	// Localize variables for ajaxify-courses
	wp_localize_script(
		'fs-courses-ajaxify',
		'ajaxify_courses_ot',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'total_products' => wp_count_posts('product')->publish,
			'nonce' => wp_create_nonce('fs_ajaxify_course')
		)
	);

	// Ajaxify the header searchbar
	// wp_enqueue_script( 'fs-header-searchbar-ajaxify', FS_CHILD_THEME_DIR_URI . '/assets/js/header-searchbar-ajaxify.js', array('jquery'), mt_rand(1, 9999), true );

	// // Localize the header searchbar
	// wp_localize_script(
	// 	'fs-header-searchbar-ajaxify',
	// 	'header_searchbar_ajaxify',
	// 	array(
	// 		'ajax_url' => admin_url( 'admin-ajax.php' ),
	// 	)
	// );
}
add_action( 'wp_enqueue_scripts', 'fs_wp_scripts', 15 );

// Enqueue admin script
add_action( 'admin_enqueue_scripts', 'fs_include_admin_scripts' );
function fs_include_admin_scripts() {	
	// WordPress media uploader scripts
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	// Admin CSS
	wp_enqueue_style( 'fs_admin_styles', FS_CHILD_THEME_DIR_URI . '/assets/css/fs-admin-styles.css', array(), rand(1, 9999), 'all' );
	
	// our custom JS
 	wp_enqueue_script( 'fs_include_admin_script', FS_CHILD_THEME_DIR_URI . '/assets/js/fs-admin-script.js', array( 'jquery' ) );
}

// Load dummy contents function
// require_once FS_CHILD_THEME_DIR . '/inc/dummy-contents.php';
// // Load Ajaxify courses function
require_once FS_CHILD_THEME_DIR . '/inc/ajaxify-courses.php';
// // Load custom functions
require_once FS_CHILD_THEME_DIR . '/inc/custom-functions.php';
// // Load course additional metaboxes
require_once FS_CHILD_THEME_DIR . '/inc/wc-custom-metas.php';
// // Load course reviews
require_once FS_CHILD_THEME_DIR . '/inc/fs-reviews.php';
// // Load course reviews
// require_once FS_CHILD_THEME_DIR . '/inc/make-custom-feed.php';
// // Load popular courses shortcode content
require_once FS_CHILD_THEME_DIR . '/inc/popular-courses-shortcode-content.php';
// // Load specific course's prices by id shortcode content
require_once FS_CHILD_THEME_DIR . '/inc/specific-courses-price-shortcode-content.php';
// // Load custom meta field on product_cat taxonomy content
require_once FS_CHILD_THEME_DIR . '/inc/fs-custom-taxonomy-content.php';
// // Load custom API endpoint content
require_once FS_CHILD_THEME_DIR . '/inc/custom-endpoint.php';
// // Load header searchbar ajaxify content
require_once FS_CHILD_THEME_DIR . '/inc/header-searchbar-ajaxify.php';
// // Export custom product datas in CSV format
require_once FS_CHILD_THEME_DIR . '/inc/fs-export-products.php';
// // Export custom order datas in CSV format
// require_once FS_CHILD_THEME_DIR . '/inc/fs-export-orders.php';
// // For Suggestion on Cart page
// require_once FS_CHILD_THEME_DIR . '/inc/cart-page-suggestion.php';


/**
 * ================================================================================
 * LA Register Menus
 * ================================================================================
 */
function fs_child_theme_setup() {
	// Register Nav Menu
	register_nav_menus(
		array(
			'main-menu'	=> esc_html__( 'Main Menu', 'astra' ),
		)
	);

	// Set Image Sizes
	// add_image_size('fs_course_archive_thumb_245x150', 245, 150, true);
}
add_action( 'after_setup_theme', 'fs_child_theme_setup' );


/**
 * ================================================================================
 * Get variable product ids by product id
 * ================================================================================
 */
function la_get_variable_ids_by_product_id( $product_id ) {
	$variations = [];
	$product = wc_get_product($product_id);
	if ( ! empty($product) ) {
		if ( $product->get_type() == 'variable' ) {
			$variations = $product->get_available_variations();
			foreach ( $variations as $variation ) {
				$variations['attribute_boards'][] = $variation['attributes']['attribute_boards'];
				$variations['attribute_courses'][] = $variation['attributes']['attribute_courses'];
				$variations['variation_ids'][] = $variation['variation_id'];
			}
		}
	}
	return $variations;
}



/**
 * ================================================================================
 * LA Courses Menu
 * ================================================================================
 */
add_action( 'after_setup_theme', 'register_courses_menu' );
function register_courses_menu() {
	register_nav_menu( 'courses-menu', __( 'Courses Menu', 'astra' ) );
}
function show_courses_menu() {
?>
	<nav class="subjects-menu-container display-inline-block">
		<a href="#find-courses" class="courses-btn display-inline-block">Find Course <i class="fa fa-chevron-down"></i></a>
		<div class="la-all-courses-mega-menu-wrap">
			<?php 
				dynamic_sidebar( 'popular-courses-top' );
				dynamic_sidebar( 'sidebar-courses-top' );
			?>
			<div class="la-our-clients-mega-menu">
				<!-- <a href="#"><img src="/wp-content/uploads/2022/09/CPD-310x310-1.png" alt="CPD Certified"></a>
				<a href="#"><img src="/wp-content/uploads/2022/07/signature-logo-83c764f558b2aeb3deeda61465b5ac7ebcf56b4f029083e1adb29acb41ac08f3.jpg" alt="Signature"></a>
				<a href="#"><img src="/wp-content/uploads/2022/07/edexcel-vector-logo.png" alt="Edexcel"></a>
				<a href="#"><img src="/wp-content/uploads/2022/07/QLS-Logo-Colour.png" alt="QLS"></a>
				<a href="#"><img src="/wp-content/uploads/2022/10/ncfe.jpeg" alt="NCFE"></a> -->
			</div>
		</div>
	</nav>
<?php
}
add_shortcode( 'courses_menu', 'show_courses_menu' );


/**
 * ================================================================================
 * Register Sidebars LA
 * ================================================================================
 */
function la_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'astra' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'astra' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar', 'astra' ),
			'id'            => 'sidebar-footer',
			'description'   => esc_html__( 'Add Footer widgets here.', 'astra' ),
			'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Courses Top Sidebar', 'astra' ),
			'id'            => 'sidebar-courses-top',
			'description'   => esc_html__( 'Add Course Categories widgets here.', 'astra' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<p class="la-mega-menu-widget-label d-none">',
			'after_title'   => '</p>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Popular Courses Top', 'astra' ),
			'id'            => 'popular-courses-top',
			'description'   => esc_html__( 'Add Popular Courses Categories widgets here.', 'astra' ),
			'before_widget' => '<ul class="la-popular-courses">',
			'after_widget'  => '</ul>',
			'before_title'  => '<p class="la-mega-menu-label">',
			'after_title'   => '</p>',
		)
	);
}
add_action( 'widgets_init', 'la_widgets_init' );


/**
 * ===============================================================
 * ADD PAYMENT METHOD BULK FILTER FOR ORDERS
 * ===============================================================
 */

function add_filter_by_payment_method_orders() {

    global $typenow;

    if ( 'shop_order' === $typenow ) {

        // get all payment methods

        $gateways = WC()->payment_gateways->payment_gateways();

        ?>

        <select name="_shop_order_payment_method" id="dropdown_shop_order_payment_method">

            <option value=""><?php esc_html_e( 'All Payment Methods', 'text-domain' ); ?></option>

            <?php foreach ( $gateways as $id => $gateway ) : ?>

            <option value="<?php echo esc_attr( $id ); ?>" <?php echo esc_attr( isset( $_GET['_shop_order_payment_method'] ) ? selected( $id, $_GET['_shop_order_payment_method'], false ) : '' ); ?>>

                <?php echo esc_html( $gateway->get_method_title() ); ?>

            </option>

            <?php endforeach; ?>

        </select>

        <?php

    }

}

add_action( 'restrict_manage_posts', 'add_filter_by_payment_method_orders', 99 );

 

function add_filter_by_payment_method_orders_query( $vars ) {

    global $typenow;

    if ( 'shop_order' === $typenow && isset( $_GET['_shop_order_payment_method'] ) ) {

        $vars['meta_key']   = '_payment_method';

        $vars['meta_value'] = wc_clean( $_GET['_shop_order_payment_method'] );

    }

    return $vars;

}

add_filter( 'request', 'add_filter_by_payment_method_orders_query', 99 );


/**
 * ===============================================================
 * Overwrite teh WC Product title
 * ===============================================================
 */
function woocommerce_template_loop_product_title() {
	echo '<h3 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h3>'; 
}


/**
 * ===============================================================
 * Calculate Discount Percentage
 * ===============================================================
 */
function calculate_discount_percentage( $real_price, $sale_price) {
	return round( ($real_price - $sale_price)/$real_price * 100 );
}


/**
 * ===============================================================
 * Change number or products per row to 3
 * ===============================================================
 */
add_filter('loop_shop_columns', 'la_loop_columns', 999);
function la_loop_columns() 
{
	return 3; // 3 products per row
}


/**
 * ===============================================================
 * Display Review Part
 * ===============================================================
 */
function get_reviews_part() {
	?>
	<script src="https://widget.reviews.io/carousel-inline-iframeless/dist.js?_t=2022042105"></script>
	<link rel="stylesheet" href="https://assets.reviews.io/css/widgets/carousel-widget.css?_t=2022042105">
	<link rel="stylesheet" href="https://assets.reviews.io/iconfont/reviewsio-icons/style.css?_t=2022042105">
	<div id="reviewsio-carousel-widget"></div>
	<script>
		new carouselInlineWidget('reviewsio-carousel-widget',{
		/*Your REVIEWS.io account ID:*/
		store: 'lead-academy-org',
		sku: '',
		lang: 'en',
		carousel_type: 'default',
		styles_carousel: 'CarouselWidget--sideHeader--withcards ',

		/*Widget settings:*/
		options:{
			general:{
			/*What reviews should the widget display? Available options: company, product, third_party. You can choose one type or multiple separated by comma.*/
			review_type: 'company, product',
			/*Minimum number of reviews required for widget to be displayed*/
			min_reviews: '1',
			/*Maximum number of reviews to include in the carousel widget.*/
			max_reviews: '20',
			address_format: 'CITY, COUNTRY',
			/*Carousel auto-scrolling speed. 3000 = 3 seconds. If you want to disable auto-scroll, set this value to false.*/
			enable_auto_scroll: 10000,
			},
			header:{
			/*Show overall rating stars*/
			enable_overall_stars: true,
			rating_decimal_places: 2,
			},
			reviews: {
			/*Show customer name*/
			enable_customer_name: true,
			/*Show customer location*/
			enable_customer_location: false,
			/*Show "verified review" badge*/
			enable_verified_badge: true,
			/*Show "I recommend this product" badge (Only for product reviews)*/
			enable_recommends_badge: true,
			/*Show photos attached to reviews*/
			enable_photos: true,
			/*Show videos attached to reviews*/
			enable_videos: true,
			/*Show when review was written*/
			enable_review_date: true,
			/*Hide reviews written by the same customer (This may occur when customer reviews multiple products)*/
			disable_same_customer: true,
			/*Minimum star rating*/
			min_review_percent: 4,
			/*Show 3rd party review source*/
			third_party_source: true,
			/*Hide reviews without comments (still shows if review has a photo)*/
			hide_empty_reviews: true,
			/*Show product name*/
			enable_product_name: true,
			/*Show only reviews which have specific tags (multiple semicolon separated tags allowed i.e tag1;tag2)*/
			tags: "",
			/*Show branch, only one input*/
			branch: "",
			enable_branch_name: false,
			},
			popups: {
			/*Make review items clickable (When they are clicked, a popup appears with more information about a customer and review)*/
			enable_review_popups:  true,
			/*Show "was this review helpful" buttons*/
			enable_helpful_buttons: true,
			/*Show how many times review was upvoted as helpful*/
			enable_helpful_count: true,
			/*Show share buttons*/
			enable_share_buttons: true,
			},
		},
		translations: {
		verified_customer:  "Verified Customer",
		},
		styles:{
		/*Base font size is a reference size for all text elements. When base value gets changed, all TextHeading and TexBody elements get proportionally adjusted.*/
		'--base-font-size': '16px',
		'--base-maxwidth':'100%',

		/*Logo styles:*/
		'--reviewsio-logo-style':'var(--logo-normal)',

		/*Star styles:*/
		'--common-star-color':'#F47E27',
		'--common-star-disabled-color':' rgba(0,0,0,0.25)',
		'--medium-star-size':' 22px',
		'--small-star-size':'19px', /*Modal*/
		'--x-small-star-size':'19px',
		'--x-small-star-display':'inline-flex',

		/*Header styles:*/
		'--header-order':'1',
		'--header-width':'280px',
		'--header-bg-start-color':'#FFFFFF',
		'--header-bg-end-color':'#FFFFFF',
		'--header-gradient-direction':'135deg',
		'--header-padding':'1.5em',
		'--header-border-width':'1px',
		'--header-border-color':'#00000017',
		'--header-border-radius':'0px',
		'--header-shadow-size':'10px',
		'--header-shadow-color':'rgba(0, 0, 0, 0.05)',

		/*Header content styles:*/
		'--header-star-color':'#F47E27',
		'--header-disabled-star-color':'inherit',
		'--header-heading-text-color':'#000000',
		'--header-heading-font-size':'21px',
		'--header-heading-font-weight':'inherit',
		'--header-heading-line-height':'inherit',
		'--header-heading-text-transform':'inherit',
		'--header-subheading-text-color':'#000000',
		'--header-subheading-font-size':'inherit',
		'--header-subheading-font-weight':'300',
		'--header-subheading-line-height':'inherit',
		'--header-subheading-text-transform':'inherit',

		/*Review item styles:*/
		'--item-maximum-columns':'5',/*Must be 3 or larger*/
		'--item-background-start-color':'#F1F1F1',
		'--item-background-end-color':'#ffffff',
		'--item-gradient-direction':'135deg',
		'--item-padding':'1.5em',
		'--item-border-width':'0px',
		'--item-border-color':'rgba(0,0,0,0.1)',
		'--item-border-radius':'0px',
		'--item-shadow-size':'10px',
		'--item-shadow-color':'rgba(0,0,0,0.05)',

		/*Heading styles:*/
		'--heading-text-color':' #0E1311',
		'--heading-text-font-weight':' 600',
		'--heading-text-font-family':' inherit',
		'--heading-text-line-height':' 1.4',
		'--heading-text-letter-spacing':'0',
		'--heading-text-transform':'none',

		/*Body text styles:*/
		'--body-text-color':' #0E1311',
		'--body-text-font-weight':'400',
		'--body-text-font-family':'inherit',
		'--body-text-line-height':'1.7',
		'--body-text-letter-spacing':'0',
		'--body-text-transform':'none',

		/*Scroll button styles:*/
		'--scroll-button-icon-color':'#B91948',
		'--scroll-button-icon-size':'25px',
		'--scroll-button-bg-color':'transparent',

		'--scroll-button-border-width':'0px',
		'--scroll-button-border-color':'#831E1E00',

		'--scroll-button-border-radius':'60px',
		'--scroll-button-shadow-size':'0px',
		'--scroll-button-shadow-color':'rgba(0,0,0,0.1)',
		'--scroll-button-horizontal-position':'3px',
		'--scroll-button-vertical-position':'0px',

		/*Badge styles:*/
		'--badge-icon-color':'#00A673',
		'--badge-icon-font-size':'15px',
		'--badge-text-color':'#0E1311',
		'--badge-text-font-size':'13px',
		'--badge-text-letter-spacing':'inherit',
		'--badge-text-transform':'none',

		/*Author styles:*/
		'--author-font-size':'15px',
		'--author-font-weight':'inherit',
		'--author-text-transform':'inherit',

		/*Product photo or review photo styles:*/
		'--photo-video-thumbnail-size':'60px',
		'--photo-video-thumbnail-border-radius':'0px',

		/*Popup styles:*/
		'--popup-backdrop-color':'rgba(0,0,0,0.75)',
		'--popup-color':'#ffffff',
		'--popup-star-color':'inherit',
		'--popup-disabled-star-color':'inherit',
		'--popup-heading-text-color':'inherit',
		'--popup-body-text-color':'inherit',
		'--popup-badge-icon-color':'inherit',
		'--popup-badge-icon-font-size':'19px',
		'--popup-badge-text-color':'inherit',
		'--popup-badge-text-font-size':'14px',
		'--popup-border-width':'0px',
		'--popup-border-color':'rgba(0,0,0,0.1)',
		'--popup-border-radius':'0px',
		'--popup-shadow-size':'0px',
		'--popup-shadow-color':'rgba(0,0,0,0.1)',
		'--popup-icon-color':'#0E1311',

		/*Tooltip styles:*/
		'--tooltip-bg-color':'#0E1311',
		'--tooltip-text-color':'#ffffff',
		},
	});

	</script>
<?php
}


/**
 * Add Access Course section in Side Cart Plugin
 */
add_action('xoo_wsc_body_end', 'la_xoo_wsc_body_end');
function la_xoo_wsc_body_end() {
	?>
	<style>
        .access-content,
		.access-content * {
            font-family: 'Open Sans';
            color: #fff;
		}
        .access-content {
            background-color: #282830;
            padding: 15px 10px 20px;
        }
        .access-content div {
            display: block;
            text-align: center;
        }
        .access-content h3 {
            font-size: 19px;
			font-weight: 700;
            margin: 0;
            text-align: center;
        }
        .access-content .cart {
            text-align: center;
        }
        #add-access-sidecart-button {
            border-radius: 30px;
            border: 2px solid #B91948;
            background-color: #fff;
            color: #B91948;
            display: inline-block;
            font-size: 16px;
            margin: 30px 0;
            padding: 15px 20px;
            text-decoration: none;
            transition: 0.3s ease-in-out 0s;
        }
        #add-access-sidecart-button:hover {
            background-color: #B91948;
            border: 2px solid #fff;
			color: #fff;
            font-weight: 700;
        }
        #access-content-text {
            font-size: 16px;
        } 
    </style>

<?php

	// $access_product_id 	= 380011; 
	$access_product_id 	= 380015; 

	if( 0 >= matched_cart_items( $access_product_id ) ) 
	{
		
		$access_title 			= "Upgrade to get Lifetime ACCESS to ALL COURSES for only £149.00";
		$access_product_url 	= "/course/lifetime-membership";
		$access_content_text 	= "Lifetime Membership to All Courses. Certain courses are not included. Can't be used in conjunction with any other offer.";
		
?>

	<div class="access-content">
		<h3><?php echo $access_title; ?></h3>
		<form class="cart" action="<?php echo get_bloginfo( 'url' ) . $access_product_url; ?>" method="post" enctype="multipart/form-data" data-uw-styling-context="true">
			<input type="hidden" name="quantity" value="1">
			<button type="submit" class="single_add_to_cart_button button alt" id="add-access-sidecart-button" name="add-to-cart" value="<?php echo $access_product_id; ?>">ADD OFFER TO CART</button>
		</form>
		<div id="access-content-text"><?php echo $access_content_text; ?></div> 
	</div>
	<?php
	}
}

/**
 * Check the products are present in the Cart
 */
function matched_cart_items( $search_products ) {
    $count = 0; // Initializing

    if ( ! WC()->cart->is_empty() ) {
        // Loop though cart items
        foreach(WC()->cart->get_cart() as $cart_item ) {
            // Handling also variable products and their products variations
            $cart_item_ids = array($cart_item['product_id'], $cart_item['variation_id']);

            // Handle a simple product Id (int or string) or an array of product Ids 
            if ( ( is_array($search_products) && array_intersect($search_products, cart_item_ids) ) || ( !is_array($search_products) && in_array($search_products, $cart_item_ids) ) ) 
			{
                $count++; // incrementing items count
			}
        }
    }
    return $count; // returning matched items count 
}


/**
 * ================================================
 * Carousel Reviews Section
 * ================================================
 */
add_shortcode( 'la-reviews-carousel-section', 'get_la_reviews_carousel_section' );
function get_la_reviews_carousel_section( $atts ) {
    ob_start();
	$la_blog_args = shortcode_atts( array(
        'title'   => null,
        'text'    => null
	), $atts, 'la-reviews-carousel-section');   

	$reviews = get_post_meta( get_the_ID(), 'la_course_reviews', true );
	get_la_reviews_carousel_markup( $reviews );
    $get_la_reviews_carousel_section = ob_get_clean();
    
	return $get_la_reviews_carousel_section;
}


/**
 * =======================================================================
 * Display a switch field at Cart Page 
 * =======================================================================
 */

function get_la_reviews_carousel_markup( $reviews ){
?>
<script src="https://widget.reviews.io/carousel-inline-iframeless/dist.js?_t=2024020715"></script>
<link rel="stylesheet" href="https://assets.reviews.io/css/widgets/carousel-widget.css?_t=2024020715">
<link rel="stylesheet" href="https://assets.reviews.io/iconfont/reviewsio-icons/style.css?_t=2024020715">
<div id="reviewsio-carousel-widget"></div>
<script>

new carouselInlineWidget('reviewsio-carousel-widget',{
      /*Your REVIEWS.io account ID:*/
      store: 'lead-academy-org',
      sku: '<?=get_the_ID()?>',
      lang: 'en',
      carousel_type: 'default',
      styles_carousel: 'CarouselWidget--sideHeader--withcards',

      /*Widget settings:*/
      options:{
        general:{
          /*What reviews should the widget display? Available options: company, product, third_party. You can choose one type or multiple separated by comma.*/
          review_type: 'company, product',
          /*Minimum number of reviews required for widget to be displayed*/
          min_reviews: '1',
          /*Maximum number of reviews to include in the carousel widget.*/
          max_reviews: '20',
          address_format: 'CITY, COUNTRY',
          /*Carousel auto-scrolling speed. 3000 = 3 seconds. If you want to disable auto-scroll, set this value to false.*/
          enable_auto_scroll: 10000,
        },
        header:{
          /*Show overall rating stars*/
          enable_overall_stars: true,
          rating_decimal_places: 2,
        },
        reviews: {
          /*Show customer name*/
          enable_customer_name: true,
          /*Show customer location*/
          enable_customer_location: false,
          /*Show "verified review" badge*/
          enable_verified_badge: true,
          /*Show "verified subscriber" badge*/
          enable_subscriber_badge: true,
          /*Show "I recommend this product" badge (Only for product reviews)*/
          enable_recommends_badge: true,
          /*Show photos attached to reviews*/
          enable_photos: false,
          /*Show videos attached to reviews*/
          enable_videos: true,
          /*Show when review was written*/
          enable_review_date: false,
          /*Hide reviews written by the same customer (This may occur when customer reviews multiple products)*/
          disable_same_customer: true,
          /*Minimum star rating*/
          min_review_percent: 4,
          /*Show 3rd party review source*/
          third_party_source: true,
          /*Hide reviews without comments (still shows if review has a photo)*/
          hide_empty_reviews: true,
          /*Show product name*/
          enable_product_name: true,
          /*Show only reviews which have specific tags (multiple semicolon separated tags allowed i.e tag1;tag2)*/
          tags: "",
          /*Show branch, only one input*/
          branch: "",
          enable_branch_name: false,
        },
        popups: {
          /*Make review items clickable (When they are clicked, a popup appears with more information about a customer and review)*/
          enable_review_popups:  true,
          /*Show "was this review helpful" buttons*/
          enable_helpful_buttons: true,
          /*Show how many times review was upvoted as helpful*/
          enable_helpful_count: true,
          /*Show share buttons*/
          enable_share_buttons: true,
        },
    },
    translations: {
      verified_customer:  "Verified Customer",
    },
    styles:{
      /*Base font size is a reference size for all text elements. When base value gets changed, all TextHeading and TexBody elements get proportionally adjusted.*/
      '--base-font-size': '16px',
      '--base-maxwidth':'100%',

      /*Logo styles:*/
      '--reviewsio-logo-style':'var(--logo-normal)',

      /*Star styles:*/
      '--common-star-color':'#F47E27',
      '--common-star-disabled-color':' rgba(0,0,0,0.25)',
      '--medium-star-size':' 22px',
      '--small-star-size':'19px', /*Modal*/
      '--x-small-star-size':'22px',
      '--x-small-star-display':'inline-flex',

      /*Header styles:*/
      '--header-order':'1',
      '--header-width':'280px',
      '--header-bg-start-color':'#FFFFFF',
      '--header-bg-end-color':'#FFFFFF',
      '--header-gradient-direction':'135deg',
      '--header-padding':'1.5em',
      '--header-border-width':'1px',
      '--header-border-color':'#DCDCDC',
      '--header-border-radius':'0px',
      '--header-shadow-size':'10px',
      '--header-shadow-color':'rgba(0, 0, 0, 0.05)',

      /*Header content styles:*/
      '--header-star-color':'#F47E27',
      '--header-disabled-star-color':'inherit',
      '--header-heading-text-color':'#000000',
      '--header-heading-font-size':'inherit',
      '--header-heading-font-weight':'inherit',
      '--header-heading-line-height':'inherit',
      '--header-heading-text-transform':'inherit',
      '--header-subheading-text-color':'#000000',
      '--header-subheading-font-size':'inherit',
      '--header-subheading-font-weight':'300',
      '--header-subheading-line-height':'inherit',
      '--header-subheading-text-transform':'inherit',

      /*Review item styles:*/
      '--item-maximum-columns':'5',/*Must be 3 or larger*/
      '--item-background-start-color':'#ffffff',
      '--item-background-end-color':'#ffffff',
      '--item-gradient-direction':'135deg',
      '--item-padding':'1.5em',
      '--item-border-width':'0px',
      '--item-border-color':'rgba(0,0,0,0.1)',
      '--item-border-radius':'0px',
      '--item-shadow-size':'10px',
      '--item-shadow-color':'rgba(0,0,0,0.05)',

      /*Heading styles:*/
      '--heading-text-color':' #0E1311',
      '--heading-text-font-weight':' 600',
      '--heading-text-font-family':' inherit',
      '--heading-text-line-height':' 1.4',
      '--heading-text-letter-spacing':'0',
      '--heading-text-transform':'none',

      /*Body text styles:*/
      '--body-text-color':' #0E1311',
      '--body-text-font-weight':'400',
      '--body-text-font-family':' inherit',
      '--body-text-line-height':' 1.4',
      '--body-text-letter-spacing':'0',
      '--body-text-transform':'none',

      /*Scroll button styles:*/
      '--scroll-button-icon-color':'#0E1311',
      '--scroll-button-icon-size':'24px',
      '--scroll-button-bg-color':'transparent',

      '--scroll-button-border-width':'0px',
      '--scroll-button-border-color':'rgba(0,0,0,0.1)',

      '--scroll-button-border-radius':'60px',
      '--scroll-button-shadow-size':'0px',
      '--scroll-button-shadow-color':'rgba(0,0,0,0.1)',
      '--scroll-button-horizontal-position':'3px',
      '--scroll-button-vertical-position':'0px',

      /*Badge styles:*/
      '--badge-icon-color':'#00A673',
      '--badge-icon-font-size':'15px',
      '--badge-text-color':'#0E1311',
      '--badge-text-font-size':'inherit',
      '--badge-text-letter-spacing':'inherit',
      '--badge-text-transform':'inherit',

      /*Author styles:*/
      '--author-font-size':'16px',
      '--author-font-weight':'inherit',
      '--author-text-transform':'inherit',

      /*Product photo or review photo styles:*/
      '--photo-video-thumbnail-size':'60px',
      '--photo-video-thumbnail-border-radius':'0px',

      /*Popup styles:*/
      '--popup-backdrop-color':'rgba(0,0,0,0.75)',
      '--popup-color':'#ffffff',
      '--popup-star-color':'inherit',
      '--popup-disabled-star-color':'inherit',
      '--popup-heading-text-color':'inherit',
      '--popup-body-text-color':'inherit',
      '--popup-badge-icon-color':'inherit',
      '--popup-badge-icon-font-size':'19px',
      '--popup-badge-text-color':'inherit',
      '--popup-badge-text-font-size':'14px',
      '--popup-border-width':'0px',
      '--popup-border-color':'rgba(0,0,0,0.1)',
      '--popup-border-radius':'0px',
      '--popup-shadow-size':'0px',
      '--popup-shadow-color':'rgba(0,0,0,0.1)',
      '--popup-icon-color':'#0E1311',

      /*Tooltip styles:*/
      '--tooltip-bg-color':'#0E1311',
      '--tooltip-text-color':'#ffffff',
    },
});

</script>
<?php
}


add_action('wp_ajax_myajax_add_product_to_cart', 'myajax_callback_add_product_to_cart');
add_action('wp_ajax_nopriv_myajax_add_product_to_cart', 'myajax_callback_add_product_to_cart');
function myajax_callback_add_product_to_cart() 
{   
	// Grab POSTed data, typecast as INT.
	$product_id = (int) $_POST['product_id'];
	$quantity = (int) $_POST['quantity'];
	$var_id = isset($_POST['var_id']) ? (int) $_POST['var_id'] : '';
  
	if ($quantity) {
		if ($var_id != '') {
			WC()->cart->add_to_cart( $product_id, $quantity, $var_id);
		} else {
			WC()->cart->add_to_cart( $product_id, $quantity);
		}
	}
	else {
		global $woocommerce;
		foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) {
			if ($cart_item['product_id'] == $product_id) {
				$woocommerce->cart->remove_cart_item($cart_item_key);
			}
		}
	}  
	exit();
}

// if ( current_user_can('manage_options') ) {
	add_action('woocommerce_after_cart_table', function(){
		echo do_shortcode("[la_custom_switch_cart_field]");
	});
// }

// Remove Country field on Checkout page
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); 
// add_action( 'woocommerce_checkout_after_customer_details', 'woocommerce_checkout_coupon_form', 10 ); 
// add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form' );
add_action( 'woocommerce_review_order_after_cart_contents', 'woocommerce_checkout_coupon_form_custom' );
function woocommerce_checkout_coupon_form_custom() {
    echo '<tr class="coupon-form"><td colspan="2">';
    
    wc_get_template(
        'checkout/form-coupon.php',
        array(
            'checkout' => WC()->checkout(),
        )
    );
    echo '</tr></td>';
}


// Remove Country field on Checkout page
add_filter('woocommerce_checkout_fields','la_remove_optional_country_field_on_checkout');
function la_remove_optional_country_field_on_checkout($fields){
	unset($fields['billing']['billing_state']);
	// unset($fields['order']['order_comments']);
	// unset($fields['order']['order_comments']);
	
	// echo '<pre>';
	// print_r($fields);
	// echo '</pre>';
	// return 'Removed';
	return $fields;
}

/* Billing Profession Start */
add_filter('woocommerce_checkout_fields', 'la_add_profession_field', 8);
function la_add_profession_field($fields){
	$fields['billing']['la_profession_field'] = array(
		'label' => 'Current Profession',
		'required' => true,
		'priority' => 26,
		'type' => 'text',
	);
	return $fields;
}
/* Billing Profession End */

add_filter('woocommerce_checkout_fields', 'la_add_title_field', 8);
function la_add_title_field( $fields ) {
	$fields['billing']['la_title_field'] = array(
		'label' => 'Select Title',
		'required' => true,
		'priority' => 9,
		'type' => 'select',
		'options' => [
			'Mr' 	=> 'Mr',
			'Mrs' 	=> 'Mrs',
			'Miss' 	=> 'Miss',
			'Ms' 	=> 'Ms',
			'Mx' 	=> 'Mx',
			'Dr' 	=> 'Dr'
		]
	);
	return $fields;
}

/** * Update the order meta with field value */
add_action( 'woocommerce_checkout_update_order_meta', 'la_title_field_update_order_meta' );
function la_title_field_update_order_meta( $order_id ) {
	if ( ! empty( $_POST['la_title_field'] ) ) {
		update_post_meta( $order_id, 'la_title_field', sanitize_text_field( $_POST['la_title_field'] ) );
		update_post_meta( $order_id, 'billing_birth_date', sanitize_text_field( $_POST['billing_birth_date'] ) );
		update_post_meta( $order_id, 'la_profession_field', sanitize_text_field( $_POST['la_profession_field'] ) );
	}
	// Get value from Session
    $fs_values = WC()->session->get('fs-course-datas');
	$event_day_time = $fs_values['event_day_time'];

	update_post_meta( $order_id, 'la_course_date_time', $event_day_time );
}

// Display Meta field on order page
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 1, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
	$order_title_meta = get_post_meta( $order->get_id(), 'la_title_field', true );
	$billing_birth_date = get_post_meta( $order->get_id(), 'billing_birth_date', true );
	$la_profession_field = get_post_meta( $order->get_id(), 'la_profession_field', true );
	$la_course_date_time = get_post_meta( $order->get_id(), 'la_course_date_time', true );
	if ( $order_title_meta ) {
		echo '<p><strong>'.__('Title').':</strong> ' . $order_title_meta . '</p>';
	}
	if ( $billing_birth_date ) {
		echo '<p><strong>'.__('Date of Birth').':</strong> ' . $billing_birth_date . '</p>';
	}
	if ( $la_profession_field ) {
		echo '<p><strong>'.__('Current Profession').':</strong> ' . $la_profession_field . '</p>';
	}
	if ( $la_course_date_time ) {
		echo '<p><strong>'.__('Course Date & Time').':</strong> ' . $la_course_date_time['date'] . ' at ' .  $la_course_date_time['time'] . '</p>';
	}
}

//Change the Billing Address checkout label
function wc_billing_field_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Billing details' :
		$translated_text = 'Billing Information';
		break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );

// Removing Additional Info section from Checkout page
add_filter('woocommerce_enable_order_notes_field', '__return_false');


/* Code for adding Custom HTML on Checkout Page */
// Display a custom checkout field
// add_action( 'woocommerce_review_order_before_submit', 'custom_checkbox_checkout_field', 8 );
// add_action( 'woocommerce_checkout_order_review', 'custom_checkbox_checkout_field' );
function custom_checkbox_checkout_field() {
	// Lifetime Access on Checkout
	if ( la_matched_cart_items_belongs_to_specified_cats() ) {
		?>
		<div class="la-checkout-lifetime-access-offer">
			<!-- <h4>You Just Unlocked a Deal! <img src="/wp-content/uploads/2022/12/fire-icon.gif"></h4>	 -->
			<div class="cart-options-item">
				<label class="cart-options-label">
					<input type="checkbox" value="382795" data-course-id="382795" class="checkout-lifetime-access-course-offer" <?php if(matched_cart_items('382795')) echo 'checked'; ?>>
					<div class="cart-options-title">
						<strong>Lifetime Course Access £4.99 (75% off)</strong>
					</div>
				</label>
			</div>
		</div>
		<?php
	} 

    // $value = WC()->session->get('add_a_product');
?>
<div class="la-checkout-special-offer d-none">
    <!-- <h4>Deal Of The Month</h4>	 -->
    <!-- <h4>Deal Of The Day <img src="/wp-content/uploads/2022/12/fire-icon.gif"></h4>	 -->
	<div class="cart-options-item">
		<label class="cart-options-label">
			<input type="checkbox" value="49" class="cart-option-input">
			<div class="cart-options-title">
				<strong>Lifetime Membership For Only £149</strong>
				<!-- <span class="u-regular">+299</span> -->
			</div>
			<!-- <div class="cart-options__desc">High Quality Study Materials | CPD Certified Courses | Unlimited Access | Learn New Skills On Your Schedule</div> -->
			<div class="cart-options__desc">Lifetime Access | Get 1000+ CPD Accredited Courses | Free Student ID Card | 24/7 Customer Support | Tutor Support <a href="/subscription" target="_blank">Learn More</a></div>
			
<!-- Get Free Access For 2 Family Members

Free CPD Accredited PDF Certificate for 10 Courses
Free CPD Accredited Hardcopy Certificate for 4 Courses
Free Course Completion PDF Certificate -->



		</label>
	</div>
</div>
<?php
}

// The jQuery Ajax request
add_action( 'wp_footer', 'checkout_custom_jquery_script' );
function checkout_custom_jquery_script() {
    // Only checkout page
    if( is_checkout() && ! is_wc_endpoint_url() ):

    // Remove custom WC session variables on load
    if( WC()->session->get('add_a_product') ){
        WC()->session->__unset('add_a_product');
    }
    if( WC()->session->get('product_added_key') ){
        WC()->session->__unset('product_added_key');
    }
    // jQuery Ajax code
    ?>
    <script type="text/javascript">
    jQuery( function($){
        if (typeof wc_checkout_params === 'undefined')
            return false;

        $('.cart-options-item label.cart-options-label input.cart-option-input').on( 'change', function(){
            var value = $(this).prop('checked') === true ? 'yes' : 'no';

            $.ajax({
                type: 'POST',
                url: wc_checkout_params.ajax_url,
                data: {
                    'action': 'add_a_product',
                    'add_a_product': value,
                },
                success: function (result) {
                    $('body').trigger('update_checkout');
                    console.log(result);
                }
            });
        });
    });
    </script>
    <?php
    endif;
}

// The Wordpress Ajax PHP receiver
add_action( 'wp_ajax_add_a_product', 'checkout_ajax_add_a_product' );
add_action( 'wp_ajax_nopriv_add_a_product', 'checkout_ajax_add_a_product' );
function checkout_ajax_add_a_product() {
    if ( isset($_POST['add_a_product']) ){
        WC()->session->set('add_a_product', esc_attr($_POST['add_a_product']));
        echo $_POST['add_a_product'];
    }
    die();
}

// Add remove free product
add_action( 'woocommerce_before_calculate_totals', 'adding_removing_specific_product' );
function adding_removing_specific_product( $cart ) {
    if (is_admin() && !defined('DOING_AJAX'))
        return;

    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
        return;

		
	// $special_offer_course_id = 365013;
	$special_offer_course_id = 365275;

    if( WC()->session->get('add_a_product') == 'yes' && ! WC()->session->get('product_added_key') )
    {
        $cart_item_key = $cart->add_to_cart( $special_offer_course_id );
        WC()->session->set('product_added_key', $cart_item_key);
    }
    elseif( WC()->session->get('add_a_product') == 'no' && WC()->session->get('product_added_key') )
    {
        $cart_item_key = WC()->session->get('product_added_key');
        $cart->remove_cart_item( $cart_item_key );
        WC()->session->__unset('product_added_key');
    }
}

// Adding images after place order button
// add_action( 'woocommerce_review_order_after_submit', 'add_images_after_checkout_button' );
add_action( 'woocommerce_checkout_order_review', 'add_images_after_checkout_button' );

function add_images_after_checkout_button() {
?>
<div id="la-payment-images-after-order-button">
	<!-- <img src="<?php echo get_site_url()?>/wp-content/uploads/2022/10/lead-payment-logos.png">
	<img src="<?php echo get_site_url()?>/wp-content/uploads/2022/10/LA-footer-promise.png"> -->
</div>
<?php
}

// API Key
// PCW2H-BFQ2Z-DCDDS-8BMZE

// Change the priority of Postcode
add_filter( 'woocommerce_default_address_fields' , 'customize_postcode_fields' );
function customize_postcode_fields( $adresses_fields ) {
	$adresses_fields['postcode']['priority'] = 41;
	return $adresses_fields;
}

// Add fields after the postcode
add_filter('woocommerce_checkout_fields', 'la_add_search_btn_field');
function la_add_search_btn_field( $fields ) {
	$fields['billing']['btn_search_postcode'] = array(
		'label' => 'Search',
		'priority' => 42,
		'type' => 'button'
	);
	return $fields;
}

// After checkout form
add_action('woocommerce_after_checkout_form', 'la_adding_postcode_auto_fillup_script');
function la_adding_postcode_auto_fillup_script(){
	?>
	<script>
		// Adding the Search Button
		var whereToAddSearchBtn = document.getElementById("billing_postcode").parentNode.parentNode;
		var button = document.createElement('span');
		var text = document.createTextNode("Search");
		button.id = 'btn_search_postcode';
		button.appendChild(text);
		whereToAddSearchBtn.appendChild(button);

		var searchButton = document.getElementById('btn_search_postcode');
		// searchButton.style.display = 'none';
		
		// Creating Address Selection Container Element
		var addressSelectionContainer = document.createElement('div');
		addressSelectionContainer.id = 'address_selection_container';
		searchButton.parentNode.appendChild(addressSelectionContainer);
		
		// Creating No Result Message Container Element
		var noResultMessageContainer = document.createElement('div');
		noResultMessageContainer.id = 'no_result_message';
		var text = document.createTextNode("Address not found, please enter manually.");
		noResultMessageContainer.appendChild(text);
		searchButton.parentNode.appendChild(noResultMessageContainer);

		// Prevent loading page
		searchButton.addEventListener('click', function(e){
			e.stopPropagation();
			console.log('search button clicked');
			// return false;
		});

		// Initializing the Post Coder Address Function
        new PostcoderAddress({
            // apikey: 'PCW45-12345-12345-1234X', 
            // apikey: 'PCW2H-BFQ2Z-DCDDS-8BMZE', 
            apikey: 'PCWP7-STA3L-8X8CK-ZB7HB', 
            searchterm: '#billing_postcode', // query selector of the searchterm input field
            addressselectioncontainer: '#address_selection_container', // container for the address selection drop down
            noresultmessage: '#no_result_message',
            country: '#billing_country',  // Country select list; leave blank if not using a country select list 
            countrycode: '', // Hard code if not using a country select list; leave blank otherwise 
            searchbutton: '#btn_search_postcode', 
            organisation: '',  // Leave blank if form does not have a separate organisation field 
            addressline1: '#billing_address_1', 
            addressline2: '',  // Leave blank if form does not have an addressline2 
            addressline3: '',  // Leave blank if form does not have an addressline3 
            //addressline4: '',  // Leave blank if form does not have an addressline4
            county: '', // Leave blank if form does not have a county
            posttown: '#billing_city', 
            postcode: '#billing_postcode' 
        })

    </script>
	<?php
}

// make sure the priority value is correct, running after the default priority.
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_after_order_notes', 'woocommerce_checkout_payment', 20 );

function woocommerce_checkout_adding_payment_title() {

	// if ( la_is_cart_items_belongs_to_specified_cats( [ 331 ] ) && 4 == get_current_user_id() ) {
	// 	echo '<h2>FS Courses in Cart</h2>';
	// }

	// Black Friday Deal Contents
	?>
	<div class="la-black-friday-deal-checkout">
		<div class="la-cart-special-offers-overlay-layer">
			<p>We're adding the Deal to the cart..</p>
		</div>

		<!-- <h3>You Just Unlocked the New Year Deal! <img src="/wp-content/uploads/2022/12/fire-icon.gif"></h3> -->
		<div class="cart-options-item">
			<label class="cart-options-label">
				<div class="la-office-2021-purchase-wrap">
					<strong>
						MS Office 2021 Lifetime Subscription <br>(Windows/Mac) - £48 (75% off)
					</strong>

					<div class="la-office-2021-button-wrap" data-course-id="387181">
						<a href="#" data-course-var-id="387182" class="purchase-office-2021">Add to Cart</a>
					</div>
				</div>
				<hr>
				<div class="cart-options-title">
					<strong>MS Office 2019 Lifetime Subscription (Windows/Mac) - £26 (75% off)</strong>
					<a href="#" id="la-black-friday-deal-checkout-btn" data-course-id="384735">Add to Cart</a>
				</div>
			</label>
		</div>
		<div class="cart-vanue-time-wrap">
			<ul>
				<li>This product sells on <b>£344.88 on Microsoft Website</b> and it's available for £26 for only this time.</li>
				<li>This offer is NOT available at ANY other time or place.</li>
			</ul>
		</div>
	</div>
	<?php
	// Payment options - Checkout
	echo '<h3 class="la-checkout-addtion-payment-title">Payment Options</h3>';

	// Return true while the provided product variations matched once
	function la_is_this_product_vars_in_cart( $product_id ) {
		$specific_var_ids = la_get_variable_ids_by_product_id( $product_id );
		if ( count( $specific_var_ids ) > 0 ) {
			foreach( $specific_var_ids['variation_ids'] as $single_var_id ) {
				if( matched_cart_items( $single_var_id ) > 0 ) {
					return true;
				}
			}
		}
	}
	// Return true while the provided product variations matched once
	function la_is_this_product_title_has_month() {
		// $variable_title = [];
		foreach ( WC()->cart->get_cart() as $cart_item ) {
			$variation_id 		= $cart_item['variation_id'];
			$variation 			= wc_get_product($variation_id);
			$variable_title 	= wc_get_formatted_variation( $variation, true, false, false );
			if ( strpos( trim($variable_title), 'Monthly' ) !== false ) {
				return true;
			}
		}
	}

	$cart_order_titles = array(); // Initializing
    // Loop through cart items 
    foreach ( WC()->cart->get_cart() as $cart_item ) {
        $cart_order_titles[] = $cart_item['data']->get_attribute( 'boards' ) ? $cart_item['data']->get_attribute( 'boards' ) : 'N/A';
	}

	// 372121			Higher - GCSE Maths Online Course Only Monthly
	// 372102			Higher - GCSE Maths Online Course + GCSE Maths Exam Monthly
	// 374115			Foundation - GCSE Maths Online Course Only Monthly
	// 382310			Foundation - GCSE Maths Online Course + GCSE Maths Exam Monthly

	// Check the expected variation
	if ( 
		in_array( 'Pay In 6 Months', $cart_order_titles ) 			// If course attribute matched
		|| la_is_this_product_title_has_month()						// GCSE Custom Post Type - Math
	) {
		?>
		<style>
			.woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.payment_method_stripe, .woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.payment_method_eh_paypal_express, .woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.payment_method_klarna_payments_pay_over_time, .woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.wc_payment_method.payment_method_clearpay {
				display: none;
			}
			.woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.payment_method_gocardless {
				display: block;
			}
		</style>
		<?php
	}

	// Check the expected variation
	if ( in_array( 'Pay in 12 months', $cart_order_titles ) && ( ( matched_cart_items( '376838' ) > 0 ) || ( matched_cart_items( '376839' ) > 0 ) ) ) {
		?>
		<style>
			.woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.wc_payment_method {
				display: none;
			}
			.woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.payment_method_gocardless {
				display: block;
			}
		</style>
		<?php
	}

	// Check the expected Product/variation in cart or not
	if ( 
		WC()->cart->total <= 260 // If Cart total less than or equal to 260
		// Functional Skills Maths Level 1 Online Course with Exam
		|| (matched_cart_items( '363596' ) > 0) // NCFE - Official Remote Exam Only
		|| (matched_cart_items( '363590') > 0) // Edexcel - Official Exam Only
		// Functional Skills English Level 1 Online Course with Exam
		|| (matched_cart_items( '363544' ) > 0) // NCFE - Official Remote Exam Only
		|| (matched_cart_items( '363538') > 0) // Edexcel - Official Exam Only
		// Functional Skills Maths Level 2 Online Course and Exam
		|| (matched_cart_items( '363607' ) > 0) // NCFE - Official Exam Only
		|| (matched_cart_items( '363602') > 0) // Edexcel - Official Exam Only
		// Functional Skills English Level 2 Online Course and Exam
		|| (matched_cart_items( '363565' ) > 0) // NCFE - Official Exam Only
		|| (matched_cart_items( '363560') > 0) // Edexcel - Official Exam Only
		// Functional Skills Maths and English Level 2 Course | GCSE Equivalent
		|| (matched_cart_items( '364470' ) > 0) // NCFE - Official Remote Exam Only
		|| (matched_cart_items( '364472' ) > 0) // NCFE - Official Paper Based Exam..
		|| (matched_cart_items( '364475') > 0) // Edexcel - Official Exam Only
		// Certificate in British Sign Language Level 2 (RQF) - Official Exam Included
		|| (matched_cart_items( '364495') > 0) // Level 2 Award in BSL via Live Zoom Class + Official Exam - Variant
		// Phlebotomy Training Course
		|| la_is_this_product_vars_in_cart( '366854' ) == 1
		// Phlebotomy Training Swiindon
		|| la_is_this_product_vars_in_cart( '377824' ) == 1
		// Phlebotomy Training Bristol
		|| la_is_this_product_vars_in_cart( '376420' ) == 1
		// Phlebotomy Training Birmingham
		|| la_is_this_product_vars_in_cart( '376417' ) == 1
		// Advanced / Competency Phlebotomy Training
		|| la_is_this_product_vars_in_cart( '368595' ) == 1
		// Venepuncture and Cannulation Training - CPD Approved Training
		|| la_is_this_product_vars_in_cart( '371100' ) == 1
		// Catheterisation Training
		|| la_is_this_product_vars_in_cart( '370863' ) == 1
		// GCSE Courses
		|| (matched_cart_items( '382378' ) > 0) // GCSE Biology Online Course and Exam | AQA
		|| (matched_cart_items( '369150' ) > 0) // GCSE Chemistry Course and Exam | AQA
		|| (matched_cart_items( '379432' ) > 0) // GCSE Physics Online Course and Exam
		|| (matched_cart_items( '372103' ) > 0) // GCSE Maths Online Course and Exam | Edexcel
		|| (matched_cart_items( '372137' ) > 0) // GCSE English Language Course and Exam | AQA
		// Other Products
		|| (matched_cart_items( '386854' ) > 0) // GCSE English Language Course and Exam | AQA
		|| (matched_cart_items( '386245' ) > 0) // GCSE English Language Course and Exam | AQA
		|| (matched_cart_items( '387969' ) > 0) // Phlebotomy + Advanced Phlebotomy + Cannulation Training Payment 
		|| (matched_cart_items( '388301' ) > 0) // Phlebotomy + Advanced Phlebotomy + Cannulation Training Payment 
		|| (matched_cart_items( '389578' ) > 0) // Functional Skills English Level 2 Remaining Payment 
	) {
		?>
		<style>
			.woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.wc_payment_method.payment_method_partially {
				display: none;
			}
		</style>
		<?php
	}


	// Check the expected variation
	// if ( 
	// 	( matched_cart_items( '376838' ) > 0 ) // NCFE - Official Exam Only
	// 	|| ( matched_cart_items( '376839' ) > 0 ) // NCFE - Official Exam Only
	// ) {
	// }

	
	// Hiding all payment methods without the GoCardless only for these variants
	if ( 
			( matched_cart_items( '386898' ) > 0 )		// Level 3 Award in Education and Training
		|| 	( matched_cart_items( '376838' ) > 0 )		// Level 4 Certificate in Education and Training
		|| 	( matched_cart_items( '376839' ) > 0 )		// Level 5 Diploma in Education and Training
		// GCSE Courses
		|| (matched_cart_items( '368905' ) > 0) // GCSE Biology Online Course and Exam | AQA
		|| (matched_cart_items( '368929' ) > 0) // GCSE Chemistry Course and Exam | AQA
		|| (matched_cart_items( '379419' ) > 0) // GCSE Physics Online Course and Exam
		|| (matched_cart_items( '368926' ) > 0) // GCSE Maths Online Course and Exam | Edexcel
		|| (matched_cart_items( '372130' ) > 0) // GCSE English Language Course and Exam | AQA
	 ) {
		?>
		<style>
			.woocommerce-page.woocommerce-checkout #payment ul.payment_methods li:not(.payment_method_gocardless) {
				display: none;
			}
			.woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.payment_method_gocardless {
				display: block;
			}
		</style>
		<?php
	}

	// Hiding all payment methods without the Clearpay and Klarna only for these variants
	if ( 
		// Level 5 Diploma in Education and Training Payment
		matched_cart_items( '387963' ) > 0 ||

		// Remaining Payment of Phlebotomy Training Birmingham 
		matched_cart_items( '389342' ) > 0 ||

		// Remaining Payment for Advanced Phlebotomy 
		matched_cart_items( '389285' ) > 0 ||

		// Phlebotomy Training - London (26th February- 2 learners) 
		matched_cart_items( '389425' ) > 0
	 ) {
		?>
		<style>
			.woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.wc_payment_method.payment_method_stripe,
			.woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.wc_payment_method.payment_method_partially,
			.woocommerce-page.woocommerce-checkout #payment ul.payment_methods li.wc_payment_method.payment_method_eh_paypal_express
			{
				display: none;
			}
		</style>
		<?php
	}
}
add_action( 'woocommerce_after_order_notes', 'woocommerce_checkout_adding_payment_title', 19 );

// Disabling coupon for variables
add_filter( 'woocommerce_coupon_is_valid', 'custom_coupon_validity', 10, 3 );
function custom_coupon_validity( $is_valid, $coupon, $discount ){
	// echo '<pre>';
	// print_r($coupon->get_data()['id']);
	// print_r($discount);
	// echo '</pre>';

	$is_global_coupon = get_field('global-coupon', $coupon->get_data()['id']);
	if ( $is_global_coupon ) {
		return $is_valid;
	}
    $menu_orders = array(); // Initializing
    // Loop through cart items 
    foreach ( WC()->cart->get_cart() as $cart_item ) {
        $product = $cart_item['variation_id'] > 0 ? wc_get_product($cart_item['product_id']) : $cart_item['data'];

		if( $product->is_type('variable') ) {
			$menu_orders[] = $cart_item['data']->get_data()['menu_order'];
			// Loop through product attributes
			foreach( $menu_orders as $menu_order ) {
				if( $menu_order > 1 ) {
					$is_valid = false; // attribute found, coupons are not valid
					function coupon_error_message_change($err, $err_code, $WC_Coupon) {
						switch ( $err_code ) {				
							case $WC_Coupon::E_WC_COUPON_INVALID_FILTERED:
							$err = 'Sorry! This Coupon isn\'t applicable here.';
						}
						return $err;
					}
					
					add_filter( 'woocommerce_coupon_error','coupon_error_message_change',10,3 );
					break; // Stop and exit from the loop
				}
			}
        }
    }
    return $is_valid;
}

// Adding a custom checkout date field
add_filter( 'woocommerce_billing_fields', 'add_birth_date_billing_field', 20, 1 );
function add_birth_date_billing_field($billing_fields) {

    $billing_fields['billing_birth_date'] = array(
        'type'        => 'date',
        'label'       => __('Date Of Birth [Needed For Certification/Registration]'),
        'class'       => array('form-row-wide'),
        'priority'    => 25,
        'required'    => true,
        'clear'       => true,
    );
    return $billing_fields;
}


//Hide side cart icon specified category courses
function hide_side_cart_icon_on_specific_category_products() {
    // Define the category IDs where you want to hide the side cart icon.
    $category_ids_to_hide_icon = array(331, 392, 355, 359, 17); // Replace with your category IDs.

    // Get the current product page ID.
    $current_product_id = get_the_ID();

    // Check if the current product belongs to any of the specified categories.
    if (has_term($category_ids_to_hide_icon, 'product_cat', $current_product_id)) {
        echo '<style>.xoo-wsc-modal { display: none !important; }</style>';
    }
}

add_action('wp_head', 'hide_side_cart_icon_on_specific_category_products');


/**
 * Automatically add an CPD & IPHM Accredited (Duel Accreditation) PDF Certificate + Transcript product to the cart when a product from the "massage therapy" category is added.
 */
function add_accredited_product_to_cart() {
    // Check if we are on the cart or checkout page.
    if ( is_cart() || is_checkout() ) {
        // Replace with the ID of your accredited product.
        $accredited_product_id = '382443';

        // Replace with the ID of your "massage therapy" category.
        $massage_category_id = '295';

        $found_category_product = false;

        // Check for products in the cart.
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            // Check if a product from the "massage therapy" category is in the cart.
            if ( has_term( $massage_category_id, 'product_cat', $cart_item['product_id'] ) ) {
                $found_category_product = true;
                break;
            }
        }

        // Check if the accredited product is not already in the cart and massage therapy product is found.
        if ( $found_category_product && !WC()->cart->find_product_in_cart( $accredited_product_id ) ) {
            // Check if the session variable is not set.
            if ( !WC()->session->get( 'accredited_product_added' ) ) {
                WC()->cart->add_to_cart( $accredited_product_id );
                WC()->session->set( 'accredited_product_added', true );
            }
        } elseif (!$found_category_product) {
            // Reset the session variable if the massage therapy product is removed from the cart.
            WC()->session->__unset( 'accredited_product_added' );
        }
    }
}
// add_action( 'wp', 'add_accredited_product_to_cart' );

/**
 * ===============================================================
 * Hide 👉 CPD UK PDF Certificate for Massage Therapy Category
 * ===============================================================
 */

 function hide_section_based_on_category_massage_therapy() {

 

    if (is_product() && has_term('massage-therapy', 'product_cat')) {

        echo '<style type="text/css">.single-product #course-price .mt-3 { display: none; }</style>';

    }

}

// add_action('wp_head', 'hide_section_based_on_category_massage_therapy');


// Redirect to cart while cancelled the payment
add_action('woocommerce_cancelled_order','lenura_redirect_to_home');
 function lenura_redirect_to_home() {
    wp_redirect(home_url( '/cart/' )); // REDIRECT PATH
 }