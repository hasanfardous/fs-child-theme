<!-- Sticky CTA section for mobile device -->
<?php
	$course_regular_price       = '0';
	$course_sell_price          = '0';
	$course_carting_url         = '#';

	// if ( is_user_logged_in() && (get_current_user_id() == 4) ) {
	// 	echo '<pre>';
	// 	print_r(la_is_it_cpd_course());
	// 	echo '</pre>';
	// }

	if ( 
		in_array( '331', $course_id_array ) 			// Functional Skills           		
		|| in_array( '355', $course_id_array ) 			// Education & Training Category 	
		|| in_array( '359', $course_id_array ) 			// GCSE Courses                		
		|| in_array( '392', $course_id_array ) 			// ESOL                        		
		// Exceptional Course Ids from BSL Course Cat
		// || ( '364465' == $current_product_id ) 			// British Sign Language Level 1	
		// || ( '364491' == $current_product_id ) 			// British Sign Language Level 2 	
		|| ( '368285' == $current_product_id )			// Shipping charge Product from Others Category 
		// Exceptional Course Ids for Phlebotomy Courses
		|| ( '377824' == $current_product_id ) 			// Phlebotomy Training Swindon		
		|| ( '376420' == $current_product_id ) 			// Phlebotomy Training Bristol		
		|| ( '376417' == $current_product_id ) 			// Phlebotomy Training Birmingham 	
		|| ( '366854' == $current_product_id ) 			// Phlebotomy Training London 		
		|| ( '368595' == $current_product_id ) 			// Advanced/Competency Phlebotomy Training - London
		|| ( '370863' == $current_product_id ) 			// Catheterisation Training
		|| ( '383736' == $current_product_id ) 			// Introduction to British Sign Language
		|| ( '365519' == $current_product_id ) 			// Deaf Awareness Training Course
		// Cannulation Training
		|| ( '371100' == $current_product_id )			// Cannulation Training London – CPD Approved
		|| ( '380325' == $current_product_id )			// Cannulation Training – Birmingham
	) {	
		if ( '376417' == $current_product_id || '377824' == $current_product_id || '376420' == $current_product_id || '371100' == $current_product_id || '380325' == $current_product_id ) {
		?>
		<div class="bottom-fixed-phlebotomy-cta-mobile d-block d-sm-none d-flex justify-content-between">
			<div id="exam-board-total">
				<span class="d-block"><?php echo get_woocommerce_currency_symbol()?><span class="course-sale-price"><?php echo $la_phleb_course_sell_price?></span></span>
				<span class="d-block"><?php echo get_woocommerce_currency_symbol()?><span class="course-prev-price"><?php echo $la_phleb_course_regular_price?></span></span>
			</div>
			<a href="#" id="phlebotomy-modal-enroll-btn">Buy Now</a>
		</div>
		<?php
		} elseif ( '383736' == $current_product_id || '365519' == $current_product_id ) {
			?>
			<!-- <div class="bottom-fixed-bsl-cta-mobile d-block d-sm-none d-flex justify-content-between"> -->
			<div class="bottom-fixed-bsl-cta-mobile d-none justify-content-between">
				<div id="exam-board-total">
					<span class="d-block"><?php echo get_woocommerce_currency_symbol()?><span class="course-sale-price"><?php echo $course_sell_price?></span></span>
					<span class="d-block"><?php echo get_woocommerce_currency_symbol()?><span class="course-prev-price"><?php echo $course_regular_price?></span></span>
				</div>
				<a href="#" id="bsl-modal-enroll-btn">Buy Now</a>
			</div>
			<?php
		} else {
		?>
		<div class="bottom-fixed-cta-mobile d-block d-sm-none d-flex justify-content-between">
			<div id="exam-board-total">
				<span class="d-block"><?php echo get_woocommerce_currency_symbol()?><span class="course-sale-price"><?php echo $course_sell_price?></span></span>
				<span class="d-block"><?php echo get_woocommerce_currency_symbol()?><span class="course-prev-price"><?php echo $course_regular_price?></span></span>
			</div>
			<a href="<?php echo $course_carting_url?>" id="enroll-btn">Buy Now</a>
		</div>
		<?php
		}
	} else {
		if ( $product->get_type() == 'variable' ) {
			$variable_producs       = la_get_variable_ids_by_product_id( $current_product_id );
			$variable_first_id      = $variable_producs['variation_ids'][0];
			$variations             = la_get_variable_title_price_by_varid( $variable_first_id);
			$course_regular_price   = $variations['variations'][0];
			$course_sell_price      = $variations['variations'][1];
			$course_carting_url     = '/cart?add-to-cart='.$variable_first_id;
		}
		?>
		<div class="bottom-fixed-cta-mobile d-block d-sm-none d-flex justify-content-between">
			<div id="exam-board-total">
				<span class="d-block"><?php echo get_woocommerce_currency_symbol()?><span class="course-sale-price"><?php echo $course_sell_price?></span></span>
				<span class="d-block"><?php echo get_woocommerce_currency_symbol()?><span class="course-prev-price"><?php echo $course_regular_price?></span></span>
			</div>
			<a href="<?php echo $course_carting_url?>" id="enroll-btn-to-direct-cart">Buy Now</a>
		</div>
		<?php
	}
?>
