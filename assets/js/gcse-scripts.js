(function ($) {
    $(document).ready(function () {
        console.log('Consoling from gcse js');

        let foundationBtn = $('#gcse-foundation-option-action');
        let higherBtn = $('#gcse-higher-option-action');
        let foundationSingleItem = $('.gcse-right-price-selection-single.foundation_tier');
        let higherSingleItem = $('.gcse-right-price-selection-single.higher_tier');
        let courseTotalEl = $('.gcse-total-course-fees span.gcse-course-dynamic-fee');
        let monthlyVarId = $('.gcse-right-price-selection-single.foundation_tier.monthly_pack').find('input[name=gcse-course-option]').data('var-id');
        let monthlyVarPrice = $('.gcse-right-price-selection-single.foundation_tier.monthly_pack').find('input[name=gcse-course-option]').val();
        let monthlyPayItem = $('.gcse-right-price-selection-single.pay-monthly').find('input[name=gcse-payment-option]');
        let upfrontPayItem = $('.gcse-right-price-selection-single.pay-upfront').find('input[name=gcse-payment-option]');

        // Set the Variation price and id
        // monthlyPayItem.val(monthlyVarPrice);
        monthlyPayItem.attr('data-var-id', '');

        foundationBtn.on('change', function () {
            console.log('Foundation btn', monthlyVarId, monthlyVarPrice);
            $('.gcse-right-price-selection-single.foundation_tier:not(monthly_pack)').show();
            $('.gcse-right-price-selection-single.foundation_tier.monthly_pack').hide();
            $('.gcse-right-price-selection-single.higher_tier:not(monthly_pack)').hide();
            // Set the Variation price and id
            monthlyPayItem.val(monthlyVarPrice);
            monthlyPayItem.data('var-id', monthlyVarId);
        });
        higherBtn.on('change', function () {
            $('.gcse-right-price-selection-single.higher_tier:not(monthly_pack)').show();
            $('.gcse-right-price-selection-single.higher_tier.monthly_pack').hide();
            $('.gcse-right-price-selection-single.foundation_tier:not(monthly_pack)').hide();
            console.log('Higher btn');

            // Set the higher tier variation price and id
            monthlyHigherVarId = $('.gcse-right-price-selection-single.higher_tier.monthly_pack').find('input[name=gcse-course-option]').data('var-id');
            monthlyHigherVarPrice = $('.gcse-right-price-selection-single.higher_tier.monthly_pack').find('input[name=gcse-course-option]').val();
            // Set the Variation price and id
            monthlyPayItem.val(monthlyHigherVarPrice);
            monthlyPayItem.data('var-id', monthlyHigherVarId);
        });

        let singleItemPrice = 0;
        let singleItemVar = 0;
        let gcseCourseId = 0;
        let gcseSecVarId = '';
        foundationSingleItem.on('change', function () {
            let courseInputEl = $(this).find('input[name=gcse-course-option]');
            courseTotalEl.html(courseInputEl.val());
            singleItemPrice = parseInt(courseInputEl.val());
            singleItemVar = courseInputEl.data('var-id');
            monthlyPayItem.prop('checked', false);
            let theMonthlyVal = $(this).next().find('input[name=gcse-course-option]');
            console.log(theMonthlyVal.val(), theMonthlyVal.data('var-id'));
            // Set the Variation price and id
            monthlyPayItem.val(theMonthlyVal.val());
            monthlyPayItem.data('var-id', theMonthlyVal.data('var-id'));
        });
        higherSingleItem.on('change', function () {
            let courseInputEl = $(this).find('input[name=gcse-course-option]');
            courseTotalEl.html(courseInputEl.val());
            singleItemPrice = parseInt(courseInputEl.val());
            singleItemVar = courseInputEl.data('var-id');
            monthlyPayItem.prop('checked', false);
            let theMonthlyVal = $(this).next().find('input[name=gcse-course-option]');
            console.log(theMonthlyVal.val(), theMonthlyVal.data('var-id'));
            // Set the Variation price and id
            monthlyPayItem.val(theMonthlyVal.val());
            monthlyPayItem.data('var-id', theMonthlyVal.data('var-id'));
        });
        monthlyPayItem.on('change', function () {
            courseTotalEl.html($(this).val() + '/month + (VAT)');
            gcseSecVarId = $(this).data('var-id');
        });
        upfrontPayItem.on('change', function () {
            courseTotalEl.html(singleItemPrice + ' + (VAT)');
            gcseSecVarId = '';
        });

        let enrolBtnEl = $('.gcse-total-course-fees #gcse-enroll-btn');
        enrolBtnEl.on('click', function (e) {
            e.preventDefault();
            gcseCourseId = $(this).data('course-id');
            console.log(gcseCourseId, singleItemVar);
            if (singleItemVar == '' && gcseSecVarId == '') {
                $('p.gcse-course-ajax-confirmation-message').text('Sorry, Empty field not allowed.');
                return;
            } else {
                let data = {
                    action: 'gcse_action',
                    course_id: gcseCourseId,
                    variation_id: singleItemVar,
                    sec_variation_id: gcseSecVarId,
                };
                console.log(data);
                $.ajax({
                    dataType: 'json',
                    type: 'post',
                    url: gcse_obj.ajax_url,
                    data: data,
                    beforeSend: function (response) {
                        $('p.gcse-course-ajax-confirmation-message').text('Processing..');
                    },
                    complete: function (response) {
                        console.log('completed');
                    },
                    success: function (response) {
                        console.log(response);
                        $('p.gcse-course-ajax-confirmation-message').text(response.message);
                        if (response.status == 'success') {
                            window.location.href = gcse_obj.cart_url;
                        }
                    },
                });
            }
        });
    });
})(jQuery);