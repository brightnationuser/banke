<?php
/**
 * @package UniversalExporter
 */
/*
Plugin Name: Universal Exporter
Description: Convenient export of single pages or posts with WPML support
Version: 1.0.0
Author: Alexander Holovko
License: GPLv2 or later
Text Domain: universal-exporter
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
Copyright 2005-2015 Automattic, Inc.
*/


//defined(ABSPATH) or die('You cant access this file');

if(!function_exists('add_action')) {
    echo 'add_action is not exists';
    exit;
}

class UniversalExporter {
    function __construct($args)
    {
        add_action( 'admin_menu', array($this, 'register_admin_page'));
        add_filter( 'option_page_capability_'.'universal-exporter', array($this, 'universal_export_page_capability') );
    }

    function activate() {
        // generated a CPT
        // flush rewrite rules

    }

    function deactivate() {
        // flush rewrite rules

    }

    function uninstall() {
        // delete CPT
        // delete all the plugin data from the db
    }

    function register_admin_page(){
        add_menu_page( 'Universal Exporter', 'Universal Exporter', 'edit_others_posts', 'universal-exporter', array($this, 'build_universal_exporter_page'), '', 6 );
    }

    function universal_export_page_capability( $capability ) {
        return 'edit_others_posts';
    }

    function build_universal_exporter_page() {
        ?>
        <div class="wrap">
            <h2><?php echo get_admin_page_title() ?></h2>

            <?php
            // settings_errors() не срабатывает автоматом на страницах отличных от опций
            if( get_current_screen()->parent_base !== 'options-general' )
                settings_errors('название_опции');
            ?>

            <form action="options.php" method="POST">
                <?php
                settings_fields("opt_group");     // скрытые защитные поля
                do_settings_sections("opt_page"); // секции с настройками (опциями).
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}

if(class_exists('UniversalExporter')) {
    $universalExporter = new UniversalExporter([
        'initializedMessage' => 'plugin initialized'
    ]);
}
else {
    die('class UniversalExporter is not exists');
}

// activation
register_activation_hook( __FILE__, array($universalExporter, 'activate'));


// deactivation
register_deactivation_hook( __FILE__, array($universalExporter, 'deactivate'));


// uninstall
register_uninstall_hook( __FILE__, array($universalExporter, 'uninstall'));