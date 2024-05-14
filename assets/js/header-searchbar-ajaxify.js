jQuery(document).ready(function () {
    console.log('header search');
    function la_header_searchbar_ajaxify() {
        let search_btn = jQuery('#header-search #search-submit');
        search_btn.on('click', function (e) {
            e.preventDefault();
        });
        let search_keyword = jQuery('#header-search #search-box').val();
        jQuery.ajax({
            url: header_searchbar_ajaxify.ajax_url,
            type: 'post',
            data: { action: 'data_fetch', keyword: search_keyword },
            success: function (data) {
                // jQuery('#datafetch').html(data);
                console.log(data);
            }
        });

    }
});