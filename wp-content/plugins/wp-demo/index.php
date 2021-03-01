<?php
/**
 * Plugin Name:       My Basics Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      5.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */
 
 
 
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


//Include Scripts & Styles
if( !function_exists('wpac_plugin_scripts')) {
    function wpac_plugin_scripts() {
        wp_enqueue_style('wpac-css', WPAC_PLUGIN_DIR. 'assets/css/style.css');
        wp_enqueue_script('wpac-js', WPAC_PLUGIN_DIR. 'assets/js/main.js', 'jQuery', '1.0.0', true );
    }
    add_action('wp_enqueue_scripts', 'wpac_plugin_scripts');
}


 //Settings Menu & Page
require plugin_dir_path( __FILE__ ). 'inc/settings.php';
 
//Top Level Administration Menu
function wpac_register_menu_page() {
    add_menu_page( 'auto index', 'auto Settings', 'manage_options', 'wpac-settings', 'wpac_settings_page_html', 'dashicons-thumbs-up', 30 );
}
add_action('admin_menu', 'wpac_register_menu_page');

 
 add_action('publish_post', 'send_notification');
 
function send_notification($id, $post_obj){
     
 
	$permalink = get_permalink( $id );
     var_dump($permalink);exit;
    //Send the notification
   // wp_mail('recipient@example.com', $post_obj->post_title, $msg);
}

 add_action('publish_post', 'send_notification');
 
 ?>