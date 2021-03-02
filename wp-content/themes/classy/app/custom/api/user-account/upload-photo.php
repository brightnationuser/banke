<?php
use \Upload\Storage\FileSystem;
use \Upload\File;

add_action('wp_ajax_user_account__upload_photo', 'user_account__upload_photo');
add_action('wp_ajax_nopriv_user_account__upload_photo', 'user_account__upload_photo');

function user_account__upload_photo() {

    global $wpdb;
    $errors = [];
    $path = ABSPATH . 'wp-content/uploads/users/' . get_current_user_id();

    if(!file_exists($path)) {
        mkdir($path);
    }

    $storage = new FileSystem($path);
    $file = new File('image', $storage);
    $file->setName('avatar');

    $file->addValidations(array(
        new \Upload\Validation\Mimetype(['image/png', 'image/jpeg']),
        new \Upload\Validation\Size('2M')
    ));

    $full_path = $path . '/' . $file->getNameWithExtension();
    if(file_exists($full_path)) {
        unlink($full_path);
    }

    $data = [
        'path'       => str_replace(ABSPATH, WP_HOME . '/', $full_path),
        'name'       => $file->getNameWithExtension(),
        'extension'  => $file->getExtension(),
        'mime'       => $file->getMimetype(),
        'size'       => $file->getSize(),
        'md5'        => $file->getMd5(),
        'dimensions' => $file->getDimensions()
    ];

    try {
        $file->upload();

        update_user_meta(get_current_user_id(), 'b_user_photo', $data['path']);

        //Create wp attachment
        /*        $wp_upload_dir = wp_upload_dir();

                $attachment = array(
                    'guid'           => $wp_upload_dir['url'] . '/' . basename( $file->getNameWithExtension() ),
                    'post_mime_type' => $file->getMimetype(),
                    'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $file->getNameWithExtension() ) ) . 'user ' . get_current_user_id(),
                    'post_content'   => 'User Avatar for user ' . get_current_user_id(),
                    'post_status'    => 'inherit'
                );


                $attach_id = wp_insert_attachment($attachment, $full_path);
                $attach_data = wp_generate_attachment_metadata($attach_id, $full_path);
                wp_update_attachment_metadata($attach_id, $attach_data);
                update_user_meta(get_current_user_id(), $wpdb->get_blog_prefix() . 'user_avatar', $attach_id); */

    } catch (\Exception $e) {
        $errors = $file->getErrors();
    }

    $response = [
        'file_info' => $data,
        'errors' => $errors
    ];

    echo json_encode($response);

    wp_die();
}
