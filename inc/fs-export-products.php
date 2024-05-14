<?php
add_action('init', 'la_products_export_func');

function la_products_export_func(){
    if ( isset( $_GET['la-products-export'] ) ) {

        $filename = 'la-products-' . date("Y-m-d: H:i") . '.csv';

        $header_row = array(
            0 => 'Product ID',
            1 => 'Product Title',
            2 => 'Product Variation IDs',
            3 => 'Product Cats.',
            4 => 'Product URL',
        );

        $args = array(
            'limit' => -1,
            'page'  => 1,
        );
        $products = wc_get_products( $args );
        foreach( $products as $product ) {
            $product_cats = [];
            $terms = get_the_terms( $product->get_id(), 'product_cat' );
            foreach( $terms as $term ){
                $product_cats[] = $term->name;
            }
            // $product_cats = implode(', ', $terms);
            $all_products[] = [
                $product->get_id(),
                $product->get_title(),
                $product->get_type() == 'variable' ? implode(', ', $product->get_children()) : '',
                implode(', ', $product_cats),
                $product->get_permalink(),
            ];
        }

        wp_reset_query();

        // echo '<pre>';
        // print_r($all_products);

        $fh = @fopen( 'php://output', 'w' );

        fprintf( $fh, chr(0xEF) . chr(0xBB) . chr(0xBF) );

        header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
        header( 'Content-Description: File Transfer' );
        header( 'Content-type: text/csv' );
        header( "Content-Disposition: attachment; filename={$filename}" );
        header( 'Expires: 0' );
        header( 'Pragma: public' );

        fputcsv( $fh, $header_row );

        foreach ( $all_products as $data_row ) {
            fputcsv( $fh, $data_row );
        }

        fclose( $fh );
        die();
    }
}