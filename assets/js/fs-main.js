jQuery(document).ready(function () {

    /** 
     * ====================================================================
     * Add smooth scrolling to all links 
     * ====================================================================
    */
    // jQuery("#woocommerce_product_categories-2 .product-categories").prepend('<li class="cat-item all-course-cat"><a href="https://beta.lead-academy.org/all-courses/">All Courses</a></li>');

    jQuery("#la-course-enrol-now").click(function () {
        console.log(jQuery("#exam-board").offset().top);
        jQuery('html, body').animate({
            scrollTop: 500
        }, 200);
    });


    /** 
     * ====================================================================
     * Single Course Page Accordion 
     * ====================================================================
    */
    if (jQuery('#la-faq-accordion').length) {
        jQuery('#la-faq-accordion .mcdt-toggle').click(function (e) {

            e.preventDefault();
            let $this = jQuery(this);
            $this.next().slideToggle(250);

            if ($this.hasClass('mcdt-toggle-show')) {
                $this.removeClass('mcdt-toggle-show');
            }
            else {
                $this.addClass('mcdt-toggle-show');
            }
        });
    }


    /** 
     * ====================================================================
     * Single Course Sticky Menu 
     * ====================================================================
    */
    jQuery(window).scroll(function () {
        let $height_from_top = jQuery(window).scrollTop();
        let $parent_of_sticky_tag = jQuery('#la-single-links');
        let $sticky_tag = jQuery('#la-single-links ul');

        if ($parent_of_sticky_tag.length) {
            let $element_offset_top = $parent_of_sticky_tag.offset().top;
            let $container_width = $parent_of_sticky_tag.innerWidth();

            if ($height_from_top > $element_offset_top) {
                $sticky_tag.addClass('sticky');
                $sticky_tag.css('width', $container_width);
            }
            else {
                $sticky_tag.removeClass('sticky');
            }
        }
    });


    /** 
     * ====================================================================
     * Mobile Course Menu Dropdown Click
     * ====================================================================
    */
    jQuery('#mobile-course-menu-dropdown-btn').on('click', function (event) {
        jQuery('#mobile-course-menu').toggleClass('show');
    });


    /** 
     * ====================================================================
     * Exam Board Sidebar Button Click 
     * ====================================================================
    */
    jQuery('#exam-board-btns button').on('click', function (event) {
        jQuery('#exam-board-btns button').removeClass('active');
        jQuery(this).addClass('active');
    });

    /** 
     * ====================================================================
     * Checkbox operation
     * ====================================================================
    */

    jQuery('select#input_37_7').on('change', function () {
        console.log(jQuery('form#gform_37 fieldset.la-conditioned-checkboxes:block'));
    });


    /** 
     * ====================================================================
     * Course Categories Menu
     * ====================================================================
    */
    var duplicatedCategoryItems = [
        'All Courses',
        'Functional Skills',
        'Education & Training',
        'Counselling & Psychology',
        'Massage Therapy',
        'Health and Safety',
        'Leadership & Management',
        'Free Courses',
        'Others',
        'Uncategorized',
    ];

    if (jQuery('ul.children').length) {
        jQuery('ul.children').parent().append('<span class="open-submenu-btn"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>');

        jQuery('.open-submenu-btn').click(function () {
            jQuery(this).parent().children('ul.children').slideToggle('fast');
        });
    }
    jQuery('.courses-btn').on('click', function (event) {
        let headerElWidth = jQuery('#header').width();
        if (headerElWidth > 1100) {
            jQuery('.la-all-courses-mega-menu-wrap').toggleClass('show');
        } else {
            jQuery('.la-popular-course-sml-devices').toggleClass('show');
        }
        let hasChildItems = jQuery(this).siblings('.la-all-courses-mega-menu-wrap').find('.product-categories').find('li').siblings('.cat-item');
        // console.log(hasChildItems.text());

        hasChildItems.each(function () {
            for ($i = 0; $i < duplicatedCategoryItems.length; $i++) {
                if (jQuery(this).text().includes(duplicatedCategoryItems[$i])) {
                    jQuery(this).remove();
                }
            }
        });

        hasChildItems.find('.open-submenu-btn').remove();
        hasChildItems.find('.children').remove();
    });

    // Popular courses toggle
    jQuery('a.more-categories').on('click', function (event) {
        jQuery('.la-all-courses-mega-menu-wrap').toggleClass('show');
    });

    // Hot deals toggle
    jQuery('a.hot-deal-btn').on('click', function (event) {
        // jQuery(this).siblings('.la-hot-deals-submenu').toggleClass('show');
        jQuery(this).siblings('.la-hot-deals-submenu').toggleClass('show');
    });

    // Login Submenu toggle class
    jQuery('a.loggedin-user-btn').on('click', function (event) {
        jQuery(this).siblings('.loggedin-user-submenu').toggleClass('show');
    });

    /** 
     * ====================================================================
     * Hiding the Billing State field from Checkout page
     * ====================================================================
    */

    jQuery('body.woocommerce-checkout input#billing-state').parent().hide();

    /** 
     * ====================================================================
     * Add smooth scrolling to all links 
     * ====================================================================
    */
    jQuery("a").on('click', function (event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            jQuery('html, body').animate({
                scrollTop: jQuery(hash).offset().top
            }, 800, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });

});