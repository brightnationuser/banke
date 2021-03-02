<?php
add_action('wp_ajax_user_get__videos', 'user_get__videos');
add_action('wp_ajax_nopriv_user_get__videos', 'user_get__videos');

function user_get__videos() {


    $response = [];

    $videos = get_field('account_video_gallery', 'options');

    foreach ($videos as $video) {
        $response[] = [
            'id'  => $video['youtube_id'],
            'title'  => $video['title']
        ];
    }

    echo json_encode($response);

    wp_die();
}