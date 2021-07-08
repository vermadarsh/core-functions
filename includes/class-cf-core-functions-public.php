<?php
/**
 * The file that defines the core plugin class.
 *
 * A class definition that holds all the hooks regarding all the custom functionalities.
 *
 * @link       https://github.com/vermadarsh/
 * @since      1.0.0
 *
 * @package    Core_Functions_Public
 * @subpackage Core_Functions_Public/includes
 */

/**
 * The core plugin class.
 *
 * A class definition that holds all the hooks regarding all the custom functionalities.
 *
 * @since      1.0.0
 * @package    Core_Functions
 * @author     Adarsh Verma <adarsh@cmsminds.com>
 */
class Cf_Core_Functions_Public {
	/**
	 * Define the core functionality of the plugin.
	 *
	 * Load all the hooks here.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'cf_wp_enqueue_scripts_callback' ) );
	}

	/**
	 * Enqueue scripts for public end.
	 */
	public function cf_wp_enqueue_scripts_callback() {
		// Custom public style.
		wp_enqueue_style(
			'core-functions-public-style',
			CF_PLUGIN_URL . 'assets/public/css/core-functions-public.css',
			array(),
			filemtime( CF_PLUGIN_PATH . 'assets/public/css/core-functions-public.css' ),
		);

		// Custom public script.
		wp_enqueue_script(
			'core-functions-public-script',
			CF_PLUGIN_URL . 'assets/public/js/core-functions-public.js',
			array( 'jquery' ),
			filemtime( CF_PLUGIN_PATH . 'assets/public/js/core-functions-public.js' ),
			true
		);

		// Localize public script.
		wp_localize_script(
			'core-functions-public-script',
			'CF_Public_JS_Obj',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}
}
