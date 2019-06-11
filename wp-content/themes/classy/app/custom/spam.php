<?php

//form validate
add_filter( 'wpcf7_validate', function ($result, $tag) {
    $form  = WPCF7_Submission::get_instance();
    $qqq = $form->get_posted_data('qqq');

//    if ( 'your-email-confirm' == $tag->name ) {
//        $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
//        $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
//
//        if ( $your_email != $your_email_confirm ) {
//            $result->invalidate( $tag, "Are you sure this is the correct address?" );
//        }
//    }

    if($qqq != '745643534543745634532') {
        echo 'error 12345';
        exit();
    }

    return $result;
}, 20, 2 );

//add_action( 'login_form', function () {
//    echo '<span class="wpcf7-form-control-wrap qqq" style="display: none2"><input type="text" name="qqq" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span>';
//} );

//add_filter('wp_authenticate_user', function($user, $password) {
//    if (isset($_POST['g-recaptcha-response'])) {
//        $response = wp_remote_get( 'https://www.google.com/recaptcha/api/siteverify?secret=6LfJEncUAAAAAMED-WYX-Yrhab5UXNMwbiVdiCq1&response=' . $_POST['g-recaptcha-response'] );
//
//        $response = json_decode($response['body'], true);
//
//        if (true == $response['success']) {
//
//
//            return $user;
//
//
//        } else {
//
//            echo 1111;
//
//        }
//
//
//    } else {
//
//
//        return new WP_Error( 'Captcha Invalid', __('<strong>ERROR</strong>: You are a bot. If not then enable JavaScript.') );
//
//
//    }
//}, 10, 2);
