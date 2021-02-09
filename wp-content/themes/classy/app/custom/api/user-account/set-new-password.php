<?php
add_action('wp_ajax_user_account__set_new_password', 'user_account__set_new_password');
add_action('wp_ajax_nopriv_user_account__set_new_password', 'user_account__set_new_password');

function user_account__set_new_password() {


    $password = $_POST['password'];
    $code = $_POST['key'];
    $login = $_POST['username'];

    $is_error = false;

    if(!is_user_logged_in()) {
        $check_password_result = check_password_reset_key( $code, $login );
        $is_error = is_a($check_password_result, 'WP_Error');
        $user = get_user_by('login', $login);

        if(!$is_error) {
            wp_set_password($password, $user->ID);
        }
    }
    else {
        $user = wp_get_current_user();
        wp_set_password($password, $user->ID);
    }

    $response = [
        'success' => !$is_error,
        'user' => $is_error ? false : $user,
        'error' => $is_error ? $user : false
    ];

    echo json_encode($response);

    wp_die();
}