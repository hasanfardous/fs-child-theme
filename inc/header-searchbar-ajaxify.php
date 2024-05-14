<?php
// add the ajax fetch js
add_action( 'wp_footer', 'la_header_search_ajaxify_script' );
function la_header_search_ajaxify_script() {
    ?>
    <script type="text/javascript">
        let search_btn = jQuery('#header-search #search-submit');
        search_btn.on('click', function (e) {
            e.preventDefault();
            console.log('search but clicked');
        });
        function la_header_searchbar_ajaxify(){
            let search_keyword = jQuery('#header-search #search-box').val();
            let result_content_el = jQuery('#header-search .header-searchbar-result-contents');
            console.log(search_keyword);
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: { action: 'la_header_search_ajaxify', keyword: search_keyword },
                beforeSend: function() {
                    result_content_el.show();
                },
                success: function(data) {
                    console.log(data);
                    // result_content_el.show();
                    result_content_el.html( data );
                }
            });
        }
        jQuery(document).mouseup(function(e){
            let result_content_el = jQuery('#header-search .header-searchbar-result-contents');
            if (!result_content_el.is(e.target) && result_content_el.has(e.target).length === 0) {
                result_content_el.hide();
            }
        });
    </script>
    <?php
}

// Header searchbar ajaxify function
add_action('wp_ajax_la_header_search_ajaxify' , 'la_header_search_ajaxify_func');
add_action('wp_ajax_nopriv_la_header_search_ajaxify','la_header_search_ajaxify_func');
function la_header_search_ajaxify_func(){
    global $wpdb;
    $search_term = esc_attr( $_POST['keyword'] );
    $the_query = "
    SELECT      *
    FROM        $wpdb->posts
    WHERE       post_title LIKE '$search_term%'
    AND         post_type = 'product'
    AND         post_status = 'publish'
    AND         ID NOT IN (366854,365820,365816,365810,365807,365013, 365077,365273,365011,366572,367525,366568,360450,365275, 371853, 371854, 370865, 369309, 367348, 371920)
    ORDER BY    post_title
";
$the_query = $wpdb->get_results($the_query);
    $results = count((array)$the_query);
    if ( $results > 0 ) {
        echo '<ul class="result-'.$results.'">';
        foreach( $the_query as $item ) :
            $post = get_post( $item );
            ?>
            <li><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title?></a></li>
        <?php endforeach;
        echo '</ul>';
        wp_reset_postdata();  
    } else {
        echo '<h3 class="no-search-contents-found">Sorry! No content found.</h3>';
    }

    die();
}

// .header-searchbar-result-contents::after {
//     content: '\f110';
//     font-family: 'FontAwesome';
//     font-size: 30px;
//     position: absolute;
//     width: 30px;
//     height: 40px;
//     top: 0;
//     bottom: 0;
//     left: 0;
//     right: 0;
//     margin: auto;
//     color: #fff;
// }

// .header-searchbar-result-contents::before {
//     content: '';
//     position: absolute;
//     width: 100%;
//     height: 100%;
//     top: 0;
//     left: 0;
//     background: #af1f47ab;
// }