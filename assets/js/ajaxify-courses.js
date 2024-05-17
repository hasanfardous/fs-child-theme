(function ($) {
    $(document).ready(function () {
        if ($('body.woocommerce-shop .la-course-price p').length) {
            let freeCourseEl = $('.la-course-price p');
            freeCourseEl.each(function () {
                if ($(this).text().length == 5 && $(this).text().includes('0.00', 1)) {
                    $(this).text('Free');
                }
            });
        }

        if ($('body.single-product #exam-board-options').length) {
            console.log($('.exam-board-single-option').length);
        }

        if ($('#la-single-curriculum').length || $('#la-single-curriculum-sml').length) {
            // $(document).on('click', '#la-faq-accordion .mcdt-toggle, #la-single-curriculum .mcdt-toggle').click(function (e) {
            $(document).on('click', '#la-single-curriculum .mcdt-toggle, #la-single-curriculum-sml .mcdt-toggle', function (e) {
                e.preventDefault();

                let $this = $(this);

                // $this.addClass('mcdt-toggle-show');

                $this.next().slideToggle(250);

                if ($this.hasClass('mcdt-toggle-show')) {
                    $this.removeClass('mcdt-toggle-show');
                }
                else {
                    $this.addClass('mcdt-toggle-show');
                }
            });
        }

        // $(document).on('click', '#mobile-course-menu-dropdown-btn', function (event) {
        //     event.preventDefault();
        //     let mobileCourseMenuEl = $('#mobile-course-menu');
        //     mobileCourseMenuEl.removeClass('show');
        //     // $(this).next().addClass('show');
        //     // console.log('before condition');
        //     if (mobileCourseMenuEl.hasClass('show')) {
        //         console.log('has class');
        //         mobileCourseMenuEl.removeClass('show');
        //     } else {
        //         console.log('has not class');
        //         mobileCourseMenuEl.addClass('show');
        //     }
        //     // console.log('out of condition');
        // });

        $('.exam-board-single-option input[type="radio"]').on('change keyup', function () {
            var courseTotalEl = $('#exam-board-total .course-sale-price');
            var coursePrevPriceEl = $('#exam-board-total .course-prev-price');
            if ($(this).prop('checked')) {
                $('.exam-board-single-option').removeClass('checked');
                $(this).closest('.exam-board-single-option').addClass('checked');
                var selectedCheckedVal = parseInt($(this).val());
                var productPrevVal = parseInt($(this).data('var-prev-price'));
                courseTotalEl.html(selectedCheckedVal);
                coursePrevPriceEl.html(productPrevVal);
            }
            // else {
            //     $(this).closest('.exam-board-single-option').removeClass('checked');
            //     var selectedCheckedVal = parseInt($(this).val());
            //     courseTotalEl.html(selectedCheckedVal);
            // }
        });

        $('.exam-board-single-option').on('click', function () {
            console.log($(this).find('input[name=board-radio]'));
            var courseTotalEl = $('#exam-board-total .course-sale-price');
            var coursePrevPriceEl = $('#exam-board-total .course-prev-price');
            var thisBoardEl = $(this).find('input[name=board-radio]');
            thisBoardEl.attr('checked', true);
            if (thisBoardEl.prop('checked')) {
                $('.exam-board-single-option').removeClass('checked');
                $(this).addClass('checked');
                var selectedCheckedVal = parseInt(thisBoardEl.val());
                var productPrevVal = parseInt(thisBoardEl.data('var-prev-price'));
                courseTotalEl.html(selectedCheckedVal);
                coursePrevPriceEl.html(productPrevVal);
            }
        });

        let courseCardBox = $('div.container.all-courses-sc2 ul.products');

        // Category ajaxify scripts
        // $(document).on('click', '#woocommerce_product_categories-2 ul.product-categories li.cat-item a', function (e) {
        //     e.preventDefault();
        //     $('html, body').animate({
        //         scrollTop: $("header#header").offset().top
        //     }, 200);
        //     let courseClasses = $(this).parent().parent().prop('className').split(/\s+/)[1];
        //     let sectionBanner = $('section.all-courses-1s div#all-courses-banner-content');
        //     let catText = $(this).text();
        //     let wcPagination = $('nav.woocommerce-pagination');
        //     let courseId = courseClasses.split('-').pop();
        //     let wcResultCount = $('div.container.all-courses-sc1 p.woocommerce-result-count');
        //     let wcTotalProducts = ajaxify_courses_ot.total_products;
        //     sectionBanner.find('p.all-course-heading').remove();
        //     sectionBanner.find('h2.all-course-heading').text(catText);
        //     courseCardBox.find('div.course-card-box').remove();
        //     wcPagination.remove();
        //     courseCardBox.append('<h3>Loading Courses..</h3>');
        //     console.log(courseClasses);
        //     console.log(courseId);
        //     console.log(ajaxify_courses_ot.total_products);

        //     var data = {
        //         action: 'ajaxify_courses_ot',
        //         course_id: courseId,
        //         total_products: ajaxify_courses_ot.total_products,
        //     };
        //     $.ajax({
        //         dataType: 'json',
        //         type: 'post',
        //         url: ajaxify_courses_ot.ajax_url,
        //         data: data,
        //         beforeSend: function (response) {
        //             console.log('before send');
        //         },
        //         complete: function (response) {
        //             console.log('completed');
        //         },
        //         success: function (response) {
        //             console.log(response);
        //             wcResultCount.text('Showing 1–' + response.courses.length + ' of ' + wcTotalProducts + ' results');
        //             courseCardBox.find('h3').remove();
        //             courseCardBox.append(response.courses);
        //         },
        //     });
        // });


        // Pagination ajaxify scripts
        // $(document).on('click', 'div.container.all-courses-sc2 nav.woocommerce-pagination ul li a', function (e) {
        //     e.preventDefault();
        //     let curPage = $(this).text();
        //     console.log(curPage);
        //     let wcPagination = $('nav.woocommerce-pagination');
        //     wcPagination.remove();
        //     courseCardBox.find('div.course-card-box').remove();
        //     courseCardBox.append('<h3>Loading Courses..</h3>');

        //     var data = {
        //         action: 'ajaxify_courses_ot',
        //         cur_page: curPage,
        //     };
        //     $.ajax({
        //         dataType: 'json',
        //         type: 'post',
        //         url: ajaxify_courses_ot.ajax_url,
        //         data: data,
        //         beforeSend: function (response) {
        //             console.log('before send');
        //         },
        //         complete: function (response) {
        //             console.log('completed');
        //         },
        //         success: function (response) {
        //             console.log(response);
        //             // wcResultCount.text('Showing 1–' + response.courses.length + ' of ' + wcTotalProducts + ' results');
        //             courseCardBox.find('h3').remove();
        //             courseCardBox.append(response.courses);
        //             courseCardBox.after(response.products_pagination);
        //         },
        //     });
        //     return false;
        // });

        // Ordering ajaxify scripts
        // $('div.all-courses-sc1 form.woocommerce-ordering > select').on('change', function (e) {
        //     e.preventDefault();
        //     let course_order = $(this).val();
        //     let wcPagination = $('nav.woocommerce-pagination');
        //     courseCardBox.find('div.course-card-box').remove();
        //     wcPagination.remove();
        //     courseCardBox.append('<h3>Loading Courses..</h3>');
        //     var data = {
        //         action: 'ajaxify_courses_ot',
        //         course_order: course_order,
        //     };
        //     $.ajax({
        //         dataType: 'json',
        //         type: 'post',
        //         url: ajaxify_courses_ot.ajax_url,
        //         data: data,
        //         beforeSend: function (response) {
        //             console.log('before send');
        //         },
        //         complete: function (response) {
        //             console.log('completed');
        //         },
        //         success: function (response) {
        //             console.log(response);
        //             courseCardBox.find('h3').remove();
        //             courseCardBox.append(response.courses);
        //             courseCardBox.after(response.products_pagination);
        //         },
        //     });
        //     return false;
        // });

        // Course enrolling scripts
        $('body.single.single-product a#enroll-btn').on('click', function (e) {
            e.preventDefault();
            let $this = $(this);
            let courseId = $('body.single.single-product div#exam-board-options').data('course-id');
            let variationIds = [];
            let singleCourseEl = $('#exam-board-options div.checked');
            if (singleCourseEl.length > 0) {
                let singleCourseInput = $('#exam-board-options input[name="board-radio"]');
                if (!singleCourseInput.is(':checked')) {
                    alert('Please select an item first!');
                    return;
                }

                // Pushing Variable ids to an Array
                variationIds.push(singleCourseEl.data('variation-id'));

                // While it's a simple Course
                if (variationIds.length === 0) {
                    alert('Nothing to add as it\'s a simple Course');
                    return;
                }

                // While Student not Loggedin
                if ($('body.single.single-product a#enroll-btn.la_not_logged_in_user').length > 0) {
                    console.log('user not logged in', $(this).data('login-url'));

                    // window.location.href = $(this).data('login-url');
                    let authenticationModalEl = $('#la-authentication-modal');
                    let enrollBtnEl = $('body.single.single-product a#enroll-btn.la_not_logged_in_user');
                    $('#la-authentication-modal span.close').on('click', function (event) {
                        authenticationModalEl.hide();
                    });

                    // Show the Login/Registration Modal
                    authenticationModalEl.show();

                    $('body').on('click', '.la-course-login-btn, .la-course-register-btn', function (e) {
                        e.preventDefault();
                        // enrollBtnEl.prop('disabled', true);
                        let userData = {};
                        let ajaxUrl = ajaxify_courses_ot.ajax_url;
                        let la_auth_action = 'ajaxify_courses_ot';
                        let emailValidatorPattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                        if ($(this).text() == 'Login') {
                            let responseEl = $(this).parent().next();
                            responseEl.text('Login..');
                            console.log('cicked login scripts');
                            userData.userName = $('.la-login-username').val();
                            userData.password = $('.la-login-password').val();
                            if (userData.userName == '' || userData.password == '') {
                                responseEl.text('Empty field not allowed');
                                return;
                            }
                            console.log(userData, ajaxUrl, la_auth_action, courseId, variationIds);
                            la_get_authenticated_user_id(ajaxUrl, la_auth_action, userData, courseId, variationIds, responseEl, 'la_request_for_login');
                        } else {
                            console.log('cicked reg scripts');
                            let responseEl = $(this).parent().next();
                            responseEl.text('Registering..');
                            // let la_auth_action = 'la_registration_action';
                            let userEmail = $('.la-reg-login-email').val();
                            userData.firstName = $('.la-reg-login-firstname').val();
                            userData.lastName = $('.la-reg-login-lastname').val();
                            userData.password = $('.la-reg-login-password').val();
                            if (userData.firstName == '' || userEmail == '' || userData.password == '') {
                                responseEl.text('Empty field not allowed');
                                return;
                            }
                            if (emailValidatorPattern.test(userEmail)) {
                                userData.userEmail = userEmail;
                            } else {
                                responseEl.text('Email is not valid');
                                return;
                            }
                            console.log(la_auth_action, userData, ajaxUrl);
                            la_get_authenticated_user_id(ajaxUrl, la_auth_action, userData, courseId, variationIds, responseEl, 'la_request_for_registration');
                        }

                    });
                    return;
                } else {
                    $this.css('pointer-events', 'none');
                    console.log('user logged in');
                    let data = {
                        action: 'ajaxify_courses_ot',
                        cart_course_id: courseId,
                        variation_ids: variationIds,
                    };
                    console.log(data);
                    $.ajax({
                        dataType: 'json',
                        type: 'post',
                        url: ajaxify_courses_ot.ajax_url,
                        data: data,
                        beforeSend: function (response) {
                            console.log('before send');
                            $this.next().text('Processing..');
                        },
                        complete: function (response) {
                            console.log('completed');
                        },
                        success: function (response) {
                            console.log(response);
                            $this.next().text('Redirecting to Cart..');
                            window.location.href = response.cart_page_url;
                        },
                    });
                    return false;
                }
            } else {
                alert('Please, change/select an item!');
            }
        });



        // login_success_url
        function la_get_authenticated_user_id(ajaxUrl, action, userData, courseId, variationIds, responseEl, requestFor) {
            let data = {
                action: action,
                password: userData.password,
                cart_course_id: courseId,
                variation_ids: variationIds,
                request_for: requestFor,
            };
            if (requestFor == 'la_request_for_login') {
                data.user_name = userData.userName
            } else {
                data.first_name = userData.firstName,
                    data.last_name = userData.lastName,
                    data.user_email = userData.userEmail
            }
            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                dataType: 'json',
                data: data,
                // timeout: 10000,
                success: function (data) {
                    console.log(data);
                    responseEl.text(data.message);
                    if ((data.cart_page_url != '' && data.is_user_new == 1) || (data.loggedin == true && data.cart_page_url != '' && data.cart_page_url != undefined)) {
                        document.location.href = data.cart_page_url;
                    } else {
                        responseEl.text(data.message);
                        let thisFormEl = responseEl.closest('form');
                        thisFormEl.trigger('reset');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }

        // Course Ajaxify
        jQuery('.fs-single-purchasing-btns-wrap a').on('click', function (e) {
            e.preventDefault();
            let _this = jQuery(this);
            _this.closest('.fs-single-purchasing-option').find('.fs-single-purchasing-btns-wrap a').removeClass('selected-btn');
            _this.addClass('selected-btn');
        });

        var coursePriceEl = jQuery('.fs-single-purchasing-btn.text-center h4');
        var courseDateTimeConfirmEl = jQuery('.fs-single-purchasing-confirmatio p');
        var courseDateTime = {};
        jQuery(document).on('click', '.fs-single-booking-btn-date-time', function () {
            let _this = jQuery(this);
            let elementsTogether = _this.data('event-info');
            courseDateTime['date'] = _this.data('event-date-time');
            let regexPattern = /^(\d{1,2}:\d{2}\s(?:AM|PM))\s\((.*?)\)$/;
            let matchPattern = elementsTogether.match(regexPattern);
            courseDateTime['time'] = matchPattern[1];
            jQuery('#fs-single-booking-btns .fs-single-booking-btn-date-time').removeClass('active');
            _this.addClass('active');
            if (matchPattern) {
                console.log(matchPattern);
                coursePriceEl.text(matchPattern[2]);
                coursePriceEl.attr('data-day-time', courseDateTime);
                courseDateTimeConfirmEl.text('When you place your order, your booking will be confirmed for: ' + jQuery(this).data('event-date-time') + ' at ' + matchPattern[1]);
                courseDateTimeConfirmEl.addClass('added-data');
                console.log(courseDateTime);
            } else {
                console.log('did not match');
            }
        });

        // Adding to Cart Script
        jQuery(document).on('click', '.fs-single-purchasing-btn.text-center .fs-single-purchasing-to-cart', function (e) {
            e.preventDefault();
            let _this = jQuery(this);
            let courseID = _this.data('course-id');
            let confirmationMesgEl = _this.next('span.fs-single-confirmation-message');
            console.log(jQuery('#fs-single-booking-btns .fs-single-booking-btn-date-time.active').data('event-date-time'));

            console.log(jQuery('.fs-single-purchasing-btns-wrap').length);
            var course_opt = {
                action: 'fs_ajaxify_course',
                _wpnonce: ajaxify_courses_ot.nonce,
                course_id: courseID
            };
            jQuery('.fs-single-purchasing-btns-wrap').each(function (index, value) {
                let childObj = {};
                let optionsEl = jQuery(this).find('a.selected-btn').text();
                let optionsVal = jQuery(this).find('a.selected-btn').data('options-val');
                childObj['label'] = optionsEl;
                childObj['value'] = optionsVal;
                course_opt[index] = childObj;
            });
            course_opt['event-day-time'] = { date: courseDateTime['date'], time: courseDateTime['time'] };
            course_opt['event-price'] = coursePriceEl.text().substring(1);
            console.log(course_opt);
            $.ajax({
                dataType: 'json',
                type: 'post',
                url: ajaxify_courses_ot.ajax_url,
                data: course_opt,
                beforeSend: function (response) {
                    confirmationMesgEl.text('Processing..');
                    console.log('sending..');
                },
                complete: function (response) {
                    console.log('completed');
                    confirmationMesgEl.text('Added to Cart, redirecting..');
                },
                success: function (response) {
                    console.log(response);
                    // $('p.gcse-course-ajax-confirmation-message').text(response.message);
                    if (response.cart_id !== '') {
                        window.location.href = response.cart_page_url;
                    }
                },
            });
        });

        // Tabbed scripts
        $('#fs-single-course-btns .single-btn-item').on('click', function () {
            console.log('tab item clicked');
            $this = $(this);
            $tabListItem = $('#fs-single-course-btns .single-btn-item');
            $tabListItem.removeClass('active');
            $this.addClass('active');
            $activeNab = $this.data('tab-btn-item');
            $('.fs-single-course-tabbed-contents').removeClass('active');
            $activeTab = $('div[data-tab-content-item="' + $activeNab + '"]');
            $activeTab.addClass('active');
        });

        // Accordion scripts
        $('.fs-single-course-accordion-item h3').on('click', function () {
            console.log('Accordion item clicked');
            $this = $(this);
            $parentItem = $this.parent();
            if ($parentItem.hasClass('active')) {
                $parentItem.removeClass('active');
            } else {
                $parentItem.addClass('active');
            }
        });
    });
})(jQuery);