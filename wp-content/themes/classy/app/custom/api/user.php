<?php

require_once ABSPATH . WPINC .'/registration.php';

add_action('wp_ajax_user_account__create', 'user_account__create');
add_action('wp_ajax_user_account__create', 'user_account__create');

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
add_action('wp_ajax_user_account__login', 'user_account__login');

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
        'user' => $user->ID
    ];

    echo json_encode($response);

    wp_die();
}

add_action('wp_ajax_user_account__restore_password', 'user_account__restore_password');
add_action('wp_ajax_user_account__restore_password', 'user_account__restore_password');

function user_account__restore_password() {

    $email = $_POST['email'];

    $user_has_email = email_exists($email);

    $is_error = $user_has_email === false;

    if(!$is_error) {
        $data = [
            'reset_link' => get_password_reset_key(get_userdata($user_has_email)),
            'email' => $email
        ];


//    $body = \Helpers\General::getEmailHtml($data, ['en' => 'email.email-sign-up']);
        $body = $data['reset_link'];

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
add_action('wp_ajax_user_account__set_new_password', 'user_account__set_new_password');

function user_account__set_new_password() {

    $password = $_POST['password'];
    $code = $_POST['code'];
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