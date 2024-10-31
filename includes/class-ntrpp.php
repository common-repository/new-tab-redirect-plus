<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class NTRPP_Controller {


	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
		if ( defined( 'NTRPP_PLUGIN_VERSION' ) ) {
			$this->version = NTRPP_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.1';
		}
		$this->plugin_name = 'ntrpp';
		$this->load_dependencies();
	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/functions.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ntrpp-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ntrpp-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/settings.php';
		$this->loader = new NTRPP_Loader();
	}


	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
