<?php
// Creating custom route
add_action( 'rest_api_init', function () {
	register_rest_route( 'wc/v3', 'la-orders', array(
		'methods' => 'GET',
		'callback' => 'get_orders',
        'permission_callback' => function() { return ''; }
	));
});

// Custom route callback func
function get_orders( $data ) {
    
    $starting_date = $data->get_param('starting_date');
    $ending_date = $data->get_param('ending_date');

    $after_date = strtotime($starting_date . ' 00:00:00');
    $before_date = strtotime($ending_date . ' 23:59:59');

    $args = array(
        'limit' => '-1',
        'status' => array('completed'),
        'date_completed' => $after_date.'...'.$before_date,
        'return'    => 'ids'
    );

    $orders = wc_get_orders( $args );
    $order_infos = [];
    foreach( $orders as $order ) {
        $order_obj = wc_get_order($order);

        $products = [];
        foreach( $order_obj->get_items() as $item ) {
            $product_id = $item->get_product_id();
            $products[] = [
                'product_id' => $product_id,
                'lms_course_id' => get_post_meta( $product_id, 'lms_course_id', true ),
            ];
        }

        $order_infos[] = [
            'billing_email' => $order_obj->get_billing_email(),
            'products'      => $products
        ];
    }

    return $order_infos;
}