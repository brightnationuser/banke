<?php

add_action('wp_ajax_user_account__log_out', 'user_account__log_out');
add_action('wp_ajax_nopriv_user_account__log_out', 'user_account__log_out');

function user_account__log_out() {

    if(is_user_logged_in()) {

        wp_logout();

        $response = [
            'success' => true,
            'message' => 'The user logged out'
        ];
    }
    else {
        $response = [
            'success' => false,
            'message' => 'The user is not logged in'
        ];
    }

    echo json_encode($response);

    wp_die();
}