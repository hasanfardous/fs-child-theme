jQuery(document).ready(function () {

    /** 
     * ====================================================================
     * Phlebotomy Sticky Menu 
     * ====================================================================
     */

    jQuery(window).scroll(function () {
        let $height_from_top = jQuery(window).scrollTop();
        let $parent_of_sticky_tag = jQuery('#phlebotomy-single-links');
        let $sticky_tag = jQuery('#phlebotomy-single-links ul');

        if ($parent_of_sticky_tag.length) {
            let $element_offset_top = $parent_of_sticky_tag.offset().top;
            // let $element_offset_top = $parent_of_sticky_tag.offset().top - 100;
            let $container_width = $parent_of_sticky_tag.innerWidth();
            if ($height_from_top > $element_offset_top) {
                $sticky_tag.addClass('sticky');
                $sticky_tag.css('width', $container_width);
            }
            else {
                $sticky_tag.removeClass('sticky');
            }
        }

        // Mobile nav sticky
        let $phone_parent_of_sticky_tag = jQuery('#mobile-phlebotomy-single-links');
        let $phone_sticky_tag = jQuery('#mobile-phlebotomy-single-links ul');

        if ($phone_parent_of_sticky_tag.length) {
            let $element_offset_top = $phone_parent_of_sticky_tag.offset().top;
            let $container_width = $phone_parent_of_sticky_tag.innerWidth();

            if ($height_from_top > $element_offset_top) {
                $phone_sticky_tag.addClass('sticky');
                $phone_sticky_tag.css('width', $container_width);
            }
            else {
                $phone_sticky_tag.removeClass('sticky');
            }
        }

        // Active the nav on scroll
        // var $sections = jQuery('#overview, #accreditaion, #course-curriculum, #reviews, #faq');
        var $sections = jQuery('#overview-wrap, #accreditaion-wrap, #course-curriculum-wrap, #reviews-wrap, #faq-wrap');
        $sections.each(function (i, el) {
            var top = jQuery(el).offset().top;
            // var top = jQuery(el).offset().top - 180;
            var bottom = top + jQuery(el).height();
            var id = jQuery(el).attr('id');
            if ($height_from_top > top && $height_from_top < bottom) {
                jQuery('#phlebotomy-single-links ul li a.active').removeClass('active');
                jQuery('a[href="#' + id + '"]').addClass('active');

            }
        })
    });


    /** 
     * ====================================================================
     * Single Course Page Accordion 
     * ====================================================================
    */
    if (jQuery('.accordion').length) {
        jQuery('.accordion-title').click(function (e) {

            e.preventDefault();
            let $this = jQuery(this);
            $this.next().slideToggle(250);

            if ($this.hasClass('accordion-show')) {
                $this.removeClass('accordion-show');
            }
            else {
                $this.addClass('accordion-show');
            }
        });
    }

    jQuery('#see-dates-btn').on('click', function (event) {
        jQuery('#show-classroom-schedule-wrap').slideToggle(250);
    });


    /** 
     * ====================================================================
     * Add smooth scrolling to all links 
     * ====================================================================
     */
    jQuery(".phlebotomy-single-links a").on('click', function (event) {

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