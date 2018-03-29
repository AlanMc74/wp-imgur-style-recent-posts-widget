<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       mybigbadself.com
 * @since      1.0.0
 *
 * @package    Imgur_Style_Recent_Posts
 * @subpackage Imgur_Style_Recent_Posts/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Imgur_Style_Recent_Posts
 * @subpackage Imgur_Style_Recent_Posts/includes
 * @author     Alan McCabe <alan@mybigbadself.com>
 */
class Imgur_Style_Recent_Posts_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'imgur-style-recent-posts',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
