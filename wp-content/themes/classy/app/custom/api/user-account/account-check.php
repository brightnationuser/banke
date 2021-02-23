<?php
add_action('wp_ajax_user_account__check', 'user_account__check');
add_action('wp_ajax_nopriv_user_account__check', 'user_account__check');

function user_account__check() {

    if(is_user_logged_in()) {
        $user = wp_get_current_user();
        $user_meta = get_user_meta($user->ID);

        $image_exists = !empty($user_meta['b_user_photo'][0]) && file_exists($user_meta['b_user_photo'][0]);

        $photo = $image_exists ? $user_meta['b_user_photo'][0] : '/wp-content/themes/classy/images/account/profile.svg';

        $response = [
            'success' => true,
            'user' => [
                'id' => $user->ID,
                'username' => $user->user_login,
                'email' => $user->user_email,
                'photo' => $photo,
                'company' => $user_meta['company'][0],
                'position' => $user_meta['position'][0]
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
