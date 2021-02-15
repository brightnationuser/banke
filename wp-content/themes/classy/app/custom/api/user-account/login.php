<?php

add_action('wp_ajax_user_account__login', 'user_account__login');
add_action('wp_ajax_nopriv_user_account__login', 'user_account__login');

function user_account__login() {

    $credentials = [
        'user_login' => $_POST['email'],
        'user_password' => $_POST['password'],
        'remember' => true
    ];

    if ( ! empty( $credentials['user_login'] ) && is_email( $credentials['user_login'] ) ) {
        if ( $user = get_user_by_email( $credentials['user_login'] ) ) {
            $credentials['user_login'] = $user->user_login;
        }
    }

    $user = wp_signon($credentials);

    $response = [
        'success' => !is_wp_error($user),
    ];

    if(!is_wp_error($user)) {
        $user_meta = get_user_meta($user->ID);
        $response['user'] = [
            'id' => $user->ID,
            'username' => $user->user_login,
            'email' => $user->user_email,
            'photo' => $user_meta['b_user_photo'][0],
            'company' => $user_meta['company'][0],
            'position' => $user_meta['position'][0]
        ];
    }

    echo json_encode($response);

    wp_die();
}