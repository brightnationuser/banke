<?php
add_action('wp_ajax_user_account__help_request', 'user_account__help_request');
add_action('wp_ajax_nopriv_user_account__help_request', 'user_account__help_request');

function user_account__help_request() {

    $user = wp_get_current_user();

    $data = [
        'email' => $user->user_email,
        'username' => $user->user_login,
        'message' => $_POST['message']
    ];

    $body = \Helpers\General::getEmailHtml($data, [
        'en' => 'email.email-need-help',
        'de' => 'email.email-need-help'
    ]);
    $to = get_field('admin_help_email', 'options');
    $subject = 'Help Request from ' . $user->user_email;
    $headers['From'] = 'Banke <noreply@banke-pro>';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';

    $mail_sent = wp_mail($to, $subject, $body, $headers);

    $response = [
        'success' => $mail_sent
    ];

    echo json_encode($response);

    wp_die();
}
