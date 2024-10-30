<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.facebook.com/mamurjor/
 * @since      1.0.0
 *
 * @package    Mamurjor_student_result
 * @subpackage Mamurjor_student_result/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mamurjor_student_result
 * @subpackage Mamurjor_student_result/admin
 * @author     mamurjor <mamurjorbd@gmail.com>
 */
class Mamurjor_student_result_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mamurjor_student_result_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mamurjor_student_result_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		
		wp_enqueue_style( "", plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css');
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/font-awesome.css');
		//wp_enqueue_style("demo_page", plugin_dir_url( __FILE__ ) . 'css/demo_page.css');
		wp_enqueue_style( "demo_page", plugin_dir_url( __FILE__ ) . 'css/demo_page.css', array(), $this->version, 'all' );
		wp_enqueue_style( "demo_table", plugin_dir_url( __FILE__ ) . 'css/demo_table.css', array(), $this->version, 'all' );
		wp_enqueue_style( "DT_bootstrap", plugin_dir_url( __FILE__ ) . 'css/DT_bootstrap.css', array(), $this->version, 'all' );


	}
			
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mamurjor_student_result_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mamurjor_student_result_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

   
	

	}
	
	

}
