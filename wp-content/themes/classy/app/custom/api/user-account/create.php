<?php

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
