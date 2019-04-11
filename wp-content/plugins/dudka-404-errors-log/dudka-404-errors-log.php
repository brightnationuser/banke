<?php

/*
* Plugin Name: Dudka.agency - 404 Errors Log
* Description: Логирование 404 ошибок
* Version: 1.0
* Author: Torkhov Sergii
* Author URI: https://zavr.com.ua/
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ErrorsLog {

    public function __construct()
    {
        if(is_admin()) {
            add_action('admin_menu', array(&$this,'add_admin_pages') );
            add_action('admin_init', array(&$this,'init_admin') );
        } else {
            //@see https://codex.wordpress.org/Plugin_API/Action_Reference
            add_action( 'shutdown', array(&$this,'intercept404Errors') );
        }
    }

    function add_admin_pages()
    {
        $hook = add_submenu_page(
            'tools.php',
            '404 Errors Log',
            '404 Errors Log',
            'manage_options',
            '404_errors_log',
            array(&$this,'create_admin_page')
        );
    }

    function init_admin()
    {
        if( isset($_POST['show_report'])){
            $hookname = get_plugin_page_hookname( '404_errors_log', 'tools.php');
            add_action( $hookname, array(&$this,'show_results') );
        }

        wp_enqueue_style('404-errors-log', '/wp-content/plugins/dudka-404-errors-log/style.css');
        wp_enqueue_style('404-errors-log', '/wp-content/plugins/dudka-404-errors-log/script.js');
    }

    function intercept404Errors()
    {
        global $wpdb;

        if ( function_exists( 'is_404' ) && is_404() ){
            $wpdb->insert( '404_errors_log', [
                'request_method' => $_SERVER['REQUEST_METHOD'],
                'request' => $_SERVER['REQUEST_URI'],
                'referrer' => $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : null,
                'ip' => $_SERVER['REMOTE_ADDR'],
                'server' => json_encode($_SERVER),
            ] );
        }
    }

    function show_results()
    {
        global $wpdb;
        $count = 0;

        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        if($date_from && $date_to) {
            $where_date_range = 'created_at >= "'.$date_from.'" AND created_at <= "'.$date_to.'"';
        }
        else {
            $where_date_range = 'id > 0';
        }

        $errors = $wpdb->get_results( 'SELECT 
            request, 
            substring_index(GROUP_CONCAT(DISTINCT referrer ORDER BY referrer ASC SEPARATOR \', \'), \',\', 3) AS referrers, 
            COUNT(*) AS count, 
            GROUP_CONCAT(DISTINCT created_at ORDER BY created_at DESC SEPARATOR \', \') AS dates
            FROM 404_errors_log 
            WHERE '.$where_date_range.'
            GROUP BY request
            LIMIT 500
        ');

        $errors_count = $wpdb->get_row( 'SELECT 
            COUNT(*) AS count 
            FROM 404_errors_log 
            WHERE '.$where_date_range.'
        ');

        ?>
        <div class="results_errors_log">
            <div class="plugin_pagination">
                <span class="displaying-num">Total: <?php echo $errors_count->count; ?> items</span>
            </div>

            <table class="widefat" cellspacing="0">
                <thead>
                    <tr>
                        <th>URL</th>
                        <th>Count</th>
                        <th>Referers (separated by comma)</th>
                        <th>Last Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($errors as $error) {
                        $last_date = explode(',', $error->dates);
                        $last_date = $last_date[0];

                        echo '<tr>';
                        echo '<td><a href="'.constant('HOSTNAME').$error->request.'" target="_blanc">'.$error->request.'</a></td>';
                        echo '<td>'.$error->count.'</td>';
                        echo '<td>'.$error->referrers.'</td>';
                        echo '<td style="white-space: nowrap">'.$last_date.'</td>';
                        echo '</tr>';

                        $count++;
                    }
                    ?>
                </tbody>
            </table>

            <div class="plugin_pagination">
                <span class="displaying-num">Total: <?php echo $errors_count->count; ?> items</span>
            </div>
        </div>
        <?php
    }

    function create_admin_page() {
        ?>
        <div class="page_errors_log">
            <h1>404 Errors Log</h1>
            <p>Select Date Range</p>

            <form method="post">
                <div class="form-group">
                    <label>From</label>
                    <input type="date" class="form-control" name="date_from" value="<?php echo $_POST['date_from'] ?>">
                </div>

                <div class="form-group">
                    <label>To</label>
                    <input type="date" class="form-control" name="date_to" value="<?php echo $_POST['date_to'] ?>">
                </div>

                <div style="margin-top: 40px;">
                    <button class="button button-primary" type="submit" name="show_report" value="generate">Show Report</button>
                </div>
            </form>
        </div>
        <?php
    }
}

global $ErrorsLog;
if (class_exists("ErrorsLog") && !$ErrorsLog) {
    $ErrorsLog = new ErrorsLog();
}