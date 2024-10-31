<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class NTRPP_Deactivator {

	public static function deactivate() {
			flush_rewrite_rules();
	}

}

 


