<?php

add_action('wp_ajax_user_account__update', 'user_account__update');
add_action('wp_ajax_nopriv_user_account__update', 'user_account__update');

function user_account__update() {

    $user_id = get_current_user_id();

    $name = $_POST['name'];
    $company = $_POST['company'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $message = '';
    $company_changed = false;

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
        $user = get_user_by('id', $user_id);
        $old_company = get_field('user_company', $user);

        if($_POST['company'] !== $old_company) {
            update_field('user_approved', false, $user);
            $company_changed = true;
            $message = 'user changed his company';

            $data = [
                'name' => $name,
                'new_company' => $company,
                'old_company' => $old_company,
                'position' => $position,
                'email' => $email
            ];
            $admin_email = get_option('admin_email');
            $headers['From'] = 'Banke <noreply@banke-pro>';

            $admin_body = \Helpers\General::getEmailHtml($data, [
                'en' => 'email.email-user-change-company-admin',
                'de' => 'email.email-user-change-company-admin'
            ]);

            $mail_sent_admin = wp_mail($admin_email, 'Banke - User Changed Company', $admin_body, $headers);
        }

        update_field('user_company', $company, $user);
        update_field('user_position', $position, $user);
        $success = true;
    }

    $response = [
        'user_updated' => !$is_error,
        'error' => $error,
        'success' => $success,
        'message' => $message,
        'company_changed' => $company_changed,
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
