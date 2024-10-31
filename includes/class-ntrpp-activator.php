<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class NTRPP_Activator {

	public static function activate() {
		//create root secret
		global $wpdb;
        add_action( 'activated_plugin', 'ntrpp_activation_redirect' );
        flush_rewrite_rules();
		
	}

}
