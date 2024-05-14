jQuery(function($) {
    $('body').on('click', '.add-to-cart-button', function(e) {
        e.preventDefault();
        var product_id = $(this).data('product_id');
        var quantity = $(this).data('quantity');
        var data = {
            action: 'add_to_cart',
            product_id: product_id,
            quantity: quantity,
        };

        $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            success: function(response) {
                // Handle the response here (e.g., update the cart widget)
                console.log(response);
            },
        });
    });
});
