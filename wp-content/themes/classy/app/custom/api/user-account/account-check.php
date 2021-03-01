<?php
add_action('wp_ajax_user_account__check', 'user_account__check');
add_action('wp_ajax_nopriv_user_account__check', 'user_account__check');

function user_account__check() {

    if(is_user_logged_in()) {
        $user = wp_get_current_user();
        $user_meta = get_user_meta($user->ID);
        $photo_abspath = str_replace(WP_HOME, ABSPATH, $user_meta['b_user_photo'][0]);

        $image_exists = !empty($user_meta['b_user_photo'][0]) && file_exists($photo_abspath);

        $photo = $image_exists ? $user_meta['b_user_photo'][0] : '/wp-content/themes/classy/images/account/profile.svg';

        $response = [
            'success' => true,
            'user' => [
                'approved' => get_field('user_approved', $user),
                'id' => $user->ID,
                'username' => $user->user_login,
                'email' => $user->user_email,
                'photo' => $photo,
                'photo_file_exists' => file_exists($photo_abspath),
                'photo_file_meta' => $user_meta['b_user_photo'][0],
                'company' => get_field('user_company', $user),
                'position' =>  get_field('user_position', $user)
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
