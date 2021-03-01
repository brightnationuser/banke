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
    add_user_meta($user_id, 'b_user_avatar', '');

    $user = get_user_by('id', $user_id);
    update_field('user_company', $company, $user);
    update_field('user_position', $position, $user);

    $is_error = is_a($user_id, 'WP_Error');

    $data = [
        'name' => $name,
        'company' => $company,
        'position' => $position,
        'email' => $email
    ];

    $body = \Helpers\General::getEmailHtml($data, ['en' => 'email.email-sign-up', 'de' => 'email.email-sign-up']);
    $admin_body = \Helpers\General::getEmailHtml($data, ['en' => 'email.email-sign-up-admin', 'de' => 'email.email-sign-up-admin']);
    $headers['From'] = 'Banke <noreply@banke-pro>';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';

    if(!$is_error) {
        $admin_email = get_option('admin_email');
        $mail_sent = wp_mail($email, 'Registration Banke', $body, $headers);
        $mail_sent_admin = wp_mail($admin_email, 'Banke - New User', $admin_body, $headers);

        $credentials = [
            'user_login' => $_POST['email'],
            'user_password' => $_POST['password'],
            'remember' => true
        ];

        wp_signon($credentials);
    }
    else {
        $mail_sent = false;
    }

    $response = [
        'user' => [
            'id' => $user_id,
            'username' => $_POST['name'],
            'email' => $_POST['email'],
            'photo' => '',
            'company' => $_POST['company'],
            'position' => $_POST['position']
        ],
        'mail_sent' => $mail_sent,
        'user_created' => !$is_error,
        'error' => $is_error ? $user_id->errors : ''
    ];

    echo json_encode($response);

    wp_die();
}
