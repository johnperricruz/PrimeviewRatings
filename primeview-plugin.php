<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.johnperricruz.com
 * @since             1.0.0
 * @package           Primeview_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Primeview Ratings
 * Plugin URI:        www.primeview.com
 * Description:       This Plugin is built customized Website Ratings
 * Version:           1.0.0
 * Author:            John Perri Cruz
 * Author URI:        https://www.johnperricruz.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       primeview-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} 

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-primeview-plugin-activator.php
 */
function activate_primeview_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'jpc/data/database_model.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-primeview-plugin-activator.php';
	
	Primeview_Plugin_Activator::activate();
	
	$db = new database_model();
	$db->create_tables();														//Create Tables
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-primeview-plugin-deactivator.php
 */
function deactivate_primeview_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-primeview-plugin-deactivator.php';
	Primeview_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_primeview_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_primeview_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-primeview-plugin.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_primeview_plugin(){
	require_once plugin_dir_path( __FILE__ ) . 'admin/class-primeview-plugin-admin.php';  		//Require Admin class
	require_once plugin_dir_path( __FILE__ ) . 'jpc/create-page.php'; 							//Create Admin Pages
	 
	$assets = new Primeview_Plugin_Admin(); 													//Init Class
	
	if(is_admin()){
		$assets->pv_register_css();																//Load CSS
		$assets->pv_register_js();																//Load JS																
	}else{
		$assets->pv_register_front_css();	
		$assets->pv_register_front_js();	
	}
}
//Primeview admin init
run_primeview_plugin();
