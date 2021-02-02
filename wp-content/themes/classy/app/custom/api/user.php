<?php

require_once ABSPATH . WPINC .'/registration.php';

add_action('wp_ajax_user_account__create', 'user_account__create');
add_action('wp_ajax_nopriv_user_account__create', 'user_account__create');

function user_account__create() {

    $name = $_POST['name'];
    $company = $_POST['company'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user_id = wp_create_user($name, $password, $email);
    add_user_meta($user_id, 'company', $company);
    add_user_meta($user_id, 'position', $position);
    $is_error = is_a($user_id, 'WP_Error');

    $data = [
        'name' => $name,
        'company' => $company,
        'position' => $position,
        'email' => $email
    ];

    $body = \Helpers\General::getEmailHtml($data, ['en' => 'email.email-sign-up']);
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: Banke <localhost@banke-pro.loc>';

    if(!$is_error) {
        $mail_sent = wp_mail($email, 'Registration Banke', $body, $headers);
    }
    else {
        $mail_sent = false;
    }

    $response = [
        'mail_sent' => $mail_sent,
        'user_created' => !$is_error,
        'error' => $is_error ? $user_id->errors : ''
    ];

    echo json_encode($response);

    wp_die();
}

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
            'photo' => get_avatar_url($user),
            'company' => $user_meta['company'],
            'position' => $user_meta['position']
        ];
    }

    echo json_encode($response);

    wp_die();
}

add_action('wp_ajax_user_account__restore_password', 'user_account__restore_password');
add_action('wp_ajax_nopriv_user_account__restore_password', 'user_account__restore_password');

function user_account__restore_password() {

    $email = $_POST['email'];

    $user_has_email = email_exists($email);
    $user = get_userdata($user_has_email);

    $is_error = $user_has_email === false;

    if(!$is_error) {
        $data = [
            'key' => get_password_reset_key($user),
            'email' => $email,
            'username' => $user->user_login
        ];


        $body = \Helpers\General::getEmailHtml($data, ['en' => 'email.email-reset-password']);

        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: Banke <localhost@banke-pro.loc>';
        $mail_sent = wp_mail($email, 'Registration Banke', $body, $headers);
    }
    else {
        $mail_sent = false;
    }

    $response = [
        'success' => $mail_sent
    ];

    echo json_encode($response);

    wp_die();
}

add_action('wp_ajax_user_account__set_new_password', 'user_account__set_new_password');
add_action('wp_ajax_nopriv_user_account__set_new_password', 'user_account__set_new_password');

function user_account__set_new_password() {

    $password = $_POST['password'];
    $code = $_POST['key'];
    $login = $_POST['username'];

    $check_password_result = check_password_reset_key( $code, $login );
    $is_error = is_a($check_password_result, 'WP_Error');
    $user = get_user_by('login', $login);

    if(!$is_error) {
        wp_set_password($password, $user->ID);
    }

    $response = [
        'success' => !$is_error,
        'user' => $is_error ? false : $check_password_result,
        'error' => $is_error ? $check_password_result : false
    ];

    echo json_encode($response);

    wp_die();
}

add_action('wp_ajax_user_account__check', 'user_account__check');
add_action('wp_ajax_nopriv_user_account__check', 'user_account__check');

function user_account__check() {

    if(is_user_logged_in()) {
        $user = wp_get_current_user();
        $user_meta = get_user_meta($user->ID);

        $response = [
            'success' => true,
            'user' => [
                'id' => $user->ID,
                'username' => $user->user_login,
                'email' => $user->user_email,
                'photo' => get_avatar_url($user),
                'company' => $user_meta['company'],
                'position' => $user_meta['position']
            ]
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
