jQuery(document).ready(function () {

    /** 
     * ====================================================================
     * Top header actions
     * ====================================================================
     */

    let topSearchIcon = jQuery('#mobile-header-links .right-elements a.top-search-icon');
    let topNavBars = jQuery('#mobile-header-links .right-elements a.top-nav-bars');
    let topHeaderSearch = jQuery('#header form#mobile-header-search');
    let topMobileMenu = jQuery('#mobile-menu-expandable');
    topSearchIcon.on('click', function () {
        topHeaderSearch.slideToggle('fast');
    });
    topNavBars.on('click', function () {
        topMobileMenu.slideToggle('fast');
        jQuery(this).toggleClass('expanded-menu-bar');
        jQuery('body').toggleClass('no-scrolling-anymore');
        jQuery('.elementor-364497 .elementor-element.elementor-element-5339870').css({ 'z-index': '1' });
    });
    jQuery('#mobile-header-links .right-elements a.top-nav-bars.expanded-menu-bar').on('click', function () {
        jQuery('.elementor-364497 .elementor-element.elementor-element-5339870').css({ 'z-index': 'unset' });
    });

    jQuery('.la-popular-course-sml-devices p.la-mega-menu-label').prepend('<span class="back-to-mega-menu"><i class="fa fa-angle-double-left"></i> Back</span>');
    jQuery('.subjects-menu-container p.la-mega-menu-label').prepend('<span class="back-to-mega-menu"><i class="fa fa-angle-double-left"></i> Back</span>');
    jQuery('.back-to-mega-menu').on('click', function (event) {
        jQuery('.la-popular-course-sml-devices, .la-all-courses-mega-menu-wrap, .la-hot-deals-submenu').removeClass('show');
    });

    /** 
     * ====================================================================
     * Single Course Page Accordion 
     * ====================================================================
    */
    // if( jQuery('#la-faq-accordion').length ) {
    // 	jQuery('#la-faq-accordion .mcdt-toggle').click(function(e) {
    // 		e.preventDefault();

    // 		let $this = jQuery(this);

    //         $this.next().slideToggle(250);

    //         if( $this.hasClass('mcdt-toggle-show'))
    //         {
    //             $this.removeClass('mcdt-toggle-show');
    //         }
    //         else {
    //             $this.addClass('mcdt-toggle-show');
    //         }
    // 	});
    // }

    /** 
     * ====================================================================
     * Phlebotomy Courses top content's Show Dates Script
     * ====================================================================
    */
    if (jQuery('#phlebotomy-course-top-content-wrap').length) {
        jQuery('#phlebotomy-course-top-content-wrap #see-dates-btn').click(function (e) {
            e.preventDefault();
            jQuery('#show-classroom-schedule-wrap').slideToggle('fast');
        });
    }


    /** 
     * ====================================================================
     * Single Course Sticky Menu 
     * ====================================================================
    */
    jQuery(window).scroll(function () {
        let $height_from_top = jQuery(window).scrollTop();
        let $parent_top_mobile = jQuery('.ast-woocommerce-container');
        let $top_fixed_bar_mobile = jQuery('.top-fixed-bar-mobile');
        let $parent_of_sticky_tag = jQuery('#la-single-links');
        let $sticky_tag = jQuery('#la-single-links ul');
        let $parentOfExamBoardTag = jQuery('aside#main-right #subscribe-us');
        let $theFaqTag = jQuery('#la-single-faq');
        let $rightExamBoardTag = jQuery('aside#main-right #exam-board');

        // if ($parent_of_sticky_tag.length) {
        //     let $element_offset_top = $parent_of_sticky_tag.offset().top;
        //     let $container_width = $parent_of_sticky_tag.innerWidth();

        //     if ($height_from_top > $element_offset_top) {
        //         $sticky_tag.addClass('sticky');
        //         $sticky_tag.css('width', $container_width);
        //     }
        //     else {
        //         $sticky_tag.removeClass('sticky');
        //     }
        // }

        // Sticky the top mobile section
        if ($parent_top_mobile.length) {
            let $board_element_offset_top = $parent_top_mobile.offset().top;
            let $board_container_width = $parent_top_mobile.innerWidth();

            if ($height_from_top > $board_element_offset_top) {
                $top_fixed_bar_mobile.addClass('sticky');
                $top_fixed_bar_mobile.css('width', $board_container_width);
            }
            else {
                $top_fixed_bar_mobile.removeClass('sticky');
            }
        }

        // Sticky the board section
        // if ($parentOfExamBoardTag.length) {
        //     let $board_element_offset_top = $parentOfExamBoardTag.offset().top + 150;
        //     let $board_container_width = $parentOfExamBoardTag.innerWidth();

        //     if ($height_from_top > $board_element_offset_top) {
        //         $rightExamBoardTag.addClass('sticky');
        //         $rightExamBoardTag.css('width', $board_container_width);

        //         let $theFaqTagOffsetTop = $theFaqTag.offset().top;
        //         if ($height_from_top > $theFaqTagOffsetTop) {
        //             $rightExamBoardTag.removeClass('sticky');
        //         }
        //     }
        //     else {
        //         $rightExamBoardTag.removeClass('sticky');
        //     }
        // }

        // Active the nav on scroll
        var $sections = jQuery('#la-single-faq, #la-single-feedbacks, #la-single-certification, #la-single-accreditation, #la-single-curriculum, #single-course-details');
        $sections.each(function (i, el) {
            var top = jQuery(el).offset().top - 100;
            var bottom = top + jQuery(el).height();
            var scroll = jQuery(window).scrollTop();
            var id = jQuery(el).attr('id');
            if (scroll > top && scroll < bottom) {
                jQuery('#la-single-links ul li.active').removeClass('active');
                jQuery('a[href="#' + id + '"]').parent().addClass('active');

            }
        })
        // });

        // jQuery("nav").on("click", "a", function (event) {

        //     event.preventDefault();
        //     var id = jQuery(this).attr('href'),
        //         top = jQuery(id).offset().top;
        //     jQuery('body,html').animate({ scrollTop: top }, 800);
        // });


    });


    /** 
     * ====================================================================
     * Mobile Course Menu Dropdown Click
     * ====================================================================
    */
    // jQuery('#mobile-course-menu-dropdown-btn').on('click', function (event) {
    //     jQuery('#mobile-course-menu').toggleClass('show');
    // });


    /** 
     * ====================================================================
     * Exam Board Sidebar Button Click 
     * ====================================================================
    */
    // jQuery('#exam-board-options div.edexcel_product').hide();
    jQuery('#exam-board-btns button').on('click', function (event) {
        jQuery('#exam-board-btns button').removeClass('active');
        jQuery(this).addClass('active');
        if (jQuery(this).is('#edexcel-exam-board')) {
            console.log('edexcel active');
            jQuery('#exam-board-options div.ncef_product').hide();
            jQuery('#exam-board-options div.edexcel_product').show();
        } else {
            console.log('edexcel deactive');
            jQuery('#exam-board-options div.edexcel_product').hide();
            jQuery('#exam-board-options div.ncef_product').show();
        }
    });

    /** 
     * ====================================================================
     * Add smooth scrolling to all links 
     * ====================================================================
    */
    // jQuery("a").on('click', function (event) {

    //     // Make sure this.hash has a value before overriding default behavior
    //     if (this.hash !== "") {
    //         // Prevent default anchor click behavior
    //         event.preventDefault();

    //         // Store hash
    //         var hash = this.hash;

    //         // Using jQuery's animate() method to add smooth page scroll
    //         // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
    //         jQuery('html, body').animate({
    //             scrollTop: jQuery(hash).offset().top
    //         }, 200, function () {

    //             // Add hash (#) to URL when done scrolling (default click behavior)
    //             window.location.hash = hash;
    //         });
    //     } // End if
    // });


    /** 
     * ====================================================================
     * Enquery Modal Scripts
     * ====================================================================
    */
    let bslEnqueryModalEl = jQuery('#la-bsl-enquery-modal');
    let gcseLocationsModalEl = jQuery('#la-gcse-venues-modal');
    jQuery('#la-bsl-enquery-modal span.close, #la-gcse-venues-modal span.close').on('click', function (event) {
        bslEnqueryModalEl.hide();
        gcseLocationsModalEl.hide();
        console.log('all events close button clicked');
    });
    jQuery('.la-bsl-book-button, p.la-gcse-all-venues a').on('click', function (event) {
        event.preventDefault();
        bslEnqueryModalEl.show();
        gcseLocationsModalEl.css({ 'display': 'block' });
        console.log('all events button click', gcseLocationsModalEl);
    });

    // Close the modal while click anywhere
    window.onclick = function (event) {
        // console.log(event.currentTarget);
        if (event.target == bslEnqueryModalEl) {
            bslEnqueryModalEl.hide();
        }
    }

    /** 
     * ====================================================================
     * GCSE Enquery Modal Scripts
     * ====================================================================
    */
    let gcseEnqueryModalEl = jQuery('#gcse-inquery-modal');
    jQuery('#gcse-inquery-modal span.close').on('click', function (event) {
        gcseEnqueryModalEl.hide();
    });
    jQuery('.la-gcse-top-post-content a.gcse-enquery-btn').on('click', function (event) {
        gcseEnqueryModalEl.show();
    });

    /** 
     * ====================================================================
     * Phlebotomy Modal Scripts
     * ====================================================================
    */
    let phlebotomyModalEl = jQuery('.phlebotomy-course-top-content-modal');
    let phlebotomyModalLondonEl = jQuery('body.page-id-354284 #enquiryBookingModal');
    let phlebotomyEnqueryModalEl = jQuery('#enquiryModal');
    jQuery('#la-phone-phlebotomy-enquiry-booking-modal, #enquiry-booking-modal, #phlebotomy-modal-enroll-btn').on('click', function (event) {
        event.preventDefault();
        phlebotomyModalLondonEl.show();
        phlebotomyModalEl.show();
    });
    jQuery('#enquiryBookingModal.phlebotomy-course-top-content-modal .modal-content .close').on('click', function (event) {
        event.preventDefault();
        phlebotomyModalLondonEl.hide();
        phlebotomyModalEl.hide();
    });
    // Enquery Modal
    jQuery('#phlebotomy-course-top-content-wrap #enquire-now-btn').on('click', function (event) {
        event.preventDefault();
        phlebotomyEnqueryModalEl.show();
    });
    jQuery('#phlebotomy-course-top-content-wrap #enquiryModal .close').on('click', function (event) {
        event.preventDefault();
        phlebotomyEnqueryModalEl.hide();
    });

    /** 
     * ====================================================================
     * BSL Enquiry Modal Scripts
     * ====================================================================
    */
    let bslEnquiryBtnEl = jQuery('body.single-product a#bsl-enquiry-btn');
    let bslEnquiryBtnMobileEl = jQuery('body.single-product .bottom-fixed-bsl-cta-mobile');
    let bslEnrolMobileBtnEl = jQuery('body.single-product #bsl-modal-enroll-btn');
    let bslEnquiryCloseBtnEl = jQuery('body.single-product #bsl-inquery-modal.modal .close');
    let bslEnquiryModalEl = jQuery('body.single-product #bsl-inquery-modal.modal');
    bslEnquiryBtnEl.on('click', function (event) {
        event.preventDefault();
        bslEnquiryModalEl.show();
    });
    bslEnquiryCloseBtnEl.on('click', function (event) {
        event.preventDefault();
        bslEnquiryModalEl.hide();
    });
    // Mobile Device
    bslEnrolMobileBtnEl.on('click', function (event) {
        event.preventDefault();
        bslEnquiryModalEl.show();
    });
});



document.addEventListener("DOMContentLoaded", function () {
    // Function to get current UK time
    function getCurrentUKTime() {
        var currentTime = new Date();
        var offset = currentTime.getTimezoneOffset() / 60;
        var ukTime = new Date(currentTime.getTime() + (offset + 1) * 60 * 60 * 1000); // UK is UTC+1 in winter

        return ukTime;
    }

    var currentUKTime = getCurrentUKTime();
    var currentHour = currentUKTime.getHours();



    // Check if it's a single product page and the UK time is within the range (8 AM to 5 PM)
    if (document.getElementById('linesopen-outer') && currentHour >= 8 && currentHour < 18) {
        document.getElementById('linesopen-outer').style.display = 'block';
    }
});