<?php 
/*
*
*	***** cost *****
*
*	This file initializes all C Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('C_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('C_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('C_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('C_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
/*
*
*  Register CSS
*
*/
function c_register_core_css(){
wp_enqueue_style('c-core', C_CORE_CSS . 'c-core.css',null,time(),'all');
};
add_action( 'wp_enqueue_scripts', 'c_register_core_css' );    
/*
*
*  Register JS/Jquery Ready
*
*/
function c_register_core_js(){
// Register Core Plugin JS	
wp_enqueue_script('c-core', C_CORE_JS . 'c-core.js','jquery',time(),true);
};
add_action( 'wp_enqueue_scripts', 'c_register_core_js' );    
/*
*
*  Includes
*
*/ 
// Load the Functions
if ( file_exists( C_CORE_INC . 'c-core-functions.php' ) ) {
	require_once C_CORE_INC . 'c-core-functions.php';
}     
// Load the ajax Request
if ( file_exists( C_CORE_INC . 'c-ajax-request.php' ) ) {
	require_once C_CORE_INC . 'c-ajax-request.php';
} 
// Load the Shortcodes
if ( file_exists( C_CORE_INC . 'c-shortcodes.php' ) ) {
	require_once C_CORE_INC . 'c-shortcodes.php';
}