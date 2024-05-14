<div id="course-fee-info">
    <div id="course-fee">
        <h6>Course Fee</h6>
        <div id="course-price">
            <div class="float-row">
                <div class="float-left text-left">
                    <h3>£<?php echo $la_phleb_course_sell_price?>.00</h3>
                </div>
                <div class="float-right text-right">
                    <h5>£<?php echo $la_phleb_course_regular_price?>.00</h5>
                </div>
            </div>
            <h5><img src="https://lead-academy.org/wp-content/uploads/2022/12/discount-white.webp" alt="discount white" style="width: 22px"> 50% OFF</h5>
            <a href="#" id="enquiry-booking-modal" class="red-button">ENROL NOW</a>

            <!-- Trigger/Open The Modal -->
            <style>
                .gift_course_button {
                    display: none !important;
                }

                .gform_wrapper.gravity-theme .gform_footer,
                .gform_wrapper.gravity-theme .gform_page_footer {
                    padding: 0px !important;
                }

                /* The Modal (background) */
                .modal {
                    display: none;
                    /* Hidden by default */
                    position: fixed;
                    /* Stay in place */
                    z-index: 999999999999;
                    /* Sit on top */
                    padding-top: 100px;
                    /* Location of the box */
                    padding-bottom: 20px;
                    /* Location of the box */
                    left: 0;
                    top: 0;
                    width: 100%;
                    /* Full width */
                    max-width: 100%;
                    height: 100%;
                    /* Full height */
                    overflow: auto;
                    /* Enable scroll if needed */
                    background-color: rgb(0, 0, 0);
                    /* Fallback color */
                    background-color: rgba(0, 0, 0, 0.4);
                    /* Black w/ opacity */
                }

                /* Modal Content */
                #enquiryBookingModal .modal-content {
                    background-color: #f8f8f8;
                    margin: auto;
                    padding: 5px 20px 13px 20px;
                    border: 1px solid #888;
                    width: 750px;
                    max-width: 80%;
                    max-height: 500px;
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

                div#enquiryBookingModal {
                    color: #000 !important;
                    z-index: 99999999999999999;
                }

                div#enquiryBookingModal .single-booking-option {
                    margin: 20px 5px 10px;
                    overflow-y: scroll;
                }

                div#enquiryBookingModal .close {
                    margin-right: -12px;
                }

                div#enquiryBookingModal .float-row {
                    justify-content: space-between;
                }

                div#enquiryBookingModal .single-booking-row:first-child {
                    border-top: 0;
                    margin: 0;
                    padding: 0 0 20px;
                }
            </style>
            <!-- The Booking Modal -->
            <div id="enquiryBookingModal" class="modal phlebotomy-course-top-content-modal">
                <div class="modal-content">
                    <span class="close">×</span>
                    <div class="single-booking-option">
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
                            <div id="show-classroom-schedule" class="single-booking-row float-row">
                                <div class="single-booking-left" style="padding-left: 0">
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

                                <div class="single-booking-right">
                                    <div style="text-align: right;color: #AF1F47;font-size: 16px;font-weight: 700;">
                                        <img src="https://lead-academy.org/wp-content/uploads/2022/12/discount.webp"
                                            alt="discount" width="22">
                                        <span>50% Off</span>
                                    </div>
                                    <div class="float-row" style="margin: 13px 0 10px;">
                                        <span class="float-left" style="font-size: 20px; font-weight: 700;">
                                            <b>£<?php echo $la_phleb_course_sell_price?></b>
                                            <span style="font-weight: normal;font-size: 14px;padding-left: 3px;">(Excl.
                                                VAT)</span></span>
                                        <span class="float-right text-right"
                                            style="font-size: 18px;"><del>£<?php echo $la_phleb_course_regular_price?></del></span>
                                    </div>
                                    <a href="https://lead-academy.org/cart?add-to-cart=<?php echo $la_phleb_course_var_id?>" class="single-booking-btn<?php echo $quota_full_dynamic_class?>"
                                        id="date-book-now-btn"><?php echo $la_phleb_course_quota_full ? 'FULLY BOOKED' : 'BOOK NOW';?></a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <script>

                // Get the booking modal
                let enqueryBookingModal = document.getElementById("enquiryBookingModal");

                // Get the button that opens the modal
                let enqueryRedBtn = document.getElementById("enquiry-booking-modal");
                // let enqueryRedBtn = document.querySelectorAll('[id=enquiry-booking-modal]');
                // let phonePhlebotomyEnqueryRedBtn = document.getElementById("la-phone-phlebotomy-enquiry-booking-modal");

                // Get the <span> element that closes the modal
                let enqueryCloseEl = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                enqueryRedBtn.onclick = function () {
                    enqueryBookingModal.style.display = "block";
                }
                // phonePhlebotomyEnqueryRedBtn.onclick = function() {
                //     console.log('phonePhlebotomyEnqueryRedBtn clicked');
                //     enqueryBookingModal.style.display = "block";
                // }

                // When the user clicks on <span> (x), close the modal
                enqueryCloseEl.onclick = function () {
                    enqueryBookingModal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == enqueryBookingModal) {
                        enqueryBookingModal.style.display = "none";
                    }
                }           
            </script>
        </div>
    </div>
    <div id="course-fee-others">
        <div class="float-row">
            <div class="float-left">
                <div>
                    <img src="https://lead-academy.org/wp-content/uploads/2022/12/face-to-face.webp"
                        alt="14 Days Money Back Guarantee">
                </div>
                14 Days Money Back Guarantee
            </div>
            <div class="float-right">
                <div>
                    <img src="https://lead-academy.org/wp-content/uploads/2022/12/instalment.webp" alt="High Pass Rate">
                </div>
                High Pass Rate
            </div>
        </div>
        <div class="float-row">
            <div class="float-left">
                <div>
                    <img src="https://lead-academy.org/wp-content/uploads/2022/12/7-hours.webp"
                        alt="8 Hours Practical + 3 Hours Theoretical Study">
                </div>
                7.5 Hours Practical + 3 Hours Theoretical Study
            </div>
            <div class="float-right">
                <div>
                    <img src="https://lead-academy.org/wp-content/uploads/2022/12/14-days.webp"
                        alt="Certificate Upon Completion">
                </div>
                Certificate Upon Completion
            </div>
        </div>
    </div>
</div>