<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * New Tab Redirect Plus Plugin is the Open Redirect Comment Links in New Tab/Window.
 * Open WordPress Comment Links in New Tab/Window (add target=”_blank”).
 *
 * @package Pakainfo New Tab Redirect Plus Plugin
 * @author Pakainfo
 * @license GPLv2
 * @link https://www.pakainfo.com/
 * @copyright 2019 Pakainfo, LLC. All rights reserved.
 *
 *            @wordpress-plugin
 *            Plugin Name: New Tab Redirect Plus
 *            Plugin URI: https://www.pakainfo.com/
 *            Description: New Tab Redirect Plus Plugin is the Open Redirect Comment Links in New Tab/Window.
 *            Version: 1.0
 *            Author: Pakainfo
 *            Author URI: https://www.pakainfo.com/
 *            Text Domain: pakainfo-new-tab-redirect-plus
 *            Contributors: Pakainfo
 *            License: GPLv2
 *            License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'NTRPP_PLUGIN_VERSION', '1.0.1' );
define( 'NTRPP_DB', 'ntrpp_' );
define( 'NTRPP_PLUGIN_SLUG', 'new-tab-redirect-plus' );
define( 'NTRPP_PLUGIN_TEXTDOMAIN', 'ntrpp' );
define(	'NTRPP_BASE_URL', get_bloginfo('url'));


$plugin = plugin_basename( __FILE__ );

function ntrpp_activate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ntrpp-activator.php';
	NTRPP_Activator::activate();
}


function ntrpp_deactivate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ntrpp-deactivator.php';
	NTRPP_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'ntrpp_activate_plugin' );
register_deactivation_hook( __FILE__, 'ntrpp_deactivate_plugin' );
add_filter( "plugin_action_links_$plugin", 'ntrpp_add_settings_link' );

require plugin_dir_path( __FILE__ ) . 'includes/class-ntrpp.php';


function ntrpp_run_api() {

	$ntrpp_plugin = new NTRPP_Controller();
	$ntrpp_plugin->run();

}
ntrpp_run_api();




