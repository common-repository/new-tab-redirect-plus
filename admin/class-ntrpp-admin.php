<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class NTRPP_Admin {


	private $plugin_name;

	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
}