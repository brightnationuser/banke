<?php

add_action('wp_ajax_user_account__translations', 'user_account__translations');
add_action('wp_ajax_nopriv_user_account__translations', 'user_account__translations');

function user_account__translations() {

    $response = [
        'language' => ICL_LANGUAGE_CODE,
        'titles' => get_field('account_titles', 'option'),
        'fields' => get_field('account_fields', 'option'),
        'texts' => get_field('account_texts', 'option'),
        'buttons' => get_field('account_buttons', 'option'),
        'errors' => get_field('account_errors', 'option')
    ];

    echo json_encode($response);

    wp_die();
}