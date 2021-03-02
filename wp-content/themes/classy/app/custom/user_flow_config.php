<?php
add_action( 'admin_menu', 'register_manuals_menu_page' );
function register_manuals_menu_page(){
    add_menu_page( 'Manuals', 'Manuals', 'manage_options', '/edit.php?post_type=manuals', '', '', 6 );
}

add_action('admin_menu', 'register_specifications_submenu_page');

function register_specifications_submenu_page() {
    add_submenu_page(
        '/edit.php?post_type=manuals',
        'Specifications',
        'Specifications',
        'manage_options',
        '/edit.php?post_type=specifications',
        ''
    );
}

add_action('admin_menu', 'register_models3d_submenu_page');

function register_models3d_submenu_page() {
    add_submenu_page(
        '/edit.php?post_type=manuals',
        '3D models',
        '3D models',
        'manage_options',
        '/edit.php?post_type=models3d',
        ''
    );
}

add_action('admin_menu', 'register_manual_type_submenu_page');

function register_manual_type_submenu_page() {
    add_submenu_page(
        '/edit.php?post_type=manuals',
        'Manual types',
        'Manual types',
        'manage_options',
        '/edit-tags.php?taxonomy=manual-type&post_type=manuals',
        ''
    );
}

add_action('admin_menu', 'register_specification_type_submenu_page');

function register_specification_type_submenu_page() {
    add_submenu_page(
        '/edit.php?post_type=manuals',
        'Specification types',
        'Specification types',
        'manage_options',
        '/edit-tags.php?taxonomy=specification-type&post_type=specifications',
        ''
    );
}