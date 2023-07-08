<?php
$framework = get_theme_framework();

$page = $framework::get_post();

$current_language = apply_filters('wpml_current_language', null);

function get_back_button_translation($language)
{
    switch ($language) {
        case 'en':
            return "back to all vacancies";
        case 'de':
            return "zurück zu allen Stellenangeboten";
    }
}

$back_button_text = get_back_button_translation($current_language);

$data = compact(
    'page',
    'back_button_text'
);