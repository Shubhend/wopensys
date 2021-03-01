<?php
/**
 * Plugin Name:       Wp Autoindex
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      5.2
 * Author:            AutoFast Index
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       AutoFast Index
 * Domain Path:       /languages
 */


if(!defined('ABSPATH')){
	die("You Can not Access this file directly");
}
//If this file is called directly, abort.
if (!defined( 'WPINC' )) {
    die;
}
if ( !defined('WPAC_PLUGIN_VERSION')) {
    define('WPAC_PLUGIN_VERSION', '1.0.0');
}
if ( !defined('WPAC_PLUGIN_VERSION')) {
    define('WPAC_PLUGIN_VERSION', '1.0.0');
}


function send_notification($id, $post_obj){

include('inc/autoindex.php');

}

add_action('publish_post', 'send_notification');

function wpac_register_menu_pages() {
    add_menu_page( 'Auto Fast Index', 'Auto Fast Index', 'manage_options', 'Autoindex', 'setting', 'dashicons-thumbs-up' );
 //  add_submenu_page('my-menu', 'Submenu Page Title', 'Settings', 'manage_options', 'Settings','my' );
    add_submenu_page('Autoindex', 'Error Logs', 'Error Logs', 'manage_options', 'errorlogs','errorlog' );
 add_submenu_page('Autoindex', 'Success logs', 'Success Logs', 'manage_options', 'successlogs','successlog' );

}
add_action('admin_menu', 'wpac_register_menu_pages');

//notification




   // add_action('wp_head', 'wpshout_action_example');
function wpshout_action_example() {
    echo '<div style="background: green; color: white; text-align: right;">WPShout was here.</div>';
}
  // add_action('wp_footer', 'wpshout_action_example2');
function wpshout_action_example2() {
    echo '<div style="background: green; color: white; text-align: right;">WPShout was here.</div>';
}
function setting(){
add_action('wp-ajax_nopriv_public_ajax_request','handle_ajax_request_public');
include_once('inc/setting.php');

}

include('inc/main.php');

function errorlog(){

    include('inc/error.php');

}

function successlog(){

    include('inc/success.php');

}




?>