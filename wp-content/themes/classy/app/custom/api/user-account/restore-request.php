<?php
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
        $headers['From'] = 'Banke <noreply@banke-pro>';

        $mail_sent = wp_mail($email, 'Restore password Banke', $body, $headers);
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
