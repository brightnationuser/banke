<?php
/**
 * Plugin Name: Dudka.agency - Simple History
 * Text Domain: simple-history
 * Domain Path: /languages
 * Description: Fixed ACF fields
 * Version: 2.31.1
 * Author:
 * License: GPL2
 *
 * @package Simple History
 */

/**
 * Copyright 2015  Pär Thernström (email: par.thernstrom@gmail.com)
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if (!defined('WPINC')) {
    die();
}

// Plugin requires at least WordPress version "4.5.1", because usage of functions like wp_get_raw_referer.
// true if version ok, false if too old version.
$ok_wp_version = version_compare($GLOBALS['wp_version'], '4.5.1', '>=');
$ok_php_version = version_compare(phpversion(), '5.3', '>=');

if ($ok_php_version && $ok_wp_version) {
    /**
     * Register function that is called when plugin is installed
     *
     * @TODO: make activatigon multi site aware, as in https://github.com/scribu/wp-proper-network-activation
     * register_activation_hook( trailingslashit(WP_PLUGIN_DIR) . trailingslashit( plugin_basename(__DIR__) ) . "index.php" , array("SimpleHistory", "on_plugin_activate" ) );
     */

    if (!defined('SIMPLE_HISTORY_VERSION')) {
        define('SIMPLE_HISTORY_VERSION', '2.31.1');
    }

    if (!defined('SIMPLE_HISTORY_PATH')) {
        define('SIMPLE_HISTORY_PATH', plugin_dir_path(__FILE__));
    }

    if (!defined('SIMPLE_HISTORY_BASENAME')) {
        define('SIMPLE_HISTORY_BASENAME', plugin_basename(__FILE__));
    }

    if (!defined('SIMPLE_HISTORY_DIR_URL')) {
        define('SIMPLE_HISTORY_DIR_URL', plugin_dir_url(__FILE__));
    }

    if (!defined('SIMPLE_HISTORY_FILE')) {
        define('SIMPLE_HISTORY_FILE', __FILE__);
    }

    /** Load required files */
    require_once __DIR__ . '/inc/SimpleHistory.php';
    require_once __DIR__ . '/inc/SimpleHistoryLogQuery.php';

    /** Boot up */
    SimpleHistory::get_instance();
} else {
    // User is running to old version of php, add admin notice about that.
    add_action('admin_notices', 'simple_history_old_version_admin_notice');

    /**
     * Show an admin message if old PHP version.
     */
    function simple_history_old_version_admin_notice()
    {
        $ok_wp_version = version_compare($GLOBALS['wp_version'], '4.5.1', '>=');
        $ok_php_version = version_compare(phpversion(), '5.3', '>=');
        ?>
		<div class="updated error">
			<?php
   if (!$ok_php_version) {
       echo '<p>';
       printf(
           /* translators: 1: PHP version */
           esc_html(
               __(
                   'Simple History is a great plugin, but to use it your server must have at least PHP 5.3 installed (you have version %s).',
                   'simple-history'
               )
           ),
           phpversion() // 1
       );
       echo '</p>';
   }

   if (!$ok_wp_version) {
       echo '<p>';
       printf(
           /* translators: 1: WordPress version */
           esc_html(
               __('Simple History requires WordPress version 4.5.1 or higher (you have version %s).', 'simple-history')
           ),
           $GLOBALS['wp_version'] // 1
       );
       echo '</p>';
   }?>
		</div>
		<?php
    }
} // End if().
