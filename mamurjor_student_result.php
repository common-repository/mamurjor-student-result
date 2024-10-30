<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.facebook.com/mamurjor/
 * @since             1.0.0
 * @package           Mamurjor_student_result
 *
 * @wordpress-plugin
 * Plugin Name:       mamurjor_student_result
 * Plugin URI:        plugin.mamurjor.com
 * Description:       Student Result Simple Just Entry. Result single search just copy and paste this shortcode [getresult].
 * Version:           1.0.0
 * Author:            mamurjor
 * Author URI:        https://www.facebook.com/mamurjor/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mamurjor_student_result
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MAMURJOR_STUDENT_RESULT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mamurjor_student_result-activator.php
 */
function activate_mamurjor_student_result() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mamurjor_student_result-activator.php';
	Mamurjor_student_result_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mamurjor_student_result-deactivator.php
 */
function deactivate_mamurjor_student_result() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mamurjor_student_result-deactivator.php';
	Mamurjor_student_result_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mamurjor_student_result' );
register_deactivation_hook( __FILE__, 'deactivate_mamurjor_student_result' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mamurjor_student_result.php';





require plugin_dir_path( __FILE__ ) . 'admin/index.php';
require plugin_dir_path( __FILE__ ) . 'admin/search.php';
require plugin_dir_path( __FILE__ ) . 'admin/admin.php';
require plugin_dir_path( __FILE__ ) . 'admin/student-mamurjor-table.php';
require plugin_dir_path( __FILE__ ) . 'admin/student-configm.php';
require plugin_dir_path( __FILE__ ) . 'admin/student-salaray.php';
require plugin_dir_path( __FILE__ ) . 'admin/student-salaray-print.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mamurjor_student_result() {

	$plugin = new Mamurjor_student_result();
	$plugin->run();

}
run_mamurjor_student_result();


