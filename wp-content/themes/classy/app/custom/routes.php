<?php
$framework = get_theme_framework();

if(url_parts(0) == 'email-test') {

    if(is_user_logged_in()) {
        $framework::load_custom_template('email/email');
    }
    else {
        $framework::load_custom_template('404');
    }

}

if(url_parts(0) == 'reset-password') {

    $framework::load_custom_template('account/change-password');

}

