<?php
// $response['addition_infos'] = [$cart_course_id, $variation_ids];
$response['cart_redirect_url'] = wc_get_cart_url();
$response['user_id'] = get_current_user_id();
$response['user_name'] = get_user_meta($response['user_id'],'first_name',true);
$response['la_user_email'] = get_user_meta($response['user_id'],'user_email',true);
$response['user_phone'] = get_user_meta($response['user_id'],'billing_phone',true);
$response['la_course_id'] = $cart_course_id;
$response['variation_id'] = $variation_ids[0];
$response['user_obj'] = get_user_by('id', $response['user_id']);
$response['latest_obj'] = array($first_name,$last_name,$user_name,$password);
// $response['latest_obj_response'] = la_auth_user_login($user_name, $password, 'Login');

// When the Course Enrolling Request Only
if ( $request_for == '' && $request_for == '' ) {
    foreach( array_unique($variation_ids) as $variation_id ) {
        WC()->cart->add_to_cart( $cart_course_id, 1, $variation_id );
    }
    echo json_encode(
        array(
            'message'       => 'Course Added to Cart, Redirecting...',
            'cart_page_url' => wc_get_cart_url(),
        )
    );
    die();
}

// Studente login code
if ( $request_for == 'la_request_for_login' ) {
    $info = array();
    $info['user_login'] = $user_name;
    $info['user_password'] = $password;
    $info['remember'] = true;

    // From false to '' since v 4.9
    $user_signon = wp_signon( $info, '' );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        wp_set_current_user($user_signon->ID);  
        $escape_special_char = str_replace( '@', '', $user_signon->user_login );
        $escape_special_char = str_replace( '.', '-', $escape_special_char );

        foreach( array_unique($variation_ids) as $variation_id ) {
            WC()->cart->add_to_cart( $cart_course_id, 1, $variation_id );
        }

        // Insert Student data to DB
        $student_phone = get_user_meta($user_signon->data->ID,'billing_phone',true) ? get_user_meta($user_signon->data->ID,'billing_phone',true) : 'N/A';
        la_insert_to_abandoned_cart_tbl( $user_signon->data->ID, $user_signon->data->user_login, $user_signon->data->user_email, $student_phone, $cart_course_id );

        echo json_encode(
            array(
                'loggedin'      => true, 
                'message'       => 'Login Successful, Redirecting...',
                'cart_page_url' => wc_get_cart_url(),
            )
        );
    }

    die();
}

// Student registration code
if ( $request_for == 'la_request_for_registration' ) {
    $response = [];
    $userdata = get_user_by( 'email', $user_email );
    if( empty( $userdata ) )
    {                        
        $args = array(
            'user_pass'             => $password,   
            'user_login'            => la_get_student_name_from_email( $user_email ), 
            'user_email'            => $user_email,  
            'display_name'          => $first_name,   
            'first_name'            => $first_name, 
            'last_name'             => $last_name,  
            'role'                  => 'student',   
        );

        // Register a New User
        $login_info                     = array();
        $response['is_user_new']        = 1;
        $user_id                        = wp_insert_user( $args );
        $userdata                       = get_user_by( 'id', $user_id );
        $response['user_id']            = $user_id;
        $login_info['user_login']       = $userdata->user_login;
        $login_info['user_password']    = $password;
        $login_info['remember']         = true;
    
        $la_user_authenticate           = wp_signon( $login_info, '' );  
        if ( is_wp_error( $la_user_authenticate ) ) {
            $la_reset_password_url      = wp_lostpassword_url( get_permalink() );
            $response['message']        = 'Sorry! Authentication Error. Try to Login or';
            $response['lost_pass_url']  = $la_reset_password_url;
        } else {
            $response['message']        = 'Registration Success, Redirecting...';
            $response['cart_page_url']  = wc_get_cart_url();
        }
    } else {
        $response['is_user_new']    = 0;
        $response['user_id']        = $userdata->ID;
        $response['message']        = 'User Already Registered! Try to Login.';
    } 
    
    foreach( array_unique($variation_ids) as $variation_id ) {
        WC()->cart->add_to_cart( $cart_course_id, 1, $variation_id );
    }

    // Insert Student data to DB
    $student_obj = get_user_by('id', $response['user_id'])->data;
    $student_phone = get_user_meta($student_obj->ID,'billing_phone',true) ? get_user_meta($student_obj->ID,'billing_phone',true) : 'N/A';
    la_insert_to_abandoned_cart_tbl( $student_obj->ID, $student_obj->user_login, $student_obj->user_email, $student_phone, $cart_course_id );

    echo json_encode($response);
    die();
}

// Get username from email
function la_get_student_name_from_email( $email ) {
    $user_email_parts = explode('@', $email);
    return $user_email_parts[0];
}

// Insert Student data to DB
function la_insert_to_abandoned_cart_tbl( $student_id, $student_name, $student_email, $student_phone, $product_id ) {
    global $wpdb;
    $table_name = $wpdb->base_prefix.'la_abandoned_cart_tbl';
    $cart_tbl_insert = $wpdb->insert( 
        $table_name, 
        array( 
            'student_id' 		=> $student_id, 
            'student_name' 		=> $student_name, 
            'student_email' 	=> $student_email, 
            'student_phone' 	=> $student_phone, 
            'student_product_id'=> $product_id, 
            'cart_time' 		=> current_time('mysql', 1),
        ), 
        array( 
            '%s', 
            '%s', 
            '%s', 
            '%s', 
            '%s', 
            '%s', 
        ) 
    );

    return $cart_tbl_insert;
}