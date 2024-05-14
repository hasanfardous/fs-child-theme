<div id="phlebotomy-course-top-content-wrap">
    <div class="phlebotomy-common">
        <h2>Booking Options 
            <img width="24" src="https://lead-academy.org/wp-content/uploads/2022/12/info.webp" alt="info icon">
        </h2>
        <div class="single-booking-option overflow-hidden mb-4">
            <div class="single-booking-row float-row d-flex">
                <div class="single-booking-left">
                    <h3> <img width="27"
                            src="https://lead-academy.org/wp-content/uploads/2022/12/classroom-session.webp"
                            alt="Classroom session">Classroom Session</h3>
                    <ul>
                        <li>You will study theoretical part online, and practical session in a physical classroom </li>
                        <li>Gain real life experienced and support from industry experienced tutor</li>
                        <li>Get chance to interact with fellow professionals and get certified </li>
                    </ul>
                </div>
                <div class="single-booking-right ps-4">
                    <div style="text-align: right;color: #AF1F47;font-size: 16px;font-weight: 700;">
                        <img src="https://lead-academy.org/wp-content/uploads/2022/12/discount.webp" alt="discount" width="20">
                        <span>50% Off</span>
                    </div>
                    <div class="float-row" style="margin: 13px 0 10px;">
                        <span class="float-left" style="font-size: 20px; font-weight: 700;"><b>£<?php echo $la_phleb_course_sell_price?></b></span>
                        <span class="float-right text-right" style="font-size: 18px;"><del>£<?php echo $la_phleb_course_regular_price?></del></span>
                    </div>
                    <a href="javascript:void(0);" class="single-booking-btn" id="see-dates-btn">SEE DATES</a>
                </div>
            </div>
            <div id="show-classroom-schedule-wrap" style="display: none;">
                <?php
                foreach ( $la_phleb_course_meta_group as $single_item ) {
                    $la_phleb_course_location   = $single_item['la_phleb_course_location'];
                    $la_phleb_course_address    = $single_item['la_phleb_course_address'];
                    $la_phleb_course_date       = $single_item['la_phleb_course_date'];
                    $la_phleb_course_time       = $single_item['la_phleb_course_time'];
                    $la_phleb_course_seats_left = $single_item['la_phleb_course_seats_left'];
                    $la_phleb_course_var_id     = $single_item['la_phleb_course_var_id'];
                    $la_phleb_course_quota_full = $single_item['la_phleb_course_quota_full'];
                    $quota_full_dynamic_class   = $la_phleb_course_quota_full ? ' full-booked-phlebotomy-item' : '';
                    ?>
                    <div id="show-classroom-schedule" class="single-booking-row float-row d-flex justify-content-between">
                        <div class="single-booking-left">
                            <h4><?php echo $la_phleb_course_location?></h4>
                            <p><?php echo $la_phleb_course_address?></p>

                            <div>
                                <i class="fa fa-calendar"></i> <?php echo $la_phleb_course_date?>
                            </div>
                            <div>
                                <i class="fa fa-clock-o"></i> <?php echo $la_phleb_course_time?>
                            </div>
                            <div style="color: red">
                                <i class="fa fa-fire" aria-hidden="true"></i> <?php echo $la_phleb_course_seats_left?>
                            </div>
                        </div>
                        <div class="single-booking-right d-flex align-items-center">
                            <a href="https://lead-academy.org/cart?add-to-cart=<?php echo $la_phleb_course_var_id?>" class="single-booking-btn<?php echo $quota_full_dynamic_class?>"
                                id="date-book-now-btn"><?php echo $la_phleb_course_quota_full ? 'FULLY BOOKED' : 'BOOK NOW';?></a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php
        // Hide the section for the Advanced / Competency Phlebotomy Training London
        if ( '368595' != $current_product_id ) {
            ?>
            <div class="single-booking-option phlebotomy-in-house-single-item overflow-hidden" style="margin-bottom: 0">
                <div class="single-booking-row float-row d-flex">
                    <div class="single-booking-left">
                        <h3><img src="https://lead-academy.org/wp-content/uploads/2022/12/in-house.webp" alt="Classroom session" width="27">In-House</h3>
                        <ul>
                            <li>Corporate Companies that wish to train their entire workforce  </li>
                            <li>Learn the most in-demand skills  </li>
                            <li>We provide tailored course based on your requirements to train your employees</li>
                        </ul>
                    </div>
                    <div class="single-booking-right">
                        <a href="#" id="enquire-now-btn" class="single-booking-btn">ENQUIRE NOW</a>
                    </div>

                    <!-- Trigger/Open The Modal -->
                    <style>
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
                        z-index: 999999999999; /* Sit on top */
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
                        padding: 5px 20px 13px 20px;								  
                        border: 1px solid #888;
                        width: 420px;
                        max-width: 80%;
                        }

                        /* The Close Button */
                        .close {
                        color: #aaaaaa;
                        float: right;
                        font-size: 28px;
                        font-weight: bold;
                        }

                        .close:hover,
                        .close:focus {
                        color: #000;
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

                    <!-- The Modal -->
                    <div id="enquiryModal" class="modal">
                        <div class="modal-content">
                            <span class="close">×</span>
                            <p><?php echo do_shortcode( '[gravityform id="30" title="false" description="false" ajax="true"]' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>