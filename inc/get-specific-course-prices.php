<?php
$current_product_id = $attributes['product_id'] ? $attributes['product_id'] : '364491';
$product = wc_get_product($current_product_id);
if ( $product && $product->get_type() == 'variable' ) {
    $variations = $product->get_available_variations();
    $first_variation_id = count($variations) > 0 ? $variations[0]['variation_id'] : '';
	$child_item 		= $first_variation_id ? wc_get_product($first_variation_id) : '';
    echo $child_item ? $child_item->get_price_html() : '0';
} else {
    echo $product->get_price_html();
}