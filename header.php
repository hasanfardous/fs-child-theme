<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<?php
// if ( is_shop() ) {
    ?>
    <script>
        document.title = 'All Courses - Lead Academy';
    </script>
    <?php
    // }
?>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php //astra_body_top(); ?>

<header id="header">
    <div class="container">
        <div id="logo" class="display-inline-block">
            <a href="<?php echo get_bloginfo( 'url' ); ?>" class="display-inline-block">
                <img src="<?php echo get_site_url()?>/wp-content/uploads/2024/03/functional-skiil-logo.png" alt="function-skill-logo" width="156" height="57"> 
            </a>
        </div>

        <div class="display-inline-block hide-tab hide-mobile la-hot-deals-wrap">
            <a href="#" class="hot-deal-btn display-inline-block">Book GCSE Courses <i class="fa fa-chevron-down"></i></a>
            
            <div class="la-hot-deals-submenu">
                <!-- <a href="/free-courses">Free Courses</a> -->
                <a href="/bundle-offer">Bundle Offer</a>
            <a href="/order-gift-card">Order Gift Card</a>
            </div>
        </div>

        <div class="display-inline-block hide-tab hide-mobile la-hot-deals-wrap">
            <a href="#" class="hot-deal-btn display-inline-block">GCSE Resits <i class="fa fa-chevron-down"></i></a>
            
            <div class="la-hot-deals-submenu">
                <!-- <a href="/free-courses">Free Courses</a> -->
                <a href="/bundle-offer">Bundle Offer</a>
            <a href="/order-gift-card">Order Gift Card</a>
            </div>
        </div>

        <div class="display-inline-block hide-tab hide-mobile la-hot-deals-wrap">
            <a href="#" class="hot-deal-btn display-inline-block">Funcational Skills <i class="fa fa-chevron-down"></i></a>
            
            <div class="la-hot-deals-submenu">
                <!-- <a href="/free-courses">Free Courses</a> -->
                <a href="/bundle-offer">Bundle Offer</a>
            <a href="/order-gift-card">Order Gift Card</a>
            </div>
        </div>

        <div class="display-inline-block hide-tab hide-mobile">
            <a href="#" class="hot-deal-btn display-inline-block">Book a Tutor</a>
        </div>

        <div class="display-inline-block la-ajax-src hide-tab hide-mobile">
            <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
        </div>

        <div class="display-inline-flex hide-tab hide-mobile la-loggedin-user-icon">
            <?php if ( is_user_logged_in() ) { ?>
                <a href="#" class="loggedin-user-btn display-inline-block"><i class="fa fa-user"></i></a>
                <div class="loggedin-user-submenu">
                    <a href="#">Learning Portal</a>
                    <a href="/my-account">Billing Account</a>
                    <a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" class="header-user-link display-inline-block">Logout</a>
                </div>
            <?php } else { ?>
                <a href="#" class="header-user-link display-inline-block">
                    Login
                </a>
            <?php } ?>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-header-links">
            <div class="right-elements">
                <a href="tel:0000000" class="top-phone-icon">
                    <i class="fa fa-phone"></i>
                    <span class="d-none">Call us</span>
                </a>
                <a href="#" class="top-search-icon">
                    <i class="fa fa-search"></i>
                    <span class="d-none">Search</span>
                </a>
                <a href="#" class="top-nav-bars">
                    <i class="fa fa-bars"></i>
                    <span class="d-none">Navbar</span>
                </a>
            </div>
        </div>
    </div>

    <form method="get" id="mobile-header-search" class="display-inline-block" action="<?php echo get_bloginfo( 'url' ); ?>">
        <input type="search" id="search-box" class="search-field" placeholder="Search anything ..." name="s" tabindex="-1">				
        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
    </form>

    <div id="mobile-menu-expandable">
        <?php echo do_shortcode( '[courses_menu]' ); ?>

        <div class="la-popular-course-sml-devices">
            <?php 
                dynamic_sidebar( 'popular-courses-top' );
                // dynamic_sidebar( 'sidebar-courses-top' );
            ?>
            <a href="#" class="more-categories"><strong>More Categories</strong> <i class="fa fa-angle-double-right"></i></a>
        </div>

        <a href="<?php echo get_bloginfo( 'url' ); ?>/all-courses">
            <i class="fa fa-users"></i> All Courses
        </a>

        <a href="#" class="hot-deal-btn">
            <i class="fa fa-fire"></i> Hot Deals <i class="fa fa-chevron-down"></i>
        </a>
        <div class="la-hot-deals-submenu">
            <p class="mb-0"><span class="back-to-mega-menu"><i class="fa fa-angle-double-left"></i> Back</span></p>
            <a href="/bundle-offer">Bundle Offer</a>
            <a href="/order-gift-card">Order Gift Card</a>
        </div>

        <a href="<?php echo get_site_url()?>/subscription" class="lifetime-membership">
            <i class="fa fa-shield"></i> Lifetime Membership
        </a>

        <a href="<?php echo get_site_url()?>/contact-us" class="contact-us-menu-item">
            <i class="fa fa-headphones"></i> Contact Us
        </a>
        
        <a href="<?php echo wc_get_cart_url()?>">
            <i class="fa fa-shopping-cart"></i> My Basket
        </a>

        <?php if ( is_user_logged_in() ) { ?>
            <a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" class="header-user-link display-inline-block">Logout</a>
        <?php } else { ?>
            <a href="#" class="header-user-link display-inline-block">
                <i class="fa fa-user"></i> Login
            </a>
        <?php } ?>
    </div>
</header>

<a
	class="skip-link screen-reader-text"
	href="#content"
	role="link"
	title="<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div
<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<?php
	// astra_header_before();

	// astra_header();

	// astra_header_after();

	// astra_content_before();
	?>
	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>
