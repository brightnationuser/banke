<?php

add_action('wp_ajax_user_account__update', 'user_account__update');
add_action('wp_ajax_nopriv_user_account__update', 'user_account__update');

function user_account__update() {

    $user_id = get_current_user_id();

    $name = $_POST['name'];
    $company = $_POST['company'];
    $position = $_POST['position'];
    $email = $_POST['email'];

    $userdata = [
        'ID' => $user_id,
        'user_login' => $name,
        'user_email' => $email,
    ];

    $update_result = wp_update_user($userdata);
    $is_error = is_a($update_result, 'WP_Error');
    $error = false;
    $success = false;

    if ( $is_error ) {
        $error = $update_result->errors;
    }
    else {
        update_user_meta($user_id, 'company', $company);
        update_user_meta($user_id, 'position', $position);
        $success = true;
    }

    $response = [
        'user_updated' => !$is_error,
        'error' => $error,
        'success' => $success,
        'user' => [
            'username' => $name,
            'company' => $company,
            'position' => $position,
            'email' => $email,
        ]
    ];

    echo json_encode($response);

    wp_die();
}
