<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.facebook.com/ivan.knysh.7
 * @since             1.0.0
 * @package           Openweathermap
 *
 * @wordpress-plugin
 * Plugin Name:       Open Weather Map
 * Plugin URI:        https://www.facebook.com/ivan.knysh.7
 * Description:       OpenWeatherMap — онлайн сервис, который предоставляет API для доступа к данным о текущей погоде, прогнозам, для web-сервисов и мобильных приложений.
 * Version:           1.1
 * Author:            Ivan Knysh
 * Author URI:        https://www.facebook.com/ivan.knysh.7
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       openweathermap
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
define( 'OPENWEATHERMAP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-openweathermap-activator.php
 */
function activate_openweathermap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-openweathermap-activator.php';
	Openweathermap_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-openweathermap-deactivator.php
 */
function deactivate_openweathermap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-openweathermap-deactivator.php';
	Openweathermap_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_openweathermap' );
register_deactivation_hook( __FILE__, 'deactivate_openweathermap' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-openweathermap.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_openweathermap() {

	$plugin = new Openweathermap();
	$plugin->run();

}
run_openweathermap();
