<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

// Meta boxes
$current_product_id 		= get_the_ID();						
$watch_video_btn_title      = get_post_meta( $current_product_id, 'watch_video_btn', true);
$watch_video_url 			= get_post_meta( $current_product_id, 'watch_video_url', true);
$watch_success_video_url	= get_post_meta( $current_product_id, 'watch_success_video_url', true);
$course_info_icon_1 		= get_post_meta( $current_product_id, 'course_info_icon_1', true);
$course_info_text_1 		= get_post_meta( $current_product_id, 'course_info_text_1', true);
$course_info_icon_2 		= get_post_meta( $current_product_id, 'course_info_icon_2', true);
$course_info_text_2 		= get_post_meta( $current_product_id, 'course_info_text_2', true);
$course_info_icon_3 		= get_post_meta( $current_product_id, 'course_info_icon_3', true);
$course_info_text_3 		= get_post_meta( $current_product_id, 'course_info_text_3', true);
$course_info_icon_4 		= get_post_meta( $current_product_id, 'course_info_icon_4', true);
$course_info_text_4 		= get_post_meta( $current_product_id, 'course_info_text_4', true);
$course_info_icon_5 		= get_post_meta( $current_product_id, 'course_info_icon_5', true);
$course_info_text_5 		= get_post_meta( $current_product_id, 'course_info_text_5', true);
$course_info_icon_6 		= get_post_meta( $current_product_id, 'course_info_icon_6', true);
$course_info_text_6 		= get_post_meta( $current_product_id, 'course_info_text_6', true);
$wc_product_faqs 			= ! empty( get_post_meta( $current_product_id, 'product_faqs', true) ) ? get_post_meta( $current_product_id, 'product_faqs', true) : [];
$product_curriculums		= ! empty( get_post_meta( $current_product_id, 'product_curriculums', true) ) ? get_post_meta( $current_product_id, 'product_curriculums', true) : [];
$wc_product_accreditation	= get_post_meta( $current_product_id, 'wc_product_accreditation', true);
$wc_product_certification	= get_post_meta( $current_product_id, 'wc_product_certification', true);
$exm_board_group			= get_post_meta( $current_product_id, 'exm_board_group', true);
$board_sec_title			= get_post_meta( $current_product_id, 'board_sec_title', true);
$show_board_sec_btns		= get_post_meta( $current_product_id, 'board_sec_btns', true);
$course_regular_price 		= get_post_meta( $current_product_id, '_regular_price', true);
$course_sale_price 			= get_post_meta( $current_product_id, '_sale_price', true);
$course_reviews 			= ! empty( get_post_meta( $current_product_id, 'la_course_reviews', true) ) ? get_post_meta( $current_product_id, 'la_course_reviews', true) : [];            
$la_phleb_course_regular_price = get_post_meta( $current_product_id, 'la_phleb_course_regular_price', true);
$la_phleb_course_sell_price = get_post_meta( $current_product_id, 'la_phleb_course_sell_price', true);
$la_phleb_course_meta_group = get_post_meta( $current_product_id, 'la_phleb_course_meta_group', true);
$fs_timeslot_group = get_post_meta( $current_product_id, 'fs_timeslot_group', true);

// Dynamic Calendar Values
$fs_events_data = [];

foreach ( $fs_timeslot_group as $item ) {
	$days_of_week = array_map( function( $day ) {
		switch ( $day ) {
			case 'one': 	return '1';
			case 'two': 	return '2';
			case 'three': 	return '3';
			case 'four': 	return '4';
			case 'five': 	return '5';
			case 'six': 	return '6';
			case 'seven': 	return '7';
			// Default
			default: return '';
		}
	}, $item['fs_calendar_column']);

	$fs_events_data[] = [
		'title' 		=> $item['fs_col_price'],
		'daysOfWeek' 	=> $days_of_week,
		'timeSlots' 	=> array_values( $item['timeslot_text'] ),
	];
}
?>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
	headerToolbar: {
		start: 'prev',
		center: 'title',
		end: 'next'
	},
	selectable: true,
	select: function( info ){
		isDateSelected = true;
	}, 
	unselect: function() {
		isDateSelected = false;
    },
	showNonCurrentDates: false,
	firstDay: 1,
	timeZone: 'UTC',
	initialView: 'dayGridMonth',
	height: 460,
	events: <?php echo json_encode($fs_events_data)?>,
	eventClick: function( info ) {
		info.jsEvent.preventDefault();
		console.log(info.event.title);
	},
	dayClick: function(arg) {
		console.log( arg.dateStr );
		var clickedDateEl = document.querySelector('td[data-date="' + arg.dateStr +'"]');

		if ( clickedDateEl ) {
			clickedDateEl.classList.add('highlight');
		}
	},
	dateClick: function( info ) {
		let laTimeSlots = info.dateStr;
		let targetEl = document.getElementById('fs-single-booking-btns');
		targetEl.innerHTML = '';
		let headingEl = document.querySelector('.fs-single-booking-btns-wrap h4');
		let dateOptions = {
			weekday: 'long', 
			year: 'numeric',
			month: 'long', 
			day: 'numeric'

		};      
		var events = calendar.getEvents();
		var eventsForDate = events.filter(event => event.start.toISOString().split('T')[0] === laTimeSlots);
		let fsSelectedDateTime = info.date.toLocaleDateString( 'en-US', dateOptions ).replace(/,(\s+)/, '$1');
		headingEl.innerHTML = 'Select a time on ' + fsSelectedDateTime;
		eventsForDate.forEach(event => {
			let eventTimeSlots = event.extendedProps.timeSlots;
			eventTimeSlots.forEach( timeSlot => targetEl.innerHTML += `<span class="fs-single-booking-btn-date-time" 
				data-event-info="${timeSlot}"
				data-event-date-time="${fsSelectedDateTime}"
				>${timeSlot}</span>`
			);
		});
		// Highlight the selected item
		var previouslyClickedEl = document.querySelector('td.highlight');
		if ( previouslyClickedEl ) {
			previouslyClickedEl.classList.remove( 'highlight' );
		}
		var clickedDateEl = document.querySelector('td[data-date="' + info.dateStr +'"]');

		if ( clickedDateEl ) {
			clickedDateEl.classList.add('highlight');
		}
	}
  });
  calendar.render();
});
</script>
<?php
// Get variable product title and price by variable id
function la_get_variable_title_price_by_varid( $variation_id ) {
	$variation 		= wc_get_product($variation_id);
	$variable_title = wc_get_formatted_variation( $variation, true, false, false );
	$variable_price = $variation->get_price();
	$variable_stock = $variation->get_stock_status();
	return [
		'variable_title' => $variable_title,
		'variable_price' => $variable_price,
		'variations'	 => [$variation->get_regular_price(), $variation->get_sale_price()],
		'variable_stock' => $variable_stock
	];
}

// Get Course Cat Id array
$course_id_array = la_get_course_cat_id_by_course_id( $current_product_id );

// Check GCSE course
function la_is_gcse_courses($current_product_id) {
	$course_cat_array = la_get_course_cat_id_by_course_id( $current_product_id );
	if ( in_array( '359', $course_cat_array ) ) {
		return true;
	}
}
	
// Black Friday Banner Section
// include FS_CHILD_THEME_DIR . '/woocommerce/black-friday-banner-section.php';
	
// Top Info Contents - Big device
include FS_CHILD_THEME_DIR . '/woocommerce/big-device-contents/top-info-sections.php';

// Top Info Contents - Small device
include FS_CHILD_THEME_DIR . '/woocommerce/small-device-contents/top-info-contents.php';

// Bottom Fixed Buy Now Button - Small device
// if ( 
// 	'382548' != $current_product_id  
// 	'376417' != $current_product_id 		// Phlebotomy Training Birmingham
// ) {
	include FS_CHILD_THEME_DIR . '/woocommerce/small-device-contents/bottom-fixed-buy-now-contents.php';
// }

?>

<!-- Banner Section -->
<?php 	
	include FS_CHILD_THEME_DIR . '/woocommerce/banner-offer-contents.php';
?>

<main id="la-single-main">
	<div class="container">		
		<div class="row">
			<div id="fs-single-course-overview-wrap" class="d-flex justify-content-between">
				<div id="fs-single-course-overview" class="left w-50">
					<div class="fs-single-overview text-center">
						<img src="<?php echo FS_CHILD_THEME_DIR_URI . '/assets/imgs'?>/self-paced online learning.png" alt="Nationally Recognised">
						<h4>Nationally Recognised</h4>
						<p class="mb-4">Edexcel & NCFE Accredited</p>
					</div>
					<div class="fs-single-overview text-center">
						<img src="<?php echo FS_CHILD_THEME_DIR_URI . '/assets/imgs'?>/self-paced online learning.png" alt="Nationally Recognised">
						<h4>Nationally Recognised</h4>
						<p class="mb-4">Edexcel & NCFE Accredited</p>
					</div>
					<div class="fs-single-overview text-center">
						<img src="<?php echo FS_CHILD_THEME_DIR_URI . '/assets/imgs'?>/self-paced online learning.png" alt="Nationally Recognised">
						<h4>Nationally Recognised</h4>
						<p class="mb-4">Edexcel & NCFE Accredited</p>
					</div>
					<div class="fs-single-overview text-center">
						<img src="<?php echo FS_CHILD_THEME_DIR_URI . '/assets/imgs'?>/self-paced online learning.png" alt="Nationally Recognised">
						<h4>Nationally Recognised</h4>
						<p class="mb-4">Edexcel & NCFE Accredited</p>
					</div>
					<div class="fs-single-overview text-center">
						<img src="<?php echo FS_CHILD_THEME_DIR_URI . '/assets/imgs'?>/self-paced online learning.png" alt="Nationally Recognised">
						<h4>Nationally Recognised</h4>
						<p class="mb-4">Edexcel & NCFE Accredited</p>
					</div>
					<div class="fs-single-overview text-center">
						<img src="<?php echo FS_CHILD_THEME_DIR_URI . '/assets/imgs'?>/self-paced online learning.png" alt="Nationally Recognised">
						<h4>Nationally Recognised</h4>
						<p class="mb-4">Edexcel & NCFE Accredited</p>
					</div>
				</div>
				<div id="fs-single-course-overview" class="right w-50 ps-5">
					<h2>Functional Skills Courses</h2>
					<p>Our expert designed Functional Skills English Level 2 Course has smart learning options that provide the necessary knowledge and skills to excel in Functional Skills English.</p>

					<div id="fs-single-course-overview-inner">
						<div class="fs-single-course-overview-inner-title d-flex justify-content-between">
							<h3>From: <b>£149.00</b></h3>
							<div class="fs-course-overview-time-countdown">
								<p>Only 11 days 21 hours 24 minutes at this price!</p>
							</div>
						</div>
						<ul class="list-unstyled ms-0">
							<li>This qualification is equivalent to GCSE grade C/4</li>
							<li>Exam Booking within 2 Working Days of Enrolment</li>
							<li>Course Duration: 55 hours</li>
							<li>Unlimited Access to Course Materials</li>
							<li>Get Free Mock Tests & Free Past Papers</li>
							<li>Extra 25% Time for people with Learning Difficulties</li>
							<li>Exam Booking within 2 Working Days of Enrolment</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Highlights section -->
		<div class="row">
			<div id="fs-single-course-highlights-wrap" class="d-flex justify-content-between">
				<div id="fs-single-course-highlights" class="left w-50">
					<img src="<?php echo site_url()?>/wp-content/uploads/2024/04/highlights-img.webp" alt="Highlights image">
					<h4>Course Highlights</h4>
					<ul class="list-unstyled ms-0">
						<li>This qualification is equivalent to GCSE grade C/4</li>
						<li>Exam Booking within 2 Working Days of Enrolment</li>
						<li>Course Duration: 55 hours</li>
						<li>Unlimited Access to Course Materials</li>
						<li>Get Free Mock Tests & Free Past Papers</li>
						<li>Extra 25% Time for people with Learning Difficulties</li>
						<li>Exam Booking within 2 Working Days of Enrolment</li>
					</ul>
					<p>Exam slots are available 24*7 from Monday to Sunday. Book your remote online exam within 2 working days of enrolment for NCFE and within 7 working days for Pearson Edexcel.</p>
				</div>

				<div id="fs-single-course-purchasing-options" class="right w-50">
					<!-- Exam Board -->
					<div class="fs-single-purchasing-option">
						<h4>1. Choose Exam Board</h4>
						<div class="fs-single-purchasing-btns-wrap">
							<a class="selected-btn" href="#" data-options-val="10">Open Awards</a>
							<a href="#" data-options-val="20">NCFE</a>
							<a href="#" data-options-val="30">Personal Edexcel</a>
						</div>
					</div>

					<!-- Exam Option -->
					<div class="fs-single-purchasing-option">
						<h4>2. Choose Exam Option</h4>
						<div class="fs-single-purchasing-btns-wrap">
							<a href="#" data-options-val="40">Remote Exam</a>
							<a class="selected-btn" href="#" data-options-val="50">Paper Base Exam</a>
						</div>
					</div>

					<!-- Exam Country -->
					<div class="fs-single-purchasing-option calendar-wrap">
						<h4>3. Choose Exam Country</h4>
						<div class="fs-single-purchasing-btns-wrap">
							<a class="selected-btn" href="#" data-options-val="60">London</a>
							<a href="#" data-options-val="70">Swindon</a>
						</div>
						<div class="fs-single-calendar-extra-wrap d-flex justify-content-between">
							<div id="calendar"></div>
							<div class="fs-single-booking-btns-wrap">
								<h4>Select a Date </h4>
								<div id="fs-single-booking-btns"></div>
							</div>
						</div>
					</div>

					<!-- Confirmation message -->
					<div class="fs-single-purchasing-confirmatio text-center">
						<p></p>
					</div>

					<!-- Course Option -->
					<div class="fs-single-purchasing-option">
						<h4>4. Choose Course Option</h4>
						<div class="fs-single-purchasing-btns-wrap">
							<a href="#" data-options-val="80">None</a>
							<a href="#" data-options-val="90">Course + Exam</a>
							<a class="selected-btn" href="#" data-options-val="100">Course + Exam + 1 free Resit</a>
							<a href="#" data-options-val="110">Unlimited Live Zoom Class + 2 Hours 1:1 Tutor Support + 1 Free Resit</a>
						</div>
					</div>

					<!-- Action Button Option -->
					<div class="fs-single-purchasing-btn text-center">
						<h4></h4>
						<a href="#" class="fs-single-purchasing-to-cart" data-course-id="<?php echo esc_attr($current_product_id)?>">Add to Cart</a>
						<span class="fs-single-confirmation-message"></span>
					</div>
				</div>
			</div>
		</div>

		<!-- Tabbed Section -->
		<div class="row">
			<div id="fs-single-course-tabbed-wrap" class="mt-4 mb-4">
				<h2 class="text-center">Functional Skills Courses Level 2 Exam</h2>
				<div id="fs-single-course-btns" class="">
					<ul class="list-unstyled m-0 d-flex justify-content-center">
						<li class="single-btn-item active" data-tab-btn-item="1">Description</li>
						<li class="single-btn-item" data-tab-btn-item="2">Module</li>
						<li class="single-btn-item" data-tab-btn-item="3">Accreditation</li>
						<li class="single-btn-item" data-tab-btn-item="4">Certification</li>
						<li class="single-btn-item" data-tab-btn-item="5">Curriculum</li>
						<li class="single-btn-item" data-tab-btn-item="6">Reviews</li>
						<li class="single-btn-item" data-tab-btn-item="7">FAQ</li>
					</ul>
				</div>
				<div id="fs-single-course-tabbed-contents" class="">
					<?php
						for ( $i = 1; $i <= 7; $i++ ) {
							$dynamic_class = $i == 1 ? 'active' : '';
							?>
							<div class="fs-single-course-tabbed-contents <?php echo $dynamic_class?>" data-tab-content-item="<?php echo $i?>">
								<div class="fs-single-course-tabbed-contents-inner d-flex">
									<div class="fs-course-single-tab-left-content w-50">
										<h3>Additional Features</h3>
										<ul class="list-lunstyled m-0">
											<li>Access to On-Demand Classes</li>
											<li>Opportunity to Book 1:1 Live Tutor Support via Zoom</li>
											<li>Enrol in Our Course and Prepare for the Exam from Home</li>
											<li>Get a Free Mock Test with Professional Feedback</li>
										</ul>

										<h3>Why is this course right for you?</h3>
										
										<p>Our expert designed Functional Skills Maths Level 2 Course has smart learning options that provide the necessary numeracy knowledge and skills to excel in Functional Skills Maths.</p>

										<p>Our course is tailored to meet your specific needs and help you achieve your academic and career goals from the comfort of your home.</p>

										<p>You also get the opportunity to book Live 1:1 tutor support via Zoom. With interactive lessons, FREE mock test, personalised feedback and remote exams, our Maths Level 2 Course ensures a comprehensive and engaging learning experience.</p>
									</div>

									<div class="fs-course-single-tab-right-content w-50 ps-5">
										<img src="<?php echo FS_CHILD_THEME_DIR_URI . '/assets/imgs'?>/tab-right-img.webp" alt="tab right image">
									</div>
								</div>
							</div>
							<?php
						}
					?>
				</div>
			</div>
		</div>

		<!-- Accordion Exam details Section -->
		<div class="row">
			<div id="fs-single-course-accordion-wrap">
				<h2 class="text-center">Functional Skills Maths Level 2 <br/> Course & Exam Details</h2>
				<div id="fs-single-course-accordion-contents" class="d-flex justify-content-between">
					<div class="fs-single-course-accordion-left-content w-50">
						<img src="<?php echo FS_CHILD_THEME_DIR_URI . '/assets/imgs'?>/accordion-left-img.png" alt="accordion left image">
					</div>

					<div class="fs-single-course-accordion-right-content w-50">
						<?php
						for ( $i = 1; $i <= 6; $i++ ) {
							$dynamic_class = $i == 1 ? 'active' : '';

							switch ($i) {
								case '1' :
									$accordion_title = 'EXAM Booking & Results Details';
									break;
								case '2' :
									$accordion_title = 'Difference between NCFE and Pearson Edexcel';
									break;
								case '3' :
									$accordion_title = 'How This Course Will Work?';
									break;
								case '4' :
									$accordion_title = 'Entry Requirement';
									break;
								case '5' :
									$accordion_title = 'Exam Structure';
									break;
								case '6' :
									$accordion_title = 'Recognised Accreditation';
									break;
								default :
									$accordion_title = '';
							}

							?>
							<div class="fs-single-course-accordion-item <?php echo $dynamic_class?>">
								<h3><?php echo $accordion_title?></h3>
								
								<p>You can decide the exam date and place according to your convenience.</p>

								<p>NCFE –</p>

								<ul class="ms-0">
									<li>Paper Based Exam– In the centre – Book within 15 days</li>
									<li>On Screen Exam – In the centre – Book within 24 Hours</li>
									<li>Remote Online Exam- From home – Book within 2 working days</li>
									<li>Results – Get results in only 7 days</li>
								</ul>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>

		<!-- Accordion Course Curriculum Section -->
		<div class="row">
			<div id="fs-single-course-accordion-wrap">
				<h2 class="text-center">Course Curriculum</h2>
				<div id="fs-single-course-accordion-contents" class="d-flex justify-content-between">
					<div class="fs-single-course-accordion-left-content w-50">
						<?php
						for ( $i = 1; $i <= 3; $i++ ) {
							$dynamic_class = $i == 1 ? 'active' : '';

							switch ($i) {
								case '1' :
									$accordion_title = 'Unit 1: Number';
									break;
								case '2' :
									$accordion_title = 'Unit 2: Measures, Shapes and Space';
									break;
								case '3' :
									$accordion_title = 'Unit 3: Handling Data and Information';
									break;
								default :
									$accordion_title = '';
							}
							?>
							<div class="fs-single-course-accordion-item <?php echo $dynamic_class?>">
								<h3><?php echo $accordion_title?></h3>

								<p>Lesson 1.1: Numbers and the Number System</p>

								<p>The number system gives you a general insight into the mathematical operations regarding the given numbers. You will acquire skills in division, multiplication, addition and subtraction, which require steps in real-life contexts.</p>

								<p>Lesson 1.2: Fractions and Decimals</p>

								<p>You will be learning many types of fractions, including improper fractions, proper fractions, equivalent fractions and more. Along with this, you will learn Ordering Decimal Numbers, Subtracting Decimals, multiplying and dividing decimals and more, which enables you to apply real-world problem-solving....</p>
							</div>
							<?php
						}
						?>
					</div>

					<div class="fs-single-course-accordion-right-content w-50 text-end">
						<img src="<?php echo FS_CHILD_THEME_DIR_URI . '/assets/imgs'?>/accordion-right-img.png" alt="accordion right image">
					</div>
				</div>
			</div>
		</div>

		<!-- Feedback Section -->
		<div id="la-single-feedbacks" class="mt-5 mb-5 ssd-none d-xl-block w-100">
			<div class="container">
			<h2 class="text-center"><b>Course Reviews</b></h2>
			<?php 
				if ( count( $course_reviews ) > 1 ) {
					echo do_shortcode('[la-reviews-carousel-section]');
				} else {
					la_get_reviews_part();
				}
			?>
			</div>
		</div>

		<?php
		// if ( la_is_user_from_big_device() ) {
			// FAQ Section
			if( count($wc_product_faqs) > 0 ) {
				?>
				<div id="la-single-faq" class="overflow-hidden">
					<h2 class="text-center"><b>FAQs</b></h2>

					<div class="accordion" id="accordionPanelsStayOpenExample">
						<?php
						$counter = 20;
						foreach ( $wc_product_faqs as $item ) {
							$counter++;
							?>
							<div class="accordion-item">
								<h3 class="accordion-header" id="panelsStayOpen-heading<?php echo esc_attr($counter)?>">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo esc_attr($counter)?>" aria-expanded="<?php echo esc_attr($counter==21?'true':'false')?>" aria-controls="panelsStayOpen-collapse<?php echo esc_attr($counter)?>">
										<?php echo $item['faq_title']?>
									</button>
								</h3>
								<div id="panelsStayOpen-collapse<?php echo esc_attr($counter)?>" class="accordion-collapse collapse<?php echo esc_attr($counter==21?' show':'')?>" aria-labelledby="panelsStayOpen-heading<?php echo esc_attr($counter++)?>">
									<div class="accordion-body">
										<?php echo wpautop($item['faq_text'])?>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<?php
			}	// end condition of faq contents
		// }
        ?>
	</div> 
</main>

<?php do_action( 'woocommerce_after_single_product' ); ?>