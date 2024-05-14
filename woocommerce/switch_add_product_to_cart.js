
jQuery(document).ready(function () {

    jQuery('body').on('change', '#add-student-id', function () {
        // let product_id = 360422;
        let product_id = 365011;
        let quantity = 1;

        if (this.checked) {
            quantity = 1;
        }
        else {
            quantity = 0;
        }

        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            beforeSend: function () {
                jQuery('.la-cart-special-offers-overlay-layer').css('visibility', 'visible');
            },
            success: function (result) {
                jQuery('.la-cart-special-offers-overlay-layer').css('visibility', 'hidden');
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    //English Level 2 Revision Materials
    jQuery('body').on('change', '#english-revision-materials', function () {
        let product_id = 382297;
        let quantity = 1;

        if (this.checked) {
            quantity = 1;
        }
        else {
            quantity = 0;
        }

        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    //Math Level 1 Revision Materials math
    jQuery('body').on('change', '#revision-materials-math', function () {
        let product_id = 382803;
        let quantity = 1;

        if (this.checked) {
            quantity = 1;
        }
        else {
            quantity = 0;
        }

        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    //Math Level 2 Revision Materials math
    jQuery('body').on('change', '#revision-materials-math-2', function () {
        let product_id = 382805;
        let quantity = 1;

        if (this.checked) {
            quantity = 1;
        }
        else {
            quantity = 0;
        }

        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    // Practical Training Course
    jQuery('body').on('click', '#add-advanced-phlebotomy-course, #add-cannulation-phlebotomy-course', function () {
        let product_id = jQuery(this).data('product-id');
        let var_id = jQuery(this).data('product-var-id');
        // let product_id = 346570;
        // let var_id = 362919;
        // let catheterisation_product_id = 370863;
        // let catheterisation_var_id = 371093;
        // let cannulation_product_id = 371100;
        // let cannulation_var_id = 371102;
        let quantity = 1;

        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'var_id': var_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
                jQuery('.phlebotomy-practical-training-course').hide();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    // Practical Training Course Birmingham
    jQuery('body').on('click', '#add-cannulation-phlebotomy-birmingham-course, #add-advanced-phlebotomy-birmingham-course', function () {
        let product_id = jQuery(this).data('product-id');
        let var_id = jQuery(this).data('product-var-id');
        // let product_id = 346570;
        // let var_id = 362919;
        // let catheterisation_product_id = 370863;
        // let catheterisation_var_id = 371093;
        // let cannulation_product_id = 371100;
        // let cannulation_var_id = 371102;
        let quantity = 1;

        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'var_id': var_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
                jQuery('.phlebotomy-practical-training-course').hide();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    jQuery('body').on('change', '#add-lifetime-access', function () {
        let product_id = 300848;
        let quantity = 1;

        if (this.checked) {
            quantity = 1;
        }
        else {
            quantity = 0;
        }

        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    jQuery('body').on('change', '#add-gift-card', function () {
        // let product_id = 360450;
        let product_id = 367525;
        let quantity = 1;

        if (this.checked) {
            quantity = 1;
        }
        else {
            quantity = 0;
        }
        console.log(wc_add_to_cart_params.ajax_url, product_id, quantity);
        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    jQuery('body').on('change', '#add-cpd-uk-iphm-qls-certificate, #add-cpd-iphm-accredited-certificate, #add-quality-license-endorsed-certificate, .checkout-lifetime-access-course-offer, #add-gcse-live-tutor-support-1-session, #add-gcse-live-tutor-support-2-session', function () {
        // let product_id = 360450;
        let product_id = jQuery(this).data('course-id');
        let quantity = 1;

        if (this.checked) {
            quantity = 1;
        }
        else {
            quantity = 0;
        }
        console.log(wc_add_to_cart_params.ajax_url, product_id, quantity);
        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            beforeSend: function () {
                jQuery('.la-cart-special-offers-overlay-layer').css('visibility', 'visible');
            },
            success: function (result) {
                jQuery('.la-cart-special-offers-overlay-layer').css('visibility', 'hidden');
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                    jQuery('body').trigger('update_checkout');
                }, 200);
                // Reload the page
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    jQuery('body').on('change', '#add-qls', function () {
        let product_id = 360460;
        let quantity = 1;

        if (this.checked) {
            quantity = 1;
        }
        else {
            quantity = 0;
        }

        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    jQuery('body').on('change', '#add-cpd-iphm-pdf', function () {
        let product_id = 272532;
        let quantity = 1;

        if (this.checked) {
            quantity = 1;
        }
        else {
            quantity = 0;
        }

        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    jQuery('body').on('change', '#add-cpd-iphm-pdf-hardcopy', function () {
        let product_id = 360461;
        let quantity = 1;

        if (this.checked) {
            quantity = 1;
        }
        else {
            quantity = 0;
        }

        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 200);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });


    // Owl carousel
    if (jQuery('.la-reviews-carousel-section-wrap .owl-2').length > 0) {
        jQuery('.la-reviews-carousel-section-wrap .owl-2').owlCarousel({
            center: false,
            items: 1,
            loop: true,
            // stagePadding: 0,
            margin: 20,
            smartSpeed: 1000,
            // autoplay: true,
            nav: true,
            dots: true,
            pauseOnHover: false,
            responsive: {
                480: {
                    items: 2
                },
                1000: {
                    stagePadding: 0,
                    items: 3
                },
                1240: {
                    stagePadding: 0,
                    items: 4
                }
            }
        });
    }
    // Owl carousel
    if (jQuery('body.page-id-354284 #phlebotomy-page  .owl-2').length > 0) {
        jQuery('body.page-id-354284 #phlebotomy-page  .owl-2').owlCarousel({
            center: false,
            items: 1,
            loop: true,
            // stagePadding: 0,
            margin: 20,
            smartSpeed: 1000,
            autoplay: true,
            nav: true,
            dots: true,
            pauseOnHover: false,
            responsive: {
                600: {
                    items: 1
                },
                1000: {
                    stagePadding: 0,
                    items: 2
                }
            }
        });
    }
    // Owl carousel on FS
    if (jQuery('body.page-id-374924 .la-reviews-carousel-section-wrap .owl-carousel').length > 0) {
        jQuery('body.page-id-374924 .la-reviews-carousel-section-wrap .owl-carousel').owlCarousel({
            center: false,
            items: 1,
            loop: true,
            // stagePadding: 0,
            margin: 20,
            smartSpeed: 1000,
            autoplay: true,
            nav: true,
            dots: true,
            pauseOnHover: false,
            responsive: {
                600: {
                    items: 2
                },
                1000: {
                    stagePadding: 0,
                    items: 3
                }
            }
        });
    }
    // Owl carousel on FS
    if (jQuery('.owl-fsc-partners').length > 0) {
        jQuery('.owl-fsc-partners').owlCarousel({
            center: false,
            items: 2,
            loop: true,
            // stagePadding: 0,
            margin: 20,
            smartSpeed: 1000,
            autoplay: true,
            nav: true,
            dots: true,
            pauseOnHover: false,
            responsive: {
                600: {
                    items: 4
                },
                1000: {
                    stagePadding: 0,
                    items: 5
                }
            }
        });
    }

    // Exams/Courses Tab contents
    let fscCoursesBtn = jQuery('.fsc-buttons button#fsc-ce-courses');
    let fscExamsBtn = jQuery('.fsc-buttons button#fsc-ce-exams');
    let fscCourses = jQuery('.fsc-real-contents .courses');
    let fscExams = jQuery('.fsc-real-contents .exams');
    fscCoursesBtn.on('click', function () {
        fscExamsBtn.removeClass('active');
        jQuery(this).addClass('active');
        fscExams.hide();
        fscCourses.show();
    });
    fscExamsBtn.on('click', function () {
        fscCoursesBtn.removeClass('active');
        jQuery(this).addClass('active');
        fscCourses.hide();
        fscExams.show();
    });

    // Black Friday Top Bar Scripts
    let blackFridayDealTopBar = jQuery('.la-black-friday-deal-top-bar');
    let blackFridayDealTopBarBtn = jQuery('p.la-black-friday-deal-close-btn');
    blackFridayDealTopBarBtn.on('click', function (event) {
        event.preventDefault();
        console.log('Offer close btn clicked');
        blackFridayDealTopBar.addClass("la-hide-black-offer-top-bar");
        // blackFridayDealTopBar.hide();
    });

    /** 
     * ====================================================================
     * FSC Accordion script
     * ====================================================================
    */
    if (jQuery('body.page-id-374924 .accordion').length) {
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
    /** 
     * ====================================================================
     * Tutor Support script
     * ====================================================================
    */
    // if (jQuery('body.woocommerce-cart select.cart-select-tutor-support-hourly').length) {
    jQuery('body.woocommerce-cart').on('change', 'select.cart-select-tutor-support-hourly', function () {
        let priceEl = jQuery('.cart-switch-container.cart-select-tutor-support-hourly-wrap .cart-switch-prc b');
        let priceVal = jQuery(this).find(':selected').data('tutor-support-variable-price');
        let variationId = jQuery(this).val();
        // let priceWithCurrency = (variationId) == 'undefined' ? '£0' : '£' + priceVal;
        priceEl.text('£' + priceVal);
        console.log(variationId, priceVal);

        // jQuery('body').on('change', '#add-tutor-support-hourly-rate', function () {
        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': variationId,
                'quantity': 1
            },
            timeout: 10000,
            beforeSend: function () {
                jQuery('.la-cart-special-offers-overlay-layer').css('visibility', 'visible');
            },
            success: function (result) {
                jQuery('.la-cart-special-offers-overlay-layer').css('visibility', 'hidden');
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('button[name="update_cart"]').trigger("click");
                }, 10000);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
        // });
    });
    // }


    /**
     * Black Friday Deal - Checkout
     */
    jQuery('body').on('click', '#la-black-friday-deal-checkout-btn', function (event) {
        // let product_id = 360450;
        event.preventDefault();
        let product_id = jQuery(this).data('course-id');
        let quantity = 1;

        // if (this.checked) {
        //     quantity = 1;
        // }
        // else {
        //     quantity = 0;
        // }
        console.log(wc_add_to_cart_params.ajax_url, product_id, quantity);
        jQuery.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                'action': 'myajax_add_product_to_cart',
                'product_id': product_id,
                'quantity': quantity
            },
            timeout: 10000,
            success: function (result) {
                jQuery(document.body).trigger('wc_fragment_refresh');
                jQuery(document.body).trigger('added_to_cart');
                setTimeout(function () {
                    jQuery('body').trigger('update_checkout');
                }, 200);
                console.log(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

});

function getBlackFridayRemainingCountdown() {
    let blackFridayCountdownHolder = document.getElementsByClassName('la-show-black-friday-countdown-reminder')[1];
    let blackFridayDay = new Date("2023-11-25T00:00:00Z").getTime();

    // Update the countdown every second
    var x = setInterval(function () {

        // Get the current date and time
        var now = new Date().getTime();

        // Calculate the distance between now and the count down date
        var timeDistance = blackFridayDay - now;

        // Calculate the days, hours, minutes and seconds remaining
        var days = Math.floor(timeDistance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeDistance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeDistance % (1000 * 60)) / 1000);

        // Print the countdown
        blackFridayCountdownHolder.innerHTML = ' Only ' + days + ' days ' + hours + ' hours ' + minutes + ' minutes ' + seconds + ' seconds left at this price!';
        console.log('Countdown: ' + days + ' | ' + hours + ' | ' + minutes + ' | ' + seconds);

        // If the countdown is finished, display a message
        if (timeDistance < 0) {
            clearInterval(x);
            blackFridayCountdownHolder.innerHTML = "EXPIRED";
        }
    }, 1000);
}
getBlackFridayRemainingCountdown();