<section id="top-banner">
	<div class="bg-overlay">
		<?php
			$product_image = wp_get_attachment_image_src( get_post_thumbnail_id( $current_product_id ), 'full' );
		?>
		<img src="<?php echo $product_image[0]?>" alt="<?php echo get_the_title()?>" width="708" height="401">
	</div>
	<div class="container">
		<h1><?php the_title()?></h1>

        <?php
        if ( current_user_can('manage_options') ) {
            if ( ('376160' == $current_product_id) || ('376417' == $current_product_id) || ('376420' == $current_product_id) || ('377824' == $current_product_id) ) {
                ?>
                <h2>Our phlebotomy training helps people to get trained and work as phlebotomists in private & public healthcare organisations.</h2>
                <?php
            }
        }
        ?>

		<img src="<?php echo FS_CHILD_THEME_DIR_URI?>/assets/imgs/Trust-Pilot-Micro-Combo-3-1.svg" width="317" height="25" alt="trustpilot-rating" id="trustpilot-rating-img">
		<div id="top-banner-buttons">
			
        <!-- Trigger/Open The Modal -->
        <style>
            #videoModal iframe {
                width: 940px !important;
                height: 503px !important;
            }
            @media screen (max-width: 768px) {
                #videoModal iframe {
                    height: 324px !important;
                }
            }
            .gift_course_button {
                display: none !important;
            }
            .gform_wrapper.gravity-theme .gform_footer, .gform_wrapper.gravity-theme .gform_page_footer{
                padding: 0px !important;
            }
            /* The Modal (background) */
            .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 999; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            padding-bottom: 20px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            max-width: 100%;
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                background-color: #f8f8f8;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 940px;
                max-width: 80%;
            }

            /* The Close Button */
            .close {
                color: #fff;
                position: absolute;
                top: 10px;
                right: 12px;
                width: 30px;
                height: 30px;
                line-height: 30px;
                background: #b2234e;
                border-radius: 50%;
                font-size: 26px;
                font-weight: bold;
                font-family: 'Poppins';
                text-align: center;
            }

            .close:hover,
            .close:focus {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            }

            #enquiryModal textarea {
                height: 100px;
            }
            div#gform_64_validation_container h2 {
                font-size: 18px;
                line-height: 26px;
            }
            </style>
			<!-- <a href="#exam-board" id="la-course-enrol-now">ENROL NOW</a> -->
			<?php
				if ( $watch_video_url ) {
					echo '<a href="#" id="videoModalTrigger" class="la-watch-now-btn"><i class="fa fa-play-circle"></i> '.esc_html($watch_video_btn_title == '' ? 'Watch Now' : $watch_video_btn_title).'</a>';
				}
			?>
		</div>

        <!-- The Modal -->
        <div id="videoModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <?php echo wp_oembed_get( esc_url( $watch_video_url ) ); ?>
            </div>
        </div>

        <script>
            // Get the modal
            var modal = document.getElementById("videoModal");

            // Get the button that opens the modal
            var btn = document.getElementById("videoModalTrigger");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // Get the iframe
            var iframeEl = document.getElementsByTagName('iframe')[0];
            iframeEl.setAttribute('id', 'yTPlayer');

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                // var iframe = document.getElementById("yTPlayer");
                iframeEl.contentWindow.postMessage( '{"event":"command", "func":"pauseVideo", "args":""}', '*');

                // iframe.pauseVideo();
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
	</div>
</section>
<?php
// BSL					300
// Bundle Courses		347
// Functional Skills	331
// GCSE Courses			359
// Education & Training	355
$specified_cats = [];
$la_course_terms = get_the_terms( get_the_ID(), 'product_cat' );
foreach( $la_course_terms as $cat ) {
	$specified_cats[] = $cat->term_id;
	$specified_cats[] = $cat->parent;
}

function la_get_dynamic_class_for_recurring_payment_courses( $recurring_course_cats ){
	foreach( $recurring_course_cats as $cat ) {
		if( in_array( $cat, $specified_cats ) ) {
			echo 'la-recurring-enabled-course cat-'.$cat.', specified-'.implode('|', $specified_cats);
		}
	}
}

// if ( current_user_can( 'manage_options' ) ) {
// 	echo '<pre>';
// 	print_r( $specified_cats );
// 	echo '</pre>';
// }


if ( ('376160' != $current_product_id) && ('376417' != $current_product_id) && ('376420' != $current_product_id) ) {
    // if ( ! in_array( '300', $specified_cats ) && ! in_array( '347', $specified_cats )  && ! in_array( '331', $specified_cats )  && ! in_array( '359', $specified_cats ) ) {
        ?>
        <!-- <section class="promo-sell">
            <div class="promo-sell-s">
            <p>GET <span>EXTRA 20% OFF! </span>USE COUPON: <span id="coupon">EXTRA20</span> AT CHECKOUT [ENDs IN: <span id="countdown"></span>]</p>
            </div>
        </section> -->
        <?php
    // } elseif( in_array( '359', $specified_cats ) ) {
        ?>
        <!-- <section id="promo-sell-ten" class="promo-sell">
            <div class="promo-sell-s">
                <p>SUMMER SALE, <span>GET 10% OFF!</span> USE COUPON: <span id="coupon">LA10P</span> AT CHECKOUT</p>
            </div>
        </section>  -->
        <?php
    // }
}
?>