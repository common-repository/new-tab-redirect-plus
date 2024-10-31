<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb, $wp_version;

// Delete options.
$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name = 'ntrpp-website-full-url' " );
$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name = 'ntrpp-open-comment-links-in-new-window' " );
$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name = 'ntrpp-othar-comment-links-in-new-window' " );