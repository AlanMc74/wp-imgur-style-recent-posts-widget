<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       mybigbadself.com
 * @since      1.0.0
 *
 * @package    Imgur_Style_Recent_Posts
 * @subpackage Imgur_Style_Recent_Posts/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Imgur_Style_Recent_Posts
 * @subpackage Imgur_Style_Recent_Posts/public
 * @author     Alan McCabe <alan@mybigbadself.com>
 */
class Imgur_Style_Recent_Posts_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Imgur_Style_Recent_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Imgur_Style_Recent_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/imgur-style-recent-posts-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Imgur_Style_Recent_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Imgur_Style_Recent_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/imgur-style-recent-posts-public.js', array( 'jquery' ), $this->version, false );

	}

	public function isrp_add_featured_urls() {
		register_rest_field( array( 'post', 'product' ),
			'featured_image_urls',
			array(
				'get_callback'    => array( $this, 'isrp_featured_images' ),
				'update_callback' => null,
				'schema'          => null,
			)
		);
	}

	public function isrp_featured_images( $post ) {

		$featured_id = get_post_thumbnail_id( $post['id'] );
		$sizes = wp_get_attachment_metadata( $featured_id );
		$size_data = new stdClass();
		if ( ! empty( $sizes['sizes'] ) ) {
			foreach ( $sizes['sizes'] as $key => $size ) {
				// Use the same method image_downsize() does
				$image_src = wp_get_attachment_image_src( $featured_id, $key );
	
				if ( ! $image_src ) {
					continue;
				}
				
				$size_data->$key = $image_src[0];
			}
		}
		return $size_data;	
	}

}






