<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



/** Step 1. */
function ntrpp_add_admin_menu() {
	add_submenu_page ( "options-general.php", "New Tab Redirect Plus", "New Tab Redirect Plus", "manage_options", "ntrpp-plugin", "ntrpp_plugin_page");
}


function ntrpp_api_init() {
  if (phpversion() < 5) {
    add_action('admin_notices', array($this,'ntrppp_php_version_warning'));
    return;
  }
 
	/** Step 2 (from text above). */
	add_action( 'admin_menu', 'ntrpp_add_admin_menu' );
	add_filter('comment_text','ntrpp_comment_links_in_new_window');
	add_action ( "admin_init", 'ntrpp_plugin_settings');
	add_filter ( 'the_content','ntrpp_com_content');
	add_action('admin_head', 'admin_js');
}

// Add initialization and activation hooks
add_action('init', 'ntrpp_api_init');



/** Step 3. */
function ntrpp_plugin_options() {
	require_once 'ntrpp-api-endpoints.php';
}
